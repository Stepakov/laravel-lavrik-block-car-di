@props([
    'model',
    ])

@foreach( $model->comments as $comment )
    <div class="alert alert-success">
        {{ $comment->text }}
    </div>
@endforeach
