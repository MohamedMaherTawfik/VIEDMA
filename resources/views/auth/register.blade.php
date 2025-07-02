<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ __('messages.register_title') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="w-screen h-screen m-0 p-0 overflow-hidden font-sans">

    <div class="flex w-full h-full flex-col md:flex-row">

        <!-- Left Side -->
        <div class="md:w-1/2 w-full relative bg-cover bg-center h-64 md:h-auto"
            style="background-image: url('{{ asset('images/backs.jpg') }}');">
            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center p-10">
                <div class="text-white opacity-75 text-lg font-semibold leading-relaxed text-center max-w-md">
                    {{ __('messages.register_left_1') }}<br />
                    {{ __('messages.register_left_2') }}<br />
                    {{ __('messages.register_left_3') }}<br />
                    {{ __('messages.register_left_4') }}<br />
                    {{ __('messages.register_left_5') }}
                </div>
            </div>
        </div>

        <!-- Right Side -->
        <div class="md:w-1/2 w-full flex items-center justify-center bg-gray-900 p-10 text-white">
            <div class="w-full max-w-md space-y-6">

                <h2 class="text-3xl font-bold text-center">{{ __('messages.register_title') }}</h2>

                <form class="space-y-4" action="{{ route('signup') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Name -->
                    <div>
                        <label class="block text-sm font-medium mb-1">{{ __('messages.username') }}</label>
                        <input type="text" name="name" placeholder="{{ __('messages.username') }}"
                            class="w-full px-4 py-2 border border-gray-600 rounded-lg bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#73131d]">
                        @error('name')
                            <span class="text-red-400 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Role -->
                    <div>
                        <label class="block text-sm font-medium mb-1">{{ __('messages.register_as') }}</label>
                        <select name="role"
                            class="w-full px-4 py-2 border border-gray-600 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-[#73131d]">
                            <option value="">{{ __('messages.select_role') }}</option>
                            <option value="user">{{ __('messages.student') }}</option>
                            <option value="teacher">{{ __('messages.teacher') }}</option>
                        </select>
                        @error('role')
                            <span class="text-red-400 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium mb-1">{{ __('messages.email') }}</label>
                        <input type="email" name="email" placeholder="you@example.com"
                            class="w-full px-4 py-2 border border-gray-600 rounded-lg bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#73131d]">
                        @error('email')
                            <span class="text-red-400 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Photo -->
                    <div class="w-full space-y-4">
                        <label for="photo"
                            class="block text-sm font-medium">{{ __('messages.upload_photo') }}</label>
                        <input type="file" name="photo"
                            class="block w-full text-sm text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#73131DD2] file:text-white hover:file:bg-[#73131d]">
                        @error('photo')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="block text-sm font-medium mb-1">{{ __('messages.password') }}</label>
                        <input type="password" name="password" placeholder="••••••••"
                            class="w-full px-4 py-2 border border-gray-600 rounded-lg bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#73131d]">
                        @error('password')
                            <span class="text-red-400 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label class="block text-sm font-medium mb-1">{{ __('messages.confirm_password') }}</label>
                        <input type="password" name="password_confirmation" placeholder="••••••••"
                            class="w-full px-4 py-2 border border-gray-600 rounded-lg bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#73131d]">
                    </div>

                    <!-- Submit -->
                    <div class="flex justify-center">
                        <button type="submit"
                            class="py-2 px-6 rounded-lg bg-[#73131DCB] hover:bg-[#73131d] transition text-white font-semibold">
                            {{ __('messages.register_button') }}
                        </button>
                    </div>
                </form>

                <!-- Login Link -->
                <p class="text-center text-sm text-gray-400">
                    {{ __('messages.have_account') }}
                    <a href="{{ route('login') }}" class="text-[#FFFFFFFF] hover:underline">
                        {{ __('messages.login') }}
                    </a>
                </p>

            </div>
        </div>
    </div>

</body>

</html>
