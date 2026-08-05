@if ($wp_query->max_num_pages > 1)

<section class="pb-20">

    <x-container>

        @include('components.pagination')

    </x-container>

</section>

@endif