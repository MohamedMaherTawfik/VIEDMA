<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ __('messages.login_title') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="w-screen h-screen m-0 p-0 overflow-hidden font-sans">

    <div class="flex w-full h-full flex-col md:flex-row">

        <!-- Left Side: Background Image with Overlay -->
        <div class="md:w-1/2 w-full relative bg-cover bg-center h-64 md:h-auto"
            style="background-image: url('{{ asset('images/backs.jpg') }}');">
            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center p-10">
                <div class="text-white opacity-75 text-lg font-semibold leading-relaxed text-center max-w-md">
                    {{ __('messages.login_left_text1') }}<br />
                    {{ __('messages.login_left_text2') }}<br />
                    {{ __('messages.login_left_text3') }}<br />
                    {{ __('messages.login_left_text4') }}
                </div>
            </div>
        </div>

        <!-- Right Side: Login Form -->
        <div class="md:w-1/2 w-full flex items-center justify-center bg-gray-900 p-10 text-white">
            <div class="w-full max-w-md space-y-6">

                <h2 class="text-3xl font-bold text-center">{{ __('messages.login_title') }}</h2>

                <form class="space-y-4" action="{{ route('signin') }}" method="POST">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium mb-1">{{ __('messages.email') }}</label>
                        <input type="email" name="email" placeholder="{{ __('messages.email_placeholder') }}"
                            class="w-full px-4 py-2 border border-gray-600 rounded-lg bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500">
                        @error('email')
                            <span class="text-red-400 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="block text-sm font-medium mb-1">{{ __('messages.password') }}</label>
                        <input type="password" name="password" placeholder="{{ __('messages.password_placeholder') }}"
                            class="w-full px-4 py-2 border border-gray-600 rounded-lg bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500">
                        @error('password')
                            <span class="text-red-400 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-center">
                        <button type="submit"
                            class="py-2 px-6 rounded-lg bg-[#73131DCB] hover:bg-[#73131d] transition text-white font-semibold">
                            {{ __('messages.login_button') }}
                        </button>
                    </div>
                </form>

                <!-- Register Link -->
                <p class="text-center text-sm text-gray-400">
                    {{ __('messages.no_account') }}
                    <a href="{{ route('register') }}" class="text-[#FFFFFFFF] hover:underline">
                        {{ __('messages.register') }}
                    </a>
                </p>

            </div>
        </div>
    </div>

</body>

</html>
