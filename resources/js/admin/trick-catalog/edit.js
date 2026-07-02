const TrickCatalogEdit = (() => {

    let videoIndex = 0;

    /*
    |--------------------------------------------------------------------------
    | INIT
    |--------------------------------------------------------------------------
    */

    function init() {

        videoIndex = document.querySelectorAll('.video-row').length;

        const btn = document.getElementById('add-video-btn');
        if (btn) {
            btn.addEventListener('click', addVideoRow);
        }

        initAutoDetect();
    }

    /*
    |--------------------------------------------------------------------------
    | ADD ROW
    |--------------------------------------------------------------------------
    */

    function addVideoRow() {

        const container = document.getElementById('video-container');
        const index = videoIndex++;

        fetch(`/admin/trick-catalog/video-row?index=${index}`)
            .then(r => r.text())
            .then(html => {

                container.insertAdjacentHTML(
                    'beforeend',
                    html.replaceAll('__INDEX__', index)
                );
            });
    }

    /*
    |--------------------------------------------------------------------------
    | AUTO DETECT (DELEGATED)
    |--------------------------------------------------------------------------
    */

    function initAutoDetect() {

        document.addEventListener('input', (e) => {

            if (!e.target.matches('input[name*="[url]"]')) return;

            const input = e.target;
            const row = input.closest('.video-row');

            if (!row) return;

            const select = row.querySelector('select[name*="[platform]"]');
            if (!select) return;

            const url = input.value;
            if (!url) return;

            if (url.includes('tiktok')) {
                select.value = 'tiktok';
            } else if (url.includes('instagram')) {
                select.value = 'instagram';
            } else if (url.includes('facebook')) {
                select.value = 'facebook';
            } else if (url.includes('youtu')) {
                select.value = 'youtube';
            } else {
                select.value = 'unknown';
            }

            checkDuplicate(url, row);
        });
    }

    /*
    |--------------------------------------------------------------------------
    | DUPLICATE CHECK
    |--------------------------------------------------------------------------
    */

    function checkDuplicate(url, row) {

        fetch("/admin/trick-catalog/check-video", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ url })
        })
        .then(r => r.json())
        .then(data => {

            const warn = row.querySelector('.duplicate-warning');
            if (!warn) return;

            warn.innerHTML = data.exists
                ? `⚠ Already exists in trick: <strong>${data.trick}</strong>`
                : '';
        })
        .catch(console.error);
    }

    /*
    |--------------------------------------------------------------------------
    | EXPORT
    |--------------------------------------------------------------------------
    */

    return {
        init,
        addVideoRow
    };

})();

window.TrickCatalogEdit = TrickCatalogEdit;

document.addEventListener('DOMContentLoaded', () => {
    TrickCatalogEdit.init();
});