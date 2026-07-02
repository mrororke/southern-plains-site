function normalizeVideos(videos) {
    return (videos || []).map(v => ({
        ...v,
        is_preferred: Number(v.is_preferred || 0),
        platform: (v.platform || 'unknown').toLowerCase()
    }));
}

/*
|--------------------------------------------------------------------------
| FORMAT 1 — SIMPLE LIST
|--------------------------------------------------------------------------
*/

function buildEmailSimple(trickName, videos) {

    const links = normalizeVideos(videos)
        .map(v => v.url)
        .filter(Boolean)
        .join('\n');

    return `We've found these resources to help you teach your dog ${trickName}:\n\n${links}`;
}

/*
|--------------------------------------------------------------------------
| FORMAT 2 — PLATFORM GROUPED (RECOMMENDED)
|--------------------------------------------------------------------------
*/

function buildEmailGrouped(trickName, videos) {

    const grouped = {};

    normalizeVideos(videos).forEach(v => {

        if (!v.url) return;

        const key = capitalize(v.platform);

        if (!grouped[key]) {
            grouped[key] = [];
        }

        grouped[key].push(v.url);
    });

    let output = `We've found these resources to help you teach your dog ${trickName}:\n\n`;

    Object.keys(grouped).forEach(platform => {

        output += `${platform}:\n`;

        grouped[platform].forEach(url => {
            output += `${url}\n`;
        });

        output += `\n`;
    });

    return output.trim();
}

/*
|--------------------------------------------------------------------------
| FORMAT 3 — PREFERRED ONLY
|--------------------------------------------------------------------------
*/

function buildEmailPreferredOnly(trickName, videos) {

    const filtered = normalizeVideos(videos)
        .filter(v => v.is_preferred === 1);

    const links = filtered
        .map(v => v.url)
        .filter(Boolean)
        .join('\n');

    return `We've found these preferred resources to help you teach your dog ${trickName}:\n\n${links}`;
}

/*
|--------------------------------------------------------------------------
| COPY WRAPPER
|--------------------------------------------------------------------------
*/

function copyEmail(text, btn) {

    navigator.clipboard.writeText(text).then(() => {

        const label = btn.querySelector('.copy-label');
        if (!label) return;

        const original = label.innerText;

        label.innerText = 'Copied';

        setTimeout(() => {
            label.innerText = original;
        }, 2000);
    });
}

/*
|--------------------------------------------------------------------------
| UTIL
|--------------------------------------------------------------------------
*/

function capitalize(str) {
    if (!str) return 'Unknown';
    return str.charAt(0).toUpperCase() + str.slice(1);
}

window.TrickCatalogEmail = {
    buildEmailSimple,
    buildEmailGrouped,
    buildEmailPreferredOnly,
    copyEmail
};