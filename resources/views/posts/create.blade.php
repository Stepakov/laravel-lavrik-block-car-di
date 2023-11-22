<x-layouts.main title="Posts">

    <div>
        <a class="btn btn-primary mb-3" href="{{ route( 'posts.index' ) }}">Back to Posts</a>
    </div>
    <hr>

    <x-form action="{{ route( 'posts.store') }}" method="POST">
        @include( 'posts.form' )

        <button class="btn btn-success mt-3">
            Create Post
        </button>
    </x-form>



</x-layouts.main>
