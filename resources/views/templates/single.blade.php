<x-layouts.main :meta="$record->meta ?? false">
  @if(!empty($record->content['header_section']))
  <x-render-sections :sections="$record->content['header_section']" />
  @endif @if(!empty($record->content['content_section']))
  <x-render-sections :sections="$record->content['content_section']" />
  @endif @if(!empty($record->content['footer_section']))
  <x-render-sections :sections="$record->content['footer_section']" />
  @endif
</x-layouts.main>
