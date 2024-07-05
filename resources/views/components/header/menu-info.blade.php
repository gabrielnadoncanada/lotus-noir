<div class="w-1/3 hidden md:block">
    <div
        x-show="menuActive"
        x-transition:enter="transition ease-out duration-500"
        x-transition:enter-start="opacity-0 translate-x-[200%]"
        x-transition:enter-end="opacity-100 translate-x-0"
        x-transition:leave="transition ease-in-out duration-600 delay-50"
        x-transition:leave-start="opacity-100 translate-x-0"
        x-transition:leave-end="opacity-0 translate-x-[200%]"
        class="absolute w-[500%] bg-body h-screen flex items-center p-10">
        <div class="grid grid-cols-1 gap-y-5">
            @if(theme('site_country'))
                <div>
                    <x-text as="span" theme="label">Country:</x-text>
                    <x-text as="span">{{theme('site_country')}}</x-text>
                </div>
            @endif
            @if(theme('site_city'))
                <div>
                    <x-text as="span" theme="label">City:</x-text>
                    <x-text as="span">{{theme('site_city')}}</x-text>
                </div>
            @endif
            @if(theme('site_address'))
                <div>
                    <x-text as="span" theme="label">Address:</x-text>
                    <x-text as="span">{{theme('site_address')}}</x-text>
                </div>
            @endif
            @if(theme('site_email'))
                <div>
                    <x-text as="span" theme="label">Email:</x-text>
                    <x-text as="a" href="tel:{{theme('site_email')}}">
                        {{theme('site_email')}}
                    </x-text>
                </div>
            @endif
            @if(theme('site_phone'))
                <div>
                    <x-text as="span" theme="label">Phone:</x-text>
                    <x-text as="a" href="tel:{{theme('site_phone')}}">
                        {{theme('site_phone')}}
                    </x-text>
                </div>
            @endif
        </div>
    </div>
</div>
