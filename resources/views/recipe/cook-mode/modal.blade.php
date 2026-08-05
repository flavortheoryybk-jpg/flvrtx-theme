@php
    $steps = collect(
        preg_split('/\r\n|\r|\n/', get_field('instructions') ?? '')
    )->filter()->values();
@endphp

<div
    x-data="{
        open:false,
        currentStep:0,
        steps:@js($steps),

        next(){
            if(this.currentStep < this.steps.length-1){
                this.currentStep++;
            }
        },

        previous(){
            if(this.currentStep > 0){
                this.currentStep--;
            }
        },

        progress(){
            return ((this.currentStep+1)/this.steps.length)*100;
        }
    }"

    x-on:open-cook-mode.window="open=true"

    x-show="open"

    x-transition

    class="fixed inset-0 z-[9999] bg-black/90"

    style="display:none"
>

    <div class="flex h-full flex-col bg-background">

        {{-- Header --}}
        <div class="flex items-center justify-between border-b border-border bg-white px-8 py-6">

            <div>

                <p class="text-sm font-semibold uppercase tracking-widest text-primary">

                    Cook Mode

                </p>

                <h2 class="mt-1 text-2xl font-bold">

                    {{ get_the_title() }}

                </h2>

            </div>

            <button
                @click="open=false"
                class="rounded-xl border border-border p-3 transition hover:bg-gray-50">

                <i data-lucide="x" class="h-6 w-6"></i>

            </button>

        </div>

        {{-- Progress --}}
        <div class="border-b border-border bg-white px-8 py-4">

            <div class="mb-2 flex items-center justify-between">

                <span class="font-medium">

                    Step

                    <span x-text="currentStep+1"></span>

                    of

                    <span x-text="steps.length"></span>

                </span>

                <span class="text-text-muted">

                    <span x-text="Math.round(progress())"></span>%

                </span>

            </div>

            <div class="h-2 overflow-hidden rounded-full bg-border">

                <div
                    class="h-full bg-primary transition-all duration-500"
                    :style="'width:'+progress()+'%'">

                </div>

            </div>

        </div>

        {{-- Step --}}
        <div class="flex flex-1 items-center justify-center px-10">

            <div class="max-w-4xl text-center">

                <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-primary text-3xl font-bold tracking-tight text-white">

                    <span x-text="currentStep+1"></span>

                </div>

                <p
                    class="mt-10 text-3xl font-semibold leading-relaxed lg:text-6xl lg:text-7xl"
                    x-text="steps[currentStep]">

                </p>

            </div>

        </div>

        {{-- Controls --}}
        <div class="flex items-center justify-between border-t border-border bg-white p-8">

            <x-ui.button
                variant="secondary"
                @click="previous()"
                x-bind:disabled="currentStep===0">

                ← Previous

            </x-ui.button>

            <x-ui.button
                @click="next()"
                x-show="currentStep<steps.length-1">

                Next →

            </x-ui.button>

            <x-ui.button
                x-show="currentStep===steps.length-1"
                @click="open=false">

                Finish 🎉

            </x-ui.button>

        </div>

    </div>

</div>