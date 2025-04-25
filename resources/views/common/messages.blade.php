<div class="messages-container h-full flex flex-col">
    <!-- Chat header -->
    <div class="chat-header px-6 py-4 border-b border-gray-100 bg-white flex items-center">
        <div class="flex items-center flex-1">
            @if(isset($otherUser))
            <div class="w-10 h-10 rounded-full overflow-hidden bg-gray-200 mr-3 flex-shrink-0">
                <img src="{{ $otherUser->profile_picture_url ?? '' }}"
                    alt="{{ $otherUser->name }}"
                    class="w-full h-full object-cover"
                    onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($otherUser->name) }}&color=7F9CF5&background=EBF4FF'">
            </div>
            <div>
                <h4 class="font-medium text-gray-900">{{ $otherUser->name }}</h4>
                <div class="flex items-center">
                    <span class="w-2 h-2 rounded-full bg-green-500 mr-1.5"></span>
                    <span class="text-xs text-gray-500">Online</span>
                </div>
            </div>
            @else
            <div>
                <h4 class="font-medium text-gray-900">Select a conversation</h4>
            </div>
            @endif
        </div>
    </div>

    <!-- Messages area -->
    <div class="messages-area flex-1 overflow-y-auto p-6 bg-gray-50" id="message-container">
        @if(isset($messages) && count($messages) > 0)
        <div class="flex items-center justify-center my-6">
            <div class="bg-gray-100 text-gray-500 text-xs px-3 py-1 rounded-full">Today</div>
        </div>

        @foreach($messages as $message)
        <div class="message-bubble {{ $message->sender_id == Auth::id() ? 'message-sent' : 'message-received' }}">
            <p>{{ $message->message }}</p>
            <div class="message-time">{{ $message->created_at->format('h:i A') }}</div>
        </div>
        @endforeach
        @else
        <!-- Empty state -->
        <div class="flex items-center justify-center h-full">
            <div class="text-center">
                <div class="w-16 h-16 mx-auto bg-gray-100 rounded-full flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                    </svg>
                </div>
                <p class="text-gray-600 font-medium text-sm mb-1">Your Messages</p>
                <p class="text-xs text-gray-500">Select a conversation to start messaging</p>
            </div>
        </div>
        @endif
    </div>

    <!-- Message input -->
    @if(isset($activeConversation))
    <div class="message-input-area p-4 border-t border-gray-100 bg-white">
        <form method="POST" action="{{ route('messages.send') }}" class="relative">
            @csrf
            <input type="hidden" name="conversation_id" value="{{ $activeConversation->id }}">
            <div class="flex items-center border border-gray-200 rounded-lg py-2 px-4 focus-within:border-blue-300 focus-within:ring-2 focus-within:ring-blue-100 bg-white transition duration-150">
                <textarea
                    name="message"
                    rows="1"
                    placeholder="Type your message..."
                    class="text-sm flex-1 outline-none resize-none bg-transparent py-1 max-h-32"
                    required></textarea>
                <button type="submit" class="ml-3 p-2 bg-blue-600 text-white rounded-full flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform rotate-90" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="22" y1="2" x2="11" y2="13"></line>
                        <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                    </svg>
                </button>
            </div>
        </form>
    </div>
    @endif
</div>