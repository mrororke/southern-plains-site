<template>
  <div class="border rounded-lg bg-white overflow-hidden">

    <!-- Toolbar -->
    <div class="flex gap-2 p-3 border-b bg-gray-50">

      <button @click="toggleBold" class="btn">Bold</button>
      <button @click="toggleItalic" class="btn">Italic</button>
      <button @click="toggleHeading" class="btn">H2</button>
      <button @click="toggleList" class="btn">List</button>

    </div>

    <!-- Editor -->
    <div class="p-4 min-h-[250px]">
      <EditorContent :editor="editor" />
    </div>

  </div>
</template>

<script setup>
import { onBeforeUnmount } from 'vue'
import { EditorContent, useEditor } from '@tiptap/vue-3'
import StarterKit from '@tiptap/starter-kit'

const editor = useEditor({
  content: '<p>Start writing...</p>',
  extensions: [StarterKit],
})

const btn = 'px-3 py-1 border rounded text-sm'

const toggleBold = () => editor.value?.chain().focus().toggleBold().run()
const toggleItalic = () => editor.value?.chain().focus().toggleItalic().run()
const toggleHeading = () => editor.value?.chain().focus().toggleHeading({ level: 2 }).run()
const toggleList = () => editor.value?.chain().focus().toggleBulletList().run()

onBeforeUnmount(() => {
  editor?.destroy()
})
</script>

<style>
.btn {
  padding: 4px 10px;
  border: 1px solid #ddd;
  border-radius: 4px;
}
.ProseMirror {
  min-height: 150px;
  outline: none;
}
</style>