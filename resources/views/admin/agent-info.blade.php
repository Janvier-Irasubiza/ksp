<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="table-responsive">
                        <div class="card mb-4">
                            <div class="card-header-tab card-header py-3 d-flex items-center">
                                <div class="card-header-title font-size-lg font-weight-normal col-lg-7">
                                    {{ $agent -> name }}  <br>
                                    <p class="text-muted mb-0">{{ $agent -> email }} </p>
                                    <p class="text-muted mb-0">{{ $agent -> phone }}</p>
                                    <p class="text-muted mb-0 mt-3">Promo code: {{ $agent -> promo_code }}</p>

                                    </div>
                                    <div class="btn-actions-pane-right d-flex flex-row-reverse text-capitalize col-lg-5">

                                    <div class="widget-chart-content ml-2 px-3">
                                        <div class="widget-subheading">Balance <small>(RWF)</small></div>

                                        <div class="widget-numbers text-success mt-1 f2"><span style="font-weight: 600">{{ number_format($balance) }}</span></div>
                                    </div>

                                    <div class="icon-wrapper d-flex align-items-center justify-content-center">
                                        <div class="icon-wrapper-bg opacity-9 rounded-circle" style="background: #80ffaa; padding: 15px 17px">
                                            <i  class="fa-solid fa-wallet" style="font-size: 25px"></i>
                                        </div>
                                    </div>

                                </div>                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Profile Information') }}
                        </h2>
                    </header>

                    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                        @csrf
                    </form>

                    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')

                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $agent->name)" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $agent->email)" required autocomplete="username" />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>

                            @if (session('status') === 'profile-updated')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600"
                                >{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>
                </section>

                </div>
            </div>

            <!-- <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div> -->
        </div>
    </div>
</x-app-layout>