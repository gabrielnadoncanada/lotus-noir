@if($part1 || $part2 || $text || !$slot->isEmpty())
    <{{ $as }} {{ $attributes->merge(['class' => $theme()]) }}>
    @if ($split && ($part1 || $part2))
        <span>{!! $part1 !!}</span>
        @if ($part2)
            <span class="border-text block">{!! $part2 !!}</span>
        @endif
    @else
        {{ $slot }}
    @endif
    </{{ $as }}>
@endif
