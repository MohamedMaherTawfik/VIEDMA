<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- FontAwesome cdn --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"
        integrity="sha512-1z5Z2b7k8d9e3f5a5c8f8b7e3f8d9e3f5a5c8f8b7e3f8d9e3f5a5c8f8b7e3f8d9e3f5a5c8f8b7e3f8d9e3f5a5c8f8b7e3f8d9e3f5a5c8f8b7e3f8d9e3f5a5c8f8b7e3f"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body class="bg-gray-50 font-sans">

    <!-- Main Layout -->
    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <x-sidebar />

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden" x-data="{ open: false }">
            <!-- Top Navigation -->
            <header class="bg-white shadow-sm">
                <div class="flex justify-end px-6 py-4">
                    <div class="relative">
                        <!-- Dropdown Button -->
                        <button @click="open = !open" @click.outside="open = false"
                            class="flex items-center focus:outline-none">
                            <img src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : 'https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png?20150327203541' }}"
                                alt="{{ Auth::user()->name ?? 'Guest' }}"
                                class="w-8 h-8 mr-2 rounded-full object-cover">
                            <span class="text-sm font-medium">{{ Auth::user()->name }}</span>
                            <i class="fas fa-chevron-down ml-2 text-xs text-gray-500 transition-transform duration-200"
                                :class="{ 'transform rotate-180': open }"></i>
                        </button>

                        <!-- Dropdown Menu -->
                        <div x-show="open" x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50"
                            style="display: none">
                            <ul>
                                <li>
                                    <a href="{{ route('profile') }}"
                                        class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-user mr-2"></i> Profile
                                    </a>
                                </li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="flex items-center w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 focus:outline-none">
                                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>
            {{ $slot }}
        </div>
    </div>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>
