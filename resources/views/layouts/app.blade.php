<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('styles.css') }}?v={{ filemtime(public_path('styles.css')) }}">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow-sm">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="py-6 mb-8">
                {{ $slot }}
            </main>

            <footer class="bg-gray-200 py-4 border-t">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between">
                    <p class="text-center text-gray-600">&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
                    <button id="contactButton"  class="text-center text-gray-600 shake"> <i class="fa-solid fa-code"></i> &nbsp; <strong>RB-A</strong></button>
                </div>
            </footer>

            <div id="popup" class="popup p-4 border col-md-6 bg-gray-200">
                <div class="flex justify-between">
                    <h1 class="text-gray-600">RhythmBox Associations</h1>
                    <button id="closePopup">Close</button>
                </div>
                <div class="mt-4 flex-section gap-3">
                   <div class="col-md-4 border-r mb-8">
                   <h2 class="text-gray-600 text-center">Contact</h2>
                    <div class="mt-6">

                        <p class="text-center">
                            <i class="fa-solid fa-phone f-25"></i>
                        </p>
                        <p class="text-gray-600 text-center mt-2">+250 781 336 634</p>
                    </div>
                    <div class="mt-6">
                        <p class="text-center">
                            <i class="fa-solid fa-phone f-25"></i>
                        </p>
                        <p class="text-gray-600 text-center mt-2">+250 780 478 405</p>
                    </div>

                    <div class="mt-6">
                        <p class="text-center">
                            <i class="fa-solid fa-envelope f-25"></i>
                        </p>
                        <p class="text-gray-600 text-center mt-2">arhythmbox@gmail.com</p>
                    </div>

                   </div>
                   <div class="w-full">
                   <h2 class="text-gray-600">Send us a message</h2>
                    <form action="{{ route('send.email') }}" method="POST" class="mt-3" id="contactForm">
                        @csrf
                        <div>
                            <x-input-label for="name" class="f-14" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="How can we address you?" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-3">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" placeholder="Email" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- phone number -->
                        <div class="mt-3">
                            <x-input-label for="phone" :value="__('Message')" />
                            <textarea id="request" class="block mt-1 w-full border-gray rounded" name="request" required placeholder="Message">{{ old('requests') }}</textarea>
                            <x-input-error :messages="$errors->get('request')" class="mt-2" />
                        </div>

                        <div id="messageDiv" class="mt-3"></div>

                        <div class="mt-6 flex items-center justify-between">

                            <x-primary-button class="">
                                {{ __('Send message') }}
                            </x-primary-button>
                        </div>
                    </form>
                   </div>
                </div>
            </div>

        </div>

        <script type="text/javascript">

            $(document).ready(function() {
                function toggleShakeAnimation(enableShake) {
                    if (enableShake) {
                        $('#contactButton').addClass('shaking');
                    } else {
                        $('#contactButton').removeClass('shaking');
                    }
                }

                $('#contactButton').click(function() {
                    $('#popup').slideDown();
                    toggleShakeAnimation(false);
                });

                $('#closePopup').click(function() {
                    $('#popup').slideUp();
                    toggleShakeAnimation(true);
                });

                toggleShakeAnimation(true);
            });

            $(document).ready(function() {
                $('#contactForm').submit(function(e) {
                    e.preventDefault();
                    var formData = $(this).serialize();
                    var $submitButton = $(this).find('button[type="submit"]');
                    var originalButtonText = $submitButton.html();
                    $submitButton.prop('disabled', true).html('Sending...');

                    $.ajax({
                        type: 'POST',
                        url: $(this).attr('action'),
                        data: formData,
                        dataType: 'json',
                        success: function(response) {
                            $('#messageDiv').html('<p class="text-green-600">Message sent successfully. We will reach out to you shortly.</p>');
                            $('#contactForm').trigger('reset');
                        },
                        error: function(xhr, status, error) {
                            $('#messageDiv').html('<p class="text-red-600">Failed to send message. Please try again later.</p>');
                        },
                        complete: function() {
                        $submitButton.prop('disabled', false).html(originalButtonText);
                    }
                    });
                });
            });

        </script>
        
    </body>
</html>
