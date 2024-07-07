@section('title', 'MY TALENT REGISTRATION')

<x-apply-layout>
    <div class="flex-section gap-5">

        <div class="about w-full">
            @include('mytalent.partials.info')
        </div>

        @include('mytalent.partials.form')

    </div>

    <div id="aboutModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            @include('mytalent.partials.info')
        </div>
    </div>

</x-apply-layout>
