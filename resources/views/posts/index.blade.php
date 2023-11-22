<x-layouts.main title="Posts">

    <div>
        <a class="btn btn-success mb-3" href="{{ route( 'posts.create' ) }}">Create Post</a>
    </div>
    <hr>

    @foreach( $posts as $post )
        <div class="mt-3">
            {{ $post->id }} - {{ $post->title }}
            | <a href="{{ route( 'posts.show', $post->id ) }}">Read More</a>
            @can( 'update', $post )
            | <a href="{{ route( 'posts.edit', $post->id) }}">Edit</a>
            <x-form @style( [ 'display: inline-block' ] ) action="{{ route( 'posts.destroy', $post->id ) }}" method="DELETE">
                <button class="btn btn-danger">Delete</button>
            </x-form>
            @endcan
        </div>
    @endforeach

</x-layouts.main>
