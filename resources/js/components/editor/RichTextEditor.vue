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
                @click="toggleHeading(2)"
                :class="buttonClass(isActive('heading', { level: 2 }))"
                title="Section heading"
            >
                H2
            </button>

            <!-- H3 -->
            <button
                type="button"
                @click="toggleHeading(3)"
                :class="buttonClass(isActive('heading', { level: 3 }))"
                title="Subsection heading"
            >
                H3
            </button>

            <!-- Navigation Label -->
            <button
                type="button"
                @click="setNavigationLabel"
                :disabled="!isActive('heading', { level: 2 })"
                :class="[
                    ...buttonClass(hasNavigationLabel),
                    !isActive('heading', { level: 2 })
                        ? 'opacity-40 cursor-not-allowed'
                        : ''
                ]"
                title="Set a shorter navigation label for an H2 heading"
            >
                Nav Label
            </button>

            <!-- Divider -->
            <span class="w-px bg-gray-200 mx-1"></span>

            <!-- Bold -->
            <button
                type="button"
                @click="toggleBold"
                :class="buttonClass(isActive('bold'))"
                title="Bold"
            >
                Bold
            </button>

            <!-- Italic -->
            <button
                type="button"
                @click="toggleItalic"
                :class="buttonClass(isActive('italic'))"
                title="Italic"
            >
                Italic
            </button>

            <!-- Divider -->
            <span class="w-px bg-gray-200 mx-1"></span>

            <!-- Unordered List -->
            <button
                type="button"
                @click="toggleBulletList"
                :class="buttonClass(isActive('bulletList'))"
                title="Bulleted list"
            >
                UL
            </button>

            <!-- Ordered List -->
            <button
                type="button"
                @click="toggleOrderedList"
                :class="buttonClass(isActive('orderedList'))"
                title="Numbered list"
            >
                OL
            </button>

            <!-- Blockquote -->
            <button
                type="button"
                @click="toggleBlockquote"
                :class="buttonClass(isActive('blockquote'))"
                title="Blockquote"
            >
                Quote
            </button>

            <!-- Link -->
            <button
                type="button"
                @click="setLink"
                :class="buttonClass(isActive('link'))"
                title="Add or edit link"
            >
                Link
            </button>

            <!-- Divider -->
            <span class="w-px bg-gray-200 mx-1"></span>

            <!-- Clear Formatting -->
            <button
                type="button"
                @click="clearFormatting"
                :class="buttonClass(false)"
                title="Remove formatting"
            >
                Clear
            </button>

            <!-- Divider -->
            <span class="w-px bg-gray-200 mx-1"></span>

            <!-- Undo -->
            <button
                type="button"
                @click="undo"
                :disabled="!editor?.can().undo()"
                :class="[
                    ...buttonClass(false),
                    !editor?.can().undo()
                        ? 'opacity-40 cursor-not-allowed'
                        : ''
                ]"
                title="Undo"
            >
                Undo
            </button>

            <!-- Redo -->
            <button
                type="button"
                @click="redo"
                :disabled="!editor?.can().redo()"
                :class="[
                    ...buttonClass(false),
                    !editor?.can().redo()
                        ? 'opacity-40 cursor-not-allowed'
                        : ''
                ]"
                title="Redo"
            >
                Redo
            </button>

        </div>


        <!-- Editor -->
        <div
            class="min-h-[200px] border p-3
                   [&_.ProseMirror]:min-h-[180px]
                   [&_.ProseMirror]:outline-none

                   [&_.ProseMirror_h2]:text-2xl
                   [&_.ProseMirror_h2]:font-semibold
                   [&_.ProseMirror_h2]:text-sp-charcoal
                   [&_.ProseMirror_h2]:mt-6
                   [&_.ProseMirror_h2]:mb-3

                   [&_.ProseMirror_h3]:text-xl
                   [&_.ProseMirror_h3]:font-semibold
                   [&_.ProseMirror_h3]:text-sp-charcoal
                   [&_.ProseMirror_h3]:mt-4
                   [&_.ProseMirror_h3]:mb-2

                   [&_.ProseMirror_p]:mb-3

                   [&_.ProseMirror_ul]:list-disc
                   [&_.ProseMirror_ul]:pl-6

                   [&_.ProseMirror_ol]:list-decimal
                   [&_.ProseMirror_ol]:pl-6

                   [&_.ProseMirror_li]:my-1

                   [&_.ProseMirror_blockquote]:border-l-4
                   [&_.ProseMirror_blockquote]:border-sp-burntClay
                   [&_.ProseMirror_blockquote]:pl-4
                   [&_.ProseMirror_blockquote]:italic
                   [&_.ProseMirror_blockquote]:text-sp-slate

                   [&_.ProseMirror_a]:text-sp-prairieGreen
                   [&_.ProseMirror_a]:underline"
        >
            <EditorContent :editor="editor" />
        </div>


        <!-- Navigation Label Indicator -->
        <p
            v-if="isActive('heading', { level: 2 }) && hasNavigationLabel"
            class="mt-2 text-xs text-sp-slate"
        >
            Guide navigation label:
            <span class="font-semibold text-sp-charcoal">
                {{ currentNavigationLabel }}
            </span>
        </p>


        <!-- Hidden input for Laravel -->
        <input
            type="hidden"
            :name="name"
            :value="html"
        />

    </div>
