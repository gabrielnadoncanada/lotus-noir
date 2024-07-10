@props(['section']) @component("components.builder.sections.{$section['type']}",
$section['data'] ?? []) @endcomponent
