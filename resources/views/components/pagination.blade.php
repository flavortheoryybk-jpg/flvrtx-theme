@if ($paginator = get_the_posts_pagination([
    'mid_size'  => 2,
    'prev_text' => '← Previous',
    'next_text' => 'Next →',
]))

    <nav
        class="mt-16 flex justify-center"
        aria-label="Pagination">

        {!! $paginator !!}

    </nav>

@endif