<x-panel>


    <div class="p-6 bg-white min-h-screen">
        <!-- Search & Add Button -->
        <div class="flex justify-between items-center mb-4">
            {{-- <input id="searchInput" type="text" placeholder="Search by Name"
                class="w-1/3 px-4 py-2 rounded-lg shadow-sm border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-500" /> --}}
            <div></div>
            <a href="{{ route('admin.users.create') }}"
                class="bg-[#79131DCE] text-white px-4 py-2 rounded-lg shadow hover:bg-[#79131d]">
                Add User +
            </a>

        </div>

        <!-- User List Headers -->
        <div class="hidden md:grid grid-cols-7 gap-4 font-semibold text-gray-700 mb-2">
            <div class="text-[#79131d]">User</div>
            <div class="text-[#79131d]">Email</div>
            <div class="text-[#79131d]">phone</div>
            <div class="text-[#79131d]">CV</div>
            <div class="text-[#79131d]">certificate</div>
            <div class="text-right mr-10 text-color text-[#79131d]">Action</div>
        </div>


        <!-- User List Container -->
        @foreach ($applies as $apply)
            <div class="grid grid-cols-7 gap-4 items-center bg-[##e4ce96] bg-white p-4 rounded-lg shadow mb-2">
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

                <!-- phone -->
                <div class="text-gray-700">{{ $apply->phone }}</div>

                <!-- CV -->
                <a href="{{ asset('storage/' . $apply->cv) }}" target="_blank"
                    class="inline-flex items-center justify-center w-10 h-10 bg-[#79131DD0] text-white rounded-md hover:bg-[#79131d] focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200">
                    <!-- PDF icon from Heroicons (Solid) -->
                    <i class="fa-solid fa-file-pdf text-[#e4ce96] text-xl"></i>
                </a>

                <!-- CV -->
                <a href="{{ asset('storage/' . $apply->certificate) }}" target="_blank"
                    class="inline-flex items-center justify-center w-10 h-10 bg-[#79131DD0] text-white rounded-md hover:bg-[#79131d] focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200">
                    <!-- PDF icon from Heroicons (Solid) -->
                    <i class="fa-solid fa-file-image text-[#e4ce96] text-xl"></i>
                </a>


                <!-- Actions -->
                <div class="flex justify-end items-center space-x-3 text-gray-600 text-lg" style="width: 110%">

                    <form action="{{ route('admin.applies.accept', $apply->id) }}" method="GET">
                        @csrf
                        <button type="submit"
                            class="btn success bg-green-500 hover:bg-green-800 text-white rounded-lg px-3 py-2">
                            Accept
                        </button>
                    </form>

                    <form action="{{ route('admin.applies.reject', $apply->id) }}" method="GET">
                        @csrf
                        <button type="submit"
                            class="btn danger bg-red-500 hover:bg-red-800 text-white rounded-lg px-3 py-2">
                            reject
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
