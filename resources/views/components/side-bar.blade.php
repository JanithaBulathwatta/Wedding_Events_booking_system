<!-- 📱 1. MOBILE BOTTOM NAVIGATION BAR (මොබයිල් වලදී විතරක් පේන, අයිකන් විතරක් තියෙන බාර් එක) -->
<div class="fixed bottom-0 left-0 w-full h-16 bg-slate-900 border-t border-amber-500/10 flex md:hidden items-center justify-around px-2 z-50">

    <!-- Dashboard Link -->
    <a href="{{ route('provider.dashboard') }}" class="p-3 rounded-xl {{ request()->routeIs('provider.dashboard') ? 'text-amber-400 bg-amber-500/10' : 'text-slate-400' }}">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"></path>
        </svg>
    </a>

    <!-- Bookings Link -->
    <a href="#" class="p-3 rounded-xl {{ request()->routeIs('provider.bookings*') ? 'text-amber-400 bg-amber-500/10' : 'text-slate-400' }}">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
        </svg>
    </a>

    <!-- Packages Link -->
    <a href="{{ route('package.show') }}" class="p-3 rounded-xl {{ request()->routeIs('package.show') ? 'text-amber-400 bg-amber-500/10' : 'text-slate-400' }}">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
        </svg>
    </a>

    <!-- Portfolio Link -->
    <a href="#" class="p-3 rounded-xl {{ request()->routeIs('provider.portfolio*') ? 'text-amber-400 bg-amber-500/10' : 'text-slate-400' }}">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
        </svg>
    </a>

    <!-- Messages Link -->
    <a href="#" class="p-3 rounded-xl {{ request()->routeIs('provider.messages*') ? 'text-amber-400 bg-amber-500/10' : 'text-slate-400' }}">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12 3 7.582 7.03 4 12 4s9 3.582 9 8z"></path>
        </svg>
    </a>
</div>


<!-- 💻 2. DESKTOP SIDEBAR (ලැප්ටොප්/මොබයිල් නොවන ස්ක්‍රීන් වලට විතරක් පේන ඔරිජිනල් සයිඩ් බාර් එක) -->
<aside class="hidden md:flex w-72 min-h-screen bg-slate-900 border-r border-amber-500/10 flex-col justify-between shrink-0 font-sans px-6 py-8">
    <div class="space-y-6">
        <nav class="space-y-2 flex flex-col">

            <!-- Dashboard -->
            <a href="{{ route('provider.dashboard') }}"
               class="flex items-center space-x-3 px-4 py-3 rounded-xl transition group
               {{ request()->routeIs('provider.dashboard') ? 'bg-amber-500/10 text-amber-400 font-semibold' : 'text-slate-400 hover:bg-slate-800 hover:text-amber-400 font-medium' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"></path>
                </svg>
                <span>Dashboard</span>
            </a>

            <!-- My Bookings -->
            <a href="#"
               class="flex items-center space-x-3 px-4 py-3 rounded-xl transition group
               {{ request()->routeIs('provider.bookings*') ? 'bg-amber-500/10 text-amber-400 font-semibold' : 'text-slate-400 hover:bg-slate-800 hover:text-amber-400 font-medium' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <span>My Bookings</span>
            </a>

            <!-- Manage Packages -->
            <a href="{{ route('package.show') }}"
               class="flex items-center space-x-3 px-4 py-3 rounded-xl transition group
               {{ request()->routeIs('package.show') ? 'bg-amber-500/10 text-amber-400 font-semibold' : 'text-slate-400 hover:bg-slate-800 hover:text-amber-400 font-medium' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
                <span>Manage Packages</span>
            </a>

            <!-- Portfolio Gallery -->
            <a href="#"
               class="flex items-center space-x-3 px-4 py-3 rounded-xl transition group
               {{ request()->routeIs('provider.portfolio*') ? 'bg-amber-500/10 text-amber-400 font-semibold' : 'text-slate-400 hover:bg-slate-800 hover:text-amber-400 font-medium' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <span>Portfolio Gallery</span>
            </a>

            <!-- Messages -->
            <a href="#"
               class="flex items-center space-x-3 px-4 py-3 rounded-xl transition group
               {{ request()->routeIs('provider.messages*') ? 'bg-amber-500/10 text-amber-400 font-semibold' : 'text-slate-400 hover:bg-slate-800 hover:text-amber-400 font-medium' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12 3 7.582 7.03 4 12 4s9 3.582 9 8z"></path>
                </svg>
                <span>Messages</span>
            </a>

        </nav>
    </div>
</aside>
