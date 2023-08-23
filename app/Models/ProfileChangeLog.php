<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileChangeLog extends Model
{
    protected $table = 'profile_change_logs';

    protected $fillable = ['user_id', 'profile_data', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
