<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="">
        <div class="flex justify-between h-16 border-b mb-4">
            <div class="flex p-0">
                <div class="space-x-8 sm:-my-px ms-4 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('admin.edu-apps') || request()->routeIs('dashboard')">
                        {{ __('Educational Apps') }}
                    </x-nav-link>

                    <x-nav-link :href="route('admin.mytalent')" :active="request()->routeIs('admin.mytalent')">
                        {{ __('My Talent Apps') }}
                    </x-nav-link>
                </div>
            </div>
        </div>
    </div>
</nav>
