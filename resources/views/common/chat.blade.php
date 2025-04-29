<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Messages - SparkBox</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif'],
                    },
                    colors: {
                        primary: '#0049FF',
                        secondary: '#F8F9FA',
                        dark: '#1A1A1A',
                        'text-secondary': '#666666',
                    },
                    boxShadow: {
                        'soft': '0 2px 15px -3px rgba(0, 0, 0, 0.07), 0 10px 20px -2px rgba(0, 0, 0, 0.04)',
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background-color: #FAFAFA;
            color: #262626;
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .main-content {
            margin-top: 64px;
            padding-top: 20px;
            padding-bottom: 20px;
            display: flex;
            flex-direction: column;
            width: 100%;
            min-height: calc(100vh - 64px);
            align-items: center;
        }

        .content-container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
            display: flex;
            flex-direction: column;
        }

        .chat-header-section {
            padding-bottom: 24px;
            width: 100%;
            text-align: left;
        }

        .chat-container {
            display: grid;
            grid-template-columns: 280px 1fr;
            height: 550px;
            max-height: 70vh;
            width: 100%;
            border: 1px solid #dbdbdb;
            border-radius: 8px;
            overflow: hidden;
            background-color: white;
            margin: 0 auto;
        }

        .conversations-sidebar {
            border-right: 1px solid #dbdbdb;
            background-color: white;
            height: 100%;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            max-height: 100%;
        }

        .messages-container {
            display: flex;
            flex-direction: column;
            height: 100%;
            max-height: 100%;
        }

        .chat-header {
            height: 60px;
            background-color: #ffffff;
            border-bottom: 1px solid #dbdbdb;
            flex-shrink: 0;
        }

        .messages-area {
            flex: 1;
            overflow-y: auto;
            padding: 1rem;
            background-color: #ffffff;
            scrollbar-width: thin;
            max-height: calc(100% - 120px);
        }

        .px-3.py-3.border-t.border-gray-100.bg-white {
            height: 60px;
            flex-shrink: 0;
            position: relative;
            bottom: 0;
            width: 100%;
            z-index: 5;
        }

        .message-input-area {
            height: 60px;
            border-top: 1px solid #dbdbdb;
            flex-shrink: 0;
            padding: 0.75rem;
            background-color: #ffffff;
        }

        .message-bubble {
            max-width: 70%;
            padding: 10px 14px;
            border-radius: 4px;
            margin-bottom: 6px;
            position: relative;
            font-size: 0.9rem;
        }

        .message-sent {
            background-color: #efefef;
            color: #262626;
            align-self: flex-end;
        }

        .message-received {
            background-color: white;
            color: #262626;
            border: 1px solid #dbdbdb;
            align-self: flex-start;
        }

        .message-time {
            font-size: 10px;
            color: #8e8e8e;
            margin-top: 4px;
            text-align: right;
        }

        .messages-area::-webkit-scrollbar,
        .conversations-sidebar::-webkit-scrollbar,
        .flex-1.overflow-y-auto::-webkit-scrollbar {
            width: 4px;
        }

        .messages-area::-webkit-scrollbar-track,
        .conversations-sidebar::-webkit-scrollbar-track,
        .flex-1.overflow-y-auto::-webkit-scrollbar-track {
            background: transparent;
        }

        .messages-area::-webkit-scrollbar-thumb,
        .conversations-sidebar::-webkit-scrollbar-thumb,
        .flex-1.overflow-y-auto::-webkit-scrollbar-thumb {
            background: #d1d5db;
            border-radius: 2px;
        }

        .messages-area::-webkit-scrollbar-thumb:hover,
        .conversations-sidebar::-webkit-scrollbar-thumb:hover,
        .flex-1.overflow-y-auto::-webkit-scrollbar-thumb:hover {
            background: #9ca3af;
        }

        .message-input-container {
            border: 1px solid #dbdbdb;
            border-radius: 22px;
            background-color: #ffffff;
            height: 38px;
            display: flex;
            align-items: center;
        }

        textarea.message-input {
            resize: none;
            min-height: 24px;
            max-height: 38px;
            background-color: transparent;
        }

        .send-button {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
            color: #0095f6;
        }

        .conversation-item {
            transition: background-color 0.15s ease;
        }

        .conversation-item:hover {
            background-color: #fafafa;
        }

        .conversation-item.active {
            background-color: #efefef;
        }

        footer {
            flex-shrink: 0;
            width: 100%;
        }

        @media (max-width: 768px) {
            .chat-container {
                grid-template-columns: 1fr;
                display: flex;
                flex-direction: column;
                height: 500px;
                margin: 0 auto 2rem;
            }

            .conversations-sidebar {
                height: 150px;
                min-height: 150px;
                overflow-y: auto;
            }

            .messages-container {
                height: calc(100% - 150px);
            }

            .content-container {
                padding: 0 0.75rem;
            }
        }

        @media (max-width: 480px) {
            .message-bubble {
                max-width: 85%;
                padding: 10px 14px;
                font-size: 0.875rem;
            }

            .chat-header {
                padding: 0 12px;
            }
        }
    </style>
</head>

<body class="font-sans text-gray-900 text-sm antialiased">
    <x-header />

    <div class="main-content">
        <div class="content-container">
            <div class="chat-header-section">
                <h1 class="text-2xl md:text-3xl font-extrabold text-gray-900 mb-2">Messages</h1>
                <p class="text-gray-600 font-['Inter',_sans-serif]">Chat & negotiate with investors .</p>
            </div>

            <div class="h-full w-full p-0">
                <div id="chat-view" class="chat-container">
                    @include('common.conversations')
                    @include('common.messages')
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            feather.replace();

            const messageContainer = document.getElementById('message-container');

            if (messageContainer) {
                messageContainer.scrollTop = messageContainer.scrollHeight;
            }

            const messageInput = document.getElementById('message-input');
            if (messageInput) {
                messageInput.addEventListener('input', function() {
                    this.style.height = 'auto';
                    const newHeight = Math.min(this.scrollHeight, 38);
                    this.style.height = newHeight + 'px';
                });
            }

            const chatOptionsBtn = document.getElementById('chat-options-btn');
            const chatOptionsDropdown = document.getElementById('chat-options-dropdown');

            if (chatOptionsBtn && chatOptionsDropdown) {
                chatOptionsBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    chatOptionsDropdown.classList.toggle('hidden');
                });

                document.addEventListener('click', function() {
                    if (!chatOptionsDropdown.classList.contains('hidden')) {
                        chatOptionsDropdown.classList.add('hidden');
                    }
                });
            }
        });
    </script>
    <x-footer />
</body>

</html>