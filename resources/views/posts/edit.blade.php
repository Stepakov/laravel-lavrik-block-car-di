<x-layouts.main title="Post Update">

    <div>
        <a class="btn btn-primary mb-3" href="{{ route( 'posts.index' ) }}">Back to Posts</a>
    </div>
    <hr>

    <x-form action="{{ route( 'posts.update', $post->id ) }}" method="PUT">
        @bind( $post )
            @include( 'posts.form' )
        @endbind

        <button class="btn btn-success mt-3">
            Update Post
        </button>
    </x-form>



</x-layouts.main>
