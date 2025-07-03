<header class="bg-white shadow-sm z-50 relative">
    <div class="container mx-auto px-4 py-3 flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center gap-2">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-5">
            <span class="font-bold text-lg text-[#176b98]">V<span class="text-gray-700">I</span><span
                    class="text-[#F04A22]">E</span><span class="text-[#FEBE35]">D</span><span
                    class="text-[#176b98]">M</span><span class="text-[#75C151]">A</span>
            </span>
        </div>

        <!-- Navigation Menu (Desktop) -->
        <nav class="hidden md:flex items-center gap-6 font-semibold text-gray-800">
            <a href="/">{{ __('messages.home') }}</a>

            @auth
                <a href="{{ route('myCourses') }}">{{ __('messages.MyCourses') }}</a>
            @endauth

            <a href="{{ route('courses.all') }}">{{ __('messages.Courses') }}</a>
            <a href="{{ route('categorey.game') }}">{{ __('messages.games') }}</a>

            <!-- More Dropdown -->
            <div x-data="{ openMore: false }" class="relative">
                <button @click="openMore = !openMore" class="flex items-center gap-1">
                    {{ __('messages.More') }}
                    <svg class="w-4 h-4 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-show="openMore" x-transition x-cloak
                    class="absolute top-full left-0 mt-2 w-40 bg-white border rounded-lg shadow-lg z-50">
                    <a href="{{ route('about') }}"
                        class="block px-4 py-2 hover:text-[#176b98]">{{ __('messages.about') }}</a>
                    <a href="{{ route('contact') }}"
                        class="block px-4 py-2 hover:text-[#176b98]">{{ __('messages.contact') }}</a>
                </div>
            </div>
        </nav>

        <!-- Right Section -->
        <div class="flex items-center gap-4">
            {{-- Language Switch --}}
            <div x-data="{ openLang: false }" class="relative">
                <button @click="openLang = !openLang" @click.away="openLang = false"
                    class="text-sm font-medium bg-[#176b98] text-[#FEBE35] px-2 py-1 border border-black rounded">
                    {{ app()->getLocale() === 'ar' ? 'العربيه' : 'ENGLISH' }}
                </button>


                <div x-show="openLang" x-transition x-cloak
                    class="absolute right-0 mt-1 w-24 bg-white text-black shadow z-50">
                    <a href="{{ route('lang.switch', 'en') }}"
                        class="block px-3 py-1 text-sm hover:text-[#176b98]">ENGLISH</a>
                    <a href="{{ route('lang.switch', 'ar') }}"
                        class="block px-3 py-1 text-sm hover:text-[#176b98]">العربيه</a>
                </div>
            </div>

            {{-- Company Profile Link --}}
            {{-- <a href="{{ app()->getLocale() === 'ar' ? asset('pdf/oxfordar.pdf') : asset('pdf/oxforden.pdf') }}"
                target="_blank" class="px-4 py-2 text-white bg-[#176b98] rounded-md hover:bg-[#5a0e16] transition">
                {{ __('messages.profile') }}
            </a> --}}

            {{-- User Auth Menu --}}
            @auth
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" @click.away="open = false" class="flex items-center gap-2">
                        <img src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('images/placeHolder.png') }}"
                            class="w-8 h-8 rounded-full object-cover">
                        <span class="text-sm font-bold">{{ Auth::user()->name }}</span>
                    </button>

                    <div x-show="open" x-transition x-cloak
                        class="absolute right-0 mt-2 w-48 bg-white border rounded shadow-lg z-50">
                        <a href="{{ route('profile') }}"
                            class="block px-4 py-2 text-sm hover:text-[#176b98]">{{ __('messages.Myprofile') }}</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm hover:text-[#176b98]">
                                {{ __('messages.logout') }}
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" @click.away="open = false" class="flex items-center gap-2">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png"
                            class="w-8 h-8 rounded-full">
                        <div class="text-sm leading-tight text-left">
                            <div class="font-bold">{{ __('messages.Guest') }}</div>
                            <div class="text-gray-500">{{ __('messages.login') }} / {{ __('messages.register') }}</div>
                        </div>
                    </button>

                    <div x-show="open" x-transition x-cloak
                        class="absolute right-0 mt-2 w-48 bg-white border rounded shadow-lg z-50">
                        <a href="/login"
                            class="block px-4 py-2 text-sm hover:text-[#176b98]">{{ __('messages.login') }}</a>
                        <a href="/register"
                            class="block px-4 py-2 text-sm hover:text-[#176b98]">{{ __('messages.register') }}</a>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</header>
