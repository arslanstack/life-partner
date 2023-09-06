<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chatContact extends Model
{
    use HasFactory;

    protected $fillable = ['sender_id', 'receiver_id', 'is_deleted_sender', 'is_deleted_receiver'];

    public function chats()
    {
        return $this->hasMany(Chat::class, 'chat_contact_id');
    }
}
