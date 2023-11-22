<x-layouts.main title="Brands">

    <div>
        <a class="btn btn-primary mb-3" href="{{ route( 'brands.index' ) }}">Back to Brands</a>
    </div>
    <hr>

    <x-form action="{{ route( 'brands.store') }}" method="POST">
        @include( 'brands.form' )

        <button class="btn btn-success mt-3">
            Create Brand
        </button>
    </x-form>



</x-layouts.main>
