export default function resourceLibrary() {
    return {
        selectedResource: null,

        init() {
            const params = new URLSearchParams(
                window.location.search
            );

            const resourceId = params.get('resource');

            if (! resourceId) {
                return;
            }

            this.$nextTick(() => {
                const button = document.querySelector(
                    `[data-resource-id="${resourceId}"]`
                );

                if (! button) {
                    return;
                }

                button.click();

                const container = button.closest(
                    '#resource-index'
                );

                if (! container) {
                    return;
                }

                container.scrollTo({
                    top: button.offsetTop - 16,
                    behavior: 'smooth',
                });
            });
        },

        selectResource(resource) {
            this.selectedResource = resource;
        },

        clearResource() {
            this.selectedResource = null;
        },
    };
}