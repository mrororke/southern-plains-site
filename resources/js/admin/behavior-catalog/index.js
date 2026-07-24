import Alpine from 'alpinejs';
window.Alpine = Alpine;



Alpine.data('behaviorCatalog', () => ({
    selectedBehavior: null,

    selectBehavior(behavior) {
        this.selectedBehavior = behavior;
    },

    copySimple() {
        if (!this.selectedBehavior) return;

        const text = [
            this.selectedBehavior.name,
            '',
            this.selectedBehavior.notes || '',
        ].join('\n');

        navigator.clipboard.writeText(text);
    },

    copyGrouped() {
        if (!this.selectedBehavior) return;

        const levels = this.selectedBehavior.levels?.length
            ? this.selectedBehavior.levels.join(', ')
            : 'No category';

        const text = [
            this.selectedBehavior.name,
            '',
            `Categories: ${levels}`,
            '',
            'Notes:',
            this.selectedBehavior.notes || 'No notes entered.',
        ].join('\n');

        navigator.clipboard.writeText(text);
    },
}));

