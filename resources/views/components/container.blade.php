@props([
    'fluid' => false
])

<div {{ $attributes->merge(['class' => $fluid ? 'container-fluid' : 'container']) }}>
    {{ $slot }}
</div>
