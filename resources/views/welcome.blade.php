<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIEDMA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    {{-- font awseome --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>

<style>
    html {
        scroll-behavior: smooth;
    }

    body {
        font-family: 'Poppins', sans-serif;
    }
</style>

<body class="bg-white">

    <!-- Header -->
    <x-navbar />

    <!-- Hero Section with Search Dropdown -->
    <div class="relative bg-cover bg-center h-[500px]"
        style="background-image: url('https://images.unsplash.com/photo-1509062522246-3755977927d7?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Y2xhc3Nyb29tfGVufDB8fDB8fHww');">
        <div
            class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-white text-center px-6">
            <h1 class="text-3xl md:text-4xl font-bold mb-4"> {{ __('messages.WelcomeMessage') }} <span
                    class="text-[#176b98]"><span class="font-bold text-5xl text-[#176b98]">V<span
                            class="text-5xl text-gray-700">I</span><span class="text-5xl text-[#F04A22]">E</span><span
                            class="text-5xl text-[#FEBE35]">D</span><span class="text-5xl text-[#176b98]">M</span><span
                            class="text-5xl text-[#75C151]">A</span>
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

    <!-- About Us Section -->
    <section class="py-16 px-4 bg-gray-50">
        <div class="container mx-auto max-w-6xl">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-[#176b98] mb-4">{{ __('messages.about title') }}</h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">{{ __('messages.empowering') }}</p>
            </div>

            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <img src="https://wallpapercave.com/wp/wp4064825.jpg" alt="Students learning"
                        class="rounded-lg shadow-xl w-full h-auto" style="height: 120%">
                </div>
                <div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">{{ __('messages.story title') }}</h3>
                    <p class="text-gray-600 mb-6">
                        {{ __('messages.story description') }}
                    </p>

                    <div class="grid grid-cols-2 gap-4 mb-8">
                        <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                            <div class="text-[#176b98] text-2xl mb-2">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <h4 class="font-bold text-gray-800">500K+ Students</h4>
                            <p class="text-sm text-gray-600">{{ __('messages.first Square') }}</p>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                            <div class="text-[#176b98] text-2xl mb-2">
                                <i class="fas fa-chalkboard-teacher"></i>
                            </div>
                            <h4 class="font-bold text-gray-800">100K+ Teachers</h4>
                            <p class="text-sm text-gray-600">{{ __('messages.second square') }}</p>
                        </div>
                    </div>

                    <a href="{{ asset('pdf/oxforden.pdf') }}" target="_blank"
                        class="px-5 py-3 bg-[#176b98E0] text-white rounded-md hover:bg-[#176b98] focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200">
                        {{ __('messages.learn more') }}
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- course section --}}
    @php
        $perPage = 3;
        $totalCourses = count($courses);
        $totalPages = ceil($totalCourses / $perPage);
    @endphp

    <section class="bg-gray-50 py-12 px-4 sm:px-6 lg:px-8" id="courses">
        <div class="max-w-7xl mx-auto">

            <!-- Header -->
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-gray-900">{{ __('messages.suggested') }}</h2>
                <p class="mt-2 text-lg text-gray-600">{{ __('messages.most') }}</p>
            </div>

            <!-- Course Pages -->
            <div id="courses-wrapper">
                @for ($page = 1; $page <= $totalPages; $page++)
                    <div class="course-page grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8"
                        data-page="{{ $page }}" style="{{ $page !== 1 ? 'display:none' : '' }}">
                        @foreach ($courses->forPage($page, $perPage) as $course)
                            <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden flex flex-col transition-all duration-300 ease-in-out hover:shadow-xl hover:-translate-y-1"
                                style="animation: fadeIn 0.5s ease-in-out;">
                                <div class="h-48 overflow-hidden relative">
                                    <img src="{{ $course->cover_photo_url }}"
                                        class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">


                                    <!-- Start Date (Bottom Left) -->
                                    <div
                                        class="absolute bottom-2 left-2 bg-white/80 text-gray-800 text-xs font-medium px-2 py-1 rounded">
                                        {{ \Carbon\Carbon::parse($course->start_Date)->format('d M Y') }}
                                    </div>

                                    <!-- Level (Bottom Right) -->
                                    <div
                                        class="absolute bottom-2 right-2 bg-[#176b98]/90 text-[#e4ce96] text-xs font-semibold px-2 py-1 rounded">
                                        {{ ucfirst($course->level ?? 'Beginner') }}
                                    </div>
                                </div>
                                <div class="p-6 flex-1 flex flex-col justify-between">
                                    <div>
                                        <div class="flex items-center mb-2">
                                            <span
                                                class="inline-block px-3 py-1 text-xs font-semibold text-[#e4ce96] bg-[#176b98] rounded-full">
                                                {{ $course->category->name ?? 'General' }}
                                            </span>
                                        </div>
                                        <h3 class="text-xl font-semibold text-gray-900 mb-1">{{ $course->title }}</h3>
                                        <p class="text-gray-600 text-sm mb-3">
                                            {{ Str::limit($course->description, 50) }}
                                        </p>
                                        <div class="flex items-center text-sm text-gray-500 mb-2">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v3.586a1 1 0 00.293.707l2 2a1 1 0 001.414-1.414L11 9.586V6z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            {{ $course->duration ?? 0 }} hours
                                        </div>
                                    </div>
                                    <div class="mt-auto">
                                        <div class="flex items-center justify-between text-sm text-gray-700 mb-2">
                                            <div>
                                                <span class="font-bold text-base">Instructor:</span>
                                                <span class="opacity-60">{{ $course->user->name }}</span>
                                            </div>
                                            <div class="flex items-center">
                                                <span class="text-yellow-400">★</span>
                                                <span
                                                    class="ml-1 text-gray-600">{{ round($course->review()->avg('rating'), 1) }}
                                                    {{-- ({{ count($course->review) ?? 'no Reviews' }}) --}}
                                                    @if (count($course->review) == 0)
                                                        (No Reviews)
                                                    @else
                                                        ({{ count($course->review) }} Reviews)
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                        <div class="pt-4 border-t border-gray-100 flex items-center justify-between">
                                            <span class="text-lg font-bold text-[#176b98]">{{ $course->price ?? 0 }}
                                                SAR</span>
                                            <a href="{{ route('course.show', $course->slug) }}"
                                                class="px-4 py-2 bg-[#176b98D2] text-[#e4ce96] text-sm font-medium rounded-md hover:bg-[#176b98] transition-colors duration-300">
                                                Subscribe Now
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
    {{-- end courses --}}

    <!-- Why Choose Us Section -->
    <section class="bg-white py-16 px-4 sm:px-6 lg:px-8" x-data="{ show: false }" x-init="setTimeout(() => show = true, 300)">
        <div class="max-w-7xl mx-auto transition-all duration-700 ease-out transform"
            :class="show ? 'translate-x-0 opacity-100' : '-translate-x-10 opacity-0'">

            <!-- Title -->
            <h2 class="text-3xl sm:text-4xl font-extrabold text-teal-600 text-center mb-6 transition-opacity duration-700 delay-200"
                :class="show ? 'opacity-100' : 'opacity-0'">
                {{ __('messages.why us') }}
            </h2>

            <!-- Paragraph -->
            <p class="max-w-2xl mx-auto text-gray-600 text-lg text-center mb-10 transition-all duration-700 delay-300 transform"
                :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'">
                {{ __('messages.why Descrption') }}
            </p>

            <!-- Features List -->
            <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 max-w-5xl mx-auto mb-12">
                <template
                    x-for="(item, index) in [
                '{{ __('messages.line 1') }}',
                '{{ __('messages.line 2') }}',
                '{{ __('messages.line 3') }}',
                '{{ __('messages.line 4') }}',
                '{{ __('messages.line 5') }}',
                '{{ __('messages.line 6') }}'
            ]"
                    :key="index">
                    <li class="flex items-start gap-3 p-4 bg-gray-50 rounded-xl shadow-sm border transition-all duration-500 ease-out transform"
                        :style="`transition-delay: ${400 + index * 100}ms`"
                        :class="show ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-4'">
                        <span class="text-green-500 text-xl mt-1">✔</span>
                        <span class="text-gray-700" x-text="item"></span>
                    </li>
                </template>
            </ul>

            <!-- Statistic Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <template
                    x-for="(card, idx) in [
                { img: 'https://cdn-icons-png.flaticon.com/128/3135/3135755.png', title: '300,000+ {{ __('messages.student') }}' },
                { img: 'https://cdn-icons-png.flaticon.com/128/4211/4211708.png', title: '200,000+ {{ __('messages.grauates') }}' },
                { img: 'https://cdn-icons-png.flaticon.com/128/4140/4140048.png', title: '100,000+ {{ __('messages.teacher') }}' },
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
    {{-- End why choose us --}}

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
                        class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition-all border border-gray-100 text-center transform duration-500 group"
                        :style="'transition-delay: ' + ({{ $index }} * 100) + 'ms'"
                        :class="show ? 'opacity-100 scale-100' : 'opacity-0 scale-90'">

                        <!-- أيقونة -->
                        @if ($categorey->icon)
                            <img src="{{ asset('storage/icons/' . $categorey->icon) }}" alt="{{ $categorey->name }}"
                                class="h-12 w-12 mx-auto mb-3 transition-transform duration-300 group-hover:rotate-6 group-hover:scale-110" />
                        @else
                            <img src="https://t3.ftcdn.net/jpg/06/75/43/40/360_F_675434022_mw3vVnPXYRrOYVjia0We8yboClJJ80Yo.jpg "
                                class="h-12 w-12 mx-auto mb-3 transition-transform duration-300 group-hover:rotate-6 group-hover:scale-110"
                                alt="Category">
                        @endif

                        <h3 class="font-bold text-lg mb-2">{{ $categorey->name }}</h3>
                        <p class="text-gray-600 text-sm">{{ count($categorey->courses) }}
                            {{ __('messages.Courses') }}</p>
                    </a>
                @endforeach
            </div>

        </div>
    </section>
    {{-- End Categorey Section --}}

    <!-- FAQ Section -->
    <section class="py-16 px-4 bg-gray-50" x-data>
        <div class="container mx-auto max-w-4xl">
            <!-- Section Header -->
            <div class="text-center mb-12" x-data="{ show: false }" x-init="setTimeout(() => show = true, 300)"
                x-transition:enter="transition ease-out duration-700"
                x-transition:enter-start="opacity-0 translate-y-10"
                x-transition:enter-end="opacity-100 translate-y-0">
                <h2 class="text-3xl font-bold text-[#176b98] mb-4">{{ __('messages.FAQ') }}</h2>
                <p class="text-lg text-gray-600">{{ __('messages.find answer') }}</p>
            </div>

            <!-- FAQ Items -->
            <div class="space-y-4">
                <!-- FAQ Item 1 -->
                <div x-data="{ open: false }"
                    class="border border-gray-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-all duration-300"
                    x-transition:enter="transition ease-out duration-300 delay-100"
                    x-transition:enter-start="opacity-0 translate-y-5"
                    x-transition:enter-end="opacity-100 translate-y-0">
                    <button @click="open = !open"
                        class="w-full px-6 py-4 text-left focus:outline-none group transition-colors duration-300"
                        :class="open ? 'bg-[#176b98]' : 'bg-white'">
                        <div class="flex items-center justify-between">
                            <h3 class="font-semibold text-lg transition-colors duration-300"
                                :class="open ? 'text-[#e4ce96]' : 'text-gray-800 group-hover:text-[#176b98]'">
                                {{ __('messages.how i enroll') }}
                            </h3>
                            <svg class="w-5 h-5 transition-all duration-300"
                                :class="open ? 'text-[#e4ce96] rotate-180' : 'text-[#176b98]'" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </button>
                    <div x-show="open" x-collapse.duration.300ms class="px-6 pb-4 pt-0 bg-[#176b98] text-[#e4ce96]"
                        style="display: none;">
                        <p class="animate-fadeIn">{{ __('messages.how desrciption') }}</p>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div x-data="{ open: false }"
                    class="border border-gray-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-all duration-300"
                    x-transition:enter="transition ease-out duration-300 delay-200"
                    x-transition:enter-start="opacity-0 translate-y-5"
                    x-transition:enter-end="opacity-100 translate-y-0">
                    <button @click="open = !open"
                        class="w-full px-6 py-4 text-left focus:outline-none group transition-colors duration-300"
                        :class="open ? 'bg-[#176b98]' : 'bg-white'">
                        <div class="flex items-center justify-between">
                            <h3 class="font-semibold text-lg transition-colors duration-300"
                                :class="open ? 'text-[#e4ce96]' : 'text-gray-800 group-hover:text-[#176b98]'">
                                {{ __('messages.Are Certificates') }}
                            </h3>
                            <svg class="w-5 h-5 transition-all duration-300"
                                :class="open ? 'text-[#e4ce96] rotate-180' : 'text-[#176b98]'" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </button>
                    <div x-show="open" x-collapse.duration.300ms class="px-6 pb-4 pt-0 bg-[#176b98] text-[#e4ce96]"
                        style="display: none;">
                        <p class="animate-fadeIn">{{ __('messages.Are description') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .animate-fadeIn {
                animation: fadeIn 0.5s ease-out forwards;
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(-10px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            [x-cloak] {
                display: none !important;
            }
        </style>
    </section>
    {{-- End FAQ --}}

    <!-- Footer -->
    <x-footer />


    <!-- AJAX Script -->
    <script>
        function searchCourses() {
            const query = document.getElementById('search').value.trim();
            const container = document.getElementById('courses-container');

            if (!query) {
                alert('Please enter a search term.');
                return;
            }

            container.innerHTML = '<p class="text-gray-500 mx-auto">Searching...</p>';

            setTimeout(() => {
                const results = [{
                        title: 'Intro to Coding',
                        image: 'https://source.unsplash.com/400x200/?code',
                        description: 'Learn programming basics in a fun way.'
                    },
                    {
                        title: 'Graphic Design Basics',
                        image: 'https://source.unsplash.com/400x200/?design',
                        description: 'Start your design journey from scratch.'
                    },
                    {
                        title: 'Improve Your English',
                        image: 'https://source.unsplash.com/400x200/?english',
                        description: 'Boost your English skills for career and academics.'
                    }
                ];

                container.innerHTML = '';

                results.forEach(course => {
                    const card = document.createElement('div');
                    card.className = 'min-w-[250px] bg-gray-100 shadow-md rounded-lg overflow-hidden';
                    card.innerHTML = `
            <img src="${course.image}" class="h-40 w-full object-cover" />
            <div class="p-4">
              <h3 class="font-bold text-lg">${course.title}</h3>
              <p class="text-sm text-gray-600 mt-2">${course.description}</p>
              <a href="#" class="mt-2 inline-block text-blue-500">Read more</a>
            </div>
          `;
                    container.appendChild(card);
                });
            }, 1000);
        }
    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script>
        function searchDropdown() {
            return {
                searchQuery: '',
                searchResults: [],
                showDropdown: false,
                isLoading: false,

                searchCourses() {
                    if (this.searchQuery.trim() === '') {
                        this.searchResults = [];
                        return;
                    }

                    this.isLoading = true;

                    // Simulate API call with mock data
                    setTimeout(() => {
                        this.searchResults = [{
                                id: 1,
                                title: 'Introduction to Web Development',
                                slug: 'intro-web-dev',
                                cover_photo: 'course_covers/webdev.jpg',
                                instructor: 'Dr. Ahmed Mohamed',
                                description: 'Learn the basics of HTML, CSS and JavaScript'
                            },
                            {
                                id: 2,
                                title: 'Advanced Python Programming',
                                slug: 'advanced-python',
                                cover_photo: 'course_covers/python.jpg',
                                instructor: 'Prof. Sarah Johnson',
                                description: 'Master Python with advanced concepts and projects'
                            },
                            {
                                id: 3,
                                title: 'Digital Marketing Fundamentals',
                                slug: 'digital-marketing',
                                cover_photo: null,
                                instructor: 'Mr. David Wilson',
                                description: 'Learn SEO, social media marketing and analytics'
                            }
                        ].filter(course =>
                            course.title.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                            course.instructor.toLowerCase().includes(this.searchQuery.toLowerCase())
                        );

                        this.isLoading = false;
                    }, 800);
                }
            }
        }
    </script>
</body>

</html>
