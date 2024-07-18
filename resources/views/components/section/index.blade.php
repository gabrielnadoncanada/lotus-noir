@props([
    'subtitle' => null,
    'title' => null,
    'description' => null,
    'action' => null,
])

<section class='pt-20'>
    <x-container :fluid="true" data-animated-container>
        <x-section.title
            :subtitle="$subtitle"
            :title="$title"
            :description="$description"
            :action="$action"

        />
    </x-container>
    {{$slot}}
</section>
