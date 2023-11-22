<x-layouts.main title="Cars">

    <div>
        <a class="btn btn-primary mb-3" href="{{ route( 'cars.index' ) }}">Back to Cars</a>
    </div>
    <hr>

    <x-form action="{{ route( 'cars.store') }}" method="POST">
        @include( 'cars.form' )

        <button class="btn btn-success mt-3">
            Create Car
        </button>
    </x-form>



</x-layouts.main>
