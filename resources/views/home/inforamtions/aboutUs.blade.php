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
    <section class="relative bg-cover bg-center bg-no-repeat h-[60vh] flex items-center justify-center"
        style="background-image: url('https://images.unsplash.com/photo-1577896851231-70ef18881754?ixlib=rb-4.0.3&auto=format&fit=crop&w=1950&q=80');">
        <div class="absolute inset-0 bg-black bg-opacity-60"></div>
        <div class="relative z-10 text-white text-center px-4">
            <h1 class="text-5xl font-extrabold mb-4">{{ __('messages.about title') }}</h1>
            <p class="text-lg max-w-2xl mx-auto">{{ __('messages.aboutdescription') }}</p>
        </div>
    </section>

    <!-- Company Mission -->
    <section class="py-20 bg-gray-50" x-data="{ visible: true }" x-intersect.once="visible = true">
        <div class="container mx-auto px-6 max-w-5xl">
            <div x-show="visible" x-transition.duration.800ms>
                <h2 class="text-3xl font-bold text-center text-[#79131d] mb-6">{{ __('messages.our_mission') }}</h2>
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
                <h2 class="text-3xl font-bold text-center text-[#79131d] mb-12">{{ __('messages.our_values') }}</h2>
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
                            class="bg-[#fef2f2] hover:bg-[#ffe5e5] p-8 rounded-2xl shadow-md text-center transition duration-300">
                            <div class="text-5xl mb-4">{{ $value['icon'] }}</div>
                            <h3 class="text-xl font-bold mb-2 text-[#79131d]">{{ $value['title'] }}</h3>
                            <p class="text-gray-600">{{ $value['desc'] }}</p>
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
                <h2 class="text-3xl font-bold text-[#79131d] mb-4">{{ __('messages.meet_team') }}</h2>
                <button @click="showTeam = !showTeam"
                    class="text-sm bg-[#79131d] hover:bg-red-700 text-white px-6 py-2 rounded-full transition">
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
                            class="w-28 h-28 mx-auto rounded-full object-cover mb-4 border-4 border-[#79131d]" />
                        <h3 class="text-xl font-bold text-[#79131d] mb-1">{{ $member['name'] }}</h3>
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
