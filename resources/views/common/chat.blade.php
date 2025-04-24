<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrepreneur Chat - SparkBox</title>
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
        /* Modern minimal aside bar styling */
        .aside-bar {
            width: 260px;
            background-color: white;
            height: calc(100vh - 80px);
            position: fixed;
            top: 80px;
            left: 0;
            border-right: 1px solid #F0F0F0;
            z-index: 30;
            overflow-y: auto;
        }

        .aside-link {
            display: flex;
            align-items: center;
            padding: 0.85rem 1.5rem;
            color: #666666;
            font-weight: 500;
        }

        .aside-link:hover {
            background-color: #F9FAFB;
            color: #1A1A1A;
        }

        .aside-link.active {
            color: #0049FF;
            background-color: #F0F4FF;
            font-weight: 600;
        }

        .aside-icon {
            margin-right: 12px;
            stroke-width: 1.8px;
        }

        /* Main content area styling */
        .main-content {
            padding-top: 30px;
            min-height: 100vh;
            margin-left: 0;
            display: flex;
            flex-direction: column;
            background-color: white;
            width: 100%;
        }

        /* Content container for proper width - match with home page */
        .content-container {
            width: 100%;
            max-width: 1280px;
            /* Changed from 1400px to match home page max-w-7xl */
            margin: 0 auto;
            padding: 0;
        }

        /* Responsive padding for inner content */
        .inner-content {
            padding: 0 24px;
            width: 100%;
        }

        /* Mobile styling */
        @media (max-width: 1024px) {
            .aside-bar {
                transform: translateX(-100%);
                transition: transform 0.25s ease;
            }

            .aside-bar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .mobile-aside-toggle {
                display: block;
            }
        }

        @media (min-width: 1025px) {
            .mobile-aside-toggle {
                display: none;
            }
        }

        /* Chat interface styling - modernized with integrated design */
        .chat-container {
            display: flex;
            height: calc(100vh - 130px);
            border-radius: 0;
            overflow: visible;
            background-color: transparent;
            margin-top: 0;
            gap: 0;
        }

        .contacts-list {
            width: 320px;
            overflow-y: auto;
            background-color: white;
            border-radius: 12px 0 0 12px;
            box-shadow: none;
            border-right: 1px solid #F0F0F0;
        }

        .chat-window {
            flex: 1;
            display: flex;
            flex-direction: column;
            background-color: white;
            border-radius: 0 12px 12px 0;
            box-shadow: none;
            overflow: hidden;
        }

        .chat-header {
            padding: 20px 24px;
            border-bottom: 1px solid #F0F0F0;
            display: flex;
            align-items: center;
            background-color: white;
        }

        .chat-messages {
            flex: 1;
            overflow-y: auto;
            padding: 24px;
            background-color: #FAFAFA;
        }

        .chat-input {
            padding: 16px 24px;
            border-top: 1px solid #F0F0F0;
            background-color: white;
        }

        .contact-item {
            padding: 16px 24px;
            cursor: pointer;
            transition: all 0.2s ease;
            border-bottom: 1px solid #F5F5F5;
        }

        .contact-item:hover {
            background-color: #F9FAFB;
        }

        .contact-item.active {
            background-color: #F5F5F5;
            border-left: 2px solid #4A5568;
            padding-left: 22px;
        }

        /* Message styling - more refined */
        .message-bubble {
            max-width: 75%;
            padding: 14px 18px;
            border-radius: 18px;
            margin-bottom: 16px;
            position: relative;
            line-height: 1.5;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s ease;
        }

        .message-bubble:hover {
            transform: translateY(-1px);
        }

        .message-sent {
            background: linear-gradient(135deg, #4A5568, #2D3748);
            color: white;
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

        /* Input box styling - modernized */
        .chat-input-box {
            display: flex;
            align-items: center;
            border: 1px solid #E5E7EB;
            border-radius: 12px;
            padding: 8px 16px;
            background-color: #F9FAFB;
            transition: all 0.2s ease;
        }

        .chat-input-box:focus-within {
            border-color: #4A5568;
            box-shadow: 0 0 0 2px rgba(74, 85, 104, 0.05);
            background-color: white;
        }

        .chat-textarea {
            flex: 1;
            border: none;
            outline: none;
            resize: none;
            padding: 10px 8px;
            max-height: 120px;
            background-color: transparent;
            font-size: 14px;
            font-family: inherit;
        }

        /* File attachment styling */
        .file-attachment {
            background-color: white;
            border-radius: 10px;
            padding: 12px;
            margin-top: 8px;
            display: flex;
            align-items: center;
            border: 1px solid #EDF2F7;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
        }

        /* Modern button style */
        .bg-\[\#0049FF\] {
            background-color: #4A5568 !important;
        }

        .bg-\[\#0049FF\]:hover {
            background-color: #2D3748 !important;
        }

        .ml-auto.bg-\[\#0049FF\] {
            background-color: #4A5568 !important;
        }

        /* Subtle animations */
        .contact-item,
        .chat-input-box,
        button {
            transition: all 0.2s ease;
        }

        /* More refined document attachments */
        .bg-gray-100 {
            background-color: #F7FAFC;
            border: 1px solid #EDF2F7;
            border-radius: 8px;
        }

        .text-blue-600 {
            color: #4A5568 !important;
        }

        /* Date divider improvement */
        .flex.items-center.justify-center.my-6 .bg-gray-200 {
            background-color: #EDF2F7;
            padding: 0.25rem 1rem;
            font-size: 0.7rem;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            font-weight: 500;
        }

        /* Side navigation styling */
        .side-nav {
            width: 260px;
            height: calc(100vh - 80px);
            position: fixed;
            top: 80px;
            left: 0;
            background-color: white;
            border-right: 1px solid #F0F0F0;
            z-index: 30;
            overflow-y: auto;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 0.85rem 1.5rem;
            color: #666666;
            font-weight: 500;
        }

        .nav-link:hover {
            background-color: #F9FAFB;
            color: #1A1A1A;
        }

        .nav-link.active {
            color: #0049FF;
            background-color: #F0F4FF;
            font-weight: 600;
        }

        .nav-icon {
            margin-right: 12px;
            stroke-width: 1.8px;
        }
    </style>
</head>

<body class="font-inter bg-white text-[#1A1A1A] text-sm antialiased">
    <x-header />

    <div class="main-content bg-white">

        <div class="content-container">
            <div class="ml-0 md:ml-12 lg:ml-16">
                <div class="max-w-7xl mx-auto px-6 py-6">

                    <div class="chat-container shadow-sm border border-gray-200 rounded-lg overflow-hidden bg-white">

                        <div class="contacts-list">

                            <div class="p-4 border-b border-gray-100">
                                <div class="flex items-center bg-gray-50 rounded-full px-4 py-2.5">
                                    <i data-feather="search" class="h-4 w-4 text-gray-400 mr-2"></i>
                                    <input type="text" placeholder="Search conversations"
                                        class="bg-transparent border-none outline-none w-full text-sm">
                                </div>
                            </div>

                            @foreach($MyConversations as $MyConversation)
                                @if($MyConversation->userOne->id != Auth::id())
                            <div class="contact-item active">
                                <div class="flex justify-between mb-2">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 rounded-full overflow-hidden mr-3">
                                            <img src="{{$MyConversation->userOne->profile_picture_url}}" alt="Sarah Chen"
                                                class="w-full h-full object-cover">
                                        </div>
                                        <div>
                                            <h4 class="font-medium text-[#1A1A1A]">{{$MyConversation->userOne->name}}</h4>
                                        </div>
                                    </div>
                                    <div class="text-xs text-gray-500">12:42 PM</div>
                                </div>
                                <p class="text-gray-500 text-xs truncate">EcoFlow Energy Storage: Looking forward to discussing
                                    the term sheet in more detail...</p>
                            </div>
                            @else
                            <div class="contact-item active">
                                <div class="flex justify-between mb-2">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 rounded-full overflow-hidden mr-3">
                                            <img src="{{$MyConversation->userTwo->profile_picture_url}}" alt="Sarah Chen"
                                                class="w-full h-full object-cover">
                                        </div>
                                        <div>
                                            <h4 class="font-medium text-[#1A1A1A]">{{$MyConve   rsation->userTwo->name}}</h4>
                                        </div>
                                    </div>
                                    <div class="text-xs text-gray-500">12:42 PM</div>
                                </div>
                                <p class="text-gray-500 text-xs truncate">EcoFlow Energy Storage: Looking forward to discussing
                                    the term sheet in more detail...</p>
                            </div>
                            @endif
                            @endforeach
                        </div>


                        <div class="chat-window">

                            <div class="chat-header">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 rounded-full overflow-hidden mr-3">
                                        <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Sarah Chen"
                                            class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-[#1A1A1A]">Sarah Chen</h4>
                                        <p class="text-xs text-gray-500">CEO of EcoFlow Energy Storage</p>
                                    </div>
                                </div>
                                <div class="ml-auto flex items-center gap-4">
                                    <button
                                        class="text-gray-400 hover:text-gray-600 bg-gray-50 rounded-full p-2 transition-colors">
                                        <i data-feather="phone" class="h-4 w-4"></i>
                                    </button>
                                    <button
                                        class="text-gray-400 hover:text-gray-600 bg-gray-50 rounded-full p-2 transition-colors">
                                        <i data-feather="video" class="h-4 w-4"></i>
                                    </button>
                                    <button
                                        class="text-gray-400 hover:text-gray-600 bg-gray-50 rounded-full p-2 transition-colors">
                                        <i data-feather="more-vertical" class="h-4 w-4"></i>
                                    </button>
                                </div>
                            </div>


                            <div class="chat-messages">

                                <div class="flex items-center justify-center my-6">
                                    <div class="bg-gray-200 text-gray-500 text-xs px-3 py-1 rounded-full">Today</div>
                                </div>


                                <div class="message-bubble message-sent">
                                    <p>Thanks for sharing, Sarah. I've reviewed your pitch deck and I'm impressed with your
                                        technology and market approach.</p>
                                    <div class="message-time">10:17 AM</div>
                                </div>


                                <div class="message-bubble message-received">
                                    <p>Of course. Our valuation is based on our proprietary technology (patents pending), the
                                        team's expertise, and our initial traction. We already have LOIs from 3 major utility
                                        companies.</p>
                                    <div class="message-time">10:22 AM</div>
                                </div>


                                <div class="message-bubble message-sent">
                                    <p>Thanks for the quick response. I'll review this and get back to you with any other
                                        questions. In the meantime, what are the main milestones you plan to achieve with this
                                        round of funding?</p>
                                    <div class="message-time">10:30 AM</div>
                                </div>


                                <div class="message-bubble message-received">
                                    <p>Great question. With this funding, we plan to:</p>
                                    <p>1. Scale production to meet our existing orders</p>
                                    <p>2. Expand our R&D team to improve energy density by 35%</p>
                                    <p>3. Enter two new international markets (Germany and Japan)</p>
                                    <p>4. File 5 additional patents for our core technology</p>
                                    <div class="message-time">10:36 AM</div>
                                </div>
                            </div>


                            <div class="chat-input">
                                <div class="chat-input-box">
                                    <button class="text-gray-400 hover:text-gray-600 p-1">
                                        <i data-feather="smile" class="h-5 w-5"></i>
                                    </button>
                                    <textarea class="chat-textarea" placeholder="Type your message..." rows="1"></textarea>
                                    <div class="flex items-center gap-2">
                                        <button class="text-gray-400 hover:text-gray-600 p-1">
                                            <i data-feather="paperclip" class="h-5 w-5"></i>
                                        </button>
                                        <button
                                            class="bg-[#0049FF] text-white p-2 rounded-full hover:bg-blue-600 transition-colors">
                                            <i data-feather="send" class="h-4 w-4"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
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

            // Mobile menu toggle
            const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
            const sideNav = document.querySelector('.side-nav');

            mobileMenuToggle.addEventListener('click', function() {
                sideNav.classList.toggle('show');
            });

            // Auto-expanding textarea
            const textarea = document.querySelector('.chat-textarea');
            textarea.addEventListener('input', function() {
                this.style.height = 'auto';
                this.style.height = (this.scrollHeight) + 'px';
            });

            // Chat contact selection
            const contactItems = document.querySelectorAll('.contact-item');
            contactItems.forEach(item => {
                item.addEventListener('click', function() {
                    contactItems.forEach(i => i.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        });
    </script>
</body>

</html>