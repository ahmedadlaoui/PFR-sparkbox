<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class ConversationController extends Controller
{
    public function GetConversations(Request $request)
    {
        $MyConversations = Conversation::where('user_one_id', Auth::id())
            ->orWhere('user_two_id', Auth::id())
            ->with(['userOne', 'userTwo', 'latestMessage'])
            ->get()
            ->sortByDesc(function ($conversation) {
                return $conversation->latestMessage ?
                    $conversation->latestMessage->created_at :
                    $conversation->created_at;
            });
        $MyConversations = $MyConversations->values();
        $conversationId = $request->input('conversation_id');

        if (!$conversationId && $MyConversations->count() > 0) {
            $conversationId = $MyConversations[0]->id;
        }

        if ($conversationId) {
            $activeConversation = $MyConversations->firstWhere('id', $conversationId);

            if ($activeConversation) {
               
                $messages = Message::where('conversation_id', $conversationId)
                    ->with(['sender', 'receiver'])
                    ->orderBy('created_at')
                    ->get();

                // Format message details
                $messages->each(function ($message) {
                    $message->formatted_time = $message->created_at->format('h:i A');
                    $message->is_sender = $message->sender_id == Auth::id();
                });

               
                $otherUser = $activeConversation->getOtherUser(Auth::id());
            }
        }

        return view('common/chat', compact(
            'MyConversations',
            'activeConversation',
            'messages',
            'otherUser'
        ));
    }

    public function AddConversation(Request $request)
    {
        $authUserId = Auth::id();
        $investorId = $request->input('investor_id');
        $conversation = Conversation::betweenUsers($authUserId, $investorId)->first();

        if (!$conversation) {
            $conversation = Conversation::create([
                'user_one_id' => $authUserId,
                'user_two_id' => $investorId
            ]);
        }

        return redirect()->route('chat', ['conversation_id' => $conversation->id]);
    }
}
