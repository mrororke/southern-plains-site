const TrickCatalogEdit = (() => {

    let videoIndex = 0;

    function init() {
        videoIndex = document.querySelectorAll('.video-row').length;

        const btn = document.getElementById('add-video-btn');
        if (btn) btn.addEventListener('click', addVideoRow);
    }

    function addVideoRow() {

        const container = document.getElementById('video-container');
        const index = videoIndex++;

        fetch(`/admin/trick-catalog/video-row?index=${index}`)
            .then(r => r.text())
            .then(html => {
                container.insertAdjacentHTML('beforeend', html.replaceAll('__INDEX__', index));
            });
    }

    function autoDetectVideo(input, index) {

        const url = input.value;
        if (!url) return;

        const select = document.querySelector(
            `select[name="videos[${index}][platform]"]`
        );

        if (!select) return;

        if (url.includes('tiktok')) select.value = 'tiktok';
        else if (url.includes('instagram')) select.value = 'instagram';
        else if (url.includes('facebook')) select.value = 'facebook';
        else if (url.includes('youtu')) select.value = 'youtube';
        else select.value = 'unknown';

        checkDuplicate(url, index);
    }

    function checkDuplicate(url, index) {

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

            const row = document.querySelectorAll('.video-row')[index];
            if (!row) return;

            const warn = row.querySelector('.duplicate-warning');

            warn.innerHTML = data.exists
                ? `⚠ Already exists in trick: <strong>${data.trick}</strong>`
                : '';

        });
    }

    return {
        init,
        addVideoRow,
        autoDetectVideo
    };

})();

window.TrickCatalogEdit = TrickCatalogEdit;

document.addEventListener('DOMContentLoaded', () => {
    TrickCatalogEdit.init();
});