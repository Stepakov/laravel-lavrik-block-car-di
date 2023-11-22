@props([
    'text',
    'href',
    'icon'
    ])

<a href="{{ $href }}">
    {{ $icon }}
    <span>
        {{ $text }}
    </span>
</a>
