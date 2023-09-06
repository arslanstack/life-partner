<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = ['chat_contact_id', 'sender_id', 'receiver_id', 'message', 'attachment', 'is_read', 'is_deleted'];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function chatContact()
    {
        return $this->belongsTo(ChatContact::class, 'chat_contact_id');
    }
}
