<footer class="bg-[#1A1A1A] py-8 mt-auto">
    <div class="max-w-7xl mx-auto">
        <div class="ml-0 md:ml-12 lg:ml-16 px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="col-span-1 md:col-span-2">
                    <div class="mb-4">
                        <a href="{{ route('home') }}" class="text-xl font-bold text-white">SparkBox</a>
                    </div>
                    <p class="text-gray-300 mb-4 max-w-md">
                        SparkBox connects bold founders across tech, health, media, and more — all in one dynamic platform.
                        Our mission is to democratize access to funding by bringing innovative startups together with savvy investors.
                    </p>
                </div>

                <div>
                    <h3 class="text-sm font-semibold text-white tracking-wider uppercase mb-4">Platform</h3>
                    <ul class="space-y-3">
                        <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-white">Home</a></li>
                        <li><a href="{{ route('deals') }}" class="text-gray-400 hover:text-white">All Deals</a></li>
                        @auth
                        @if(Auth::user()->role === 'entrepreneur')
                        <li><a href="{{ route('entreprenor.mystartup') }}" class="text-gray-400 hover:text-white">My Startup</a></li>
                        @elseif(Auth::user()->role === 'investor')
                        <li><a href="{{ route('investor.dashboard') }}" class="text-gray-400 hover:text-white">My Dashboard</a></li>
                        @endif
                        <li><a href="{{ route('chat') }}" class="text-gray-400 hover:text-white">Messages</a></li>
                        @endauth
                    </ul>
                </div>

                <div>
                    <h3 class="text-sm font-semibold text-white tracking-wider uppercase mb-4">Account</h3>
                    <ul class="space-y-3">
                        @auth
                        <li><a href="{{ route('settings') }}" class="text-gray-400 hover:text-white">Settings</a></li>
                        <li>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('footer-logout-form').submit();" class="text-gray-400 hover:text-white">Logout</a>
                            <form id="footer-logout-form" action="{{ route('logout.submit') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        </li>
                        @else
                        <li><a href="{{ route('login') }}" class="text-gray-400 hover:text-white">Sign In</a></li>
                        <li><a href="{{ route('show.register') }}" class="text-gray-400 hover:text-white">Sign Up</a></li>
                        @endauth
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-8 mt-8 text-center">
                <p class="text-sm text-gray-400">&copy; 2025 SparkBox. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>