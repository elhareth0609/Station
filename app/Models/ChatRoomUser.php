<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatRoomUser extends Model {
    protected $fillable = [
        'chat_room_id',
        'user_id',
        'joined_at',
        'role',
    ];

    public function chatRoom() {
        return $this->belongsTo(ChatRoom::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
