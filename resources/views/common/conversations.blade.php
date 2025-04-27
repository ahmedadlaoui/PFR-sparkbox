<div class="conversations-sidebar h-full flex flex-col bg-white border-r border-gray-100 w-full sm:w-auto">



    <div class="flex-1 overflow-y-auto" style="max-height: calc(100vh - 170px); height: calc(100% - 100px); scrollbar-width: thin;">
        @if(count($MyConversations) > 0)
        @foreach($MyConversations as $conversation)
        @php
        $otherUser = $conversation->getOtherUser(Auth::id());
        $isActive = $activeConversation && $activeConversation->id == $conversation->id;
        $latestMessage = $conversation->latestMessage;
        @endphp
        <a href="{{ route('chat', ['conversation_id' => $conversation->id]) }}" class="block">
            <div class="conversation-item hover:bg-gray-50 {{ $isActive ? 'bg-gray-100' : '' }} transition-colors duration-150 border-b border-gray-100">
                <div class="p-2 sm:p-4">
                    <div class="flex items-center justify-between mb-1">
                        <div class="flex items-center min-w-0">
                            <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full overflow-hidden mr-2 sm:mr-3 bg-gray-200 flex-shrink-0">
                                <img src="{{ $otherUser->profile_picture_url ?? '' }}"
                                    alt="{{ $otherUser->name }}"
                                    class="w-full h-full object-cover">
                            </div>
                            <div class="min-w-0 flex-1">
                                <h4 class="font-medium text-gray-900 text-xs sm:text-sm truncate">{{ $otherUser->name }}</h4>
                                <p class="text-[10px] sm:text-xs text-gray-500 truncate">
                                    {{ $latestMessage ? $latestMessage->message : 'No messages yet' }}
                                </p>
                            </div>
                        </div>
                        <div class="text-[9px] sm:text-[10px] text-gray-400 font-medium whitespace-nowrap ml-1 sm:ml-2 flex-shrink-0">
                            {{ $latestMessage ? $latestMessage->created_at->format('h:i A') : '-' }}
                        </div>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
        @else

        <div class="flex flex-col items-center justify-center h-full text-center p-3 sm:p-6">
            <p class="text-gray-600 font-medium text-xs sm:text-sm mb-1">No Conversations Yet</p>
            <p class="text-[10px] sm:text-xs text-gray-500">Your conversations will appear here</p>
        </div>
        @endif
    </div>

</div>