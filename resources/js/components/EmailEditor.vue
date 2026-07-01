<script setup>
import { EditorContent, useEditor } from '@tiptap/vue-3'
import StarterKit from '@tiptap/starter-kit'
import { onMounted } from 'vue'

onMounted(() => {
    console.log('🔥 EmailEditor mounted')
})

const editor = useEditor({
    extensions: [
        StarterKit,
    ],
    content: '',
})
</script>

<template>
    <div class="border rounded p-4">

        <button
            type="button"
            @click="editor?.chain().focus().toggleBold().run()"
        >
            Bold
        </button>

        <EditorContent :editor="editor" />
    </div>
</template>