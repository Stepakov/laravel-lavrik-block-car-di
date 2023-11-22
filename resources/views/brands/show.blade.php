<x-layouts.main title="This is: {{ $brand->title }}" h1="{{ $brand->title }}">

    <div>
        <a class="btn btn-primary mb-3" href="{{ route( 'brands.index' ) }}">Back to Cars</a>
    </div>
    <hr>

    Title: {{ $brand->title }} <br>

    <hr>
    <x-comments.create model="brand" model_id="{{ $brand->id }}" />

    <x-comments.index :model="$brand" />
    <hr>

    @foreach( $brand->cars as $car )
        <div>
            {{ $brand->title }} {{ $car->model }}
            | <a href="{{ route( 'cars.show', $car->id ) }}">Read More</a>
        </div>
    @endforeach

</x-layouts.main>
