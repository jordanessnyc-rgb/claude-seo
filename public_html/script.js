const menuToggle = document.querySelector('.menu-toggle');
const nav = document.querySelector('.site-nav');
const navLinks = document.querySelectorAll('.site-nav a');
const form = document.querySelector('.contact-form');
const formStatus = document.querySelector('.form-status');
const yearEl = document.getElementById('year');

if (yearEl) {
  yearEl.textContent = new Date().getFullYear();
}

function openMenu() {
  menuToggle.setAttribute('aria-expanded', 'true');
  menuToggle.classList.add('is-open');
  nav.classList.add('open');
}

function closeMenu() {
  menuToggle.setAttribute('aria-expanded', 'false');
  menuToggle.classList.remove('is-open');
  nav.classList.remove('open');
}

if (menuToggle && nav) {
  menuToggle.addEventListener('click', () => {
    const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
    if (isExpanded) {
      closeMenu();
    } else {
      openMenu();
    }
  });

  navLinks.forEach((link) => {
    link.addEventListener('click', () => {
      closeMenu();
    });
  });

  // Close menu when tapping outside
  document.addEventListener('click', (e) => {
    if (
      nav.classList.contains('open') &&
      !nav.contains(e.target) &&
      !menuToggle.contains(e.target)
    ) {
      closeMenu();
    }
  });

  // Close menu on Escape key
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && nav.classList.contains('open')) {
      closeMenu();
      menuToggle.focus();
    }
  });
}

if (form && formStatus) {
  form.addEventListener('submit', (event) => {
    if (!form.checkValidity()) {
      event.preventDefault();
      formStatus.textContent = 'Please complete all required fields.';
      formStatus.style.color = '#b91c1c';
      form.reportValidity();
      return;
    }

    formStatus.textContent = 'Submitting... complete the CAPTCHA if prompted.';
    formStatus.style.color = '#334e68';
  });
}
