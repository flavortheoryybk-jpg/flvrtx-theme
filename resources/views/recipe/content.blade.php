<section class="py-20 lg:py-24">

    <x-container>

        <div class="grid gap-12 lg:grid-cols-12">

            {{-- Main Content --}}
            <main class="space-y-16 lg:col-span-8">

                {{-- Quick Overview --}}
                @include('recipe.quick-info')

                {{-- Recipe Intelligence --}}
                @include('recipe.recipe-intelligence')

                {{-- Flavor Analysis --}}
                @include('recipe.flavor-dna')

                {{-- Texture Analysis --}}
                @include('recipe.texture-profile')

                {{-- Equipment --}}
                @include('recipe.equipment')

                {{-- Ingredients --}}
                @include('recipe.ingredients')

                {{-- Instructions --}}
                @include('recipe.instructions')

                {{-- Chef Tips --}}
                @include('recipe.chef-tips')

                {{-- Common Mistakes --}}
                @include('recipe.common-mistakes')

                {{-- Serving Suggestions --}}
                @include('recipe.serving-suggestions')

                {{-- Variations --}}
                @include('recipe.variations')

                {{-- Flavor Theory --}}
                @include('recipe.flavor-theory')

                {{-- Nutrition --}}
                @include('recipe.nutrition')

                {{-- Storage --}}
                @include('recipe.storage')

                {{-- Video --}}
                @include('recipe.video')

                {{-- FAQ --}}
                @include('recipe.faq')

                {{-- Complete Guide --}}
                @include('recipe.conclusion')

                {{-- Related Learn Articles --}}
                @include('recipe.related-learn')

                {{-- Related Recommendations --}}
                @include('recipe.related-recommendations')

            </main>

            {{-- Sidebar --}}
            <aside class="lg:col-span-4">

                @include('recipe.sidebar')

            </aside>

        </div>

    </x-container>

</section>