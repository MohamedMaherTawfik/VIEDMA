<!DOCTYPE html>
<html lang="en" x-data x-init="$nextTick(() => window.scrollTo(0, 0))" x-cloak>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ __('messages.about title') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-white text-gray-800 font-sans">

    {{-- Navbar --}}
    <x-navbar />

    <!-- Hero Section -->
    <div class="relative bg-cover bg-center h-[500px]"
        style="background-image: url('https://images.unsplash.com/photo-1509062522246-3755977927d7?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Y2xhc3Nyb29tfGVufDB8fDB8fHww');">
        <div
            class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-white text-center px-6">
            <h1 class="text-3xl md:text-4xl font-bold mb-4"> {{ __('messages.WelcomeMessage') }} <span
                    class="text-[#176b98]">{{ __('messages.title') }}
                </span></h1>
            <p class="text-lg md:text-xl mb-6">{{ __('messages.welcomeDescription') }}</p>

            <!-- Search Container with Dropdown -->
            <div class="relative w-full max-w-md mx-auto" x-data="searchDropdown()">
                <div class="flex items-center">
                    <input type="text" x-model="searchQuery" @input.debounce.300ms="searchCourses()"
                        @focus="showDropdown = true" @click.away="showDropdown = false"
                        placeholder="{{ __('messages.searchInside') }}"
                        class="flex-grow px-4 py-2 rounded-l-md text-black" />
                    <button @click="searchCourses()" class="bg-[#176b98] text-[#e4ce96] px-4 py-2 rounded-r-md">
                        {{ __('messages.search') }}
                    </button>
                </div>

                <!-- Dropdown Results -->
                <div x-show="showDropdown && searchResults.length > 0"
                    class="absolute z-10 w-full mt-1 bg-white rounded-md shadow-lg max-h-96 overflow-y-auto"
                    style="display: none;">
                    <ul class="py-1">
                        <template x-for="course in searchResults" :key="course.id">
                            <li>
                                <a :href="'/notFound/' + course.slug"
                                    class="block px-4 py-2 text-gray-800 hover:bg-gray-100 flex items-center">
                                    <img :src="course.cover_photo ? '/storage/' + course.cover_photo :
                                        'https://via.placeholder.com/50x30'"
                                        alt="Course cover" class="w-10 h-8 object-cover mr-3">
                                    <div>
                                        <div x-text="course.title" class="font-medium"></div>
                                        <div x-text="course.instructor" class="text-sm text-gray-600"></div>
                                    </div>
                                </a>
                            </li>
                        </template>
                    </ul>
                </div>

                <!-- Loading and Empty States -->
                <div x-show="isLoading" class="absolute z-10 w-full mt-1 bg-white rounded-md shadow-lg p-4"
                    style="display: none;">
                    <div class="flex items-center text-gray-600">
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-[#176b98]" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        Searching...
                    </div>
                </div>

                <div x-show="showDropdown && searchResults.length === 0 && searchQuery.length > 0 && !isLoading"
                    class="absolute z-10 w-full mt-1 bg-white rounded-md shadow-lg p-4 text-gray-600"
                    style="display: none;">
                    No courses found for "<span x-text="searchQuery"></span>"
                </div>
            </div>

            <a href="#courses"
                @click.prevent="document.querySelector('#courses').scrollIntoView({ behavior: 'smooth' })"
                class="mt-4 bg-[#176b98C2] hover:bg-[#176b98] px-5 py-2 rounded-md text-[#e4ce96]">
                {{ __('messages.Browse') }}
            </a>
        </div>
    </div>

    <!-- Company Mission -->
    <section class="py-20 bg-gray-50" x-data="{ visible: true }" x-intersect.once="visible = true">
        <div class="container mx-auto px-6 max-w-5xl">
            <div x-show="visible" x-transition.duration.800ms>
                <h2 class="text-3xl font-bold text-center text-[#176b98C2] mb-6">{{ __('messages.our_mission') }}</h2>
                <p class="text-gray-700 text-lg text-center leading-relaxed">
                    {{ __('messages.aboutdescription_full') }}
                </p>
            </div>
        </div>
    </section>

    <!-- Our Values -->
    <section class="py-20 bg-white" x-data="{ visible: true }" x-intersect.once="visible = true">
        <div class="container mx-auto px-6">
            <div x-show="visible" x-transition.opacity.duration.800ms>
                <h2 class="text-3xl font-bold text-center text-[#FEBE35] mb-12">{{ __('messages.our_values') }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                    @php
                        $values = [
                            [
                                'icon' => '💡',
                                'title' => __('messages.value_innovation_title'),
                                'desc' => __('messages.value_innovation_desc'),
                            ],
                            [
                                'icon' => '🤝',
                                'title' => __('messages.value_integrity_title'),
                                'desc' => __('messages.value_integrity_desc'),
                            ],
                            [
                                'icon' => '🏆',
                                'title' => __('messages.value_excellence_title'),
                                'desc' => __('messages.value_excellence_desc'),
                            ],
                        ];
                    @endphp

                    @foreach ($values as $value)
                        <div
                            class="bg-[#176B98B7] hover:bg-[#176b98] p-8 rounded-2xl shadow-md text-center transition duration-300">
                            <div class="text-5xl mb-4">{{ $value['icon'] }}</div>
                            <h3 class="text-xl font-bold mb-2 text-[#FEBE35]">{{ $value['title'] }}</h3>
                            <p class="text-[#FEDE35]">{{ $value['desc'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Meet the Team -->
    {{-- <section class="py-20 bg-gray-50" x-data="{ showTeam: true }">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-[#176b98C2] mb-4">{{ __('messages.meet_team') }}</h2>
                <button @click="showTeam = !showTeam"
                    class="text-sm bg-[#176b98C2] hover:bg-red-700 text-white px-6 py-2 rounded-full transition">
                    <span
                        x-text="showTeam ? '{{ __('messages.hide') }}' : '{{ __('messages.show') }} {{ __('messages.team') }}'"></span>
                </button>
            </div>

            <div class="grid md:grid-cols-3 gap-10" x-show="showTeam" x-transition.duration.700ms>
                @php
                    $team = [
                        [
                            'name' => 'Sarah Johnson',
                            'role' => 'Founder & CEO',
                            'img' => 'https://i.pravatar.cc/150?img=1',
                        ],
                        ['name' => 'Ahmed Khan', 'role' => 'Tech Lead', 'img' => 'https://i.pravatar.cc/150?img=2'],
                        ['name' => 'Lina Gomez', 'role' => 'UX Designer', 'img' => 'https://i.pravatar.cc/150?img=3'],
                    ];
                @endphp
                @foreach ($team as $member)
                    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-xl transition text-center">
                        <img src="{{ $member['img'] }}" alt="{{ $member['name'] }}"
                            class="w-28 h-28 mx-auto rounded-full object-cover mb-4 border-4 border-[#176b98C2]" />
                        <h3 class="text-xl font-bold text-[#176b98C2] mb-1">{{ $member['name'] }}</h3>
                        <p class="text-gray-500">{{ $member['role'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section> --}}

    {{-- Footer --}}
    <x-footer />

</body>

</html>
