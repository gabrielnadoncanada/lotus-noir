@props([
    'text' => null,
    'classes' => ''
])

@if($text)
    <x-text
        data-block="text"
        :classes="$classes"
        as="div"
    >{!! $text !!}</x-text>
@endif
