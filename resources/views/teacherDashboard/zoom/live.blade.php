<x-teacher-panel>

    {{-- ✅ Messages --}}
    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4 text-center mx-auto w-fit text-sm">
            ✅ {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-100 text-red-800 p-4 rounded mb-4 text-center mx-auto w-fit text-sm">
            ❌ {{ session('error') }}
        </div>
    @endif

    {{-- ✅ Connect if not connected --}}
    @unless (session('zoom_token'))
        <div class="flex justify-center mt-6">
            <a href="{{ route('zoom.redirect', request('slug')) }}"
                class="px-4 py-2 text-sm font-medium bg-blue-600 text-white rounded-md shadow hover:bg-blue-700 transition">
                Connect with Zoom
            </a>
        </div>
    @endunless

    {{-- ✅ Meeting actions if connected --}}
    @if (session('zoom_token'))
        <div class="text-center mt-6">
            <p class="text-green-700 font-semibold mb-2">
                Zoom connected ✅
            </p>
            <p class="text-sm text-gray-600">
                {{ session('zoom_name') }} ({{ session('zoom_email') }})<br>
                <span class="text-xs text-gray-400">ID: {{ session('zoom_user_id') }}</span>
            </p>
        </div>

        {{-- start meeting --}}
        <div class="flex justify-center mt-6">
            <a href="{{ route('zoom.create', $slug) }}"
                class="inline-flex items-center gap-2 px-5 py-2.5 bg-emerald-600 text-white text-sm font-semibold rounded-full shadow hover:bg-emerald-700 transition-all duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14m-6 0a4 4 0 01-4-4V8a4 4 0 014-4h6a4 4 0 014 4v2a4 4 0 01-4 4H9z">
                    </path>
                </svg>
                Start Zoom Meeting
            </a>
        </div>

        @if ($meeting)
            @auth
                @if (auth()->user()->role == 'teacher' && $meeting->start_url)
                    <div class="flex justify-center mt-4">
                        <a href="{{ $meeting->start_url }}" target="_blank"
                            class="px-4 py-2 bg-orange-600 text-white text-sm rounded hover:bg-orange-700 transition">
                            Start Meeting
                        </a>
                    </div>
                @endif
            @endauth
        @endif


        {{-- Disconnect --}}
        <div class="flex justify-center mt-4">
            <a href="{{ route('zoom.disconnect', request('slug')) }}"
                class="inline-flex items-center gap-2 px-4 py-1.5 bg-red-600 text-white text-xs font-semibold rounded-full shadow hover:bg-red-700 transition-all duration-200">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
                Disconnect Zoom
            </a>
        </div>

    @endif

</x-teacher-panel>
