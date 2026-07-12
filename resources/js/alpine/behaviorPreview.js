export default function behaviorPreview() {

    return {

        behaviors: [],

        loading: false,


        init() {

            window.addEventListener(
                'behaviors-updated',
                event => {

                    this.loadBehaviors(event.detail)

                }
            )

        },


        loadBehaviors(ids) {

            if (!ids.length) {

                this.behaviors = []
                return

            }


            this.loading = true


            Promise.all(
                ids.map(id =>
                    fetch(`/admin/trick-catalog/${id}/show-data`)
                        .then(response => response.json())
                )
            )
            .then(data => {

                this.behaviors = data

            })
            .catch(error => {

                console.error(
                    'Unable to load behavior preview',
                    error
                )

            })
            .finally(() => {

                this.loading = false

            })

        }

    }

}