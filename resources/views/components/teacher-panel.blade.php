<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>


</head>

<body class="bg-gray-50 font-sans">

    <!-- Main Layout -->
    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <x-teacher-sidebar />

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Navigation -->
            <header class="bg-white shadow-sm">
                <div class="flex justify-end px-6 py-4">
                    <div class="relative" id="userDropdown">
                        <div class="relative inline-block text-left">
                            <!-- Dropdown button -->
                            <button id="dropdownButton" class="flex items-center focus:outline-none"
                                onclick="toggleDropdown()">
                                <img src="{{ asset('storage/' . Auth::user()->photo) }}"
                                    class="w-8 h-8 rounded-full mr-2" alt="User profile">
                                <span class="text-sm font-medium">{{ Auth::user()->name }}</span>
                                <i class="fas fa-chevron-down ml-2 text-xs text-gray-500 transition-transform duration-200"
                                    id="dropdownArrow"></i>
                            </button>

                            <!-- Dropdown menu (hidden by default) -->
                            <div id="dropdownMenu"
                                class="hidden absolute right-0 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none z-50">
                                <div class="py-1" role="none">
                                    <!-- Profile link -->
                                    <a href="{{ route('profile') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                                        <i class="fas fa-user-circle mr-2"></i> Profile
                                    </a>

                                    <!-- Divider -->
                                    <div class="border-t border-gray-100 my-1"></div>

                                    <!-- Logout form -->
                                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                                        @csrf
                                        <button type="submit"
                                            class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                            role="menuitem">
                                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Dropdown Menu -->
                        <div id="dropdownMenu"
                            class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 hidden">
                            <ul>
                                <li>
                                    <a href="#"
                                        class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-user mr-2"></i> Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-cog mr-2"></i> Settings
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



    <script>
        function toggleDropdown() {
            const menu = document.getElementById('dropdownMenu');
            const arrow = document.getElementById('dropdownArrow');

            // Toggle menu visibility
            menu.classList.toggle('hidden');

            // Rotate arrow icon
            arrow.classList.toggle('transform');
            arrow.classList.toggle('rotate-180');
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const dropdown = document.querySelector('.relative.inline-block.text-left');
            const isClickInside = dropdown.contains(event.target);

            if (!isClickInside) {
                document.getElementById('dropdownMenu').classList.add('hidden');
                document.getElementById('dropdownArrow').classList.remove('transform', 'rotate-180');
            }
        });
    </script>
</body>

</html>
