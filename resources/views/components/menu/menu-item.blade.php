<li
    x-data="{ isOpen: false }"
    x-bind:class="{ 'after:rotate-180': isOpen }"
    class="group list-none last:mb-0 {{ !empty($item['children']) ? 'menu-item-has-children' : '' }}"
>
    <a
        @if(!empty($item['children']))
            @click.prevent="isOpen = !isOpen"
        @endif
        class="text-body-text hover:text-body-text text-[34px] py-2.5  inline-block h-full font-black anima-link default-link"
        href="{{ !empty($item['children']) ? '#' : $item['data']['url'] }}"
    >
        {{ $item['data']['label'] }}
    </a>
    @if(!empty($item['children']))
        <x-menu
            x-show="isOpen"
            x-transition:enter="transition-height ease-in-out duration-300"
            x-transition:enter-start="max-h-0"
            x-transition:enter-end="max-h-[300px]"
            x-transition:leave="transition-height ease-in-out duration-300"
            x-transition:leave-start="max-h-[300px]"
            x-transition:leave-end="max-h-0"
            class="sub-menu overflow-hidden pl-5"
            :items="$item['children']"
        />
    @endif
</li>
