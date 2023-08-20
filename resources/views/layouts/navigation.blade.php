<nav x-data="{ open: false }" class=" border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-6xl bg-red-400 mx-auto sm:px-6 ">
        <div class="flex justify-between ">
            <div class="flex">
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:flex">
                    <a href="{{ route('dashboard') }}" class="font-bold relative {{ request()->routeIs('dashboard') ? 'text-black' : 'text-white' }} ">
                        {{ __('NEW PAINT JOBS') }}
                        <div class="absolute bottom-0 left-0 w-full h-0.5 bg-black transform scale-x-0 origin-left transition-transform duration-300 {{ request()->routeIs('dashboard') ? 'scale-x-100 bg-black' : '' }}"></div>
                    </a>
                    <a href="{{ route('manage_cars') }}" class="font-bold relative {{ request()->routeIs('manage_cars') ? 'text-black' : 'text-white' }} ">
                        {{ __('PAINT JOBS') }}
                        <div class="absolute bottom-0 left-0 w-full h-0.5 bg-black transform scale-x-0 origin-left transition-transform duration-300 {{ request()->routeIs('manage_cars') ? 'scale-x-100 bg-black' : '' }}"></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
