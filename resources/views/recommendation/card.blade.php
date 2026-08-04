<x-ui.card href="{{ get_permalink() }}">

    @if(has_post_thumbnail())

        <div class="overflow-hidden">

            {!! get_the_post_thumbnail(
                get_the_ID(),
                'medium_large',
                [
                    'class' => 'aspect-[4/3] w-full object-cover transition duration-700 group-hover:scale-105',
                    'loading' => 'lazy',
                    'decoding' => 'async',
                ]
            ) !!}

        </div>

    @endif

    <div class="p-7">

        <div class="flex items-center justify-between">

            @php
            $category = get_the_terms(get_the_ID(), 'category');
            @endphp
            
            @if($category)

              <a href="{{ get_term_link($category[0]) }}">
          
                  <x-ui.badge>
                      {{ get_field('product_type') }}
                  </x-ui.badge>
          
              </a>
          
          @else
          
              <x-ui.badge>
          
                  Watch
          
              </x-ui.badge>
          
          @endif

            <span class="text-sm text-text-muted">
                {{ get_field('brand') }}
            </span>

        </div>

        <h3 class="mt-5 text-2xl font-bold leading-tight transition group-hover:text-primary">

            {{ get_the_title() }}

        </h3>

        <p class="mt-4 line-clamp-3 leading-7 text-text-muted">

            {{ get_the_excerpt() }}

        </p>

        <div class="mt-6 flex items-center justify-between">

            <span class="text-sm text-text-muted">

                ⭐ {{ get_field('rating') }}/5

            </span>

            <span class="font-semibold text-primary">

                View Recommendation →

            </span>

        </div>

    </div>

</x-ui.card>