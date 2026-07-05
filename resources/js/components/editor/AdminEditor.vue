<template>
    <div>
        <label class="text-sm font-bold block mb-2">Notes</label>

        <div class="border p-3 min-h-[200px]">
            <EditorContent :editor="editor" />
        </div>
    </div>
</template>

<script setup>
import { onBeforeUnmount } from 'vue'
import { useEditor, EditorContent } from '@tiptap/vue-3'
import StarterKit from '@tiptap/starter-kit'

const props = defineProps({
    name: String,
    value: String
})

const editor = useEditor({
    content: props.value || '',
    extensions: [StarterKit],
})

onBeforeUnmount(() => {
    editor?.destroy()
})
</script>