import { buildEmailGrouped, copyEmail } from "../utils/trickEmailFormatter";

export default function behaviorPreview() {
    return {
        behaviors: [],

        loading: false,

        init() {
            window.addEventListener("behaviors-updated", (event) => {
                this.loadBehaviors(event.detail);
            });
        },

        formatLevel(value) {
            if (!value) {
                return "";
            }

            return value
                .replaceAll("_", " ")
                .replace(/\b\w/g, (letter) => letter.toUpperCase());
        },

        loadBehaviors(ids) {
            if (!ids.length) {
                this.behaviors = [];
                return;
            }

            this.loading = true;

            Promise.all(
                ids.map((id) =>
                    fetch(`/admin/trick-catalog/${id}/show-data`).then(
                        (response) => response.json(),
                    ),
                ),
            )
                .then((data) => {
                    this.behaviors = data;
                })
                .catch((error) => {
                    console.error("Unable to load behavior preview", error);
                })
                .finally(() => {
                    this.loading = false;
                });
        },

        copyGroupedEmail(behavior, button) {
            const text = buildEmailGrouped(behavior.name, behavior.videos);

            copyEmail(text, button);
        },
    };
}
