<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">

    <!-- Primary Navigation Menu -->
    <div class="">
        <div class="flex justify-between h-16 border-b mb-4">
            <div class="flex p-0">

                <!-- Navigation Links -->
                <div class="space-x-8 sm:-my-px ms-4 sm:flex">
                    <x-nav-link :href="route('edu-apps')" :active="request()->routeIs('dashboard') || request()->routeIs('edu-apps')">
                        {{ __('Educational Apps') }}
                    </x-nav-link>

                    <x-nav-link :href="route('mytalent')" :active="request()->routeIs('mytalent')">
                        {{ __('My talent') }}
                    </x-nav-link>
                    
                </div>
            </div>
        </div>
    </div>

</nav>
