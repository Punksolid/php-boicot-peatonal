<x-guest-layout title="Login">
{{--    error message --}}
    @if ($errors->any())
        <div class="p-4 bg-red-100">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
{{--    success --}}
    @if (session('success'))
        <div class="p-4 bg-green-100">
            {{ session('success') }}
        </div>
    @endif
    <!-- Add a button in the center of the page -->
    <div class="p-4 bg-gray-100">

        <form method="POST" action="{{ route('login.magic') }}" class="p-4 bg-white rounded-md shadow-md">
            @csrf
            <fieldset class="flex flex-col">
                <label>
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </label>
                <input type="submit" value="Ingresar Con Link en Email" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-4 px-6 rounded justify-center">
            </fieldset>
        </form>
    </div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="p-4 bg-gray-100">
        <form method="POST" action="{{ route('login') }}" class="p-4 bg-white rounded-md shadow-md">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }} con email y contraseña
            </x-primary-button>
        </div>
    </form>
    </div>
</x-guest-layout>
