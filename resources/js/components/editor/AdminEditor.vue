<template>
    <div>
        <label class="text-sm font-bold block mb-2">Notes</label>

        <!-- Toolbar -->
        <div class="flex gap-2 mb-3 border-b border-gray-200 pb-2">
            <button
                type="button"
                @click="toggleHeading"
                :class="[
                    'px-3 py-1 text-xs uppercase border border-gray-300 hover:bg-gray-100',
                    isActive('heading', { level: 2 }) ? 'bg-gray-200' : ''
                ]"
            >
                H2
            </button>

            <button
                type="button"
                @click="toggleBold"
                :class="[
                    'px-3 py-1 text-xs uppercase border border-gray-300 hover:bg-gray-100',
                    isActive('bold') ? 'bg-gray-200' : ''
                ]"
            >
                Bold
            </button>

            <button
                type="button"
                @click="toggleItalic"
                :class="[
                    'px-3 py-1 text-xs uppercase border border-gray-300 hover:bg-gray-100',
                    isActive('italic') ? 'bg-gray-200' : ''
                ]"
            >
                Italic
            </button>

            <button
                type="button"
                @click="toggleList"
                :class="[
                    'px-3 py-1 text-xs uppercase border border-gray-300 hover:bg-gray-100',
                    isActive('bulletList') ? 'bg-gray-200' : ''
                ]"
            >
                List
            </button>
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
import { ref, onBeforeUnmount } from "vue";
import { useEditor, EditorContent } from "@tiptap/vue-3";
import StarterKit from "@tiptap/starter-kit";

const props = defineProps({
    name: String,
    value: String,
});

const html = ref(props.value || "");

const editor = useEditor({
    content: props.value || "",
    extensions: [StarterKit],
    onUpdate: ({ editor }) => {
        html.value = editor.getHTML();
    },
});

const isActive = (type, options = {}) =>
    editor.value?.isActive(type, options);

const toggleBold = () => editor.value?.chain().focus().toggleBold().run();

const toggleItalic = () => editor.value?.chain().focus().toggleItalic().run();

const toggleHeading = () =>
    editor.value?.chain().focus().toggleHeading({ level: 2 }).run();

const toggleList = () =>
    editor.value?.chain().focus().toggleBulletList().run();

onBeforeUnmount(() => {
    editor?.destroy();
});
</script>