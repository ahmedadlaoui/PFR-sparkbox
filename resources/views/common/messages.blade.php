<div class="messages-container h-full flex flex-col bg-white" style="overflow: scroll;">
    <div class="chat-header flex items-center px-4 border-b border-gray-100 h-[60px] flex-shrink-0">
        @if(isset($otherUser))
        <div class="flex items-center flex-1">
            <div class="relative flex-shrink-0">
                <img src="{{ $otherUser->profile_picture_url ?? '' }}"
                    alt="{{ $otherUser->name }}"
                    class="w-7 h-7 rounded-full object-cover bg-gray-100 mr-2">
            </div>
            <div>
                <h4 class="font-medium text-gray-900 text-xs">{{ $otherUser->name }}</h4>
                <p class="text-[10px] text-gray-500">{{ $otherUser->bio }}</p>
            </div>
        </div>
        <div class="flex items-center">
            <button id="chat-options-btn" class="p-1.5 text-gray-400 hover:text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="1"></circle>
                    <circle cx="19" cy="12" r="1"></circle>
                    <circle cx="5" cy="12" r="1"></circle>
                </svg>
            </button>
            <div id="chat-options-dropdown" class="absolute right-4 top-16 mt-1 w-40 bg-white rounded shadow-sm py-1 z-10 hidden border border-gray-100">
                <form method="POST" action="{{ route('chat.delete', ['conversation_id' => $activeConversation->id ?? '']) }}" onsubmit="return confirm('Delete this conversation?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full text-left px-3 py-1.5 text-xs text-gray-700 hover:bg-gray-50 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-2 text-gray-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="3 6 5 6 21 6"></polyline>
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                        </svg>
                        Delete Chat
                    </button>
                </form>
            </div>
        </div>
        @else
        <div>
            <h4 class="font-medium text-gray-900 text-xs">Select a conversation</h4>
        </div>
        @endif
    </div>

    <div class="messages-area flex-1 overflow-y-auto p-3 bg-white" id="message-container" style="max-height: calc(100% - 120px); height: auto;">
        @if(isset($messages) && count($messages) > 0)
        <div class="flex flex-col">
            @foreach($messages as $message)
            @php
            $isSender = $message->sender_id == Auth::id();
            @endphp

            <div class="flex {{ $isSender ? 'justify-end' : 'justify-start' }} mb-1.5">
                <div class="message-bubble {{ $isSender ? 'message-sent' : 'message-received' }}">
                    <p class="text-xs">{{ $message->message }}</p>
                    <div class="message-time">{{ $message->created_at->format('g:i A') }}</div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="flex flex-col items-center justify-center h-full text-center">
            <div class="mb-3 p-3 bg-gray-50 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400">
                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                </svg>
            </div>
            <h5 class="text-xs font-medium text-gray-800 mb-1">No messages</h5>
            <p class="text-xs text-gray-500">Send a message to start a conversation</p>
        </div>
        @endif
    </div>

    @if(isset($otherUser))
    <div class="px-3 py-3 border-t border-gray-100 bg-white h-[60px] flex-shrink-0">
        <form method="POST" id="message-form" action="{{ route('messages.send') }}" class="flex items-center h-full">
            @csrf
            <input type="hidden" name="conversation_id" value="{{ $activeConversation->id ?? '' }}">
            <div class="message-input-container flex items-center px-3 py-1.5 flex-1">
                <textarea
                    id="message-input"
                    name="message"
                    rows="1"
                    placeholder="Message..."
                    class="message-input text-xs flex-1 outline-none border-none focus:ring-0"
                    required></textarea>
            </div>
            <button type="submit" class="send-button ml-2 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="22" y1="2" x2="11" y2="13"></line>
                    <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                </svg>
            </button>
        </form>
    </div>
    @endif
</div>