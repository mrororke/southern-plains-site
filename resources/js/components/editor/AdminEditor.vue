<template>
    <div>
        <label class="text-sm font-bold block mb-2">Notes</label>

        <!-- Toolbar -->
        <div class="flex gap-2 mb-2">
            <button type="button" @click="toggleH2">H2</button>
            <button type="button" @click="toggleBold">Bold</button>
            <button type="button" @click="toggleItalic">Italic</button>
            <button type="button" @click="toggleList">List</button>
        </div>

        <!-- Editor -->
        <div class="border p-3 min-h-[200px]">
            <EditorContent :editor="editor" />
        </div>

        <!-- Hidden input for Laravel -->
        <input type="hidden" name="notes" :value="html" />
    </div>
</template>

<script setup>
import { ref, onBeforeUnmount } from 'vue'
import { useEditor, EditorContent } from '@tiptap/vue-3'
import StarterKit from '@tiptap/starter-kit'

const props = defineProps({
    name: String,
    value: String
})

const html = ref(props.value || '')

const editor = useEditor({
    content: props.value || '',
    extensions: [StarterKit],
    onUpdate: ({ editor }) => {
        html.value = editor.getHTML()
    }
})

const toggleBold = () => editor.value?.chain().focus().toggleBold().run()
const toggleItalic = () => editor.value?.chain().focus().toggleItalic().run()
const toggleH2 = () => editor.value?.chain().focus().toggleHeading({ level: 2 }).run()
const toggleList = () => editor.value?.chain().focus().toggleBulletList().run()

onBeforeUnmount(() => {
    editor?.destroy()
})
</script>