<x-layouts.main title="Brand Update">

    <div>
        <a class="btn btn-primary mb-3" href="{{ route( 'brands.index' ) }}">Back to Brands</a>
    </div>
    <hr>

    <x-form action="{{ route( 'brands.update', $brand->id ) }}" method="PUT">
        @bind( $brand )
            @include( 'brands.form' )
        @endbind

        <button class="btn btn-success mt-3">
            Update Brand
        </button>
    </x-form>



</x-layouts.main>
