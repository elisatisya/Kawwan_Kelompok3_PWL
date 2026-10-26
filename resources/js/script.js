document.addEventListener('DOMContentLoaded', () => {
    initNavbarScroll();
    initMobileMenu();
    initSmoothScroll();
    initActiveNavLinks();
    initPasswordToggles();
});

function initNavbarScroll() {
    const navbar = document.querySelector('.kw-navbar');
    if (!navbar) return;

    let ticking = false;

    function handleScroll() {
        if (!ticking) {
            window.requestAnimationFrame(() => {
                if (window.scrollY > 15) {
                    navbar.classList.add('is-scrolled');
                } else {
                    navbar.classList.remove('is-scrolled');
                }
                ticking = false;
            });
            ticking = true;
        }
    }

    window.addEventListener('scroll', handleScroll, { passive: true });
    handleScroll();
}

function initMobileMenu() {
    const toggleBtn = document.querySelector('.kw-mobile-toggle');
    const mobileMenu = document.querySelector('.kw-mobile-menu');

    if (!toggleBtn || !mobileMenu) return;

    function openMenu() {
        toggleBtn.classList.add('is-open');
        toggleBtn.setAttribute('aria-expanded', 'true');
        mobileMenu.classList.add('is-open');
    }

    function closeMenu() {
        toggleBtn.classList.remove('is-open');
        toggleBtn.setAttribute('aria-expanded', 'false');
        mobileMenu.classList.remove('is-open');
    }

    toggleBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        const isOpen = mobileMenu.classList.contains('is-open');
        if (isOpen) {
            closeMenu();
        } else {
            openMenu();
        }
    });

    mobileMenu.querySelectorAll('a, button').forEach((item) => {
        item.addEventListener('click', () => {
            closeMenu();
        });
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && mobileMenu.classList.contains('is-open')) {
            closeMenu();
        }
    });

    document.addEventListener('click', (e) => {
        if (
            mobileMenu.classList.contains('is-open') &&
            !mobileMenu.contains(e.target) &&
            !toggleBtn.contains(e.target)
        ) {
            closeMenu();
        }
    });
}

function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            if (!targetId || targetId === '#') return;

            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                e.preventDefault();
                const navbar = document.querySelector('.kw-navbar');
                const navHeight = navbar ? navbar.offsetHeight : 70;
                const elementPosition = targetElement.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - navHeight - 16;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth',
                });
            }
        });
    });
}

function initActiveNavLinks() {
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.kw-nav-link[href^="#"]');
    if (!sections.length || !navLinks.length) return;

    window.addEventListener(
        'scroll',
        () => {
            let current = '';
            const scrollPosition = window.pageYOffset + 120;

            sections.forEach((section) => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.offsetHeight;
                if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                    current = '#' + section.getAttribute('id');
                }
            });

            navLinks.forEach((link) => {
                link.classList.remove('is-active');
                if (link.getAttribute('href') === current) {
                    link.classList.add('is-active');
                }
            });
        },
        { passive: true }
    );
}

function initPasswordToggles() {
    const toggleButtons = document.querySelectorAll('.kw-password-toggle-btn, .kw-auth-show-btn');
    if (!toggleButtons.length) return;

    toggleButtons.forEach((btn) => {
        btn.addEventListener('click', () => {
            const targetId = btn.getAttribute('data-target');
            if (!targetId) return;

            const input = document.getElementById(targetId);
            if (!input) return;

            const isPassword = input.type === 'password';
            input.type = isPassword ? 'text' : 'password';

            if (btn.classList.contains('kw-auth-show-btn')) {
                btn.textContent = isPassword ? 'HIDE' : 'SHOW';
            } else {
                btn.classList.toggle('is-revealed', isPassword);
            }
        });
    });
}
