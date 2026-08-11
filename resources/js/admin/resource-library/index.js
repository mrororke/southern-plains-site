export default function resourceLibrary() {
    return {
        selectedResource: null,

        selectResource(resource) {
            this.selectedResource = resource;
        },

        clearResource() {
            this.selectedResource = null;
        },
    };
}