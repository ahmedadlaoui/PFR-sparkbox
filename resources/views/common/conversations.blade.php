<div class="conversations-sidebar h-full flex flex-col bg-white">
    <div class="px-4 py-3 border-b border-gray-100 flex items-center justify-between h-[60px] flex-shrink-0">
        <h3 class="text-sm font-semibold text-gray-800">Conversations</h3>
    </div>

    <div class="flex-1 overflow-y-auto" style="max-height: calc(100% - 60px);">
        @if(count($MyConversations) > 0)
        @foreach($MyConversations as $conversation)
        @php
        $otherUser = $conversation->getOtherUser(Auth::id());
        $isActive = $activeConversation && $activeConversation->id == $conversation->id;
        $latestMessage = $conversation->latestMessage;
        @endphp
        <a href="{{ route('chat', ['conversation_id' => $conversation->id]) }}" class="block">
            <div class="conversation-item px-4 py-2 hover:bg-gray-50 {{ $isActive ? 'active' : '' }} border-b border-gray-100">
                <div class="flex items-center justify-between">
                    <div class="flex items-center min-w-0">
                        <div class="w-8 h-8 rounded-full overflow-hidden mr-2 bg-gray-100 flex-shrink-0">
                            <img src="{{ $otherUser->profile_picture_url ?? '' }}"
                                alt="{{ $otherUser->name }}"
                                class="w-full h-full object-cover">
                        </div>
                        <div class="min-w-0 flex-1">
                            <h4 class="font-medium text-gray-800 text-xs truncate">{{ $otherUser->name }}</h4>
                            <div class="flex items-center">
                                <p class="text-xs text-gray-500 truncate">
                                    {{ $latestMessage ? Str::limit($latestMessage->message, 18) : 'No messages yet' }}
                                </p>
                                @if($latestMessage)
                                <span class="mx-1 text-gray-400 text-[10px]">·</span>
                                <span class="text-[10px] text-gray-400 whitespace-nowrap">
                                    {{ $latestMessage->created_at->diffForHumans(null, true, true) }}
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
        @else
        <div class="flex flex-col items-center justify-center h-full text-center p-4">
            <div class="mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="text-gray-300">
                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                </svg>
            </div>
            <h5 class="text-xs font-medium text-gray-800 mb-1">No conversations yet</h5>
            <p class="text-[10px] text-gray-500">Your conversations will appear here</p>
        </div>
        @endif
    </div>
</div>