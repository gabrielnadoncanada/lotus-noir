@props([
    'text' => null,
    'classes' => ''
])

@if($text)
    <x-text
        :classes="$classes"
        as="div"
    >
        {!! $text !!}
    </x-text>
@endif
