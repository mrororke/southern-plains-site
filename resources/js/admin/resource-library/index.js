import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.data('resourceLibrary', () => ({
    selectedResource: null,

    selectResource(resource) {
        this.selectedResource = resource;
    },

    clearResource() {
        this.selectedResource = null;
    },
}));