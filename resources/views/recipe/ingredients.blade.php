<section class="py-20 bg-white">

    <x-container>

        <h2 class="text-3xl font-bold">
            Ingredients
        </h2>

        @php
            $ingredients = collect(
                preg_split('/\r\n|\r|\n/', get_field('ingredients') ?? '')
            )->filter();
        @endphp

        <div class="mt-10 rounded-3xl border border-border bg-white p-8 shadow-sm">

          <ul class="space-y-5">

              @foreach($ingredients as $ingredient)

                  <li class="flex items-center gap-4">

                      <div class="flex h-10 w-10 items-center justify-center rounded-full bg-primary/10 text-primary font-bold">
                          ✓
                      </div>

                      <span class="text-lg font-medium">
                          {{ $ingredient }}
                      </span>

                  </li>

              @endforeach

          </ul>

        </div>

    </x-container>

</section>