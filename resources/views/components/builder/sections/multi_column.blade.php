@props([
    'columns'=> [],
    'heading_level'=> 'h2',
    'heading_size'=> 'h2',
    'heading_text'=> null,
    'image_width'=> 'full',
    'image_ratio'=> 'adapt',
    'columns_desktop'=> '3',
    'column_alignment'=> 'left',
    'button',
    'columns_mobile'=> '1',
    'swipe_on_mobile'=> false,
    'classes' => []
])

@php
    $classes['image'] = match($image_width) {
        'third' => 'w-1/3 ',
        'half' => 'w-1/2 ',
        default => 'w-full '
    };

    $classes['image'] .= match($image_ratio) {
        'portrait' => 'aspect-[4/3]',
        'square' => 'aspect-square',
        'circle' => 'aspect-square rounded-full',
        default => '',
    };

    $columnAlignmentClasses = match($column_alignment) {
        'left' => 'items-start text-left',
        default => 'items-center text-center',
    };
@endphp

<section class="my-10 sm:my-15 md:my-20 relative">
    <div class="container">
        <x-builder.blocks.heading
            class="mb-10"
            :heading_level="$heading_level"
            :heading_size="$heading_size"
            :heading_text="$heading_text"
        />
        @if(!empty($columns))
            <div @class(['grid gap-5 sm:gap-10  grid-cols-'.$columns_mobile.'  md:grid-cols-'.$columns_desktop, $columnAlignmentClasses])>
                @foreach($columns as $column)
                    <div class="flex flex-col gap-y-5 max-sm:px-5 p-10 bg-white bg-opacity-5">
                        @foreach ($column['blocks'] as $block)
                            <x-render-block
                                :block="$block"
                                :classes="array_key_exists($block['type'], $classes) ? $classes[$block['type']] : ''"
                            />
                        @endforeach
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
