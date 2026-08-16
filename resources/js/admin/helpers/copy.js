export function copyText(text) {

    navigator.clipboard.writeText(text)
        .then(() => {
            console.log('Copied');
        })
        .catch(error => {
            console.error('Copy failed', error);
        });

}