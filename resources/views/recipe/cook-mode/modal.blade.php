<div
    x-data="{
                open: false,
                currentStep: 0,
            
                steps: [
                    'Heat oil in a pan.',
                    'Add onions and sauté until golden.',
                    'Add ginger garlic paste.',
                    'Cook tomatoes until soft.',
                    'Add spices.',
                    'Add chicken.',
                    'Cook for 20 minutes.',
                    'Serve hot.'
                ],
            
                next() {
                    if (this.currentStep < this.steps.length - 1) {
                        this.currentStep++;
                    }
                },
            
                previous() {
                    if (this.currentStep > 0) {
                        this.currentStep--;
                    }
                }
            }"
    x-on:open-cook-mode.window="open = true"
    x-show="open"
    x-transition
    class="fixed inset-0 z-[9999] flex items-center justify-center bg-black/90">

    <div class="relative flex h-full w-full max-w-5xl flex-col bg-background">

        <button
            @click="open = false"
            class="absolute right-6 top-6 rounded-full border border-border bg-white p-3 shadow">

            <i data-lucide="x" class="h-6 w-6"></i>

        </button>

        <div class="flex flex-1 items-center justify-center p-10">

            <div class="max-w-3xl text-center">

                <p class="text-sm font-semibold uppercase tracking-widest text-primary">

                    Cook Mode

                </p>

                <h2 class="mt-6 text-5xl font-bold">

                    Coming in the next step...

                </h2>

            </div>

        </div>

    </div>

</div>  