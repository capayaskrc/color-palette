<nav x-data="{ open: false }">
    <!-- Primary Navigation Menu -->
    <div class="max-w-3xl bg-[#ea6a5b] mx-auto sm:px-4 ">
        <div class="flex justify-between ">
            <div class="flex">
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:flex mr-8 text-xs py-2 relative">
                    <a href="{{ route('dashboard') }}" class="font-bold  {{ request()->routeIs('dashboard') ? 'text-black' : 'text-white' }} ">
                         <span class="px-1">{{ __(' NEW PAINT JOBS ') }}</span>
                        <div class="absolute bottom-0 left-0 w-full h-0.5 bg-black transform scale-x-0 origin-left transition-transform duration-300 {{ request()->routeIs('dashboard') ? 'scale-x-100 bg-black' : 'scale-x-0' }}"></div>
                    </a>
                </div>
                <div class="hidden space-x-8 sm:flex text-xs py-2 relative">
                <a href="{{ route('manage_cars') }}" class="font-bold {{ request()->routeIs('manage_cars') ? 'text-black' : 'text-white' }} ">
                  <span class="px-1">{{ __('PAINT JOBS') }}</span>
                  <div class="absolute bottom-0 left-0 w-full h-0.5 bg-black transform scale-x-0 origin-left transition-transform duration-300 {{ request()->routeIs('manage_cars') ? 'scale-x-100 bg-black' : 'scale-x-0' }}"></div>
                </a>
                </div>
            </div>
        </div>
    </div>
</nav>
