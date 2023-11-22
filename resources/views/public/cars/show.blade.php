<x-layouts.guest title="This is: {{ $car->brand->title }} {{ $car->model }}" h1="{{ $car->brand->title }} {{ $car->model }}">

    <div>
        <a class="btn btn-primary mb-3" href="{{ route( 'public.cars.index' ) }}">Back to Cars</a>
    </div>
    <hr>

    Brand: {{ $car->brand->title }} <br>
    Model: {{ $car->model }} <br>
    Price: {{ $car->price }} <br>
    Transmission: {{ config( 'app-car.transmissions' )[ $car->transmission ] }} <br>
    Vin-номер: {{ $car->vin }} <br>
    Tags: {{ $car->tags->pluck( 'title' )->implode( ', ' ) }}

    <hr>

    <x-comments.create model="car" model_id="{{ $car->id }}" />

    <x-comments.index :model="$car" />

</x-layouts.guest>
