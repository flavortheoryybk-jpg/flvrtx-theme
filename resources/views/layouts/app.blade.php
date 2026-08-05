<!doctype html>
<html @php(language_attributes())>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @php(do_action('get_header'))
    @php(wp_head())
    @if(isset($recipeSchema))
    <script type="application/ld+json">
    {!! $recipeSchema !!}
    </script>
    @endif

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body @php(body_class('bg-background text-text antialiased'))>
    @include('components.global.reading-progress')

    @php(wp_body_open())

    <a href="#main"
       class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 bg-white px-4 py-2 rounded-md shadow">
        {{ __('Skip to content', 'sage') }}
    </a>

    <div id="app" class="min-h-screen flex flex-col">

        @include('sections.header')

        <main id="main" class="flex-1">
            @yield('content')
        </main>

        @include('sections.footer')
        @include('components.global.back-to-top')
        @include('components.global.search-modal')

    </div>

    @php(do_action('get_footer'))
    @php(wp_footer())

</body>
</html>