<x-layouts.main :meta="$record->meta ?? false">
    @if(!empty($record->content['header_section']))
        <div data-content="header_section">
            <x-render-sections :sections="$record->content['header_section']" />
        </div>
    @endif @if(!empty($record->content['content_section']))
        <div data-content="content_section">
            <x-render-sections :sections="$record->content['content_section']" />
        </div>
    @endif @if(!empty($record->content['footer_section']))
        <div data-content="footer_section">
            <x-render-sections :sections="$record->content['footer_section']" />
        </div>
    @endif
</x-layouts.main>
