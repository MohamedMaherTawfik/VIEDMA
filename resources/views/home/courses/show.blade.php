<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $course->title }} - {{ __('course.details_page_title') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .course-hero {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }

        .rating-stars {
            color: #f59e0b;
        }
    </style>
</head>

<body class="bg-gray-50">

    <x-navbar />

    <!-- Course Hero Section -->
    <section class="course-hero py-12">
        <div class="container mx-auto px-4 md:px-6">
            <div class="flex flex-col md:flex-row gap-8">
                <div class="md:w-1/2 lg:w-2/5">
                    <div class="rounded-xl overflow-hidden shadow-xl">
                        <img src="{{ $course->cover_photo_url }}"
                            class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                    </div>
                </div>

                <div class="md:w-1/2 lg:w-3/5 flex flex-col justify-center">
                    <span
                        class="inline-block px-3 py-1 bg-indigo-100 text-indigo-800 rounded-full text-sm font-bold mb-4">
                        {{ $course->category->name }}
                    </span>

                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ $course->title }}</h1>

                    <p class="text-lg text-gray-600 mb-6">{{ Str::limit($course->description, 200) }}</p>

                    <div class="flex items-center mb-6">
                        <span class="text-gray-700 font-medium">
                            {{ number_format($course->rating, 1) }} {{ __('messages.rating') }}
                        </span>
                    </div>

                    <div class="flex flex-wrap gap-4 mb-8">
                        <div class="flex items-center space-x-2">
                            <!-- SVG calendar icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M6 2a1 1 0 012 0v1h4V2a1 1 0 112 0v1h1a2 2 0 012 2v1H3V5a2 2 0 012-2h1V2zM3 8h14v9a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm4 2a1 1 0 000 2h2a1 1 0 100-2H7z" />
                            </svg>

                            <!-- Date text -->
                            <span class="text-gray-700">
                                {{ __('messages.starts') }}:
                                {{ \Carbon\Carbon::parse($course->start_Date)->format('M d, Y') }}
                            </span>
                        </div>

                        <div class="flex items-center space-x-2">
                            <!-- Clock SVG icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-11.25a.75.75 0 00-1.5 0v4.25c0 .414.336.75.75.75h3a.75.75 0 000-1.5H10.75V6.75z"
                                    clip-rule="evenodd" />
                            </svg>

                            <!-- Duration text -->
                            <span class="text-gray-700">
                                {{ __('messages.duration') }}: {{ $course->duration }} {{ __('messages.hours') }}
                            </span>
                        </div>

                    </div>

                    <div class="flex items-center justify-between">
                        <div>
                            <span class="text-3xl font-bold text-gray-900">{{ number_format($course->price, 2) }}
                                {{ __('messages.currency') }}</span>
                        </div>
                        <form action="{{ route('enrollment', $course->slug) }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="px-6 py-3 bg-[#176B98C2] hover:bg-[#176b98] text-white font-medium rounded-lg transition duration-200">
                                {{ __('messages.enroll_now') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Course Content Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4 md:px-6">
            <div class="max-w-4xl mx-auto">
                <div class="mb-10">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">{{ __('messages.what_you_will_learn') }}</h2>
                    <div class="prose max-w-none text-gray-600">
                        {!! nl2br(e($course->description)) !!}
                    </div>
                </div>

                <div class="border-t border-gray-200 pt-10">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">{{ __('messages.course_details') }}</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-gray-50 p-6 rounded-xl">
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">{{ __('messages.course_info') }}</h3>
                            <ul class="space-y-3">
                                <li class="flex justify-between">
                                    <span class="text-gray-600">{{ __('messages.category') }}:</span>
                                    <span class="text-gray-900 font-medium">{{ $course->category->name }}</span>
                                </li>
                                <li class="flex justify-between">
                                    <span class="text-gray-600">{{ __('messages.start_date') }}:</span>
                                    <span
                                        class="text-gray-900 font-medium">{{ \Carbon\Carbon::parse($course->start_Date)->format('M d, Y') }}</span>
                                </li>
                                <li class="flex justify-between">
                                    <span class="text-gray-600">{{ __('messages.duration') }}:</span>
                                    <span class="text-gray-900 font-medium">{{ $course->duration }}</span>
                                </li>
                                <li class="flex justify-between">
                                    <span class="text-gray-600">{{ __('messages.created_at') }}:</span>
                                    <span
                                        class="text-gray-900 font-medium">{{ \Carbon\Carbon::parse($course->created_at)->format('M d, Y') }}</span>
                                </li>
                            </ul>
                        </div>

                        <div class="bg-gray-50 p-6 rounded-xl">
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">{{ __('messages.pricing') }}</h3>
                            <div class="flex items-end mb-4">
                                <span class="text-4xl font-bold text-gray-900">{{ number_format($course->price, 2) }}
                                    {{ __('messages.currency') }}</span>
                            </div>
                            <button
                                class="w-full px-6 py-3 bg-[#176B98D7] hover:bg-[#176b98] text-white font-medium rounded-lg transition duration-200">
                                {{ __('messages.enroll_course') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Instructor Section -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4 md:px-6">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-2xl font-bold text-gray-900 mb-8">{{ __('messages.instructor') }}</h2>
                <div class="bg-white p-6 rounded-xl shadow-sm flex items-start">
                    <div class="w-16 h-16 rounded-full bg-gray-200 mr-4 overflow-hidden">
                        <img src="{{ asset('storage' . $course->user->photo) }}" alt="{{ $course->user->name }}">
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">{{ $course->user->name }}</h3>
                        <p class="text-gray-600 mt-1">{{ __('messages.instructor_bio_placeholder') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-footer />
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>
