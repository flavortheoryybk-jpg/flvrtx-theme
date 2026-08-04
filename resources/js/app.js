import Alpine from 'alpinejs';
import { createIcons, icons } from 'lucide';

import.meta.glob(['../images/**']);

window.Alpine = Alpine;

// Make Lucide available globally
window.createIcons = () => createIcons({ icons });

Alpine.start();

// Initial render
window.createIcons();
import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';
import { createIcons, icons } from 'lucide';

import.meta.glob(['../images/**']);

Alpine.plugin(collapse);

window.Alpine = Alpine;

window.createIcons = () => createIcons({ icons });

Alpine.start();

window.createIcons();
