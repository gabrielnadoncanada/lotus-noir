@props([
    'heading_level' => 'h2',
    'heading_size' => 'h2',
    'heading_text' => null,
    'classes' => ''
])

@if($heading_text)
    <x-text
        {{$attributes->class([$classes])}}
        :as="$heading_level"
        :theme="$heading_size">
        {{$heading_text}}
    </x-text>
@endif
