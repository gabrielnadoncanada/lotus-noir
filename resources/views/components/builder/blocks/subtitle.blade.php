@props([
    'subtitle_text' => null,
    'subtitle_level' => 'span',
    'theme' => 'subtitle',
    'classes' => ''
])

@if($subtitle_text)
    <x-text
        data-block="subtitle"
        :as="$subtitle_level"
            :theme="$theme"
            {{$attributes->class(['flex uppercase font-semibold tracking-[2px] relative text-[11px] gap-3
            group-[.text-center]:flex-col group-[.text-right]:.flex-row-reverse group-[.text-left]:.flex-row
            group-[.md\:text-center]:md:!flex-col group-[.md\:text-left]:md:!flex-row group-[.md\:text-right]:md:!flex-row-reverse',$classes])}}>
        <span class=" bg-white w-[30px] h-[3px] mt-[5px] self-center mb-auto"></span>
        {{$subtitle_text}}
    </x-text>
@endif
