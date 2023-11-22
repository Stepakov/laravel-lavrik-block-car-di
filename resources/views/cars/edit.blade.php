<x-layouts.main title="Car Update">

    <div>
        <a class="btn btn-primary mb-3" href="{{ route( 'cars.index' ) }}">Back to Cars</a>
    </div>
    <hr>

    <x-form action="{{ route( 'cars.update', $car->id ) }}" method="PUT">
        @bind( $car )
            @include( 'cars.form' )
        @endbind

        <button class="btn btn-success mt-3">
            Update Car
        </button>
    </x-form>



</x-layouts.main>
