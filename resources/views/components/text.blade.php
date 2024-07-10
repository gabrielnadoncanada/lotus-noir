@if($part1 || $part2 || $text || !$slot->isEmpty())
    <{{ $as }} {{ $attributes->class([$theme(), $classes]) }}>
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
