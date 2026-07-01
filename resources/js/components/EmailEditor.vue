<script setup>
import { EditorContent, useEditor } from '@tiptap/vue-3'
import StarterKit from '@tiptap/starter-kit'

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