<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teachio - Educational Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom CSS -->
    <style>
        .hero-pattern {
            background-image: radial-gradient(#3b82f6 0.5px, transparent 0.5px);
            background-size: 10px 10px;
            opacity: 0.1;
        }
    </style>
</head>

<body class="bg-white" x-data="courseLoader()" x-init="startLoading()" x-cloak>
    <!-- Navigation Bar -->
    <x-navbar />

    <header class="mb-8">
        <h1 class="text-4xl font-bold text-gray-800 text-center mt-6">My Courses</h1>
    </header>

    <!-- Loading Spinner -->
    <div x-show="isLoading" class="flex justify-center items-center min-h-[300px]">
        <svg class="animate-spin h-12 w-12 text-[#79131d]" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
            </circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
        </svg>
    </div>

    <!-- Courses Grid -->
    <section x-show="!isLoading"
        class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-7xl mx-auto transition-all duration-300">

        @foreach ($courses as $course)
            <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-lg transition mb-5">
                <img src="{{ $course->cover_photo_url }}"
                    class="w-full h-50 object-cover transition-transform duration-300 hover:scale-105">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $course->name }}</h2>
                <p class="text-gray-600 mb-4">{{ $course->description }}</p>

                <!-- Align button to the right -->
                <div class="flex justify-end">
                    <a href="{{ route('myCourse', $course->slug) }}"
                        class="bg-[#79131DDE] text-white px-4 py-2 rounded-xl hover:bg-[#79131d]">{{ __('messages.showCourse') }}</a>
                </div>
            </div>
        @endforeach
    </section>

    <!-- Footer -->
    <x-footer />

    <!-- AlpineJS & Loader Logic -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        function courseLoader() {
            return {
                isLoading: true,
                startLoading() {
                    setTimeout(() => {
                        this.isLoading = false;
                    }, 1000); // 1 second loading
                }
            };
        }
    </script>
</body>

</html>
