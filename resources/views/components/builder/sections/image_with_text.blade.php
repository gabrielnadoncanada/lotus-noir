@props([
    'image' => null,
    'desktop_height' => 'adapt',
    'desktop_image_width' => 'medium',
    'layout' => 'image-first',
    'desktop_content_position' => 'middle',
    'desktop_content_alignment' => 'left',
    'mobile_content_alignment' => 'left',
])

@php
    $desktopHeightClasses = match($desktop_height) {
        'small' => 'h-[31.4rem]',
        'medium' => 'h-[46rem]',
        'large' => 'h-[69.5rem]',
        default => 'h-[30rem]',
    };

    $desktopImageWidthClasses = match($desktop_image_width) {
        'small' => 'md:col-span-4',
        'large' => 'md:col-span-8',
        default => 'md:col-span-6',
    };

     $desktopTextWidthClasses = match($desktop_image_width) {
        'small' => 'md:col-span-8',
        'large' => 'md:col-span-4',
        default => 'md:col-span-6',
    };

    $layoutClasses = match($layout) {
        'text-first' => 'order-last',
        default => 'order-first',
    };

    $desktopContentPositionClasses = match($desktop_content_position) {
        'top' => 'md:justify-start',
        'bottom' => 'md:justify-end',
        default => 'md:justify-center',
    };

    $desktopContentAlignmentClasses = match($desktop_content_alignment) {
        'center' => 'md:text-center',
        'right' => 'md:text-right',
        default => 'md:text-left',
    };

    $mobileContentAlignmentClasses = match($mobile_content_alignment) {
        'center' => 'text-center',
        'right' => 'text-right',
        default => 'text-left',
    };
@endphp

<section class="my-10 sm:my-15 md:my-20 relative" data-section="image-with-text">
    <div class="container max-md:px-0 ">
        <div class="grid md:grid-cols-12">
            <div @class([$desktopImageWidthClasses, $layoutClasses])>
                <x-builder.blocks.image
                    :placeholder="true"
                    @class(['w-full object-cover object-center', $desktopHeightClasses])
                    :image="$image"
                />
            </div>
            <div @class(['flex flex-col gap-y-5 max-sm:px-5 p-10 group', $desktopTextWidthClasses, $desktopContentPositionClasses, $desktopContentAlignmentClasses, $mobileContentAlignmentClasses])>
                <x-render-blocks :blocks="$blocks" />
            </div>
        </div>
    </div>
</section>
