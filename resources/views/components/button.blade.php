@props([
    'href' => null,
    'new_tab' => false,
    'has_arrow' => false,
])
<{{$href ? 'a' : 'button'}}
{{ $attributes->merge([
    'class' => $theme(),
    'type' => !$href ? 'submit' : null,
    'href' => $href ?: null,
    'target' => $new_tab ?: null,
    'rel' => $new_tab ? 'noopener noreferrer' : null,
])}}>
    {{ $slot }}
@if($has_arrow)
    <x-right-arrow width='35' height='22' />
@endif
</{{$href ? 'a' : 'button'}}


