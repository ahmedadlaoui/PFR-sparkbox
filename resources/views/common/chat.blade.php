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
                        'sans': ['Inter', 'system-ui', 'sans-serif'],
                    },
                    colors: {
                        primary: '#0049FF',
                        secondary: '#F8F9FA',
                        dark: '#1A1A1A',
                        'text-secondary': '#666666',
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background-color: #ffffff;
            color: #333333;
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }


        .main-content {
            flex: 1 0 auto;
            padding-top: 64.8px;
            padding-bottom: 0;
            display: flex;
            flex-direction: column;
            background-color: white;
            width: 100%;
            height: 100vh;
        }

        .content-container {
            width: 100%;
            max-width: 1280px;
            margin: 0 auto;
            padding: 0;
            height: calc(100vh - 65px);

            display: flex;
            flex-direction: column;
        }

        .chat-container {
            display: grid;
            grid-template-columns: 320px 1fr;
            height: 100%;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05), 0 1px 2px rgba(0, 0, 0, 0.04);
            margin-bottom: 20px;
        }


        .message-bubble {
            max-width: 75%;
            padding: 14px 18px;
            border-radius: 18px;
            margin-bottom: 16px;
            position: relative;
            line-height: 1.5;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .message-sent {
            background-color: #f3f2f3;
            color: #1A1A1A;
            border: 1px solid #ededed;
            margin-left: auto;
            border-bottom-right-radius: 4px;
        }

        .message-received {
            background-color: white;
            color: #1A1A1A;
            border-bottom-left-radius: 4px;
            border: 1px solid #EDF2F7;
        }

        .message-time {
            font-size: 10px;
            opacity: 0.7;
            margin-top: 6px;
            text-align: right;
        }


        @media (max-width: 768px) {
            .chat-container {
                grid-template-columns: 1fr;

                display: flex;
                flex-direction: column;
                height: auto;
                max-height: calc(100vh - 130px);
                margin-bottom: 30px;
            }

            .conversations-sidebar {
                display: block;
                height: auto;
                max-height: 220px;

                overflow-y: auto;
                border-bottom: 1px solid #e2e8f0;
            }

            .messages-container {
                display: flex;
                height: calc(100vh - 350px);

                flex: 1;
            }

            .content-container {
                padding-bottom: 30px;

            }


            .conversations-sidebar .flex-1.overflow-y-auto {
                max-height: 180px;
            }


            .messages-area {
                max-height: calc(100vh - 400px) !important;
            }


            .messages-container .p-4.border-t {
                flex-shrink: 0;
            }
        }

        @media (max-width: 480px) {
            .message-bubble {
                max-width: 85%;
                padding: 12px 16px;
                font-size: 0.9rem;
            }

            .chat-header {
                padding: 10px;
            }

            .p-4 {
                padding: 0.75rem;
            }


            .chat-container,
            .conversations-sidebar,
            .messages-container {
                height: calc(100vh - 150px);
            }


            .conversations-sidebar {
                max-height: 180px;
            }

            .messages-container {
                height: calc(100vh - 300px);
            }

            .messages-area {
                max-height: calc(100vh - 350px) !important;
            }
        }

        @media (max-width: 360px) {
            .message-bubble {
                max-width: 90%;
                padding: 10px 14px;
                font-size: 0.85rem;
            }


            .chat-container,
            .conversations-sidebar,
            .messages-container {
                height: calc(100vh - 160px);
            }


            .conversations-sidebar {
                max-height: 160px;
            }

            .messages-container {
                height: calc(100vh - 280px);
            }

            .messages-area {
                max-height: calc(100vh - 330px) !important;
            }
        }


        .show-conversations .conversations-sidebar {
            display: block;
        }

        .show-conversations .messages-container {
            display: flex;
        }

        @media (max-width: 768px) {


            .back-to-conversations {
                display: none;

            }

            .show-conversations .conversations-sidebar {
                flex-direction: column;
                width: 100%;
            }
        }


        textarea {
            overflow-y: hidden;
        }


        .messages-area::-webkit-scrollbar,
        .flex-1.overflow-y-auto::-webkit-scrollbar {
            width: 6px;
        }

        .messages-area::-webkit-scrollbar-track,
        .flex-1.overflow-y-auto::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 6px;
        }

        .messages-area::-webkit-scrollbar-thumb,
        .flex-1.overflow-y-auto::-webkit-scrollbar-thumb {
            background: #d1d5db;
            border-radius: 6px;
        }

        .messages-area::-webkit-scrollbar-thumb:hover,
        .flex-1.overflow-y-auto::-webkit-scrollbar-thumb:hover {
            background: #9ca3af;
        }


        .messages-area,
        .flex-1.overflow-y-auto {
            -webkit-overflow-scrolling: touch;
            overscroll-behavior: contain;
        }


        footer {
            flex-shrink: 0;
            width: 100%;
        }
    </style>
</head>

<body class="font-sans bg-white text-gray-900 text-sm antialiased">
    <x-header />

    <div class="main-content bg-white">
        <div class="content-container">
            <div class="h-full w-full px-2 sm:px-6">
                <div class="h-full">
                    <div id="chat-view" class="chat-container border border-gray-200 rounded-lg overflow-hidden bg-white h-full">
                        @include('common.conversations')
                        @include('common.messages')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-footer />

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const messageContainer = document.getElementById('message-container');

            if (messageContainer) {
                messageContainer.scrollTop = messageContainer.scrollHeight;
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
</body>

</html>