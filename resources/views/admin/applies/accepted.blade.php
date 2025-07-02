<x-panel>


    <div class="p-6 bg-white min-h-screen">
        <!-- Search & Add Button -->
        <div class="flex justify-between items-center mb-4">
            {{-- <input id="searchInput" type="text" placeholder="Search by Name"
                class="w-1/3 px-4 py-2 rounded-lg shadow-sm border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-500" /> --}}
            <div></div>
            <div class="flex justify-end">
                <a href="{{ route('admin.users.create') }}"
                    class="bg-[#79131DC2] text-right text-white px-4 py-2 rounded-lg shadow hover:bg-[#79131d]">
                    Add User +
                </a>
            </div>

        </div>

        <!-- User List Headers -->
        <div class="hidden md:grid grid-cols-7 gap-4 font-semibold text-gray-700 mb-2">
            <div class="text-[#79131d]">User</div>
            <div class="text-[#79131d]">Email</div>
            <div class="text-[#79131d]">role</div>
            <div class="text-[#79131d]">Join Date</div>
            <div class="text-right mr-10 text-[#79131d]">Status</div>
        </div>


        <!-- User List Container -->
        @foreach ($applies as $apply)
            <div class="grid grid-cols-7 gap-4 items-center bg-[#e4ce96] p-4 rounded-lg shadow mb-2">
                <!-- apply Info -->
                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 bg-gray-300 rounded-full">
                        <img src="{{ $apply->user->photo ? asset('storage/' . $apply->user->photo) : asset('images/default-avatar.png') }}"
                            alt="apply Photo" class="w-full h-full object-cover rounded-full">
                    </div>
                    <div>
                        <div class="font-medium">{{ $apply->user->name }}</div>
                    </div>
                </div>

                <!-- Email -->
                <div class="text-gray-700">{{ $apply->user->email }}</div>

                <!-- role -->
                <div class="text-gray-700">{{ $apply->user->role }}</div>

                <!-- Join Date -->
                <div class="text-gray-700">{{ $apply->user->created_at }}</div>

                <!-- Status -->
                <div class="text-gray-700 text-right mr-5">{{ $apply->status }}</div>
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
