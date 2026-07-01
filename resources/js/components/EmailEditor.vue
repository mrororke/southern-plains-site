<template>
  <div class="border rounded p-4">
    <div v-if="editor">
      <button
        type="button"
        @click="editor.chain().focus().toggleBold().run()"
        class="border px-2 py-1 mr-2"
      >
        Bold
      </button>

      <EditorContent :editor="editor" />
    </div>

    <div v-else>
      Loading editor...
    </div>
  </div>
</template>

<script setup>
import { onBeforeUnmount } from 'vue'
import { EditorContent, useEditor } from '@tiptap/vue-3'
import StarterKit from '@tiptap/starter-kit'

const editor = useEditor({
  content: '<p>Hello world</p>',
  extensions: [StarterKit],
})

onBeforeUnmount(() => {
  editor?.destroy()
})
</script>