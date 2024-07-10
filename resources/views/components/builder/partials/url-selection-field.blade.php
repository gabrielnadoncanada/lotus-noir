@props(['action'])

@if($action['type'])
    @if($action['type'] !== 'External')
        @php
            $post = app($action['type'])->find($action['data']['url']);
            if($post)
                $action['data']['url'] = $post->getPublicUrl();
        @endphp
    @endif
    <x-button :href="$action['data']['url']" :newTab="$action['data']['target'] === '_blank'" {{$attributes}}>
        {!! $action['data']['label'] !!}
    </x-button>
@endif
