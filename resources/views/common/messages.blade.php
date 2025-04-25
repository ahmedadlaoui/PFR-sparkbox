<div class="messages-container h-full flex flex-col">
    <!-- Chat header -->
    <div class="chat-header px-5 py-3.5 border-b border-gray-100 bg-white flex items-center">
        <div class="flex items-center flex-1">
            @if(isset($otherUser))
            <div class="relative flex-shrink-0">
                <img src="{{ $otherUser->profile_picture_url ?? '' }}"
                    alt="{{ $otherUser->name }}"
                    class="w-10 h-10 rounded-full object-cover bg-gray-200 mr-3"
                    onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($otherUser->name) }}&color=7F9CF5&background=EBF4FF'">
                <span class="absolute bottom-0 right-0 w-2.5 h-2.5 bg-green-400 border-2 border-white rounded-full"></span>
            </div>
            <div>
                <h4 class="font-medium text-gray-800">{{ $otherUser->name }}</h4>
                <div class="flex items-center">
                    <span class="text-xs text-gray-500">{{ $otherUser->bio ?? 'Active now' }}</span>
                </div>
            </div>
            @else
            <div>
                <h4 class="font-medium text-gray-900">Select a conversation</h4>
            </div>
            @endif
        </div>

        @if(isset($otherUser))
        <div class="flex items-center">
            <button class="p-2 rounded-full hover:bg-gray-100 text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                </svg>
            </button>
        </div>
        @endif
    </div>

    <!-- Messages area -->
    <div class="messages-area flex-1 overflow-y-auto p-5 bg-white" id="message-container" style="max-height: calc(100vh - 180px);">
        @if(isset($messages) && count($messages) > 0)
        @php
        $lastDate = null;
        $today = \Carbon\Carbon::now()->startOfDay();
        $yesterday = \Carbon\Carbon::now()->subDay()->startOfDay();
        @endphp

        @foreach($messages as $message)
        @php
        $messageDate = $message->created_at->startOfDay();
        $showDateSeparator = $lastDate === null || !$messageDate->equalTo($lastDate);
        $lastDate = $messageDate;
        $isSender = $message->sender_id == Auth::id();

        // Format date header
        if($messageDate->equalTo($today)) {
        $dateHeader = 'Today';
        } elseif($messageDate->equalTo($yesterday)) {
        $dateHeader = 'Yesterday';
        } else {
        $dateHeader = $messageDate->format('F j, Y');
        }
        @endphp

        @if($showDateSeparator)
        <div class="flex justify-center my-4">
            <div class="bg-gray-100 text-gray-500 text-xs px-3 py-1 rounded-full">{{ $dateHeader }}</div>
        </div>
        @endif

        <div class="flex items-end mb-4 {{ $isSender ? 'justify-end' : 'justify-start' }}">
            @if(!$isSender)
            <div class="flex-shrink-0 mr-2">
                <img src="{{ $otherUser->profile_picture_url ?? '' }}"
                    alt="{{ $otherUser->name }}"
                    class="w-8 h-8 rounded-full bg-gray-200"
                    onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($otherUser->name) }}&color=7F9CF5&background=EBF4FF'">
            </div>
            @endif

            <div class="message-bubble {{ $isSender ? 'message-sent' : 'message-received' }}">
                <p class="text-sm">{{ $message->message }}</p>
                <div class="message-time">{{ $message->created_at->format('g:i A') }}</div>
            </div>

            @if($isSender)
            <div class="flex-shrink-0 ml-2">
                <div class="w-8 h-8 rounded-full bg-gray-200 invisible">
                    <!-- Invisible placeholder for alignment -->
                </div>
            </div>
            @endif
        </div>
        @endforeach
        @else
        <!-- Empty state -->
        <div class="flex items-center justify-center h-full">
            <div class="text-center">
                <div class="w-16 h-16 mx-auto bg-gray-100 rounded-full flex items-center justify-center mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                    </svg>
                </div>
                <p class="text-gray-700 font-medium text-sm">No messages yet</p>
                <p class="text-xs text-gray-500 mt-1">Send a message to start the conversation</p>
            </div>
        </div>
        @endif
    </div>

    <!-- Message input -->
    @if(isset($activeConversation))
    <div class="p-4 border-t border-gray-100 bg-white">
        <form method="POST" action="{{ route('messages.send') }}" class="relative">
            @csrf
            <input type="hidden" name="conversation_id" value="{{ $activeConversation->id }}">
            <div class="flex items-center rounded-full border border-gray-200 py-2 pl-4 pr-2 focus-within:border-gray-300 focus-within:ring-1 focus-within:ring-gray-200">
                <textarea
                    name="message"
                    rows="1"
                    placeholder="Type a message..."
                    class="text-sm flex-1 outline-none resize-none bg-transparent py-1 max-h-32"
                    required></textarea>
                <button type="submit" class="ml-2 p-2 bg-gray-100 text-gray-600 rounded-full hover:bg-gray-200 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
                    </svg>
                </button>
            </div>
        </form>
    </div>
    @endif
</div>