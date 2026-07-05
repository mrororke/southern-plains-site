<template>
    <div>
        <label class="text-sm font-bold block mb-2">Notes</label>

        <div class="border p-3 min-h-[200px]">
            <EditorContent :editor="editor" />
        </div>

        <input type="hidden" :name="name" :value="html" />
    </div>
</template>

<script setup>
import { computed, onBeforeUnmount } from 'vue'
import { useEditor, EditorContent } from '@tiptap/vue-3'
import StarterKit from '@tiptap/starter-kit'

const props = defineProps({
    name: String,
    value: String
})

const editor = useEditor({
    content: props.value || '',
    extensions: [StarterKit],
    onUpdate: ({ editor }) => {
        html.value = editor.getHTML()
    }
})

const html = ref(props.value || '')

onBeforeUnmount(() => {
    editor?.destroy()
})
</script>