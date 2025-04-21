<nav class="side-nav">
    <div class="py-6">
        <a href="{{ route('entreprenor.mystartup') }}" class="nav-link {{ request()->routeIs('entreprenor.mystartup') ? 'active' : '' }}">
            <i data-feather="grid" class="nav-icon"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{route('entreprenor.investors')}}" class="nav-link {{ request()->routeIs('entreprenor.investors') ? 'active' : '' }}">
            <i data-feather="users" class="nav-icon"></i>
            <span>Investors</span>
        </a>

        <a href="{{route('entreprenor.chat')}}" class="nav-link {{ request()->routeIs('entreprenor.chat') ? 'active' : '' }}">
            <i data-feather="message-square" class="nav-icon"></i>
            <span>Messages</span>
          
        </a>

        <div class="border-t border-gray-100 my-6 mx-6"></div>

        <a href="{{route('entreprenor.en_settings')}}" class="nav-link">
            <i data-feather="settings" class="nav-icon"></i>
            <span>Settings</span>
        </a>
        <a href="#" class="nav-link">
            <i data-feather="log-out" class="nav-icon"></i>
            <span>Logout</span>
        </a>
    </div>
</nav>