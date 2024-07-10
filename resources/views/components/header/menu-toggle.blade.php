<div
    class="relative cursor-pointer magnetic-link"
    x-bind:class="{ 'active': menuActive }"
    @click="menuActive = !menuActive">
    <div class="w-5 h-5 pt-px magnetic-object burger">
        <span
            class="w-[19px] h-[3px] bg-white before:bg-white after:bg-white after:absolute before:absolute relative mt-[7px] mb-0 mx-0 before:top-[-7px] after:w-[75%] before:w-full before:h-full after:h-full after:top-[7px] after:right-0"
            x-bind:class="{'rotate-45 before:translate-x-0 before:translate-y-[7px] before:-rotate-90 after:translate-x-0 after:translate-y-[-7px] after:-rotate-90 after:!hidden': menuActive}">
        </span>
    </div>
</div>
