<script setup>
import { EditorContent, useEditor } from '@tiptap/vue-3'
import StarterKit from '@tiptap/starter-kit'

const props = defineProps({
    modelValue: {
        type: String,
        default: ''
    }
})

const emit = defineEmits([
    'update:modelValue'
])

const editor = useEditor({
    content: props.modelValue,

    extensions: [
        StarterKit,
    ],

    onUpdate({ editor }) {
        emit(
            'update:modelValue',
            editor.getHTML()
        )
    }
})
</script>


<template>
    <div class="border rounded p-4">

        <div class="mb-4 space-x-2">
            <button
                type="button"
                @click="editor.chain().focus().toggleBold().run()"
            >
                Bold
            </button>
        </div>


        <EditorContent :editor="editor" />

    </div>
</template>