<template>
  <div class="border rounded-lg bg-white">

    <!-- Toolbar -->
    <div class="flex flex-wrap gap-2 p-3 border-b bg-gray-50">

      <button @click="toggleBold" :class="btnClass">
        Bold
      </button>

      <button @click="toggleItalic" :class="btnClass">
        Italic
      </button>

      <button @click="toggleHeading" :class="btnClass">
        H2
      </button>

      <button @click="toggleBulletList" :class="btnClass">
        List
      </button>

      <button @click="setParagraph" :class="btnClass">
        P
      </button>

    </div>

    <!-- Editor -->
    <div class="p-4 min-h-[200px]">
      <EditorContent :editor="editor" />
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

const btnClass =
  'px-3 py-1 text-sm border rounded hover:bg-gray-100'

const toggleBold = () => {
  editor.value?.chain().focus().toggleBold().run()
}

const toggleItalic = () => {
  editor.value?.chain().focus().toggleItalic().run()
}

const toggleHeading = () => {
  editor.value?.chain().focus().toggleHeading({ level: 2 }).run()
}

const toggleBulletList = () => {
  editor.value?.chain().focus().toggleBulletList().run()
}

const setParagraph = () => {
  editor.value?.chain().focus().setParagraph().run()
}

onBeforeUnmount(() => {
  editor?.destroy()
})
</script>