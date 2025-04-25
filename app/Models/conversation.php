<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable = ['user_one_id', 'user_two_id'];

    public function userOne()
    {
        return $this->belongsTo(User::class, 'user_one_id');
    }

    public function userTwo()
    {
        return $this->belongsTo(User::class, 'user_two_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
    
    public function latestMessage()
    {
        return $this->hasOne(Message::class)->latest();
    }

    /**
     * Get the other user in a conversation
     *
     * @param int $userId
     * @return User|null
     */
    public function getOtherUser($userId)
    {
        if ($this->user_one_id == $userId) {
            return $this->userTwo;
        } elseif ($this->user_two_id == $userId) {
            return $this->userOne;
        }

        return null;
    }

    /**
     * Scope a query to only include conversations between specific users
     */
    public function scopeBetweenUsers($query, $userOneId, $userTwoId)
    {
        return $query->where(function ($q) use ($userOneId, $userTwoId) {
            $q->where('user_one_id', $userOneId)
                ->where('user_two_id', $userTwoId);
        })->orWhere(function ($q) use ($userOneId, $userTwoId) {
            $q->where('user_one_id', $userTwoId)
                ->where('user_two_id', $userOneId);
        });
    }
}
