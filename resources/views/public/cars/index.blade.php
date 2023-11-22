<x-layouts.guest title="Cars">

    @foreach( $cars as $car )
        <div class="mt-3">
            {{ $car->id }} - {{ $car->brand->title }} {{ $car->model }} {{ $car->price }}
            {{ $car->brand->country->title }}
            {{ $car->vin }}
            Tags: {{ $car->tags->pluck( 'title' )->implode( ', ') }}
            | <a href="{{ route( 'public.cars.show', $car->id ) }}">Read More</a>
{{--            | <a href="{{ route( 'cars.edit', $car->id) }}">Edit</a>--}}
{{--            @if( ! $car->cantDelete )--}}
{{--            <x-form @style( [ 'display: inline-block' ] ) action="{{ route( 'cars.destroy', $car->id ) }}" method="DELETE">--}}
{{--                <button class="btn btn-danger">Delete</button>--}}
{{--            </x-form>--}}
{{--            @endif--}}
        </div>
    @endforeach

</x-layouts.guest>
