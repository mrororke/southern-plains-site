export default function resourceLibrary() {
    return {
        selectedResource: null,
        copiedResource: false,
        copyFeedbackTimer: null,

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
            this.copiedResource = false;
        },

        clearResource() {
            this.selectedResource = null;
            this.copiedResource = false;
        },

        async copyResource() {
            if (! this.selectedResource?.body) {
                return;
            }

            const html = this.selectedResource.body;

            /*
            |--------------------------------------------------------------------------
            | Create Plain-Text Fallback
            |--------------------------------------------------------------------------
            */

            const container = document.createElement('div');

            container.innerHTML = html;

            const text = container.innerText.trim();

            /*
            |--------------------------------------------------------------------------
            | Copy Rich HTML
            |--------------------------------------------------------------------------
            */

            try {

                if (
                    navigator.clipboard
                    && window.ClipboardItem
                ) {
                    const clipboardItem = new ClipboardItem({
                        'text/html': new Blob(
                            [html],
                            {
                                type: 'text/html',
                            }
                        ),

                        'text/plain': new Blob(
                            [text],
                            {
                                type: 'text/plain',
                            }
                        ),
                    });

                    await navigator.clipboard.write([
                        clipboardItem,
                    ]);
                } else {

                    await navigator.clipboard.writeText(
                        text
                    );
                }

                this.showCopyFeedback();

            } catch (error) {

                /*
                |--------------------------------------------------------------------------
                | Plain-Text Fallback
                |--------------------------------------------------------------------------
                */

                try {
                    await navigator.clipboard.writeText(
                        text
                    );

                    this.showCopyFeedback();

                } catch (fallbackError) {
                    this.copiedResource = false;
                }
            }
        },

        showCopyFeedback() {
            window.clearTimeout(
                this.copyFeedbackTimer
            );

            this.copiedResource = true;

            this.copyFeedbackTimer = window.setTimeout(
                () => {
                    this.copiedResource = false;
                },
                1500
            );
        },
    };
}