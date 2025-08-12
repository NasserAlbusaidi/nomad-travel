<!-- Define active link styles for clarity -->
@php
    // Active link has a subtle gradient and shadow, making it "pop"
    $activeLinkClasses = 'bg-gradient-to-r from-white/10 to-white/5 text-white shadow-inner';
    // Inactive link has a soft transition
    $inactiveLinkClasses = 'text-blue-100 hover:bg-white/5 transition-colors duration-200';
@endphp

<div class="w-64 flex-shrink-0 bg-ocean-blue text-white flex flex-col font-sans">
    <!-- Logo / Brand Name -->
    <div class="h-20 flex items-center justify-center px-4">
        <a href="{{ route('admin.tours.index') }}" class="font-display text-3xl font-bold tracking-wider text-white">
            Rihlati
        </a>
    </div>

    <!-- Navigation Links -->
    <nav class="flex-1 px-4 py-4 space-y-2">
        <a href="#" title="Dashboard (coming soon)" class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-blue-200 cursor-not-allowed opacity-60">
            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
            Dashboard
        </a>
        <a href="{{ route('admin.tours.index') }}" class="{{ request()->routeIs('admin.tours.*') ? $activeLinkClasses : $inactiveLinkClasses }} group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg">
            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            Tours
        </a>
        <!-- Add links for Bookings, Categories, etc. here later -->
    </nav>

    <!-- User Info & Logout -->
    <div class="px-5 py-5 border-t border-white/10">
        <p class="text-sm font-medium text-white">{{ Auth::user()->name }}</p>
        <p class="text-xs text-blue-200">{{ Auth::user()->email }}</p>

        <!-- Logout Form -->
        <form method="POST" action="{{ route('logout') }}" class="mt-4">
            @csrf
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); this.closest('form').submit();"
               class="text-sm text-terracotta font-semibold hover:text-red-400 transition-colors duration-200">
                Log Out &rarr;
            </a>
        </form>
    </div>
</div>
