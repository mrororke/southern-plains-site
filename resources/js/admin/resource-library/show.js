import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.data('resourceShow', (resourceBody = '') => ({
    resourceBody,
    copiedResource: false,
    copyFailed: false,
    copyFeedbackTimer: null,

    async copyResource() {
        if (! this.resourceBody) {
            return;
        }

        const html = this.resourceBody;

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
                this.copyFailed = true;
            }
        }
    },

    showCopyFeedback() {
        window.clearTimeout(
            this.copyFeedbackTimer
        );

        this.copyFailed = false;
        this.copiedResource = true;

        this.copyFeedbackTimer = window.setTimeout(
            () => {
                this.copiedResource = false;
            },
            1500
        );
    },
}));