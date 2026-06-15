<x-guest-layout>
    <div class="w-full max-w-4xl mx-auto bg-white shadow-md rounded-lg p-8">

        <h2 class="text-3xl font-bold mb-6">
            Register
        </h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- ユーザー名 -->
            <div>
                <x-input-label for="user_name" value="Name（ユーザー名）" />

                <x-text-input id="user_name"
                    class="block mt-1 w-full"
                    type="text"
                    name="user_name"
                    :value="old('user_name')"
                    required />
                <x-input-error :messages="$errors->get('user_name')" class="mt-2" />
            </div>

            <!-- 名前（漢字） -->
            <div class="mt-4">
                <x-input-label for="name_kanji" value="名前（漢字）" />

                <x-text-input id="name_kanji"
                    class="block mt-1 w-full"
                    type="text"
                    name="name_kanji"
                    :value="old('name_kanji')"
                    required />
                <x-input-error :messages="$errors->get('name_kanji')" class="mt-2" />
            </div>

            <!-- 名前（カナ） -->
            <div class="mt-4">
                <x-input-label for="name_kana" value="名前（カナ）" />

                <x-text-input id="name_kana"
                    class="block mt-1 w-full"
                    type="text"
                    name="name_kana"
                    :value="old('name_kana')"
                    required />
                <x-input-error :messages="$errors->get('name_kana')" class="mt-2" />
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

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ms-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>

    </div>

</x-guest-layout>