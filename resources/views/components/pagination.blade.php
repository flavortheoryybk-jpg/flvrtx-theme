@if ($paginator = get_the_posts_pagination([
    'mid_size'  => 2,
    'prev_text' => '← Previous',
    'next_text' => 'Next →',
]))

    <nav
        class="mt-16 flex justify-center"
        aria-label="{{ __('Pagination Navigation', 'flvrtx') }}">

        <div
            class="pagination-wrapper">

            {!! $paginator !!}

        </div>

    </nav>

@endif