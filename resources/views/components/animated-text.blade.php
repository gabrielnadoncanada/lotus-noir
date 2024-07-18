@props(['id'])

<svg x-data="{ inView: false }" x-intersect:enter="inView = true" stroke-width="1"
     class="h-[65px] w-20 relative -top-2 left-3 xl:text-6xl text-5xl mb-3 lg:mb-0 inline-block font-bold leading-120 "
     :class="inView ? 'animate-text-line-animation stroke-white stroke-dasharray-1000 stroke-dashoffset-1000' : 'fill-transparent stroke-white'"
>
    <text x="0%" dominant-baseline="middle" y="70%">{{ $id }}</text>
</svg>
