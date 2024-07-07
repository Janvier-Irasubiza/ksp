<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Agents') }}
        </h2>
    </x-slot>

    <div class="py-4 flex justify-center">
        <div class="w-full sm:max-w-xl px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

            @if(session('status'))
                <div class="py-2 px-3 bg-green-200 text-green-900 mb-4 rounded-md" style="background: #1affa3">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('new-agent') }}">
                @csrf

                <div>
                    <x-input-label for="promo_code" :value="__('Promo code')" />
                    <x-text-input id="promo_code" class="block mt-1 w-full" type="text" name="promo_code" :value="old('promo_code')" required autofocus autocomplete="promo_code" placeholder="Promo code" />
                    <x-input-error :messages="$errors->get('promo_code')" class="mt-2" />
                </div>

                <!-- Name -->
                <div class="mt-4">
                    <x-input-label for="name" :value="__('Names')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Names" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="phone" :value="__('Phone number')" />
                    <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" placeholder="Phone number" />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="address" :value="__('Address')" />
                    <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="promo_code" placeholder="Address" />
                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                </div>

                <div class="flex items-center justify-start mt-4">
                    <x-primary-button class="">
                        {{ __('Create account') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
