<x-layouts.main title="This is: {{ $post->title }}" h1="{{ $post->title }}">

    <div>
        <a class="btn btn-primary mb-3" href="{{ route( 'posts.index' ) }}">Back to Posts</a>
    </div>
    <hr>

    title: {{ $post->title }} <br>
    content: {{ $post->content }} <br>

    <x-comments.create model="post" model_id="{{ $post->id }}" />

    <x-comments.index :model="$post" />

</x-layouts.main>
