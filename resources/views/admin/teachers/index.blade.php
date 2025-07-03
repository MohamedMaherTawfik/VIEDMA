<x-panel>

    <div class="p-6 bg-gray-50 min-h-screen">
        <!-- Search & Add Button -->
        <div class="flex justify-between items-center mb-4">
            {{-- <input id="searchInput" type="text" placeholder="Search by Name"
                class="w-1/3 px-4 py-2 rounded-lg shadow-sm border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-500" /> --}}
            <div></div>
            <a href="{{ route('admin.users.create') }}"
                class="bg-[#176b98C9] text-white px-4 py-2 rounded-lg shadow hover:bg-[#176b98]">
                Add User +
            </a>

        </div>

        <!-- User List Headers -->
        <div class="hidden md:grid grid-cols-7 gap-4 font-semibold text-gray-700 mb-2">
            <div class="text-[#176b98]">User</div>
            <div class="text-[#176b98]">Email</div>
            <div class="text-[#176b98]">role</div>
            <div class="text-[#176b98]">Join Date</div>
            <div class="text-right text-[#176b98]">Action</div>
        </div>


        <!-- User List Container -->
        @foreach ($teachers as $teacher)
            <div class="grid grid-cols-7 gap-4 items-center p-4 rounded-lg shadow mb-2 bg-[#FEBE35]">
                <!-- teacher Info -->
                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 bg-gray-300 rounded-full">
                        <img src="{{ $teacher->photo ? asset('storage/' . $teacher->photo) : asset('images/default-avatar.png') }}"
                            alt="teacher Photo" class="w-full h-full object-cover rounded-full">
                    </div>
                    <div>
                        <div class="font-medium">{{ $teacher->name }}</div>
                    </div>
                </div>

                <!-- Email -->
                <div class="text-gray-700">{{ $teacher->email }}</div>

                <!-- role -->
                <div class="text-gray-700">{{ $teacher->role }}</div>

                <!-- Join Date -->
                <div class="text-gray-700">{{ $teacher->created_at }}</div>

                <!-- Actions -->
                <div class="flex justify-end items-center space-x-3 text-gray-600 text-lg">
                    {{-- <a href="{{ route('admin.users.show', $teacher->id) }}" class="hover:text-blue-600"><i
                            class="fas fa-eye"></i></a> --}}
                    <a href="{{ route('admin.users.edit', $teacher->id) }}" class="hover:text-yellow-600"><i
                            class="fas fa-edit"></i></a>
                    <form action="{{ route('admin.users.delete', $teacher->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure you want to delete this teacher?');"
                            type="submit" class="hover:text-red-600">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach

    </div>


    <script>
        const dropdownButton = document.getElementById('dropdownButton');
        const dropdownMenu = document.getElementById('dropdownMenu');

        dropdownButton.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });

        // Optional: Hide dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!dropdownButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    </script>


</x-panel>
