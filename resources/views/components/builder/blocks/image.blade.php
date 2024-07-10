@props([
    'image' => null,
    'placeholder' => true,
    'classes' => ''
])

@php
    $imageUrl = $image ? Illuminate\Support\Facades\Storage::url($image) : ($placeholder ? '/img/placeholder.png' : null);
@endphp

@if($imageUrl)
    <img {{ $attributes->class(['image object-cover', $classes]) }} src="{{ $imageUrl }}" alt="">
@endif
