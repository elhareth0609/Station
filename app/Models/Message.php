<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model {
    use SoftDeletes;

    protected $fillable = [
        'chat_room_id',
        'user_id',
        'message',
        'is_read',
    ];

    public function chatRoom() {
        return $this->belongsTo(ChatRoom::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

}
