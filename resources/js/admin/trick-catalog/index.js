import './email';

function renderLevelBadge(level) {
    if (!level) level = 'unknown';

    const formatted = level
        .replaceAll('_', ' ')
        .replace(/\b\w/g, c => c.toUpperCase());

    const styles = {
        novice: 'bg-gray-500 text-white',
        intermediate: 'bg-blue-500 text-white',
        advanced: 'bg-purple-500 text-white',
        performer: 'bg-pink-500 text-white',
        performer_elite: 'bg-black text-white',
        unknown: 'bg-gray-300 text-black'
    };

    const colorClass = styles[level] ?? styles.unknown;

    return `
        <span class="inline-flex items-center px-2 py-1 text-xs font-semibold ${colorClass}">
            ${formatted}
        </span>
    `;
}

function renderPlatformIcon(platform) {
    const p = (platform || 'unknown').toLowerCase();

    const icons = {
        youtube: `
            <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                <path d="M23.5 6.2a2.8 2.8 0 0 0-2-2C19.7 3.6 12 3.6 12 3.6s-7.7 0-9.5.6a2.8 2.8 0 0 0-2 2A29 29 0 0 0 0 12a29 29 0 0 0 .5 5.8 2.8 2.8 0 0 0 2 2c1.8.6 9.5.6 9.5.6s7.7 0 9.5-.6a2.8 2.8 0 0 0 2-2A29 29 0 0 0 24 12a29 29 0 0 0-.5-5.8zM9.6 15.5v-7L15.8 12l-6.2 3.5z"/>
            </svg>
        `,
        tiktok: `
            <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2v10.2a4.2 4.2 0 1 0 3.8 4.2V9.8a6.7 6.7 0 0 0 4 1.3V7.7a4.7 4.7 0 0 1-4-4.7h-3.8z"/>
            </svg>
        `,
        instagram: `
            <svg class="w-6 h-6 text-pink-500" fill="currentColor" viewBox="0 0 24 24">
                <path d="M7 2h10a5 5 0 0 1 5 5v10a5 5 0 0 1-5 5H7a5 5 0 0 1-5-5V7a5 5 0 0 1 5-5zm5 6a4 4 0 1 0 0 8 4 4 0 0 0 0-8zm5.5-.9a1.1 1.1 0 1 0 0 2.2 1.1 1.1 0 0 0 0-2.2z"/>
            </svg>
        `,
        facebook: `
            <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                <path d="M22 12a10 10 0 1 0-11.6 9.9v-7h-2v-3h2V9.5c0-2 1.2-3.1 3-3.1.9 0 1.8.2 1.8.2v2h-1c-1 0-1.3.6-1.3 1.2V12h2.3l-.4 3h-1.9v7A10 10 0 0 0 22 12z"/>
            </svg>
        `,
        unknown: `
            <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10"/>
                <path d="M12 8v4m0 4h.01"/>
            </svg>
        `
    };

    return icons[p] ?? icons.unknown;
}

function renderOpenIcon() {
    return `
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M13 7h6m0 0v6m0-6L10 16" />
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M5 5h4v4H5z" />
        </svg>
    `;
}

function renderCopyIcon() {
    return `
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <rect x="9" y="9" width="10" height="10" rx="2" />
            <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1" />
        </svg>
    `;
}

function copyToClipboard(text, btn) {
    navigator.clipboard.writeText(text).then(() => {
        const label = btn.querySelector('.copy-label');
        if (!label) return;

        const original = label.innerText;
        label.innerText = 'Copied ✓';

        setTimeout(() => {
            label.innerText = original;
        }, 3000);
    });
}

function normalizeVideoData(videos) {
    return (videos || []).map(v => ({
        ...v,
        is_preferred: Number(v.is_preferred || 0)
    }));
}

async function openTrickModal(id) {
    const modal = document.getElementById('trickModal');
    const body = document.getElementById('modalBody');

    modal.classList.remove('hidden');
    document.body.classList.add('overflow-hidden');
    body.innerHTML = 'Loading...';

    const res = await fetch(`/admin/trick-catalog/${id}/show-data`);
    const data = await res.json();

    // 🔥 FIX: set AFTER data exists
    window.__CURRENT_TRICK = data.name;
    window.__CURRENT_VIDEOS = data.videos;

    const hasPreferred = data.videos?.some(v => Number(v.is_preferred) === 1);

const preferredBtn = document.querySelector('.js-copy-email-preferred');

if (preferredBtn) {
    preferredBtn.classList.toggle('hidden', !hasPreferred);
}

    document.getElementById('modalTitle').innerText = data.name;

    data.videos = normalizeVideoData(data.videos);
    data.videos.sort((a, b) => b.is_preferred - a.is_preferred);

    let html = `
        <div class="space-y-4">

            <div class="flex justify-between gap-4">
                <div class="flex-1">
                    <div class="font-bold mb-2">Notes</div>
                    <div class="text-sm mb-4">
                        ${data.notes ?? 'No notes'}
                    </div>
                </div>

                <div>
                    ${(data.levels ?? [])
                        .map(l => renderLevelBadge(l.name))
                        .join('')}
                </div>
            </div>

            <div class="font-bold">Videos</div>

            <ul class="space-y-2">
    `;

    data.videos.forEach(v => {
        html += `
        <li class="flex justify-between items-center text-sm border-b py-2 px-2
            ${v.is_preferred ? 'bg-gray-50 border-l-4 border-black' : ''}">

            <div class="w-1/5 text-xl">
                ${renderPlatformIcon(v.platform)}
            </div>

            <div class="w-2/5 truncate">
                ${v.creator ?? 'Unknown'}
            </div>

            <div class="w-2/5 flex justify-end gap-2">

                <a href="${v.url}" target="_blank"
                   class="inline-flex items-center gap-1 px-2 py-1 text-xs bg-black text-white">
                    ${renderOpenIcon()}
                    Open
                </a>

                <button type="button"
                        onclick="copyToClipboard('${v.url}', this)"
                        class="inline-flex items-center gap-1 px-2 py-1 text-xs bg-gray-200">
                    <span>${renderCopyIcon()}</span>
                    <span class="copy-label">Copy</span>
                </button>

            </div>

        </li>`;
    });

    html += `</ul></div>`;
    body.innerHTML = html;
}

function closeTrickModal() {
    document.getElementById('trickModal').classList.add('hidden');
    document.body.classList.remove('overflow-hidden');
}

document.addEventListener('click', (e) => {

    if (e.target.closest('[data-close-modal]')) {
        closeTrickModal();
    }

    const openBtn = e.target.closest('.js-open-trick-modal');
    if (openBtn) {
        openTrickModal(openBtn.dataset.id);
    }
});

document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeTrickModal();
});

document.addEventListener('click', (e) => {
    const btn = e.target.closest('.js-copy-email');
    if (!btn) return;

    const type = btn.dataset.type;

    const trick = window.__CURRENT_TRICK;
    const videos = window.__CURRENT_VIDEOS;

    let text = '';

    if (type === 'simple') {
        text = TrickCatalogEmail.buildEmailSimple(trick, videos);
    }

    if (type === 'grouped') {
        text = TrickCatalogEmail.buildEmailGrouped(trick, videos);
    }

    if (type === 'preferred') {
        text = TrickCatalogEmail.buildEmailPreferredOnly(trick, videos);
    }

    TrickCatalogEmail.copyEmail(text, btn);
});

document.getElementById('trickModal').addEventListener('click', (e) => {
    if (e.target === e.currentTarget) {
        closeTrickModal();
    }
});