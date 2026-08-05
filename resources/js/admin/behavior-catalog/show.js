import Alpine from 'alpinejs';

import {
    buildEmailSimple,
    buildEmailGrouped,
    buildEmailPreferredOnly,
    copyEmail,
} from './email';

window.Alpine = Alpine;

Alpine.data('behaviorShow', behavior => ({
    behavior,
    copiedAction: null,

    isPreferred(video) {
        return [1, '1', true, 'true'].includes(video?.is_preferred);
    },

    preferredVideo() {
        return this.behavior?.videos?.find(
            video => this.isPreferred(video)
        ) ?? null;
    },

    additionalVideos() {
        return this.behavior?.videos?.filter(
            video => ! this.isPreferred(video)
        ) ?? [];
    },

    async showCopied(action, success) {
        this.copiedAction = success
            ? action
            : 'failed';

        window.setTimeout(() => {
            this.copiedAction = null;
        }, 1500);
    },

    async copySimple() {
        const text = buildEmailSimple(
            this.behavior.name,
            this.behavior.videos
        );

        const success = await copyEmail(text);

        this.showCopied('simple', success);
    },

    async copyGrouped() {
        const text = buildEmailGrouped(
            this.behavior.name,
            this.behavior.videos
        );

        const success = await copyEmail(text);

        this.showCopied('grouped', success);
    },

    async copyPreferred() {
        const text = buildEmailPreferredOnly(
            this.behavior.name,
            this.behavior.videos
        );

        const success = await copyEmail(text);

        this.showCopied('preferred', success);
    },

    async copyVideoUrl(url, videoId) {
        if (! url) {
            return;
        }

        const success = await copyEmail(url);

        this.showCopied(`video-${videoId}`, success);
    },
}));