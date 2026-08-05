function normalizeVideos(videos) {
    return (videos || []).map(video => ({
        ...video,
        is_preferred: Number(video.is_preferred || 0),
        platform: (video.platform || 'unknown').toLowerCase(),
    }));
}

function platformLabel(platform) {
    const labels = {
        youtube: 'YouTube',
        tiktok: 'TikTok',
        instagram: 'Instagram',
        facebook: 'Facebook',
        unknown: 'Unknown',
    };

    return labels[platform] ?? capitalize(platform);
}

function capitalize(value) {
    if (! value) {
        return 'Unknown';
    }

    return value.charAt(0).toUpperCase() + value.slice(1);
}

/*
|--------------------------------------------------------------------------
| FORMAT 1 — SIMPLE LIST
|--------------------------------------------------------------------------
*/

export function buildEmailSimple(behaviorName, videos) {
    const links = normalizeVideos(videos)
        .map(video => video.url)
        .filter(Boolean)
        .join('\n');

    return `We've found these resources to help you teach your dog ${behaviorName}:\n\n${links}`;
}

/*
|--------------------------------------------------------------------------
| FORMAT 2 — GROUPED BY PLATFORM
|--------------------------------------------------------------------------
*/

export function buildEmailGrouped(behaviorName, videos) {
    const grouped = {};

    normalizeVideos(videos).forEach(video => {
        if (! video.url) {
            return;
        }

        const key = video.platform;

        if (! grouped[key]) {
            grouped[key] = [];
        }

        grouped[key].push(video);
    });

    const sections = Object.entries(grouped).map(([platform, platformVideos]) => {
        const entries = platformVideos.map(video => {
            const creator = video.creator || 'Unknown creator';

            return `${creator}\n${video.url}`;
        });

        return `${platformLabel(platform)}:\n\n${entries.join('\n\n')}`;
    });

    return [
        `We've found these resources to help you teach your dog ${behaviorName}:`,
        '',
        ...sections,
    ].join('\n\n').trim();
}

/*
|--------------------------------------------------------------------------
| FORMAT 3 — PREFERRED ONLY
|--------------------------------------------------------------------------
*/

export function buildEmailPreferredOnly(behaviorName, videos) {
    const preferredVideos = normalizeVideos(videos)
        .filter(video => video.is_preferred === 1)
        .filter(video => video.url);

    const entries = preferredVideos.map(video => {
        const creator = video.creator || 'Unknown creator';

        return `${creator}\n${video.url}`;
    });

    return [
        `We've found these preferred resources to help you teach your dog ${behaviorName}:`,
        '',
        entries.join('\n\n'),
    ].join('\n').trim();
}

/*
|--------------------------------------------------------------------------
| COPY WRAPPER
|--------------------------------------------------------------------------
*/

export async function copyEmail(text) {
    if (! text) {
        return false;
    }

    try {
        await navigator.clipboard.writeText(text);

        return true;
    } catch (error) {
        console.error('Unable to copy behavior email.', error);

        return false;
    }
}