@props(['block', 'classes'=> ''])
@php
    $block['data']['classes'] = $classes;
@endphp
@component("components.builder.blocks.{$block['type']}",$block['data']?? []) @endcomponent
