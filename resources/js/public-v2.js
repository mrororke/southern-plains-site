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
        const isOpen = !dropdown.classList.contains('hidden');

        if (isOpen) {
            dropdown.classList.add('hidden');
            toggle.setAttribute('aria-expanded', 'false');
        } else {
            dropdown.classList.remove('hidden');
            toggle.setAttribute('aria-expanded', 'true');

            input.focus();
        }
    });

    document.addEventListener('click', (event) => {
        if (!siteSearch.contains(event.target)) {
            dropdown.classList.add('hidden');
            toggle.setAttribute('aria-expanded', 'false');
        }
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            dropdown.classList.add('hidden');
            toggle.setAttribute('aria-expanded', 'false');
            toggle.focus();
        }
    });
});