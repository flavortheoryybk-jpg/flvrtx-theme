import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';
import { createIcons, icons } from 'lucide';

import.meta.glob(['../images/**']);

Alpine.plugin(collapse);

window.Alpine = Alpine;

window.createIcons = () => createIcons({ icons });

Alpine.start();

// Render Lucide icons
window.createIcons();

// Reading Progress Bar
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
