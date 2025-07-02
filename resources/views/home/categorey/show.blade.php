<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category->name }} - Courses</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .category-hero {
            background: linear-gradient(135deg, #f0f4ff 0%, #d6e4ff 100%);
        }

        .rating-stars {
            color: #f59e0b;
        }

        .course-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>
</head>

<body class="bg-gray-50">
    <x-navbar />

    <!-- Hero Section -->
    <section class="category-hero py-12">
        <div class="container mx-auto px-4 md:px-6">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-[#79131d] mb-4">{{ $category->name }} Category</h1>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    {{ $category->description ?? __('messages.categoreydescription') }}</p>
            </div>
        </div>
    </section>

    <!-- Courses + Filters -->
    <section class="py-12" x-data="{ level: '', price: '' }">
        <div class="container mx-auto px-4 md:px-6">
            <div class="flex flex-wrap justify-between items-center mb-8 gap-4">
                <!-- Level Filter -->
                <select x-model="level"
                    class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm focus:ring-[#79131d] focus:border-[#79131d]">
                    <option value="">{{ __('messages.allLevels') }}</option>
                    <option value="Beginner">{{ __('messages.Beginner') }}</option>
                    <option value="Mid">{{ __('messages.mid') }}</option>
                    <option value="Advanced">{{ __('messages.advanced') }}</option>
                </select>

                <!-- Price Sort -->
                <select x-model="price"
                    class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm focus:ring-[#79131d] focus:border-[#79131d]">
                    <option value="">{{ __('messages.allPrices') }}</option>
                    <option value="0-50">0 - 50</option>
                    <option value="50-100">50 - 100</option>
                    <option value="100-200">100 - 200</option>
                    <option value="200+">{{ __('messages.Morethan') }} 200</option>
                </select>
            </div>

            <!-- Courses Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($category->courses as $course)
                    <template
                        x-if="(!level || '{{ $course->level }}' === level) &&
                               (!price ||
                                  (price === '0-50' && {{ $course->price }} <= 50) ||
                                  (price === '50-100' && {{ $course->price }} > 50 && {{ $course->price }} <= 100) ||
                                  (price === '100-200' && {{ $course->price }} > 100 && {{ $course->price }} <= 200) ||
                                  (price === '200+' && {{ $course->price }} > 200))"
                        x-bind:key="{{ $course->id }}">
                        <div
                            class="course-card bg-white rounded-xl overflow-hidden shadow-md transition-all duration-300">
                            <div class="h-48 overflow-hidden">
                                <img src="{{ $course->cover_photo_url }}"
                                    class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                            </div>
                            <div class="p-6">
                                <div class="flex justify-between items-start mb-2">
                                    <span class="px-2 py-1 bg-[#fce8ec] text-[#79131d] text-xs font-medium rounded">
                                        {{ $course->level ?? 'Intermediate' }}
                                    </span>
                                    <div class="flex items-center">
                                        <div class="rating-stars flex mr-1">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= floor($course->rating))
                                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                    </svg>
                                                @else
                                                    <svg class="w-4 h-4 fill-current text-gray-300" viewBox="0 0 20 20">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                    </svg>
                                                @endif
                                            @endfor
                                        </div>
                                        <span
                                            class="text-xs text-gray-600">{{ number_format($course->rating, 1) }}</span>
                                    </div>
                                </div>

                                <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $course->title }}</h3>
                                <p class="text-sm text-gray-500 mb-4">By {{ $course->user->name ?? 'Instructor Name' }}
                                </p>

                                <div class="flex justify-between items-center">
                                    <span
                                        class="text-lg font-bold text-[#79131d]">{{ number_format($course->price, 2) }}
                                        <span class="text-sm">
                                            SAR</span></span>
                                    <a href="{{ route('course.show', $course->slug) }}"
                                        class="px-4 py-2 bg-[#79131d] hover:bg-[#5e0f17] text-white text-sm font-medium rounded-lg transition duration-200">
                                        {{ __('messages.subscribe') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </template>
                @endforeach
            </div>
        </div>
    </section>

    <x-footer />

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>
