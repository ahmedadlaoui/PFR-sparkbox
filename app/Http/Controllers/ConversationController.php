<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Conversation;
use Illuminate\Support\Facades\Auth;

class ConversationController extends Controller
{
    public function GetConversations()
    {
        $MyConversations = Conversation::with(['userOne', 'userTwo'])
            ->where('user_one_id', Auth::id())
            ->orWhere('user_two_id', Auth::id())
            ->get();

        return view('common/chat', compact('MyConversations'));
    }
}
