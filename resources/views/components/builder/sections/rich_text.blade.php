@props([
    'blocks' => [],
    'full_width' => true,
    'desktop_content_alignment' => 'center',
    'mobile_content_alignment' => 'center',
])

@php
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
@endphp

@if(!empty($blocks))
    <section class="my-10 sm:my-15 md:my-20 relative" data-section="rich-text">
        <div class="container">
            <div @class(['flex flex-col gap-y-5 group', $desktopClasses, $mobileClasses])>
                <x-render-blocks :blocks="$blocks" />
            </div>
        </div>
    </section>
@endif
