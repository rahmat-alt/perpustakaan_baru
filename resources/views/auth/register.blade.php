<x-guest-layout>



    {{-- Flash Message --}}
    @if(session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
        {{ session('success') }}
    </div>
    @endif

    @if(session('info'))
    <div class="mb-4 p-4 bg-blue-100 text-blue-700 rounded">
        {{ session('info') }}
    </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                type="password"
                name="password"
                required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="captcha mt-2 mb-2">
            <span id="captcha-img"><img src="{{ route('captcha', ['config' => 'flat']) }}" id="captchaImage"></span>

            <style>
                img {
                    width: 200px;
                    /* lebar baru */
                    height: 36px;
                    /* tinggi baru */
                    object-fit: contain;
                    /* supaya proporsional */
                }
            </style>

            <span class="captcha-refresh">
                <i class="fa fa-refresh" onclick="refreshCaptcha()"></i>
            </span>

            <input type="text" name="captcha" class="form-control mt-2 w-full rounded" placeholder="Masukkan captcha" autofocus required>
        </div>

        @error('captcha')
        <small class="text-danger">{{ $message }}</small>
        @enderror

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        function refreshCaptcha() {
            fetch('/refresh-captcha')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('captcha-img').innerHTML = data.captcha;
                });
        }

        setInterval(refreshCaptcha, 120000); // 60 detik
    </script>
</x-guest-layout>