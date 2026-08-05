<section class="py-24">

    <x-container>

        <div class="grid gap-12 lg:grid-cols-12">

            {{-- Main Content --}}
            <div class="lg:col-span-8 space-y-20">

                @include('recipe.recipe-intelligence')

                @include('recipe.flavor-dna')

                @include('recipe.texture-profile')
            
                @include('recipe.quick-info')
            
                @include('recipe.equipment')

                @include('recipe.ingredients')

                @include('recipe.instructions')

                @include('recipe.chef-tips')

                @include('recipe.common-mistakes')

                @include('recipe.serving-suggestions')

                @include('recipe.variations')

                @include('recipe.flavor-theory')

                @include('recipe.nutrition')

                @include('recipe.storage')

                @include('recipe.conclusion')

                @include('recipe.faq')

                @include('recipe.related-learn')

                @include('recipe.related-recommendations')

            </div>

            {{-- Sidebar --}}
            <div class="lg:col-span-4">

                @include('recipe.sidebar')

            </div>

        </div>

    </x-container>

</section>