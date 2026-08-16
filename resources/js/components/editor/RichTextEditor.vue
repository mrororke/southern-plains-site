<template>
    <div>

        <!-- Toolbar -->
        <div
            class="flex flex-wrap gap-2 mb-3
                   border-b border-gray-200 pb-2"
        >

            <!-- H2 -->
            <button
                type="button"
                @click="toggleHeading"
                :class="buttonClass(
                    isActive('heading', { level: 2 })
                )"
            >
                H2
            </button>

            <!-- Bold -->
            <button
                type="button"
                @click="toggleBold"
                :class="buttonClass(
                    isActive('bold')
                )"
            >
                Bold
            </button>

            <!-- Italic -->
            <button
                type="button"
                @click="toggleItalic"
                :class="buttonClass(
                    isActive('italic')
                )"
            >
                Italic
            </button>

            <!-- Unordered List -->
            <button
                type="button"
                @click="toggleBulletList"
                :class="buttonClass(
                    isActive('bulletList')
                )"
            >
                UL
            </button>

            <!-- Ordered List -->
            <button
                type="button"
                @click="toggleOrderedList"
                :class="buttonClass(
                    isActive('orderedList')
                )"
            >
                OL
            </button>

            <!-- Blockquote -->
            <button
                type="button"
                @click="toggleBlockquote"
                :class="buttonClass(
                    isActive('blockquote')
                )"
            >
                Quote
            </button>

            <!-- Link -->
            <button
                type="button"
                @click="setLink"
                :class="buttonClass(
                    isActive('link')
                )"
            >
                Link
            </button>

            <!-- Clear Formatting -->
            <button
                type="button"
                @click="clearFormatting"
                :class="buttonClass(false)"
            >
                Clear
            </button>

        </div>


        <!-- Editor -->
        <div
            class="min-h-[200px] border p-3
                   [&_.ProseMirror]:min-h-[180px]
                   [&_.ProseMirror]:outline-none
                   [&_.ProseMirror_ul]:list-disc
                   [&_.ProseMirror_ul]:pl-6
                   [&_.ProseMirror_ol]:list-decimal
                   [&_.ProseMirror_ol]:pl-6
                   [&_.ProseMirror_li]:my-1
                   [&_.ProseMirror_blockquote]:border-l-4
                   [&_.ProseMirror_blockquote]:border-sp-burntClay
                   [&_.ProseMirror_blockquote]:pl-4
                   [&_.ProseMirror_blockquote]:italic
                   [&_.ProseMirror_blockquote]:text-sp-slate"
        >
            <EditorContent :editor="editor" />
        </div>


        <!-- Hidden input for Laravel -->
        <input
            type="hidden"
            :name="name"
            :value="html"
        />

    </div>
</template>


<script setup>
import { ref, onBeforeUnmount } from "vue";
import { useEditor, EditorContent } from "@tiptap/vue-3";
import StarterKit from "@tiptap/starter-kit";


/*
|--------------------------------------------------------------------------
| Tiptap Configuration
|--------------------------------------------------------------------------
|
| Uses StarterKit as the shared editing foundation for all
| Dashboard V2 rich text fields.
|
| Limit headings to H2 to maintain consistent content hierarchy
| across the application.
|
*/


const props = defineProps({
    name: {
        type: String,
        required: true,
    },

    value: {
        type: String,
        default: "",
    },
});


const html = ref(props.value || "");


const editor = useEditor({
    content: props.value || "",

    extensions: [
        StarterKit.configure({
            heading: {
                levels: [2],
            },

            link: {
                openOnClick: false,
                autolink: true,
                linkOnPaste: true,
            },
        }),
    ],

    onUpdate: ({ editor }) => {

        const content = editor.getHTML();

        const cleaned =
            content === "<p></p>" ||
            content === "<p><br></p>" ||
            content === '<p><br class="ProseMirror-trailingBreak"></p>'
                ? ""
                : content;

        html.value = cleaned;

    },
});


const isActive = (type, options = {}) =>
    editor.value?.isActive(type, options);


const buttonClass = (active) => [
    "px-3 py-1 text-xs uppercase border border-gray-300 hover:bg-gray-100",
    active ? "bg-gray-200" : "",
];


/*
|--------------------------------------------------------------------------
| Formatting Commands
|--------------------------------------------------------------------------
|
| Each toolbar button maps directly to a Tiptap command.
| Keep command implementations simple and reusable.
|
*/


const toggleHeading = () =>
    editor.value
        ?.chain()
        .focus()
        .toggleHeading({ level: 2 })
        .run();


const toggleBold = () =>
    editor.value
        ?.chain()
        .focus()
        .toggleBold()
        .run();


const toggleItalic = () =>
    editor.value
        ?.chain()
        .focus()
        .toggleItalic()
        .run();


const toggleBulletList = () =>
    editor.value
        ?.chain()
        .focus()
        .toggleBulletList()
        .run();


const toggleOrderedList = () =>
    editor.value
        ?.chain()
        .focus()
        .toggleOrderedList()
        .run();


const toggleBlockquote = () =>
    editor.value
        ?.chain()
        .focus()
        .toggleBlockquote()
        .run();


/*
|--------------------------------------------------------------------------
| Link
|--------------------------------------------------------------------------
*/


const setLink = () => {

    if (!editor.value) {
        return;
    }


    const existingHref =
        editor.value.getAttributes("link").href ?? "";


    const url = window.prompt(
        "Enter URL",
        existingHref
    );


    if (url === null) {
        return;
    }


    if (url.trim() === "") {

        editor.value
            .chain()
            .focus()
            .extendMarkRange("link")
            .unsetLink()
            .run();

        return;
    }


    editor.value
        .chain()
        .focus()
        .extendMarkRange("link")
        .setLink({
            href: url.trim(),
            target: "_blank",
            rel: "noopener noreferrer",
        })
        .run();

};


/*
|--------------------------------------------------------------------------
| Clear Formatting
|--------------------------------------------------------------------------
*/


const clearFormatting = () => {

    editor.value
        ?.chain()
        .focus()
        .unsetAllMarks()
        .clearNodes()
        .run();

};


/*
|--------------------------------------------------------------------------
| Cleanup
|--------------------------------------------------------------------------
*/


onBeforeUnmount(() => {
    editor.value?.destroy();
});

</script>