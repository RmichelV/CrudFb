<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Last_Name -->
        <div>
            <x-input-label for="name" :value="__('Apellido')" />
            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        
        <!-- cellphone-->
        <div>
            <x-input-label for="cellphone" :value="__('Celular')" />
            <x-numeric-input
                id="cellphone"
                class="block mt-1 w-full"
                name="cellphone"
                :value="old('cellphone')"
                required
                autofocus
                autocomplete="cellphone"
                :min="'61111111'"
                :max="'79999999'"
                :maxLength="8"
                :minLength="8"
                />
            <x-input-error :messages="$errors->get('cellphone')" class="mt-2" />
        </div>
        <!-- identity_number-->
        <div>
            <x-input-label for="identity_number" :value="__('Carnet')" />
            <x-numeric-input
                id="cellphone"
                class="block mt-1 w-full"
                name="identity_number"
                :value="old('identity_number')"
                required autofocus
                autocomplete="identity_number"
                :min="'10000'"
                :max="'999999999'"
                :maxLength="9"
                :minLength="5"
                />
            <x-input-error :messages="$errors->get('cellphone')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="gender" :value="__('Género')" />
            <select name="gender" id="gender" required class="mt-1 w-full">
                <option disabled selected>Seleccione una opción</option>
                <option value="Femenino">Femenino</option>
                <option value="Masculino">Masculino</option>
            </select>   
        </div>
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Registrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
