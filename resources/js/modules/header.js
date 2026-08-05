export default function header() {
  const header = document.querySelector('header');

  if (!header) return;

  const updateHeader = () => {
    if (window.scrollY > 20) {
      header.classList.add('header-scrolled');
    } else {
      header.classList.remove('header-scrolled');
    }
  };

  updateHeader();

  window.addEventListener('scroll', updateHeader, {
    passive: true,
  });
}

document.addEventListener('DOMContentLoaded', header);
