<section class="py-20">

    <x-container>

        <div class="grid gap-12 lg:grid-cols-12">

            {{-- Main Content --}}
            <div class="lg:col-span-8 space-y-20">

                @include('recipe.equipment')

                @include('recipe.ingredients')

                @include('recipe.instructions')

                @include('recipe.chef-tips')

                @include('recipe.flavor-theory')

                @include('recipe.storage')

                @include('recipe.faq')

            </div>

            {{-- Sidebar --}}
            <div class="lg:col-span-4">

                @include('recipe.sidebar')

            </div>

        </div>

    </x-container>

</section>