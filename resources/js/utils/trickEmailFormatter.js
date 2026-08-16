/*
|--------------------------------------------------------------------------
| Normalize Videos
|--------------------------------------------------------------------------
*/

function normalizeVideos(videos = []) {

    return videos.map(video => ({
        ...video,
        is_preferred: Number(video.is_preferred || 0),
        platform: (video.platform || 'unknown').toLowerCase().trim(),
    }))

}


/*
|--------------------------------------------------------------------------
| Platform Display Names
|--------------------------------------------------------------------------
*/

const PLATFORM_NAMES = {
    youtube: 'YouTube',
    facebook: 'Facebook',
    instagram: 'Instagram',
    tiktok: 'TikTok',
    unknown: 'Other',
}


/*
|--------------------------------------------------------------------------
| Preferred Platform Order
|--------------------------------------------------------------------------
*/

const PLATFORM_ORDER = [
    'youtube',
    'facebook',
    'instagram',
    'tiktok',
    'unknown',
]


/*
|--------------------------------------------------------------------------
| Format 1 — Simple
|--------------------------------------------------------------------------
*/

export function buildEmailSimple(trickName, videos = []) {

    const links = [
        ...new Set(
            normalizeVideos(videos)
                .map(video => video.url)
                .filter(Boolean)
        )
    ]

    return `We've found these resources to help you teach your dog ${trickName}:\n\n${links.join('\n')}`

}


/*
|--------------------------------------------------------------------------
| Format 2 — Grouped By Platform
|--------------------------------------------------------------------------
*/

export function buildEmailGrouped(trickName, videos = []) {

    const grouped = {}

    normalizeVideos(videos).forEach(video => {

        if (!video.url) {
            return
        }

        if (!grouped[video.platform]) {
            grouped[video.platform] = []
        }

        if (!grouped[video.platform].includes(video.url)) {
            grouped[video.platform].push(video.url)
        }

    })

    let output = `We've found these resources to help you teach your dog ${trickName}:\n\n`

    PLATFORM_ORDER.forEach(platform => {

        if (!grouped[platform]?.length) {
            return
        }

        output += `${PLATFORM_NAMES[platform]}:\n`

        grouped[platform].forEach(url => {
            output += `${url}\n`
        })

        output += '\n'

    })

    return output.trim()

}


/*
|--------------------------------------------------------------------------
| Format 3 — Preferred Only
|--------------------------------------------------------------------------
*/

export function buildEmailPreferredOnly(trickName, videos = []) {

    const links = [
        ...new Set(
            normalizeVideos(videos)
                .filter(video => video.is_preferred === 1)
                .map(video => video.url)
                .filter(Boolean)
        )
    ]

    return `We've found these preferred resources to help you teach your dog ${trickName}:\n\n${links.join('\n')}`

}


/*
|--------------------------------------------------------------------------
| Clipboard Helper
|--------------------------------------------------------------------------
*/

export function copyEmail(text, button = null) {

    navigator.clipboard.writeText(text).then(() => {

        if (!button) {
            return
        }

        const label = button.querySelector('.copy-label')

        if (!label) {
            return
        }

        const original = label.innerText

        label.innerText = 'Copied ✓'

        button.classList.add('opacity-70')

        setTimeout(() => {

            label.innerText = original
            button.classList.remove('opacity-70')

        }, 1500)

    }).catch(() => {

        if (!button) {
            return
        }

        const label = button.querySelector('.copy-label')

        if (!label) {
            return
        }

        label.innerText = 'Failed'

        setTimeout(() => {

            label.innerText = 'Copy'

        }, 1500)

    })

}