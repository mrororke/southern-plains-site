<template>
    <div>
        <label class="text-sm font-bold block mb-2">Notes</label>

        <textarea
            v-model="content"
            class="w-full border p-2 min-h-[200px]"
            :name="name"
        ></textarea>
    </div>
</template>

<script setup>
import { ref } from 'vue'

const props = defineProps({
    name: {
        type: String,
        default: 'notes'
    },
    value: {
        type: String,
        default: ''
    }
})

const content = ref(props.value)
</script>