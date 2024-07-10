@props([
    'buttons' => [],
    'classes' => ''
])

@if(!empty($buttons))
    <div class='flex flex-col sm:flex-row ' data-block="buttons">
        @foreach($buttons as $button)
            <x-builder.blocks.button
                :classes="$classes"
                :action="$button['action']"
                :style="$button['style']"
            />
        @endforeach
    </div>
@endif
