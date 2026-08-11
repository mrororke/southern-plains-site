export default function resourceLibrary() {
    return {
        selectedResource: null,

        init() {
            console.log('Resource Library init running');
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

                button.scrollIntoView({
                    behavior: 'smooth',
                    block: 'nearest',
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