<x-layouts.main :meta="$record->meta ?? false">
    @if(!empty($record->builder->content))
        @foreach(array_keys($record->builder->content) as $section)
            @if(!empty($record->builder->content[$section]))
                <div data-content="{{ $section }}">
                    <x-filament-builder::sections :sections="$record->builder->content[$section]" />
                </div>
            @endif
        @endforeach
    @endif
</x-layouts.main>
