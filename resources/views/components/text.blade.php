@if($text || !$slot->isEmpty())
    <{{ $as }} {{ $attributes->class([$theme()]) }}>{{ $slot }}</{{ $as }}>
@endif
