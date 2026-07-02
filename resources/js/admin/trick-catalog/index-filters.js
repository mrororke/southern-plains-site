const TrickCatalogFilters = (() => {

    let timeout;

    function init() {

        const form = document.getElementById('catalog-filter-form');
        if (!form) return;

        const search = form.querySelector('input[name="search"]');

        /*
        |--------------------------------------------------------------------------
        | Auto-submit selects
        |--------------------------------------------------------------------------
        */
        form.querySelectorAll('select').forEach(select => {

            select.addEventListener('change', () => {
                form.submit();
            });

        });

        /*
        |--------------------------------------------------------------------------
        | Debounced search input
        |--------------------------------------------------------------------------
        */
        if (search) {

            search.addEventListener('input', () => {

                clearTimeout(timeout);

                timeout = setTimeout(() => {
                    form.submit();
                }, 350);

            });

            /*
            |--------------------------------------------------------------------------
            | ESC clears search + submits
            |--------------------------------------------------------------------------
            */
            search.addEventListener('keydown', (e) => {

                if (e.key === 'Escape') {

                    if (search.value.length === 0) return;

                    search.value = '';

                    clearTimeout(timeout);

                    form.submit();
                }
            });
        }
    }

    return {
        init
    };

})();

document.addEventListener('DOMContentLoaded', () => {
    TrickCatalogFilters.init();
});