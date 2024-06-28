<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>NKUNGANIRE BURUSE KSP RWANDA APPLICATION FORM 2024
        </title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="styles.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">            
        <div class="min-h-screen w-100 flex mt-6 mb-6 flex-col sm:justify-center items-center sm:pt-0 bg-gray-100">
        <div class="flex flex-col sm:justify-center items-center">
            <div class="col-md-4">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-50 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', (event) => {
    // Get the modal
    var modal = document.getElementById("aboutModal");

    // Get the link that opens the modal
    var btn = document.querySelector(".about-btn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    btn.onclick = function(event) {
        event.preventDefault();
        modal.classList.add("show");
        setTimeout(() => {
            modal.style.display = "block";
        }, 10); // Delay to ensure the transition is applied
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.classList.remove("show");
        setTimeout(() => {
            modal.style.display = "none";
        }, 500); // Match the transition duration
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.classList.remove("show");
            setTimeout(() => {
                modal.style.display = "none";
            }, 500); // Match the transition duration
        }
    }
});

        </script>
    </body>
</html>
