<x-layouts.main title="Trashed Brands">

    <div>
        <a class="btn btn-success mb-3" href="{{ route( 'brands.index' ) }}">Back to Brands</a>
    </div>
    <hr>

    @foreach( $brands as $brand )
        <div class="mt-3">
            {{ $brand->id }} - {{ $brand->title }}
            <x-form @style( [ 'display: inline-block' ] ) action="{{ route( 'brands.restore', $brand->id ) }}" method="PUT">
                <button class="btn btn-primary">Restore</button>
            </x-form>
            <x-form @style( [ 'display: inline-block' ] ) action="{{ route( 'brands.force-delete', $brand->id ) }}" method="DELETE">
                <button class="btn btn-danger">Force Delete</button>
            </x-form>
        </div>
    @endforeach

</x-layouts.main>
