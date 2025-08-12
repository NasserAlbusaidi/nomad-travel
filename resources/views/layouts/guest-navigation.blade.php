<nav class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="/" class="text-2xl font-display font-bold text-ocean-blue">
                    Rihlati
                </a>
            </div>

            <!-- Login & Register Links -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                @if (Route::has('login'))
                    <div class="space-x-4">
                        @auth
                            <a href="{{ url('/admin/tours') }}" class="font-medium text-charcoal hover:text-ocean-blue transition">Admin Panel</a>
                        @else
                            <a href="{{ route('login') }}" class="font-medium text-charcoal hover:text-ocean-blue transition">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 font-medium text-charcoal hover:text-ocean-blue transition">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </div>
</nav>
