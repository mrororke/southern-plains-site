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
        youtube: '▶️',
        tiktok: '🎵',
        instagram: '📸',
        facebook: '📘',
        unknown: '🔗'
    };

    return `<span class="text-lg">${icons[p] ?? icons.unknown}</span>`;
}

function renderOpenIcon() {
    return `↗`;
}

function renderCopyIcon() {
    return `📋`;
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

async function openTrickModal(id) {
    const modal = document.getElementById('trickModal');
    const body = document.getElementById('modalBody');

    modal.classList.remove('hidden');
    body.innerHTML = 'Loading...';

    const res = await fetch(`/admin/trick-catalog/${id}/show-data`);
    const data = await res.json();

    document.getElementById('modalTitle').innerText = data.name;

    data.videos.sort((a, b) => (b.is_preferred === true) - (a.is_preferred === true));

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
                    ${renderLevelBadge(data.level)}
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
}

document.addEventListener('click', (e) => {
    if (e.target.matches('[data-close-modal]')) {
        closeTrickModal();
    }

    if (e.target.classList.contains('js-open-trick-modal')) {
        openTrickModal(e.target.dataset.id);
    }
});

document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        closeTrickModal();
    }
});