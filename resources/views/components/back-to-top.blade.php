<button
    x-data="{ show: false }"
    x-init="
        window.addEventListener('scroll', () => {
            show = window.scrollY > 500
        })
    "
    x-show="show"
    x-transition
    @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
    class="fixed bottom-8 right-8 z-50 flex h-12 w-12 items-center justify-center rounded-full bg-primary text-white shadow-xl transition hover:scale-110 hover:opacity-90"
    style="display: none;">

    <i data-lucide="arrow-up" class="h-5 w-5"></i>

</button>