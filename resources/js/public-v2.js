/*
|--------------------------------------------------------------------------
| Southern Plains Public V2
|--------------------------------------------------------------------------
*/

/* SITE SEARCH (Nav Bar)  */ 
document.addEventListener('DOMContentLoaded', () => {
    const siteSearch = document.querySelector('[data-site-search]');

    if (!siteSearch) {
        return;
    }

    const toggle = siteSearch.querySelector('[data-search-toggle]');
    const dropdown = siteSearch.querySelector('[data-search-dropdown]');
    const input = siteSearch.querySelector('[data-search-input]');

    toggle.addEventListener('click', () => {
        const isOpen = dropdown.classList.contains('is-open');

        if (isOpen) {
            dropdown.classList.remove('is-open');
            toggle.setAttribute('aria-expanded', 'false');
        } else {
            dropdown.classList.add('is-open');
            toggle.setAttribute('aria-expanded', 'true');
            input.focus();
        }
    });

    document.addEventListener('click', (event) => {
        if (!siteSearch.contains(event.target)) {
            dropdown.classList.remove('is-open');
            toggle.setAttribute('aria-expanded', 'false');
        }
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            dropdown.classList.remove('is-open');
            toggle.setAttribute('aria-expanded', 'false');
            toggle.focus();
        }
    });
});

/* Mobile Nav */

document.addEventListener('DOMContentLoaded', () => {
    const mobileNav = document.querySelector('[data-mobile-nav]');

    if (!mobileNav) {
        return;
    }

    const toggle = mobileNav.querySelector('[data-mobile-menu-toggle]');
    const menu = mobileNav.querySelector('[data-mobile-menu]');

    toggle.addEventListener('click', () => {
        const isOpen = menu.classList.contains('is-open');

        menu.classList.toggle('is-open');
        toggle.setAttribute('aria-expanded', String(!isOpen));
        toggle.setAttribute(
            'aria-label',
            isOpen ? 'Open navigation' : 'Close navigation'
        );
    });
});