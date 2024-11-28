<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model {

    protected $fillable = [
        'name',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)
                    ->using(ChatRoomUser::class) // Specify the pivot model
                    ->withTimestamps(); // Include timestamps if needed
    }
    

    public function messages() {
        return $this->hasMany(Message::class);
    }

    
}
