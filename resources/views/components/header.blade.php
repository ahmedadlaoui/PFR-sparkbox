<header class="bg-white backdrop-blur-sm shadow-soft fixed w-full z-50">
    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between h-20 items-center px-6">
            <div class="pl-8 sm:pl-12 md:pl-16  pr-8">
                <a href="{{ route('home') }}" class="text-xl font-bold text-dark">SparkBox</a>
            </div>

            <nav class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}" class="text-dark text-base font-medium font-['Inter',_sans-serif] {{ request()->routeIs('home') ? 'text-blue-600' : '' }}">Home</a>
                <a href="{{ route('deals') }}" class="text-gray-600 text-base hover:text-blue-600 transition-colors font-['Inter',_sans-serif] {{ request()->routeIs('deals') ? 'text-blue-600' : '' }}">Deals</a>
            </nav>

            <div>
                @auth
                <a href="{{ route('investor.dashboard') }}" class="px-6 py-2.5 bg-white text-gray-800 text-base font-medium rounded-lg shadow-sm hover:shadow-md transition-all border-2 border-gray-800 hover:bg-gray-100 font-['Inter',_sans-serif]">
                    Dashboard
                </a>
                @else
                <a href="{{ route('login') }}" class="px-6 py-2.5 bg-white text-gray-800 text-base font-medium rounded-lg shadow-sm hover:shadow-md transition-all border-2 border-gray-800 hover:bg-gray-100 font-['Inter',_sans-serif]">
                    Get Started
                </a>
                @endauth
            </div>
        </div>
    </div>
</header>