export default function searchableCheckboxList(items, initialSelected = []) {

    return {

        items,

        search: '',

        selected: initialSelected.map(Number),

        filtered() {

            if (!this.search) {
                return this.items;
            }

            const term = this.search.toLowerCase();

            return this.items.filter(item =>
                item.name.toLowerCase().includes(term)
            );

        },

        init() {

            this.$watch('selected', (value) => {

                window.dispatchEvent(
                    new CustomEvent('behaviors-updated', {
                        detail: value
                    })
                );

            });

        }

    };

}