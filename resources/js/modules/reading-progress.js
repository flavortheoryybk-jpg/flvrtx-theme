document.addEventListener('DOMContentLoaded', () => {
  const progressBar = document.getElementById('reading-progress');

  if (!progressBar) return;

  const updateProgress = () => {
    const scrollTop = window.scrollY;

    const documentHeight =
      document.documentElement.scrollHeight - window.innerHeight;

    const progress =
      documentHeight > 0 ? (scrollTop / documentHeight) * 100 : 0;

    progressBar.style.width = `${progress}%`;
  };

  updateProgress();

  window.addEventListener('scroll', updateProgress);
});
