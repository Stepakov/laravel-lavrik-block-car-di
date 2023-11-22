@props([
    'model',
    'model_id'
    ])

<x-form action="{{ route( 'comments.store' ) }}" method="POST" class="col-5">
    <x-form-input type="hidden" name="model_id" :value="$model_id" />
    <x-form-input  type="hidden" name="model" :value="$model" />
    <x-form-textarea name="text" label="Comment:" />

    <div>
        <button class="btn btn-success mt-3">Comment</button>
    </div>
</x-form>
