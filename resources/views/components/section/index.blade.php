@props([
    'subtitle' => null,
    'title' => null,
    'description' => null,
    'action' => null,
])

<section class='pt-20'>

        <x-section.title
            :subtitle="$subtitle"
            :title="$title"
            :description="$description"
            :action="$action"

        />

    {{$slot}}
</section>
