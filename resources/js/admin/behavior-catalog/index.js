import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.data('behaviorCatalog', () => ({
    selectedBehavior: null,

    selectBehavior(behavior) {
        this.selectedBehavior = behavior;
    },

    clearBehavior() {
        this.selectedBehavior = null;
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
        if (! platform) {
            return 'Unknown platform';
        }

        return platform.charAt(0).toUpperCase() + platform.slice(1);
    },

    copyVideoUrl(url) {
        if (! url) {
            return;
        }

        navigator.clipboard.writeText(url);
    },

    copySimple() {
        if (! this.selectedBehavior) {
            return;
        }

        const text = [
            this.selectedBehavior.name,
            '',
            this.selectedBehavior.notes || '',
        ].join('\n');

        navigator.clipboard.writeText(text);
    },

    copyGrouped() {
        if (! this.selectedBehavior) {
            return;
        }

        const levels = this.selectedBehavior.levels?.length
            ? this.selectedBehavior.levels.join(', ')
            : 'No category';

        const text = [
            this.selectedBehavior.name,
            '',
            `Categories: ${levels}`,
            '',
            'Notes:',
            this.selectedBehavior.notes || 'No notes entered.',
        ].join('\n');

        navigator.clipboard.writeText(text);
    },

    copyPreferred() {
        if (! this.selectedBehavior) {
            return;
        }

        const preferred = this.preferredVideo();

        if (! preferred) {
            return;
        }

        const levels = this.selectedBehavior.levels?.length
            ? this.selectedBehavior.levels.join(', ')
            : 'No category';

        const text = [
            this.selectedBehavior.name,
            '',
            `Categories: ${levels}`,
            '',
            'Notes:',
            this.selectedBehavior.notes || 'No notes entered.',
            '',
            'Preferred Video:',
            preferred.creator || 'Untitled Video',
            preferred.url || '',
        ].join('\n');

        navigator.clipboard.writeText(text);
    },
}));