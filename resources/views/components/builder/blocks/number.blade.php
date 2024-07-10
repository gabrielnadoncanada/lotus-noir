@props([
    'number' => null,
    'classes' => ''
])

@if($number)
    <div class="numbering" data-block="number">
        <div {{$attributes->class(['border-text text-7xl/[0.8] font-black',$classes])}}>
            {{$number}}
        </div>
    </div>
@endif
