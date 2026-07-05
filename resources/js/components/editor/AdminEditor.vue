<template>
    <div class="border rounded p-3 bg-white">
        <div class="text-sm font-bold mb-2">Editor Loaded</div>

        <textarea
            :name="name"
            v-model="content"
            class="w-full border p-2"
        ></textarea>
    </div>
</template>

<script setup>
import { ref } from 'vue'

const props = defineProps({
    name: String,
    value: String
})

const content = ref(props.value || '')
</script>