</template>


<script setup>
import { ref, computed, onBeforeUnmount } from "vue";
import { useEditor, EditorContent } from "@tiptap/vue-3";
import StarterKit from "@tiptap/starter-kit";
import Heading from "@tiptap/extension-heading";


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
        default: "",
    },
});


const html = ref(props.value || "");


/*
|--------------------------------------------------------------------------
| Custom Heading Extension
|--------------------------------------------------------------------------
|
| Extends Tiptap's heading extension to support an optional
| data-nav-label attribute.
|
| This attribute is used by Evergreen Guides to generate
| shorter navigation labels without changing the article heading.
|
| Standard Articles can use the same editor without needing
| navigation labels.
|
*/

const CustomHeading = Heading.extend({

    addAttributes() {

        return {

            ...this.parent?.(),

            navLabel: {

                default: null,

                parseHTML: element =>
                    element.getAttribute("data-nav-label"),

                renderHTML: attributes => {

                    if (!attributes.navLabel) {
                        return {};
                    }

                    return {
                        "data-nav-label": attributes.navLabel,
                    };

                },

            },

        };

    },

});


/*
|--------------------------------------------------------------------------
| Tiptap Configuration
|--------------------------------------------------------------------------
*/

const editor = useEditor({

    content: props.value || "",

    extensions: [

        StarterKit.configure({

            heading: false,

            link: {
                openOnClick: false,
                autolink: true,
                linkOnPaste: true,
            },

        }),

        CustomHeading.configure({
            levels: [2, 3],
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


/*
|--------------------------------------------------------------------------
| Editor State
|--------------------------------------------------------------------------
*/

const isActive = (type, options = {}) =>
    editor.value?.isActive(type, options) ?? false;


const currentNavigationLabel = computed(() => {

    if (!editor.value?.isActive("heading", { level: 2 })) {
        return "";
    }

    return editor.value.getAttributes("heading").navLabel ?? "";

});


const hasNavigationLabel = computed(() =>
    currentNavigationLabel.value.trim() !== ""
);


const buttonClass = active => [

    "px-3 py-1 text-xs uppercase border border-gray-300 transition-colors hover:bg-gray-100",

    active ? "bg-gray-200" : "",

];


/*
|--------------------------------------------------------------------------
| Heading Commands
|--------------------------------------------------------------------------
*/

const toggleHeading = level => {

    editor.value
        ?.chain()
        .focus()
        .toggleHeading({ level })
        .run();

};


/*
|--------------------------------------------------------------------------
| Navigation Label
|--------------------------------------------------------------------------
|
| Only available when the cursor is inside an H2.
|
| Leaving the prompt empty removes the custom label.
| The public guide will then use the full H2 text.
|
*/

const setNavigationLabel = () => {

    if (!editor.value) {
        return;
    }

    if (!editor.value.isActive("heading", { level: 2 })) {
        return;
    }

    const existingLabel =
        editor.value.getAttributes("heading").navLabel ?? "";

    const label = window.prompt(
        "Navigation label (leave blank to use the full heading)",
        existingLabel
    );

    if (label === null) {
        return;
    }

    const cleanedLabel = label.trim();

    editor.value
        .chain()
        .focus()
        .updateAttributes("heading", {
            navLabel: cleanedLabel || null,
        })
        .run();

};


/*
|--------------------------------------------------------------------------
| Formatting Commands
|--------------------------------------------------------------------------
*/

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
        "Enter URL (leave blank to remove link)",
        existingHref
    );

    if (url === null) {
        return;
    }

    const cleanedUrl = url.trim();

    if (cleanedUrl === "") {

        editor.value
            .chain()
            .focus()
            .extendMarkRange("link")
            .unsetLink()
            .run();

        return;
    }

    // Reject potentially unsafe URL schemes.
    if (/^(javascript|data|vbscript):/i.test(cleanedUrl)) {

        window.alert("Please enter a valid link URL.");
        return;

    }

    editor.value
        .chain()
        .focus()
        .extendMarkRange("link")
        .setLink({
            href: cleanedUrl,
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
| History
|--------------------------------------------------------------------------
*/

const undo = () =>
    editor.value
        ?.chain()
        .focus()
        .undo()
        .run();


const redo = () =>
    editor.value
        ?.chain()
        .focus()
        .redo()
        .run();


/*
|--------------------------------------------------------------------------
| Cleanup
|--------------------------------------------------------------------------
*/

onBeforeUnmount(() => {
    editor.value?.destroy();
});

</script>