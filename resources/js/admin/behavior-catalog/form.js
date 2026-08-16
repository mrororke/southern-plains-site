export default function behaviorCatalogForm() {
    let videoIndex = 0;

    function init() {
        const addButton = document.getElementById('add-video-btn');
        const container = document.getElementById('video-container');

        if (! addButton || ! container) {
            return;
        }

        videoIndex = getNextVideoIndex(container);

        updateVideoEmptyState();

        addButton.addEventListener('click', addVideoRow);

        document.addEventListener('click', handleRemoveVideo);
        document.addEventListener('input', handleVideoUrlInput);
        document.addEventListener('change', handlePreferredVideo);
    }

    function getNextVideoIndex(container) {
        const rows = [...container.querySelectorAll('.video-row')];

        if (! rows.length) {
            return 0;
        }

        const indexes = rows
            .map(row => Number(row.dataset.index))
            .filter(index => Number.isInteger(index));

        if (! indexes.length) {
            return rows.length;
        }

        return Math.max(...indexes) + 1;
    }

    async function addVideoRow() {
        const container = document.getElementById('video-container');

        if (! container) {
            return;
        }

        const index = videoIndex++;

        try {
            const response = await fetch(
                `/admin/behavior-catalog/video-row?index=${index}`,
                {
                    headers: {
                        Accept: 'text/html',
                    },
                }
            );

            if (! response.ok) {
                throw new Error('Unable to load video row.');
            }

            const html = await response.text();

            container.insertAdjacentHTML('beforeend', html);

            updateVideoEmptyState();
        } catch (error) {
            console.error(error);
        }
    }

    function handleRemoveVideo(event) {
        const button = event.target.closest('.remove-video-row');

        if (! button) {
            return;
        }

        button.closest('.video-row')?.remove();

        updateVideoEmptyState();
    }

    function handleVideoUrlInput(event) {
        const input = event.target.closest('.video-url');

        if (! input) {
            return;
        }

        const row = input.closest('.video-row');

        if (! row) {
            return;
        }

        const url = input.value.trim();

        detectPlatform(url, row);
        checkDuplicate(url, row);
    }

    function detectPlatform(url, row) {
        const select = row.querySelector('.video-platform');

        if (! select) {
            return;
        }

        const normalized = url.toLowerCase();

        if (normalized.includes('youtu')) {
            select.value = 'youtube';
        } else if (normalized.includes('tiktok')) {
            select.value = 'tiktok';
        } else if (normalized.includes('instagram')) {
            select.value = 'instagram';
        } else if (normalized.includes('facebook')) {
            select.value = 'facebook';
        } else {
            select.value = 'unknown';
        }
    }

    async function checkDuplicate(url, row) {
        const warning = row.querySelector('.duplicate-warning');

        if (! warning) {
            return;
        }

        if (! url) {
            clearWarning(warning);
            return;
        }

        try {
            const csrfToken = document
                .querySelector('meta[name="csrf-token"]')
                ?.getAttribute('content');

            const response = await fetch(
                '/admin/behavior-catalog/check-video',
                {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        Accept: 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({ url }),
                }
            );

            if (! response.ok) {
                throw new Error('Duplicate check failed.');
            }

            const data = await response.json();

            if (! data.exists) {
                clearWarning(warning);
                return;
            }

            warning.innerHTML = `
                This video already exists in
                <strong>${escapeHtml(data.trick ?? 'another behavior')}</strong>.
            `;

            warning.classList.remove('hidden');
        } catch (error) {
            console.error(error);

            clearWarning(warning);
        }
    }

    function clearWarning(warning) {
        warning.textContent = '';
        warning.classList.add('hidden');
    }

    function handlePreferredVideo(event) {
        const checkbox = event.target.closest('.preferred-video');

        if (! checkbox || ! checkbox.checked) {
            return;
        }

        document
            .querySelectorAll('.preferred-video')
            .forEach(otherCheckbox => {
                if (otherCheckbox !== checkbox) {
                    otherCheckbox.checked = false;
                }
            });
    }

    function updateVideoEmptyState() {
        const container = document.getElementById('video-container');
        const emptyState = document.getElementById('video-empty-state');

        if (! container || ! emptyState) {
            return;
        }

        emptyState.classList.toggle(
            'hidden',
            container.querySelector('.video-row') !== null
        );
    }

    function escapeHtml(value) {
        const element = document.createElement('div');

        element.textContent = value;

        return element.innerHTML;
    }

    return {
        init,
    };
}