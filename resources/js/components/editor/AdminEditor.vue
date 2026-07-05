<template>
    <div class="border rounded-lg bg-white overflow-hidden">

        <!-- Toolbar -->
        <div class="flex gap-2 p-3 border-b bg-gray-50">
            <button type="button" @click="toggleHeading" class="btn">H2</button>
            <button type="button" @click="toggleBold" class="btn">Bold</button>
            <button type="button" @click="toggleItalic" class="btn">Italic</button>
            <button type="button" @click="toggleList" class="btn">List</button>
        </div>

        <!-- Editor -->
        <div class="p-4 min-h-[250px]">
            <EditorContent :editor="editor" />
        </div>

        <!-- Hidden field submitted with Laravel form -->
        <textarea
            :name="name"
            :value="content"
            hidden
            readonly
        ></textarea>

    </div>
</template>

<script setup>
import { ref, watch, onBeforeUnmount } from 'vue'
import { EditorContent, useEditor } from '@tiptap/vue-3'
import StarterKit from '@tiptap/starter-kit'

/*
|--------------------------------------------------------------------------
| Props
|--------------------------------------------------------------------------
*/

const props = defineProps({
    name: {
        type: String,
        required: true,
    },

    value: {
        type: String,
        default: '',
    },

    placeholder: {
        type: String,
        default: '',
    },
})

/*
|--------------------------------------------------------------------------
| Reactive HTML
|--------------------------------------------------------------------------
*/

const content = ref(props.value)

/*
|--------------------------------------------------------------------------
| TipTap
|--------------------------------------------------------------------------
*/

const editor = useEditor({
    content: props.value || '<p></p>',

    extensions: [
        StarterKit,
    ],

    onUpdate({ editor }) {
        content.value = editor.getHTML()
    },
})

/*
|--------------------------------------------------------------------------
| Watch for external updates
|--------------------------------------------------------------------------
*/

watch(
    () => props.value,
    (value) => {

        if (!editor.value) return

        if (value !== editor.value.getHTML()) {
            editor.value.commands.setContent(value || '<p></p>', false)
        }
    }
)

/*
|--------------------------------------------------------------------------
| Toolbar
|--------------------------------------------------------------------------
*/

const toggleBold = () =>
    editor.value?.chain().focus().toggleBold().run()

const toggleItalic = () =>
    editor.value?.chain().focus().toggleItalic().run()

const toggleHeading = () =>
    editor.value?.chain().focus().toggleHeading({ level: 2 }).run()

const toggleList = () =>
    editor.value?.chain().focus().toggleBulletList().run()

/*
|--------------------------------------------------------------------------
| Cleanup
|--------------------------------------------------------------------------
*/

onBeforeUnmount(() => {
    editor.value?.destroy()
})
</script>

<style scoped>
.btn {
    padding: 4px 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 0.875rem;
}

.btn:hover {
    background: #f3f4f6;
}

.ProseMirror {
    min-height: 220px;
    outline: none;
}

.ProseMirror p {
    margin: 0.5rem 0;
}

.ProseMirror ul {
    padding-left: 1.5rem;
    list-style-type: disc;
}

.ProseMirror h2 {
    font-size: 1.5rem;
    font-weight: 600;
    margin: 1rem 0 0.5rem;
}
</style>