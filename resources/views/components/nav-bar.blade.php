<nav class="sticky top-0 z-50 bg-slate-950/80 backdrop-blur-xl border-b border-amber-500/20 shadow-lg shadow-black/10">
    <div class=" mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">

            <div class="flex-shrink-0 flex items-center">
                <a href="{{ url('/') }}" class="group flex items-center space-x-2">
                    <div class="p-1 rounded-full bg-slate-900/40 border border-amber-500/20 group-hover:scale-105 transition duration-200 shadow-md shadow-amber-500/5">
                        <img src="{{ asset('storage/images/Gemini_Generated_Image_7mjnvx7mjnvx7mjn-removebg-preview.png') }}"
                            alt="අෂ්ටක Logo"
                            class="w-14 h-14 object-contain rounded-full transition-all duration-200"
                            style="width: 56px; height: 56px; image-rendering: -webkit-optimize-contrast; image-rendering: crisp-edges;">
                    </div>
                    <span class="text-3xl font-extrabold tracking-wide text-transparent bg-clip-text bg-gradient-to-r from-amber-300 via-amber-400 to-yellow-500 hover:brightness-110 transition" style="font-family: 'Yatra One', 'Abhaya Libre', serif;">
                        අෂ්ටක
                    </span>
                </a>
            </div>
            @auth
                <div class="hidden md:flex items-center space-x-1">
                    <a href="{{ route('customer.dashboard') }}"
                    class="px-4 py-2 rounded-2xl text-sm font-semibold transition-all duration-200 {{ request()->routeIs('customer.dashboard') ? 'bg-slate-900/40 text-amber-400 border border-amber-500/20' : 'text-slate-400 hover:text-slate-200 hover:bg-slate-800/50' }}">
                        Home
                    </a>
                    <a href="{{ route('map.show') }}"
                    class="px-4 py-2 rounded-2xl text-sm font-semibold transition-all duration-200 {{ request()->routeIs('map.show') ? 'bg-slate-900/40 text-amber-400 border border-amber-500/20' : 'text-slate-400 hover:text-slate-200 hover:bg-slate-800/50' }}">
                        Maps
                    </a>

                    @if (Auth::user()->is_customer == 1)
                        <a href="{{ route('customerBooking.show') }}"
                        class="px-4 py-2 rounded-2xl text-sm font-semibold transition-all duration-200 {{ request()->routeIs('customerBooking.show') ? 'bg-slate-900/40 text-amber-400 border border-amber-500/20' : 'text-slate-400 hover:text-slate-200 hover:bg-slate-800/50' }}">
                            Bookings
                        </a>
                    @endif
                </div>
            @endauth


            <div class="hidden md:flex items-center space-x-4">
                @auth
                    <div class="relative inline-block text-left" id="profile-dropdown-wrapper">
                        <button type="button" id="profile-menu-btn" class="flex items-center space-x-3 p-1.5 pr-4 rounded-full bg-slate-900 border border-slate-800 hover:border-amber-500/40 focus:outline-none transition duration-200">
                            <div class="h-9 w-9 rounded-full bg-gradient-to-tr from-amber-400 to-amber-600 flex items-center justify-center text-slate-950 font-black text-sm uppercase shadow-sm">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                            <div class="text-left hidden lg:block">
                                <p class="text-xs font-bold text-slate-200 leading-tight">{{ Auth::user()->name }}</p>
                                <p class="text-[10px] text-amber-400/80 font-medium tracking-wider uppercase">
                                    {{ Auth::user()->is_provider == 1 ? 'Provider' : 'Customer' }}
                                </p>
                            </div>
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>

                        <div id="profile-dropdown-menu" class="hidden absolute right-0 mt-2 w-52 rounded-2xl bg-slate-900 border border-slate-800 shadow-2xl p-2 text-sm text-slate-300 animate-in fade-in slide-in-from-top-2 duration-150">
                            <a href="{{ Auth::user()->is_provider == 1 ? route('provider.dashboard') : route('customer.dashboard') }}" class="flex items-center space-x-2 px-4 py-3 rounded-xl hover:bg-slate-800 hover:text-amber-400 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                                <span class="font-semibold">Dashboard</span>
                            </a>
                            <a href="{{ route('profile.edit') }}" class="flex items-center space-x-2 px-4 py-3 rounded-xl hover:bg-slate-800 hover:text-amber-400 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                <span class="font-semibold">My Profile</span>
                            </a>
                            <div class="border-t border-slate-800 my-1"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full flex items-center space-x-2 px-4 py-3 rounded-xl text-red-400 hover:bg-red-500/10 font-semibold transition text-left">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                    <span>Log Out</span>
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-2.5 text-sm font-bold text-slate-300 hover:text-amber-400 transition duration-200">
                        Sign In
                    </a>
                    <a href="{{ route('register') }}" class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-amber-400 to-amber-500 hover:from-amber-500 hover:to-amber-600 text-slate-950 font-bold text-sm shadow-md shadow-amber-500/10 transition duration-200">
                        Register
                    </a>
                @endauth
            </div>

            <div class="flex md:hidden">
                <button type="button" id="mobile-menu-btn" class="p-2 rounded-xl text-slate-400 hover:bg-slate-900 focus:outline-none transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path id="menu-icon-open" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path id="menu-icon-close" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <div id="mobile-menu" class="hidden md:hidden bg-slate-950 border-t border-slate-900 px-4 py-4 space-y-3">
        <a href="#" class="block px-4 py-2.5 rounded-xl bg-amber-500/10 text-amber-400 font-medium">Home</a>
        <a href="#" class="block px-4 py-2.5 rounded-xl text-slate-300 hover:bg-slate-900 transition font-medium">Services</a>
        <a href="#" class="block px-4 py-2.5 rounded-xl text-slate-300 hover:bg-slate-900 transition font-medium">About Us</a>
        <a href="#" class="block px-4 py-2.5 rounded-xl text-slate-300 hover:bg-slate-900 transition font-medium">Contact</a>

        <div class="border-t border-slate-900 pt-4 mt-2 space-y-2">
            @auth
                <div class="px-4 py-2 mb-2 flex items-center space-x-3">
                    <div class="h-9 w-9 rounded-full bg-amber-400 text-slate-950 font-black flex items-center justify-center">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <div>
                        <p class="text-sm font-bold text-slate-200">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-amber-400">{{ Auth::user()->email }}</p>
                    </div>
                </div>
                <a href="{{ Auth::user()->is_provider == 1 ? route('provider.dashboard') : route('customer.dashboard') }}" class="block w-full text-center px-4 py-2.5 rounded-xl bg-slate-900 border border-slate-800 text-amber-400 font-bold text-sm">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-center px-4 py-2.5 rounded-xl bg-red-500/10 text-red-400 font-bold text-sm">Log Out</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="block w-full text-center px-4 py-2.5 rounded-xl bg-slate-900 border border-slate-800 text-slate-300 font-bold text-sm">Sign In</a>
                <a href="{{ route('register') }}" class="block w-full text-center px-4 py-2.5 rounded-xl bg-gradient-to-r from-amber-400 to-amber-500 text-slate-950 font-bold text-sm">Register</a>
            @endauth
        </div>
    </div>
</nav>

<script>
    // Profile Dropdown Toggle
    const profileBtn = document.getElementById('profile-menu-btn');
    const profileDropdown = document.getElementById('profile-dropdown-menu');

    if(profileBtn && profileDropdown) {
        profileBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            profileDropdown.classList.toggle('hidden');
        });

        // පිටත ක්ලික් කළොත් ක්ලෝස් වෙන්න
        document.addEventListener('click', function(e) {
            if (!document.getElementById('profile-dropdown-wrapper').contains(e.target)) {
                profileDropdown.classList.add('hidden');
            }
        });
    }

    // Mobile Menu Toggle
    document.getElementById('mobile-menu-btn').addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        const openIcon = document.getElementById('menu-icon-open');
        const closeIcon = document.getElementById('menu-icon-close');

        menu.classList.toggle('hidden');
        openIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
    });
</script>
