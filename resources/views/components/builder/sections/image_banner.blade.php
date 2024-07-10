@props([
    'blocks' => [],
    'image' => null,
    'full_width' => true,
    'stack_images_on_mobile' => true,
    'show_text_box_desktop' => true,
    'image_height' => 'adapt',
    'desktop_content_alignment' => 'center',
    'mobile_content_alignment' => 'center',
    'image_overlay_opacity' => '0',
    'desktop_content_position' => 'middle-center',
    'desktop_image_position' => 'middle-center',
    'mobile_image_position' => 'middle-center',
])

@php
    $textBoxDesktopClasses = $show_text_box_desktop ? 'md:px-10 md:bg-[#161616] ' : '';

    $imageHeightClasses = match($image_height) {
        'small' => 'md:h-[31.4rem]',
        'medium' => 'md:h-[46rem]',
        'large' => 'md:h-[69.5rem]',
        'screen' => 'md:h-screen',
        default => 'md:h-[30rem]',
    };

    $desktopClasses = match($desktop_content_alignment) {
        'left' => 'md:items-start md:text-left',
        'right' => 'md:items-end md:text-right',
        default => 'md:items-center md:text-center',
    };

    $mobileClasses = match($mobile_content_alignment) {
        'left' => 'items-start text-left',
        'right' => 'items-end text-right',
        default => 'items-center text-center',
    };

     $desktopImagePositionClasses = match($desktop_image_position) {
        'top-left' => 'md:object-left-top',
        'top-center' => 'md:object-top',
        'top-right' => 'md:object-right-top',
        'middle-left' => 'md:object-left',
        'middle-right' => 'md:object-right',
        'bottom-left' => 'md:object-left-bottom',
        'bottom-center' => 'md:object-bottom',
        'bottom-right' => 'md:object-right-bottom',
        default => 'md:object-center',
    };

      $mobileImagePositionClasses = match($mobile_image_position) {
        'top-left' => 'object-left-top',
        'top-center' => 'object-top',
        'top-right' => 'object-right-top',
        'middle-left' => 'object-left',
        'middle-right' => 'object-right',
        'bottom-left' => 'object-left-bottom',
        'bottom-center' => 'object-bottom',
        'bottom-right' => 'object-right-bottom',
        default => 'md:object-center',
    };

    $desktopContentPositionClasses = match($desktop_content_position) {
        'top-left' => 'md:justify-start md:items-start',
        'top-center' => 'md:justify-center md:items-start',
        'top-right' => 'md:justify-end md:items-start',
        'middle-left' => 'md:justify-start md:items-center',
        'middle-right' => 'md:justify-end md:items-center',
        'bottom-left' => 'md:justify-start md:items-end',
        'bottom-center' => 'md:justify-center md:items-end',
        'bottom-right' => 'md:justify-end md:items-end',
        default => 'md:justify-center md:items-center',
    };

@endphp

@if(!empty($blocks))
    <section @class(['relative py-10 sm:py-15 md:py-20 group-[.swiper-slide]:!py-0', $imageHeightClasses])>
        <div
            class="md:absolute max-md:h-[31.4rem] left-0 top-0 z-[-2] h-full w-full flex max-md:relative">
            <x-builder.blocks.image
                @class(['h-full w-full object-cover',$desktopImagePositionClasses,$mobileImagePositionClasses])
                :image="$image"
                :placeholder="true"
            />
            <div
                class="absolute left-0 top-0 h-full w-full bg-gradient-to-t from-body via-body via-15% to-body/[0.94]"
                style="opacity: {{$image_overlay_opacity .'%'}}"
            ></div>
        </div>
        <div class="container h-full">
            <div @class(['h-full flex ', $desktopContentPositionClasses])>
                <div @class(['flex py-10 sm:py-14 flex-col gap-y-5 group', $desktopClasses, $mobileClasses, $textBoxDesktopClasses])>
                    <x-render-blocks :blocks="$blocks" />
                </div>
            </div>
        </div>
    </section>
@endif
