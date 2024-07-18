@props([
    'text' => null,
    'classes' => '',
    'as' => 'div',
    'size' => 'default',
])

@if($text)
    <x-text
        data-block="text"
        :classes="$classes"
        :size="$size"
        :as="$as"
    >
        {!! $text !!}
    </x-text>
@endif
