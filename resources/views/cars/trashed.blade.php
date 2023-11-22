<x-layouts.main title="Trashed Cars">

    <div>
        <a class="btn btn-success mb-3" href="{{ route( 'cars.index' ) }}">Back to Cars</a>
    </div>
    <hr>

    @foreach( $cars as $car )
        <div class="mt-3">
            {{ $car->id }} - {{ $car->brand }} {{ $car->model }} {{ $car->price }}
            {{ $car->vin }}
{{--            | <a href="{{ route( 'cars.show', $car->id ) }}">Read More</a>--}}
{{--            | <a href="{{ route( 'cars.edit', $car->id) }}">Edit</a>--}}
            <x-form @style( [ 'display: inline-block' ] ) action="{{ route( 'cars.restore', $car->id ) }}" method="PUT">
                <button class="btn btn-primary">Restore</button>
            </x-form>
            <x-form @style( [ 'display: inline-block' ] ) action="{{ route( 'cars.force-delete', $car->id ) }}" method="DELETE">
                <button class="btn btn-danger">Force Delete</button>
            </x-form>
        </div>
    @endforeach

</x-layouts.main>
