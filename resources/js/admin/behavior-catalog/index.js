import Alpine from "alpinejs";

import {
    buildEmailSimple,
    buildEmailGrouped,
    buildEmailPreferredOnly,
    copyEmail,
} from "./email";

window.Alpine = Alpine;

Alpine.data("behaviorCatalog", () => ({
    selectedBehavior: null,

    selectBehavior(behavior) {
        this.selectedBehavior = behavior;
    },

    clearBehavior() {
        this.selectedBehavior = null;
    },

    isPreferred(video) {
        return [1, "1", true, "true"].includes(video?.is_preferred);
    },

    preferredVideo() {
        return (
            this.selectedBehavior?.videos?.find((video) =>
                this.isPreferred(video),
            ) ?? null
        );
    },

    additionalVideos() {
        return (
            this.selectedBehavior?.videos?.filter(
                (video) => !this.isPreferred(video),
            ) ?? []
        );
    },

    platformLabel(platform) {
        if (!platform) {
            return "Unknown platform";
        }

        return platform.charAt(0).toUpperCase() + platform.slice(1);
    },

    copyVideoUrl(url) {
        if (!url) {
            return;
        }

        navigator.clipboard.writeText(url);
    },

    async copySimple() {
        if (!this.selectedBehavior) {
            return;
        }

        const text = buildEmailSimple(
            this.selectedBehavior.name,
            this.selectedBehavior.videos,
        );

        await copyEmail(text);
    },

    async copyGrouped() {
        if (!this.selectedBehavior) {
            return;
        }

        const text = buildEmailGrouped(
            this.selectedBehavior.name,
            this.selectedBehavior.videos,
        );

        await copyEmail(text);
    },

    async copyPreferred() {
        if (!this.selectedBehavior) {
            return;
        }

        const text = buildEmailPreferredOnly(
            this.selectedBehavior.name,
            this.selectedBehavior.videos,
        );

        await copyEmail(text);
    },
}));
