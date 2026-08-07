import Alpine from 'alpinejs';

import {
    buildEmailSimple,
    buildEmailGrouped,
    buildEmailPreferredOnly,
    copyEmail,
} from './email';

window.Alpine = Alpine;

Alpine.data('behaviorCatalog', () => ({
    selectedBehavior: null,
    copiedAction: null,
    copyFeedbackTimer: null,

    init() {
    const params = new URLSearchParams(window.location.search);
    const behaviorId = params.get('behavior');

    if (! behaviorId) {
        return;
    }

    this.$nextTick(() => {
        const button = document.querySelector(
            `[data-behavior-id="${behaviorId}"]`
        );

        if (! button) {
            return;
        }

        button.click();

        button.scrollIntoView({
            behavior: 'smooth',
            block: 'center',
        });
    });
},

    selectBehavior(behavior) {
        this.selectedBehavior = behavior;
        this.copiedAction = null;
    },

    clearBehavior() {
        this.selectedBehavior = null;
        this.copiedAction = null;
    },

    isPreferred(video) {
        return [1, '1', true, 'true'].includes(video?.is_preferred);
    },

    preferredVideo() {
        return this.selectedBehavior?.videos?.find(
            video => this.isPreferred(video)
        ) ?? null;
    },

    additionalVideos() {
        return this.selectedBehavior?.videos?.filter(
            video => ! this.isPreferred(video)
        ) ?? [];
    },

    platformLabel(platform) {
        const labels = {
            youtube: 'YouTube',
            tiktok: 'TikTok',
            instagram: 'Instagram',
            facebook: 'Facebook',
            unknown: 'Unknown platform',
        };

        const normalized = (platform || 'unknown').toLowerCase();

        return labels[normalized]
            ?? normalized.charAt(0).toUpperCase() + normalized.slice(1);
    },

    showCopyFeedback(action, success) {
        window.clearTimeout(this.copyFeedbackTimer);

        this.copiedAction = success
            ? action
            : 'failed';

        this.copyFeedbackTimer = window.setTimeout(() => {
            this.copiedAction = null;
        }, 1500);
    },

    async copyVideoUrl(url, videoId) {
        if (! url) {
            return;
        }

        const success = await copyEmail(url);

        this.showCopyFeedback(`video-${videoId}`, success);
    },

    async copySimple() {
        if (! this.selectedBehavior) {
            return;
        }

        const text = buildEmailSimple(
            this.selectedBehavior.name,
            this.selectedBehavior.videos
        );

        const success = await copyEmail(text);

        this.showCopyFeedback('simple', success);
    },

    async copyGrouped() {
        if (! this.selectedBehavior) {
            return;
        }

        const text = buildEmailGrouped(
            this.selectedBehavior.name,
            this.selectedBehavior.videos
        );

        const success = await copyEmail(text);

        this.showCopyFeedback('grouped', success);
    },

    async copyPreferred() {
        if (! this.selectedBehavior) {
            return;
        }

        const text = buildEmailPreferredOnly(
            this.selectedBehavior.name,
            this.selectedBehavior.videos
        );

        const success = await copyEmail(text);

        this.showCopyFeedback('preferred', success);
    },
}));