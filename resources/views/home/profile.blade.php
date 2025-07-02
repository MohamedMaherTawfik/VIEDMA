<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Profile Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="font-sans antialiased text-gray-800 bg-gray-50">

    {{-- navbar --}}
    <x-navbar />
    @if (Auth::user()->role == 'teacher')
        <div class="min-h-screen flex items-center justify-center p-4">
            <!-- Main Container -->
            <div class="w-full max-w-4xl flex flex-col md:flex-row gap-6">
                <!-- Coursess Section (Left) -->
                <div class="w-full md:w-1/2 bg-gray-100 rounded-xl shadow-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Courses</h2>

                    <div class="space-y-4"> <!-- هذا يضيف مسافات بين كل صف -->
                        @foreach ($user->course as $course)
                            <div class="flex items-center justify-between p-4 bg-white rounded-lg shadow-sm">
                                <h3 class="text-lg font-medium text-gray-800">{{ $course->title }}</h3>
                                <a href="{{ route('course.show', $course->slug) }}"
                                    class="px-4 py-2 bg-[#79131d] text-[#e4ce96] text-sm font-medium rounded-md hover:bg-[#5f1017] transition">
                                    Show More
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>


                <!-- Profile Section (Right) -->
                <div class="w-full md:w-1/2 bg-gray-100 rounded-xl shadow-lg p-6">
                    <div class="flex flex-col items-center">
                        <!-- Avatar -->
                        <div class="relative mb-4">
                            <img class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-md"
                                src="{{ asset('storage/' . Auth::user()->photo) }}" alt="Profile picture">
                            <div class="absolute bottom-0 right-0 bg-blue-500 text-white rounded-full p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>

                        <!-- Name and Title -->
                        <h1 class="text-2xl font-bold text-gray-800">{{ $user->name }}</h1>
                        <p class="flex items-center space-x-2 font-bold text-xl mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M3 11l9 9a2 2 0 002.828 0l6.364-6.364a2 2 0 000-2.828L13 3H7a4 4 0 00-4 4v4z" />
                            </svg>
                            <span class="text-sm text-black opacity-60">{{ $user->applyTeacher->topic }}</span>
                        </p>

                        <div class="flex items-center space-x-2 font-bold text-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-600" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path
                                    d="M2 3.5A1.5 1.5 0 013.5 2h2A1.5 1.5 0 017 3.5v1A1.5 1.5 0 015.5 6H5.09a13.35 13.35 0 005.9 5.9v-.41A1.5 1.5 0 0112.5 10h1A1.5 1.5 0 0115 11.5v2A1.5 1.5 0 0113.5 15 13.5 13.5 0 012 3.5z" />
                            </svg>

                            <span class="text-sm text-black opacity-60">
                                {{ $user->applyTeacher->phone }}
                            </span>
                        </div>

                        <!-- Email -->
                        <div class="flex items-center text-gray-700 mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                            <span>{{ $user->email }}</span>
                        </div>




                        <!-- Edit Profile Button -->
                        <button
                            class="w-full bg-white text-gray-800 font-medium py-2 px-4 rounded-lg border border-gray-300 hover:bg-gray-50 transition-colors shadow-sm mb-6 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>
                            Edit Profile
                        </button>


                    </div>
                </div>
            </div>
        </div>
    @else
        <!-- Profile Section (Right) -->
        <div class="min-h-screen flex items-center justify-center bg-transparent">
            <!-- Profile Card -->
            <div class="w-full md:w-1/2 rounded-xl shadow-lg p-6">
                <div class="flex flex-col items-center">
                    <!-- Avatar -->
                    <div class="relative mb-4">
                        <img class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-md"
                            src="{{ asset('storage/' . $user->photo) }}" alt="Profile picture">
                        <div class="absolute bottom-0 right-0 bg-blue-500 text-white rounded-full p-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>

                    <!-- Name and Title -->
                    <h1 class="text-2xl font-bold text-gray-800">{{ $user->name }}</h1>

                    <!-- Email -->
                    <div class="flex items-center text-gray-700 mb-6 mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                        <span>{{ $user->email }}</span>
                    </div>

                    <!-- Edit Profile Button -->
                    <div x-data="{ openModal: false }">
                        <!-- Trigger Button -->
                        <a href="#" @click.prevent="openModal = true"
                            class="bg-white text-gray-800 font-medium py-2 px-4 rounded-lg border border-gray-300 hover:bg-gray-50 transition-colors shadow-sm mb-6 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>
                            Reset Password
                        </a>

                        <!-- Backdrop -->
                        <div x-show="openModal" x-cloak x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">

                            <!-- Modal -->
                            <div @click.away="openModal = false" x-show="openModal"
                                x-transition:enter="transition transform ease-out duration-300"
                                x-transition:enter-start="opacity-0 scale-90"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition transform ease-in duration-200"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-90"
                                class="bg-white rounded-lg shadow-xl max-w-md w-full p-6 relative">

                                <!-- Close Button -->
                                <button @click="openModal = false"
                                    class="absolute top-2 right-2 text-gray-500 hover:text-red-600">
                                    ✕
                                </button>

                                <!-- Modal Title -->
                                <h2 class="text-xl font-bold mb-4 text-center">Reset Password</h2>

                                <!-- Form -->
                                <form action="{{ route('password.reset') }}" method="POST">
                                    @csrf

                                    <!-- Current Password -->
                                    <div class="mb-4">
                                        <label class="block font-medium mb-1">Current Password</label>
                                        <input type="password" name="current_password" required
                                            class="w-full border px-4 py-2 rounded focus:ring focus:border-blue-300">
                                        @error('current_password')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- New Password -->
                                    <div class="mb-4">
                                        <label class="block font-medium mb-1">New Password</label>
                                        <input type="password" name="password" required
                                            class="w-full border px-4 py-2 rounded focus:ring focus:border-blue-300">
                                        @error('password')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Confirm New Password -->
                                    <div class="mb-6">
                                        <label class="block font-medium mb-1">Confirm New Password</label>
                                        <input type="password" name="password_confirmation" required
                                            class="w-full border px-4 py-2 rounded focus:ring focus:border-blue-300">
                                    </div>

                                    <!-- Submit -->
                                    <button type="submit"
                                        class="bg-[#79131d] text-[#e4ce96] w-full py-2 rounded hover:bg-[#5a0e16] transition font-semibold">
                                        Update Password
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>



                    <!-- Social Links -->
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-600 hover:text-blue-500 transition-colors">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-pink-500 transition-colors">
                            <i class="fab fa-dribbble text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-blue-700 transition-colors">
                            <i class="fab fa-linkedin text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-gray-900 transition-colors">
                            <i class="fab fa-github text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- footer --}}
    <x-footer />
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

</body>

</html>
