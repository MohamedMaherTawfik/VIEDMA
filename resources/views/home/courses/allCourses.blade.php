<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Courses</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body class="bg-gray-50" x-data="courseFilter()" x-cloak>
    <x-navbar />

    <section class="py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">

            <!-- Header + Controls -->
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-8 gap-4">
                <div class="text-center lg:text-left">
                    <h2 class="text-3xl font-bold text-gray-900">{{ __('messages.featured') }}</h2>
                    <p class="text-gray-600">{{ __('messages.boost') }}</p>
                </div>

                <div class="flex flex-col sm:flex-row gap-4">
                    <!-- Search -->
                    <input type="text" x-model="search" placeholder="{{ __('messages.searchCourse') }}"
                        class="block w-full sm:w-64 px-4 py-2 border border-gray-300 rounded-md text-sm focus:ring-[#176b98] focus:border-[#176b98]">

                    <!-- Filter by Level -->
                    <select x-model="filter"
                        class="block w-full sm:w-auto px-4 py-2 border border-gray-300 rounded-md text-sm text-black focus:ring-[#176b98] focus:border-[#176b98]">
                        <option value="">{{ __('messages.allLevels') }}</option>
                        <option value="Beginner">{{ __('messages.Beginner') }}</option>
                        <option value="Mid">{{ __('messages.mid') }}</option>
                        <option value="Advanced">{{ __('messages.advanced') }}</option>
                    </select>

                    <!-- Sort by Price -->
                    <select x-model="sort"
                        class="block w-full sm:w-auto px-4 py-2 border border-gray-300 rounded-md text-sm text-black focus:ring-[#176b98] focus:border-[#176b98]">
                        <option value="">{{ __('messages.allPrices') }}</option>
                        <option value="0-100">0 - 100</option>
                        <option value="100-200">100 - 200</option>
                        <option value="200-300">200 - 300</option>
                        <option value="300+">{{ __('messages.Morethan') }} 300</option>
                    </select>
                </div>
            </div>

            <!-- Courses Grid -->
            <div>
                <!-- Loading Skeleton -->
                <template x-if="isLoading">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <template x-for="i in 6" :key="i">
                            <div class="animate-pulse bg-white rounded-lg shadow-md h-96 p-6">
                                <div class="h-40 bg-gray-300 rounded mb-4"></div>
                                <div class="h-4 bg-gray-300 rounded w-3/4 mb-2"></div>
                                <div class="h-4 bg-gray-300 rounded w-1/2 mb-2"></div>
                                <div class="h-4 bg-gray-300 rounded w-1/4"></div>
                            </div>
                        </template>
                    </div>
                </template>

                <!-- Actual Course Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" x-show="!isLoading">
                    @foreach ($courses as $course)
                        <template
                            x-if="(!filter || '{{ $course->level }}' === filter)
                    && (!search || '{{ strtolower($course->title) }}'.includes(search.toLowerCase()))
                    && (!sort
                        || (sort === '0-100' && {{ $course->price ?? 0 }} <= 100)
                        || (sort === '100-200' && {{ $course->price ?? 0 }} > 100 && {{ $course->price ?? 0 }} <= 200)
                        || (sort === '200-300' && {{ $course->price ?? 0 }} > 200 && {{ $course->price ?? 0 }} <= 300)
                        || (sort === '300+' && {{ $course->price ?? 0 }} > 300))"
                            x-bind:key="{{ $course->id }}">
                            <div
                                class="bg-white rounded-lg shadow-md transition hover:shadow-xl overflow-hidden flex flex-col">
                                <div class="relative h-48 overflow-hidden">
                                    <img src="{{ $course->cover_photo_url }}"
                                        class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                                    <div
                                        class="absolute bottom-2 left-2 bg-[#000000C5] text-white text-xs px-2 py-1 rounded">
                                        {{ \Carbon\Carbon::parse($course->start_Date)->format('d M Y') }}
                                    </div>
                                    <div
                                        class="absolute bottom-2 right-2 bg-[#000000B9] text-white text-xs px-2 py-1 rounded">
                                        {{ $course->level }}
                                    </div>
                                </div>

                                <div class="p-6 flex-1 flex flex-col justify-between">
                                    <div>
                                        <span
                                            class="inline-block mb-2 px-3 py-1 text-xs font-semibold text-[#FEBE35] bg-[#176b98] rounded-full">
                                            {{ $course->category->name ?? __('messages.general') }}
                                        </span>
                                        <h3 class="text-xl font-semibold text-gray-900">{{ $course->title }}</h3>
                                        <p class="text-gray-600 text-sm mb-3 line-clamp-3">
                                            {{ Str::limit($course->description, 50) }}
                                        </p>
                                        <p class="text-sm text-gray-500 mb-2 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v3.586a1 1 0 00.293.707l2 2a1 1 0 001.414-1.414L11 9.586V6z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            {{ $course->duration ?? 0 }} {{ __('messages.hours') }}
                                        </p>
                                    </div>
                                    <div
                                        class="mt-auto border-t pt-4 text-sm text-gray-700 flex justify-between items-center">
                                        <div>
                                            <span class="font-bold">{{ __('messages.instructor') }}:</span>
                                            <span class="opacity-60">{{ $course->user->name }}</span>
                                        </div>
                                        <div class="flex items-center">
                                            <span class="text-yellow-400">★</span>
                                            <span class="ml-1 text-gray-600">{{ $course->rating ?? 0 }}
                                                ({{ $course->reviews_count ?? __('messages.no_reviews') }})
                                            </span>
                                        </div>
                                    </div>
                                    <div class="pt-4 flex items-center justify-between">
                                        <span class="text-lg font-bold text-[#176b98]">{{ $course->price ?? 0 }}
                                            {{ __('messages.sar') }}</span>
                                        <a href="{{ route('course.show', $course->slug) }}"
                                            class="px-4 py-2 bg-[#176b98D2] text-[#FEBE35] text-sm font-medium rounded-md hover:bg-[#176b98] transition">
                                            {{ __('messages.subscribe') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </template>
                    @endforeach
                </div>
            </div>

        </div>
    </section>

    <x-footer />

    <script>
        function courseFilter() {
            return {
                filter: '',
                sort: '',
                search: '',
                isLoading: false,
                init() {
                    this.$watch('search', () => {
                        this.isLoading = true;
                        setTimeout(() => {
                            this.isLoading = false;
                        }, 500);
                    });
                }
            };
        }
    </script>
</body>

</html>
