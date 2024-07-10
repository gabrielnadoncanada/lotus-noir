@props([
    'video' => null,
    'preview_image' => null
])

@if($video && $preview_image)
    <section class="about-video mb-[100px] fo col-lg-10 mx-auto text-center">
        <div class="relative overflow-hidden pb-[60%]">
            <img
                class="absolute w-full h-full object-cover object-bottom left-0"
                src="{{Storage::url($preview_image)}}"
                alt="banner"
            />
            <div class="absolute z-[2] bg-[rgba(255,255,255,0)] w-full h-full right-0 top-0"></div>
            <div
                class="flex justify-center items-center w-20 h-20 absolute z-[2] shadow-[inset_0_0_40px_rgba(247,248,250,0.5),0_0_40px_rgba(247,248,250,0.5)] -ml-10 -mt-10 rounded-[50%] border-solid border-foreground-dark left-2/4 top-2/4 magnetic-link">
                <a class="magnetic-object flex justify-center items-center h-[30px] w-[30px]" data-fancybox=""
                   href="{{$video}}">
                    <i class="fas fa-play translate-x-[3px] text-[22px] text-foreground-dark"></i></a>
            </div>
            <div class="curtain"></div>
        </div>
    </section>
@endif
