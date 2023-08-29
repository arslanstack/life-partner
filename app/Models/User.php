<?php

namespace App\Models;

use App\Notifications\CustomVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    public function sendEmailVerificationNotification()
    {
        $this->notify(new CustomVerifyEmail);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'unique_id',
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'iam',
        'interestedin',
        'financial_support',
        'dob',
        'age',
        'height',
        'weight',
        'body_type',
        'child',
        'city',
        'state',
        'zipcode',
        'country',
        'address',
        'timezone',
        'gender',
        'about_me',
        'latitude',
        'longitude',
        'profile_image',
        'last_login',
        'membership_type',
        'membership_price',
        'membership_start',
        'membership_end',
        'membership_status',
        'marital_status',
        'privacy_status',
        'verify_status',
        'status',
        'show_last_login',
        'block_male_msg',
        'block_female_msg',
        'block_trans_msg',
        'block_all_email',
        'block_money_making_opp_email',
        'block_local_event_meet_up_email',
        'block_like_favorite_email',
    ];

    public function sentChats()
    {
        return $this->hasMany(Chat::class, 'sender_id');
    }

    public function receivedChats()
    {
        return $this->hasMany(Chat::class, 'receiver_id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
