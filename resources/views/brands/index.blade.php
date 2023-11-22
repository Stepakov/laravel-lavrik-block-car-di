<x-layouts.main title="Brands">

    <div>
        <a class="btn btn-success mb-3" href="{{ route( 'brands.create' ) }}">Create Brand</a>
    </div>
    <hr>

    <div>
        <a class="btn btn-primary mb-3" href="{{ route( 'brands.trashed' ) }}">Trashed Brands</a>
    </div>
    <hr>

    @foreach( $brands as $brand )
        <div class="mt-3">
            {{ $brand->id }} - {{ $brand->title }} - {{ $brand->country->title }}
            | <a href="{{ route( 'brands.show', $brand->id ) }}">Read More</a>
            | <a href="{{ route( 'brands.edit', $brand->id) }}">Edit</a>
            <x-form @style( [ 'display: inline-block' ] ) action="{{ route( 'brands.destroy', $brand->id ) }}" method="DELETE">
                <button class="btn btn-danger">Delete</button>
            </x-form>
        </div>
    @endforeach

</x-layouts.main>
