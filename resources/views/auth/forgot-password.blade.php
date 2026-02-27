<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
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
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
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