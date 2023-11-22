<x-layouts.main title="Cars">

    <div>
        <a class="btn btn-success mb-3" href="{{ route( 'cars.create' ) }}">Create Car</a>
    </div>
    <hr>

    <div>
        <a class="btn btn-primary mb-3" href="{{ route( 'cars.trashed' ) }}">Trashed Cars</a>
    </div>
    <hr>

    @foreach( $cars as $car )
        <div class="mt-3">
            {{ $car->id }} - {{ $car->brand->title }} {{ $car->model }} {{ $car->price }}
            {{ $car->brand->country->title }}
            {{ $car->vin }}
            {{ $car->status->text() }}
            Tags: {{ $car->tags->pluck( 'title' )->implode( ', ') }}
            | <a href="{{ route( 'cars.show', $car->id ) }}">Read More</a>
            @can( 'cars' )
            | <a href="{{ route( 'cars.edit', $car->id) }}">Edit</a>
            @endcan
            @if( ! $car->cantDelete )
            <x-form @style( [ 'display: inline-block' ] ) action="{{ route( 'cars.destroy', $car->id ) }}" method="DELETE">
                <button class="btn btn-danger">Delete</button>
            </x-form>
            @endif
        </div>
    @endforeach

    -----
    <x-menuitem href="href" text="My text" icon="@icon(user)" />






</x-layouts.main>
