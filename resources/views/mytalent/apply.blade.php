@section('title', 'MY TALENT REGISTRATION')

<x-mt-apply-layout>
    <div class="flex-section gap-5">

        <div class="about w-full">
            @include('mytalent.partials.info')
        </div>

        @include('mytalent.partials.form')

    </div>

    <div id="aboutModal" class="modal">
        <div class="modal-content">
            @include('mytalent.partials.info')
        </div>
    </div>

</x-mt-apply-layout>
