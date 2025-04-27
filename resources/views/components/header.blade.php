<header class="bg-white backdrop-blur-sm fixed w-full z-50 border-b border-gray-100">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center justify-between h-16 px-6">
                        <div class="pl-6 sm:pl-8 md:pl-12">
                <a href="{{ route('home') }}" class="text-xl font-bold text-dark">SparkBox</a>
            </div>

                        <div class="flex-1 flex justify-center items-center">

                                <nav class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-sm md:text-base font-medium font-['Inter',_sans-serif] {{ request()->routeIs('home') ? 'text-blue-600' : 'text-gray-600' }}">Home</a>
                    <a href="{{ route('deals') }}" class="text-sm md:text-base font-medium hover:text-blue-600 transition-colors font-['Inter',_sans-serif] {{ request()->routeIs('deals') ? 'text-blue-600' : 'text-gray-600' }}">Deals</a>
                </nav>
            </div>

            @if(Auth()->user())
                        <div class="relative">
                <button id="profileDropdownButton" class="flex items-center space-x-3 focus:outline-none">
                    <div class="text-right mr-2 hidden sm:block">
                        <p class="text-sm font-medium text-gray-800">
                            {{Auth()->user()->name}}
                        </p>
                    </div>
                    <div class="h-10 w-10 rounded-full overflow-hidden border-2 border-white shadow-sm">
                        <img src="{{ Auth()->user()->profile_picture_url}}" alt="Profile" class="h-full w-full object-cover">
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>

                                <div id="profileDropdown" class="absolute right-0 mt-2 w-56 origin-top-right bg-white rounded-md shadow-lg border border-gray-100 hidden">
                    <div class="py-1">
                        @if(Auth()->user()->role === 'investor')
                        <a href="{{ route('investor.dashboard') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 {{ request()->routeIs('investor.dashboard') ? 'bg-gray-50 text-blue-600' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                <rect x="3" y="3" width="7" height="7"></rect>
                                <rect x="14" y="3" width="7" height="7"></rect>
                                <rect x="14" y="14" width="7" height="7"></rect>
                                <rect x="3" y="14" width="7" height="7"></rect>
                            </svg>
                            Dashboard
                        </a>

                        <a href="{{ route('chat') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 {{ request()->routeIs('investor.chat') ? 'bg-gray-50 text-blue-600' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                            </svg>
                            Messages

                        </a>
                        <a href="{{ route('settings') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 {{ request()->routeIs('investor.settings') ? 'bg-gray-50 text-blue-600' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                <circle cx="12" cy="12" r="3"></circle>
                                <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                            </svg>
                            Settings
                        </a>
                        @elseif(Auth()->user()->role === 'entrepreneur')
                        <a href="{{ route('entreprenor.mystartup') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 {{ request()->routeIs('entreprenor.mystartup') ? 'bg-gray-50 text-blue-600' : '' }}">
                            <i data-feather="grid" class="h-5 w-5 mr-3 text-gray-400"></i>
                            My startup
                        </a>
                        <a href="{{ route('entreprenor.investors') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 {{ request()->routeIs('entreprenor.investors') ? 'bg-gray-50 text-blue-600' : '' }}">
                            <i data-feather="users" class="h-5 w-5 mr-3 text-gray-400"></i>
                            Investors
                        </a>
                        <a href="{{ route('chat') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 {{ request()->routeIs('entreprenor.chat') ? 'bg-gray-50 text-blue-600' : '' }}">
                            <i data-feather="message-square" class="h-5 w-5 mr-3 text-gray-400"></i>
                            Messages

                        </a>
                        <a href="{{ route('settings') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 {{ request()->routeIs('entreprenor.en_settings') ? 'bg-gray-50 text-blue-600' : '' }}">
                            <i data-feather="settings" class="h-5 w-5 mr-3 text-gray-400"></i>
                            Settings
                        </a>
                        @endif

                        <hr class="my-1 border-gray-100">

                        <a href="#" onclick="document.getElementById('logout-form').submit();" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                <polyline points="16 17 21 12 16 7"></polyline>
                                <line x1="21" y1="12" x2="9" y2="12"></line>
                            </svg>
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout.submit') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            @else
            <a href="{{route('show.register')}}" class="
        px-6 py-2 
        bg-white 
        border border-gray-300 
        rounded-md 
        text-gray-800 
        font-medium
        transition-all 
        duration-300 
        hover:border-blue-500 
        hover:text-blue-600
        hover:shadow-sm
        focus:outline-none focus:ring-2 focus:ring-blue-200 focus:ring-opacity-50
    ">
                Get Started
            </a>
            @endif
        </div>
    </div>
</header>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const profileDropdownButton = document.getElementById('profileDropdownButton');
        const profileDropdown = document.getElementById('profileDropdown');

        if (profileDropdownButton && profileDropdown) {
            
            profileDropdownButton.addEventListener('click', function() {
                profileDropdown.classList.toggle('hidden');
            });

            
            document.addEventListener('click', function(event) {
                if (!profileDropdownButton.contains(event.target) && !profileDropdown.contains(event.target)) {
                    profileDropdown.classList.add('hidden');
                }
            });
        }

        
        if (typeof feather !== 'undefined') {
            feather.replace();
        }
    });
</script>