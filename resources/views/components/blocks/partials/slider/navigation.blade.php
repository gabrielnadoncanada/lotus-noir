<div {{$attributes->
  class(['slider-nav-panel h-[32px] md:h-[75px] lg:h-[100px] has-[.swiper-button-lock]:hidden'])}}>
    <div class="slider-arrows bg-body">
        <div class="button-prev magnetic-link w-[60px] cursor-pointer" x-ref="prev">
          <span class="magnetic-object block text-center">
                <img src="{{asset('img/arrow-left-solid.svg')}}" width="20px" alt="">
          </span>
        </div>
        <div class="button-next magnetic-link w-[60px] cursor-pointer" x-ref="next">
            <span class="magnetic-object block text-center">
               <img src="{{asset('img/arrow-right-solid.svg')}}" width="20px" alt="">
            </span>
        </div>
    </div>
</div>
