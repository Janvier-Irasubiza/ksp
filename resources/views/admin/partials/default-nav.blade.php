<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="">
        <div class="flex justify-between h-16 border-b mb-4">
            <div class="flex p-0">
                <div class="space-x-8 sm:-my-px ms-4 sm:flex">
                    <x-nav-link :href="route('admin.edu-apps')" :active="request()->routeIs('admin.edu-apps') || request()->routeIs('dashboard')">
                        {{ __('Educational Apps') . '  (' . (request()->routeIs('admin.edu-apps') ? number_format(count($apps)) : number_format($EduApps)) . ')' }}
                    </x-nav-link>

                    <x-nav-link :href="route('admin.mytalent')" :active="request()->routeIs('admin.mytalent')">
                        {{ __('My Talent Apps' . '  (' . number_format($myTalentApps) . ')') }}
                    </x-nav-link>
                </div>
            </div>
        </div>
    </div>
</nav>
