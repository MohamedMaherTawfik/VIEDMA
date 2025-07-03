<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oxford Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    {{-- font awseome --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>

<body>

    {{-- navbar --}}
    <x-navbar />

    {{-- Hero --}}
    <section class="relative bg-gray-900 text-white py-20 px-6 mb-5 sm:px-10 lg:px-20" x-data="{ show: false }"
        x-init="setTimeout(() => show = true, 300)">
        <!-- Background -->
        <div class="absolute inset-0 bg-cover bg-center opacity-30"
            style="background-image: url('https://cdn.pixabay.com/photo/2016/11/29/05/12/gaming-1869261_1280.jpg');">
        </div>

        <div class="relative z-10 max-w-6xl mx-auto text-center transition-all duration-700 ease-out transform"
            :class="show ? 'translate-x-0 opacity-100' : ('{{ app()->getLocale() }}'
                === 'ar' ? 'translate-x-20 opacity-0' : '-translate-x-20 opacity-0')">

            <p class="uppercase tracking-widest text-sm text-teal-400 mb-4">
                🎮 {{ __('messages.tagline') }}
            </p>

            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight mb-6">
                {{ __('messages.hero_title_line1') }}<br class="hidden sm:inline">
                {{ __('messages.hero_title_line2') }}
            </h1>

            <p class="text-gray-300 max-w-2xl mx-auto text-lg mb-8">
                {{ __('messages.hero_description') }}
            </p>

            <div class="flex justify-center gap-4 flex-wrap">
                <a href="#explore"
                    class="bg-teal-500 hover:bg-teal-600 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition">
                    {{ __('messages.explore_btn') }}
                </a>
                <a href="#join"
                    class="bg-white hover:bg-gray-100 text-gray-900 font-semibold py-3 px-6 rounded-lg transition">
                    {{ __('messages.join_btn') }}
                </a>
            </div>
        </div>
    </section>
    {{-- End Hero --}}

    {{-- Games Section --}}
    @php
        $perPage = 3;
        $totalCourses = count($games);
        $totalPages = ceil($totalCourses / $perPage);
    @endphp

    <section class="bg-gray-50 py-12 px-4 sm:px-6 lg:px-8" id="courses">
        <div class="max-w-7xl mx-auto">

            <!-- Header -->
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-gray-900">{{ __('messages.suggested games') }}</h2>
                <p class="mt-2 text-lg text-gray-600">{{ __('messages.most') }}</p>
            </div>

            <!-- Course Pages -->
            <div id="courses-wrapper">
                @for ($page = 1; $page <= $totalPages; $page++)
                    <div class="course-page grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8"
                        data-page="{{ $page }}" style="{{ $page !== 1 ? 'display:none' : '' }}">
                        @foreach ($games->forPage($page, $perPage) as $game)
                            <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden flex flex-col transition-all duration-300 ease-in-out hover:shadow-xl hover:-translate-y-1"
                                style="animation: fadeIn 0.5s ease-in-out;">
                                <div class="h-48 overflow-hidden relative">
                                    <img src="{{ $game->cover_photo_url }}"
                                        class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">

                                    <!-- Start Date (Bottom Left) -->
                                    <div
                                        class="absolute bottom-2 left-2 bg-white/80 text-gray-800 text-xs font-medium px-2 py-1 rounded">
                                        {{ \Carbon\Carbon::parse($game->release_date)->format('d M Y') }}
                                    </div>

                                    <!-- Level (Bottom Right) -->
                                    <div
                                        class="absolute bottom-2 right-2 bg-[#176b98]/90 text-[#e4ce96] text-xs font-semibold px-2 py-1 rounded">
                                        {{ ucfirst($game->platform ?? 'Online') }}
                                    </div>
                                </div>
                                <div class="p-6 flex-1 flex flex-col justify-between">
                                    <div>
                                        <div class="flex items-center mb-2">
                                            <span
                                                class="inline-block px-3 py-1 text-xs font-semibold text-[#e4ce96] bg-[#176b98] rounded-full">
                                                {{ $game->gameCategorey->name ?? 'General' }}
                                            </span>
                                        </div>
                                        <h3 class="text-xl font-semibold text-gray-900 mb-1">{{ $game->title }}</h3>
                                        <p class="text-gray-600 text-sm mb-3">
                                            {{ Str::limit($game->description, 50) }}
                                        </p>
                                        <div class="flex items-center text-sm text-gray-500 mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 24 24" width="24" height="24">
                                                <path d="M10 8.64L15.27 12 10 15.36V8.64M8 5v14l11-7L8 5z" />
                                            </svg>

                                            <a>{{ $game->trailer ?? 'No Trailer Link' }}</a>
                                        </div>
                                    </div>
                                    <div class="mt-auto">
                                        <div class="flex items-center justify-between text-sm text-gray-700 mb-2">
                                            <div>
                                                <span class="font-bold text-base">developer:</span>
                                                <span class="opacity-60">{{ $game->developer_name }}</span>
                                            </div>
                                        </div>
                                        <div class="pt-4 border-t border-gray-100 flex items-center justify-between">
                                            <span class="text-lg font-bold text-[#176b98]">{{ $game->price ?? 0 }}
                                                SAR</span>
                                            <a href="{{ route('game.show', $game->slug) }}"
                                                class="px-4 py-2 bg-[#176b98D2] text-[#e4ce96] text-sm font-medium rounded-md hover:bg-[#176b98] transition-colors duration-300">
                                                {{ __('messages.subscribe') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endfor
            </div>

            <!-- Pagination Controls -->
            <div class="mt-12 flex justify-center items-center space-x-2">
                <button id="prev-btn"
                    class="px-4 py-2 border rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 disabled:opacity-50"
                    disabled>
                    Previous
                </button>

                <div id="tabs" class="flex space-x-1">
                    @php
                        $currentPage = 1;
                        $visibleTabs = 4;
                        $start = 1;
                        $end = min($totalPages, $visibleTabs);
                    @endphp

                    @for ($i = $start; $i <= $end; $i++)
                        <button data-page="{{ $i }}"
                            class="w-10 h-10 flex items-center justify-center rounded-md text-sm font-semibold transition border border-[#176b98]
                        {{ $i === 1 ? 'bg-[#176b98] text-white' : 'bg-transparent text-gray-700 hover:bg-[#176b98] hover:text-white' }}">
                            {{ $i }}
                        </button>
                    @endfor
                </div>

                <button id="next-btn"
                    class="px-4 py-2 border rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                    Next
                </button>
            </div>
        </div>
    </section>

    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .course-page {
            animation: fadeIn 0.5s ease-in-out;
        }

        .hover\:shadow-xl:hover {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1),
                0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const coursePages = document.querySelectorAll('.course-page');
            const prevBtn = document.getElementById('prev-btn');
            const nextBtn = document.getElementById('next-btn');
            const totalPages = {{ $totalPages }};
            const maxTabs = 4;

            let currentPage = 1;

            function updateCourseView() {
                coursePages.forEach(page => {
                    page.style.display = parseInt(page.dataset.page) === currentPage ? 'grid' : 'none';
                });
            }

            function renderTabs() {
                const tabsContainer = document.getElementById('tabs');
                tabsContainer.innerHTML = ''; // Clear old buttons

                let start = Math.max(1, currentPage - Math.floor(maxTabs / 2));
                let end = start + maxTabs - 1;

                if (end > totalPages) {
                    end = totalPages;
                    start = Math.max(1, end - maxTabs + 1);
                }

                for (let i = start; i <= end; i++) {
                    const btn = document.createElement('button');
                    btn.dataset.page = i;
                    btn.textContent = i;
                    btn.className = `w-10 h-10 flex items-center justify-center rounded-md text-sm font-semibold transition border border-[#176b98] ${
                    i === currentPage
                        ? 'bg-[#176b98] text-white'
                        : 'bg-transparent text-gray-700 hover:bg-[#176b98] hover:text-white'
                }`;
                    btn.addEventListener('click', () => {
                        currentPage = i;
                        updateView();
                    });
                    tabsContainer.appendChild(btn);
                }
            }

            function updateView() {
                updateCourseView();
                renderTabs();
                prevBtn.disabled = currentPage === 1;
                nextBtn.disabled = currentPage === totalPages;
            }

            prevBtn.addEventListener('click', () => {
                if (currentPage > 1) {
                    currentPage--;
                    updateView();
                }
            });

            nextBtn.addEventListener('click', () => {
                if (currentPage < totalPages) {
                    currentPage++;
                    updateView();
                }
            });

            updateView();
        });
    </script>
    {{-- End Games Section --}}

    {{-- Why choose us --}}
    <section class="bg-white py-16 px-4 sm:px-6 lg:px-8" x-data="{ show: false }" x-init="setTimeout(() => show = true, 300)">
        <div class="max-w-7xl mx-auto transition-all duration-700 ease-out transform"
            :class="show ? 'translate-x-0 opacity-100' : '-translate-x-10 opacity-0'">

            <!-- Title -->
            <h2 class="text-3xl sm:text-4xl font-extrabold text-indigo-600 text-center mb-6 transition-opacity duration-700 delay-200"
                :class="show ? 'opacity-100' : 'opacity-0'">
                {{ __('messages.why_game_title') }}
            </h2>

            <!-- Description -->
            <p class="max-w-2xl mx-auto text-gray-600 text-lg text-center mb-10 transition-all duration-700 delay-300 transform"
                :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'">
                {{ __('messages.why_game_description') }}
            </p>

            <!-- Features -->
            <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 max-w-5xl mx-auto mb-12">
                <template
                    x-for="(item, index) in [
                '{{ __('messages.line_game_1') }}',
                '{{ __('messages.line_game_2') }}',
                '{{ __('messages.line_game_3') }}',
                '{{ __('messages.line_game_4') }}',
                '{{ __('messages.line_game_5') }}',
                '{{ __('messages.line_game_6') }}'
            ]"
                    :key="index">
                    <li class="flex items-start gap-3 p-4 bg-gray-50 rounded-xl shadow-sm border transition-all duration-500 ease-out transform"
                        :style="`transition-delay: ${400 + index * 100}ms`"
                        :class="show ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-4'">
                        <span class="text-indigo-500 text-xl mt-1">✔</span>
                        <span class="text-gray-700" x-text="item"></span>
                    </li>
                </template>
            </ul>

            <!-- 🎮 Statistic Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <template
                    x-for="(card, idx) in [
                { img: 'https://cdn-icons-png.flaticon.com/128/854/854894.png', title: '1,000,000+ {{ __('messages.players') }}' },
                { img: 'https://cdn-icons-png.flaticon.com/128/1042/1042330.png', title: '5,000+ {{ __('messages.games') }}' },
                { img: 'https://cdn-icons-png.flaticon.com/128/4407/4407460.png', title: '1,200+ {{ __('messages.tournaments') }}' }
            ]"
                    :key="idx">
                    <div class="bg-gray-50 p-6 rounded-xl text-center shadow-md transition-all duration-700 ease-out transform"
                        :style="`transition-delay: ${1000 + idx * 200}ms`"
                        :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'">
                        <img :src="card.img" class="mx-auto h-20 mb-4" alt="">
                        <p class="text-lg font-semibold text-gray-800" x-text="card.title"></p>
                    </div>
                </template>
            </div>
        </div>
    </section>
    {{-- End Why choose us --}}

    {{-- News --}}
    <section class="bg-gray-100 py-16 px-4" x-data="newsSlider()" x-init="init()">
        <div class="max-w-7xl mx-auto transition-all duration-700 ease-out transform"
            :class="show ? 'translate-y-0 opacity-100' : 'translate-y-6 opacity-0'">

            <!-- Title -->
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-indigo-700 mb-2">
                    {{ __('messages.latest_news') }}
                </h2>
                <p class="text-gray-600 text-lg">
                    {{ __('messages.latest_news_description') }}
                </p>
            </div>

            <!-- Slider -->
            <div class="relative overflow-hidden">
                <div class="flex transition-all duration-500 ease-in-out"
                    :style="`transform: translateX(-${currentIndex * 100}%)`">
                    <template x-for="(post, i) in posts" :key="i">
                        <div class="w-full min-w-full px-4">
                            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                                <img :src="post.img" class="w-full h-64 object-cover" alt="">
                                <div class="p-6">
                                    <h3 class="text-xl font-bold text-gray-800 mb-2" x-text="post.title"></h3>
                                    <p class="text-gray-600" x-text="post.desc"></p>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>

                <!-- Controls -->
                <div class="flex justify-center mt-6 space-x-2">
                    <template x-for="(post, i) in posts" :key="i">
                        <button @click="goTo(i)" class="w-3 h-3 rounded-full"
                            :class="i === currentIndex ? 'bg-indigo-600' : 'bg-gray-400'">
                        </button>
                    </template>
                </div>
            </div>
        </div>
    </section>

    <script>
        function newsSlider() {
            return {
                show: false,
                currentIndex: 0,
                posts: [{
                        title: '🔥 New expansion released!',
                        desc: 'Explore the latest maps and challenges.',
                        img: "{{ asset('images/news1.jpg') }}"
                    },
                    {
                        title: '🎮 Top 10 games of the month',
                        desc: 'Check our top picks for July.',
                        img: "{{ asset('images/news2.jpg') }}"
                    },
                    {
                        title: '🏆 Upcoming eSports tournaments',
                        desc: 'Don’t miss the pro events!',
                        img: "{{ asset('images/news3.png') }}"
                    }
                ],
                init() {
                    this.show = true;
                },
                goTo(i) {
                    this.currentIndex = i;
                }
            };
        }
    </script>
    {{-- End News --}}

    <!-- Categories Section -->
    <section class="py-16 px-4 bg-white" x-data="{ show: false }" x-init="setTimeout(() => show = true, 300)">
        <div class="container mx-auto max-w-6xl">

            <!-- العنوان -->
            <div class="text-center mb-12 transition-all duration-700 transform"
                :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 -translate-y-6'">
                <h2 class="text-3xl font-bold text-[#176b98] mb-4">{{ __('messages.Explore') }}</h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    {{ __('messages.explore description') }}
                </p>
            </div>

            <!-- الكاتيجوريز -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @foreach ($categories as $index => $categorey)
                    <a href="{{ route('categories.show', $categorey->slug) }}"
                        class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all border border-gray-100 transform duration-500 group overflow-hidden"
                        :style="'transition-delay: ' + ({{ $index }} * 100) + 'ms'"
                        :class="show ? 'opacity-100 scale-100' : 'opacity-0 scale-90'">

                        <!-- صورة الكاتيجوري -->
                        @if ($categorey->image)
                            <img src="{{ asset('storage/category_images/' . $categorey->image) }}"
                                alt="{{ $categorey->name }}"
                                class="w-full h-32 object-cover transition-transform duration-300 group-hover:scale-105" />
                        @else
                            <img src="{{ asset('images/' . $categorey->photo) }}" alt="Category"
                                class="w-full h-32 object-cover transition-transform duration-300 group-hover:scale-105" />
                        @endif

                        <!-- المحتوى -->
                        <div class="p-4 text-center">
                            <h3 class="font-bold text-lg mb-2">{{ $categorey->name }}</h3>
                            {{-- <p class="text-gray-600 text-sm">
                                {{ count($categorey->courses) }} {{ __('messages.Courses') }}
                            </p> --}}
                        </div>
                    </a>
                @endforeach
            </div>

        </div>
    </section>
    {{-- End Categorey Section --}}


    {{-- footer --}}
    <x-footer />

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>
