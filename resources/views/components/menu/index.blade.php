@props(['items'])

<ul {{ $attributes->merge(['class' => $theme()]) }}>
    @foreach($items as $item)
        <x-menu-item
            theme="{{!empty($item['children']) ? 'submenu' : 'default'}}"
            :item="$item" />
    @endforeach
</ul>
