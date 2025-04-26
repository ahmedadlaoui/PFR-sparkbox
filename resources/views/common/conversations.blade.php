<div class="conversations-sidebar h-full flex flex-col bg-white border-r border-gray-100">
    <!-- Search bar -->
    <form method="GET" action="{{ route('chat') }}" class="p-4 border-b border-gray-100">
        <div class="flex items-center bg-gray-50 hover:bg-gray-100 rounded-full px-4 py-2.5 transition duration-150">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
            <input type="text" name="search" placeholder="Search conversations" class="bg-transparent border-none outline-none w-full text-sm">
        </div>
    </form>

    <!-- Conversations list - Adjusted height -->
    <div class="flex-1 overflow-y-auto" style="max-height: calc(100vh - 200px); scrollbar-width: thin;">
        @if(count($MyConversations) > 0)
        @foreach($MyConversations as $conversation)
        @php
        $otherUser = $conversation->getOtherUser(Auth::id());
        $isActive = $activeConversation && $activeConversation->id == $conversation->id;
        $latestMessage = $conversation->latestMessage;
        @endphp
        <a href="{{ route('chat', ['conversation_id' => $conversation->id]) }}" class="block">
            <div class="conversation-item hover:bg-gray-50 {{ $isActive ? 'bg-gray-100' : '' }} transition-colors duration-150 border-b border-gray-100">
                <div class="p-4">
                    <div class="flex items-center justify-between mb-1.5">
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full overflow-hidden mr-3 bg-gray-200 flex-shrink-0">
                                <img src="{{ $otherUser->profile_picture_url ?? '' }}"
                                    alt="{{ $otherUser->name }}"
                                    class="w-full h-full object-cover"
                                    onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($otherUser->name) }}&color=7F9CF5&background=EBF4FF'">
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-900 text-sm">{{ $otherUser->name }}</h4>
                                <p class="text-xs text-gray-500 truncate mt-0.5" style="max-width: 180px">
                                    {{ $latestMessage ? $latestMessage->message : 'No messages yet' }}
                                </p>
                            </div>
                        </div>
                        <div class="text-[10px] text-gray-400 font-medium whitespace-nowrap ml-2">
                            {{ $latestMessage ? $latestMessage->created_at->format('h:i A') : '-' }}
                        </div>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
        @else
        <!-- No conversations state -->
        <div class="flex flex-col items-center justify-center h-full text-center p-6">
            <p class="text-gray-600 font-medium text-sm mb-1">No Conversations Yet</p>
            <p class="text-xs text-gray-500">Your conversations will appear here</p>
        </div>
        @endif
    </div>

    <!-- Status footer -->
    <div class="p-4 border-t border-gray-100 bg-gray-50">
        <div class="flex items-center">
            <div class="w-8 h-8 rounded-full overflow-hidden mr-3 bg-gray-200">
                <img src="{{ Auth::user()->profile_picture_url ?? 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name) }}"
                    alt="{{ Auth::user()->name }}"
                    class="w-full h-full object-cover">
            </div>
            <div class="flex-1">
                <p class="text-xs font-medium text-gray-900">{{ Auth::user()->name }}</p>
                <div class="flex items-center">
                    <span class="w-2 h-2 rounded-full bg-green-500 mr-1.5"></span>
                    <span class="text-[10px] text-gray-500">Online</span>
                </div>
            </div>
        </div>
    </div>
</div>