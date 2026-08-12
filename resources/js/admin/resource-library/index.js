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

                const reader = document.querySelector(
                    '#resource-reader'
                );

                if (! reader) {
                    return;
                }

                reader.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start',
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