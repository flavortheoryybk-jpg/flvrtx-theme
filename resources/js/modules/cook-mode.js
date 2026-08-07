document.addEventListener('alpine:init', () => {
  Alpine.store('cookMode', {
    open: false,

    steps: [],

    current: 0,

    register(steps = []) {
      this.steps = steps;
    },

    start(steps = []) {
      this.steps = steps;

      this.current = 0;

      this.open = true;

      document.body.classList.add('overflow-hidden');
    },

    close() {
      this.open = false;

      document.body.classList.remove('overflow-hidden');
    },

    next() {
      if (this.current < this.steps.length - 1) {
        this.current++;
      }
    },

    previous() {
      if (this.current > 0) {
        this.current--;
      }
    },

    progress() {
      if (!this.steps.length) {
        return 0;
      }

      return ((this.current + 1) / this.steps.length) * 100;
    },
  });
});
