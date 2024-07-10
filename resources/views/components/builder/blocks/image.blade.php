@php
    use Illuminate\Support\Facades\Storage;
@endphp

@props([
    'desktopImage' => null,
    'mobileImage' => null,
    'alt' => '',
    'placeholder' => false,
    'classes' => ''
])

@php
    $desktopImage = $desktopImage ? Storage::url($desktopImage) : null;
    $mobileImage = $mobileImage ? Storage::url($mobileImage) : $desktopImage;

    if ($placeholder && !$desktopImage && !$mobileImage) {
        $desktopImage = $mobileImage = '/img/placeholder.png';
    }

    if (!$desktopImage && $mobileImage) {
        $desktopImage = $mobileImage;
    }
@endphp

@if($desktopImage)
    <picture class="w-full h-full" data-block="image">
        <source srcset="{{ $desktopImage }}" media="(min-width: 769px)" type="image/webp">
        <source srcset="{{ $mobileImage }}" media="(max-width: 768px)" type="image/webp">
        <img {{ $attributes->class(['image object-cover', $classes]) }} src="{{ $desktopImage }}" alt="{{ $alt }}">
    </picture>
@endif
