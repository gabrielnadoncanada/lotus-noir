<section class="mb-[75px] pt-[100px] md:mb-[100px] md:pt-[140px]">
    <div class="absolute left-0 top-0 z-[-2] h-[550px] w-full">
        <x-blocks.fields.image
            class="h-[550px] w-full object-cover object-center"
            :image="$image"
        />
        <div
            class="absolute left-0 top-0 h-[555px] w-full bg-gradient-to-t from-body via-body via-15% to-body/[0.94]"
        ></div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="grid w-full grid-cols-1 gap-y-5 text-center">
                <x-text :as="$subtitle_level" theme="subtitle.center">
                    {{$subtitle_text}}
                </x-text>

                <x-text
                    class="md:mb-[10px]"
                    :split="true"
                    :as="$heading_level"
                    :text="$heading_text"
                    :theme="$heading_size"/>


                <x-text as="div" class="max-w-[650px] mx-auto mb-[10px]">
                    {!! $text !!}
                </x-text>
                <x-blocks.fields.buttons :buttons="$buttons" />
            </div>
        </div>
    </div>
</section>
