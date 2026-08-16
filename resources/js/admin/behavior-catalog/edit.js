import behaviorCatalogForm from './form';

const form = behaviorCatalogForm();

function confirmDeleteBehavior() {
    const confirmed = window.confirm(
        'Are you sure you want to delete this behavior? This cannot be undone.'
    );

    if (! confirmed) {
        return;
    }

    const deleteForm = document.getElementById('delete-form');

    if (! deleteForm) {
        console.error('Delete form not found.');

        return;
    }

    deleteForm.submit();
}

window.confirmDeleteBehavior = confirmDeleteBehavior;

document.addEventListener('DOMContentLoaded', () => {
    form.init();
});