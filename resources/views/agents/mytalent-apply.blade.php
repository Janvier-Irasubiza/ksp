<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My talent') }}
        </h2>
    </x-slot>

    <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="table-responsive flex justify-center">
                            <div class="w-90 py-6 bg-white shadow-md overflow-hidden sm:rounded-lg">
                                
                                @if(session('status'))
                                    <div class="py-2 px-3 bg-green-200 text-green-900 mb-4 rounded-md" style="background: #1affa3">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                @if(session('error'))
                                    <div class="py-2 px-3 bg-green-200 text-green-900 mb-4 rounded-md color-white" style="background: #ff4d4d">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                <div class="flex-section gap-5">
                                    @include('mytalent.partials.form')
                                </div>

                                <div id="aboutModal" class="modal">
                                    <div class="modal-content">
                                        <span class="close">&times;</span>
                                        @include('mytalent.partials.info')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</x-app-layout>