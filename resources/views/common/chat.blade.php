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
        }

        .chat-container {
            display: grid;
            grid-template-columns: 320px 1fr;
            height: calc(100vh - 130px);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05), 0 1px 2px rgba(0, 0, 0, 0.04);
        }

        /* Message styling */
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

        /* Main content and responsive styling */
        .main-content {
            padding-top: 30px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: white;
            width: 100%;
        }

        .content-container {
            width: 100%;
            max-width: 1280px;
            margin: 0 auto;
            padding: 0;
        }

        /* Media queries for responsiveness */
        @media (max-width: 768px) {
            .chat-container {
                grid-template-columns: 1fr;
                height: calc(100vh - 100px);
            }

            .conversation-mobile-hidden {
                display: none;
            }
        }

        /* Auto-resize textarea */
        textarea {
            overflow-y: hidden;
        }

        /* Improved scrollbar styling */
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

        /* Ensure scrolling works properly on touch devices */
        .messages-area,
        .flex-1.overflow-y-auto {
            -webkit-overflow-scrolling: touch;
            overscroll-behavior: contain;
        }
    </style>
</head>

<body class="font-sans bg-white text-gray-900 text-sm antialiased">
    <x-header />

    <div class="main-content bg-white">
        <div class="content-container">
            <div class="ml-0 md:ml-12 lg:ml-16">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 py-6">
                   

                    <div class="chat-container border border-gray-200 rounded-lg overflow-hidden bg-white" style="height: 100%;">
                        @include('common.conversations')
                        @include('common.messages')
                    </div>
                </div>
            </div>
        </div>
        <x-footer />
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Feather Icons
            feather.replace();

            // Auto-resize textarea
            const textareas = document.querySelectorAll('textarea');
            textareas.forEach(textarea => {
                textarea.addEventListener('input', function() {
                    this.style.height = 'auto';
                    this.style.height = (this.scrollHeight) + 'px';
                });
            });

            // Improved auto-scroll to bottom of messages
            const messageContainer = document.getElementById('message-container');
            if (messageContainer) {
                // Scroll to bottom initially
                messageContainer.scrollTop = messageContainer.scrollHeight;

                // Ensure we scroll to bottom after dynamic content changes
                const messagesObserver = new MutationObserver(() => {
                    messageContainer.scrollTop = messageContainer.scrollHeight;
                });

                messagesObserver.observe(messageContainer, {
                    childList: true
                });
            }
        });
    </script>
</body>

</html>