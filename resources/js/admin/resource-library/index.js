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

            setTimeout(() => {

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

            }, 100);
        },

        selectResource(resource) {
            this.selectedResource = resource;
        },

        clearResource() {
            this.selectedResource = null;
        },
    };
}