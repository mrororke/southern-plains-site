const TrickCatalogCreate = (() => {

    let videoIndex = 0;

    function init() {
        const btn = document.getElementById('add-video-btn');
        if (btn) {
            btn.addEventListener('click', addVideoRow);
        }
    }

    function addVideoRow() {

        const container = document.getElementById('video-container');
        const index = videoIndex++;

        fetch('/admin/trick-catalog/video-row?index=' + index)
            .then(res => res.text())
            .then(html => {

                const row = html.replaceAll('__INDEX__', index);

                container.insertAdjacentHTML('beforeend', row);

            });
    }

    function autoDetectVideo(input, index) {

        const url = input.value;
        if (!url) return;

        const platformField =
            document.querySelector(`select[name="videos[${index}][platform]"]`);

        if (!platformField) return;

        if (url.includes('tiktok')) {
            platformField.value = 'tiktok';
        } else if (url.includes('instagram')) {
            platformField.value = 'instagram';
        } else if (url.includes('facebook')) {
            platformField.value = 'facebook';
        } else if (url.includes('youtu')) {
            platformField.value = 'youtube';
        } else {
            platformField.value = 'unknown';
        }

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
        .then(res => res.json())
        .then(data => {

            const row = document.querySelector(`.video-row[data-index="${index}"]`);
            if (!row) return;

            const warning = row.querySelector('.duplicate-warning');

            warning.innerHTML = data.exists
                ? `⚠ Already exists in trick: <strong>${data.trick}</strong>`
                : '';

        })
        .catch(console.error);
    }

    return {
        init,
        addVideoRow,
        autoDetectVideo
    };

})();

window.TrickCatalogCreate = TrickCatalogCreate;

document.addEventListener('DOMContentLoaded', () => {
    TrickCatalogCreate.init();
});