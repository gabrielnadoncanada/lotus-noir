@props([
    'rows' => [],
    'desktop_image_height' => 'adapt',
    'desktop_image_width' => 'medium',
    'layout' => 'image-first',
    'desktop_content_position' => 'middle',
    'desktop_content_alignment' => 'left',
    'mobile_content_alignment' => 'left',
    'desktop_image_alignment' => 'alternate_left',
])

@php
    $desktopImageHeightClasses = match($desktop_image_height) {
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

    $desktopImageAlignmentClasses = match($desktop_image_alignment) {
        'alternate_right' => 'group-even:md:order-last',
        'left' => 'md:order-first',
        'right' => 'md:order-last',
        default => 'group-odd:md:order-last',
    };

    $mobileContentAlignmentClasses = match($mobile_content_alignment) {
        'center' => 'text-center',
        'right' => 'text-right',
        default => 'text-left',
    };
@endphp

@if(!empty($rows))
    <section class="my-10 sm:my-15 md:my-20 relative">
        <div class="container max-md:px-0">
            <div class="flex flex-col md:gap-y-10">
                @foreach($rows as $row)
                    <div @class(['grid md:grid-cols-12 group ',$desktopImageWidthClasses]) >
                        <div @class([$desktopImageAlignmentClasses, $desktopImageWidthClasses])>
                            <x-builder.blocks.image
                                :placeholder="true"
                                @class(['w-full object-cover object-center', $desktopImageHeightClasses])
                                :image="$row['image']" />
                        </div>
                        <div @class(['flex flex-col gap-y-5 max-sm:px-5 p-10 group', $desktopTextWidthClasses, $desktopContentPositionClasses, $desktopContentAlignmentClasses, $mobileContentAlignmentClasses])>
                            <x-render-blocks :blocks="$row['blocks']" />
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
