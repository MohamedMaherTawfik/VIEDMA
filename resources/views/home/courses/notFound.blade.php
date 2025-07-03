<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ __('messages.title') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="">
    {{-- navbar --}}
    <x-navbar />

    <div class="flex flex-col items-center justify-center text-center p-6">
        <!-- SVG Icon -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-[#176b98] mb-6" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M12 8v4m0 4h.01M12 2a10 10 0 100 20 10 10 0 000-20z" />
        </svg>

        <!-- Message -->
        <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">
            {{ __('messages.heading') }}
        </h1>
        <p class="text-gray-600">
            {{ __('messages.message') }}
        </p>

        <!-- Optional: Back button -->
        <a href="/"
            class="inline-block mt-6 px-6 py-2 bg-[#176B98D7] text-white font-semibold rounded hover:bg-[#176b98] transition">
            {{ __('messages.back_home') }}
        </a>
    </div>

    {{-- footer --}}
    <x-footer />

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>
