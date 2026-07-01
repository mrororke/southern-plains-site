<template>
  <div class="border rounded-lg bg-white overflow-hidden">

    <!-- Toolbar -->
    <div class="flex flex-wrap gap-2 p-3 border-b bg-gray-50">

      <button type="button" @click="toggleBold" :class="btnClass">
        Bold
      </button>

      <button type="button" @click="toggleItalic" :class="btnClass">
        Italic
      </button>

      <button type="button" @click="toggleHeading" :class="btnClass">
        H2
      </button>

      <button type="button" @click="toggleBulletList" :class="btnClass">
        List
      </button>

      <button type="button" @click="setParagraph" :class="btnClass">
        P
      </button>

    </div>

    <!-- Editor -->
    <div class="p-4 min-h-[250px]">
      <EditorContent :editor="editor" />
    </div>

  </div>
</template>

<script setup>
import { onBeforeUnmount, watch } from 'vue'
import { EditorContent, useEditor } from '@tiptap/vue-3'
import StarterKit from '@tiptap/starter-kit'

/*
|--------------------------------------------------------------------------
| PROPS (v-model support)
|--------------------------------------------------------------------------
*/
const props = defineProps({
  modelValue: {
    type: String,
    default: '',
  },
  mode: {
    type: String,
    default: 'email', // email | trick | note
  },
})

const emit = defineEmits(['update:modelValue'])

/*
|--------------------------------------------------------------------------
| TIPTAP EDITOR
|--------------------------------------------------------------------------
*/
const editor = useEditor({
  content: props.modelValue,
  extensions: [StarterKit],

  onUpdate({ editor }) {
    emit('update:modelValue', editor.getHTML())
  },
})

/*
|--------------------------------------------------------------------------
| SYNC EXTERNAL CHANGES
|--------------------------------------------------------------------------
*/
watch(
  () => props.modelValue,
  (value) => {
    if (editor.value && value !== editor.value.getHTML()) {
      editor.value.commands.setContent(value || '', false)
    }
  }
)

/*
|--------------------------------------------------------------------------
| TOOLBAR ACTIONS
|--------------------------------------------------------------------------
*/
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

/*
|--------------------------------------------------------------------------
| CLEANUP
|--------------------------------------------------------------------------
*/
onBeforeUnmount(() => {
  editor?.destroy()
})
</script>