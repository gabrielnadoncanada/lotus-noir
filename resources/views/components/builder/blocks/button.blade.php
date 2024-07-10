@props([
    'action' => [],
    'style' => 'primary',
    'classes' => ''
])

@if(!empty($action))
    <div class="mt-2.5" data-block="button">
        @if($action['type'])
            @if($action['type'] !== 'External')
                @php
                    $post = app($action['type'])->find($action['data']['url']);
                    if($post)
                        $action['data']['url'] = $post->getPublicUrl();
                @endphp
            @endif
            <x-button
                {{$attributes->class([$classes])}}
                :theme="$style"
                :href="$action['data']['url']"
                :newTab="$action['data']['target'] === '_blank'">
                {!! $action['data']['label'] !!}
            </x-button>
        @endif
    </div>
@endif
