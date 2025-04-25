<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Conversation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function sendMessage(Request $request)
    {
        $request->validate([
            'conversation_id' => 'required|exists:conversations,id',
            'message' => 'required|string|max:1000',
        ]);

        $conversation = Conversation::findOrFail($request->conversation_id);
        $receiver = $conversation->getOtherUser(Auth::id());

        if (!$receiver) {
            return redirect()->back()->with('error', 'Invalid conversation');
        }
        $message = new Message([
            'message' => $request->message,
            'sender_id' => Auth::id(),
            'receiver_id' => $receiver->id
        ]);

        $conversation->messages()->save($message);

        return redirect()->route('chat', ['conversation_id' => $conversation->id]);
    }

    public function getMessagesForConversation($conversationId)
    {
        $conversation = Conversation::where('id', $conversationId)
            ->where(function ($query) {
                $query->where('user_one_id', Auth::id())
                    ->orWhere('user_two_id', Auth::id());
            })->firstOrFail();

        $messages = Message::where('conversation_id', $conversationId)
            ->with(['sender', 'receiver'])
            ->orderBy('created_at')
            ->get()
            ->map(function ($message) {
                $message->formatted_time = $message->created_at->format('h:i A');
                $message->is_sender = $message->sender_id == Auth::id();
                return $message;
            });

        return [
            'messages' => $messages,
            'conversation' => $conversation,
            'other_user' => $conversation->user_one_id == Auth::id()
                ? $conversation->userTwo
                : $conversation->userOne
        ];
    }
}
