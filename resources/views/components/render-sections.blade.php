@props(['sections'])
@foreach ($sections as $section)
    <x-render-section :section="$section" />
@endforeach
