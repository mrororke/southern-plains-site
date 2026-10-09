<template>
    <div>
        <!-- Toolbar -->
        <div class="flex flex-wrap gap-2 mb-3 border-b border-gray-200 pb-2">

            <!-- Headings -->
            <button type="button" @click="toggleHeading(2)"
                :class="buttonClass(isActive('heading', { level: 2 }))">
                H2
            </button>

            <button type="button" @click="toggleHeading(3)"
                :class="buttonClass(isActive('heading', { level: 3 }))">
                H3
            </button>

            <button type="button" @click="setNavigationLabel"
                :disabled="!isActive('heading', { level: 2 })"
                :class="buttonClass(hasNavigationLabel)"
                title="Set a shorter guide navigation label">
                Nav Label
            </button>

            <span class="w-px bg-gray-200 mx-1"></span>

            <!-- Text formatting -->
            <button type="button" @click="toggleBold"
                :class="buttonClass(isActive('bold'))">Bold</button>

            <button type="button" @click="toggleItalic"
                :class="buttonClass(isActive('italic'))">Italic</button>

            <button type="button" @click="toggleBulletList"
                :class="buttonClass(isActive('bulletList'))">UL</button>

            <button type="button" @click="toggleOrderedList"
                :class="buttonClass(isActive('orderedList'))">OL</button>

            <button type="button" @click="toggleBlockquote"
                :class="buttonClass(isActive('blockquote'))">Quote</button>

            <button type="button" @click="setLink"
                :class="buttonClass(isActive('link'))">Link</button>

            <span class="w-px bg-gray-200 mx-1"></span>

            <!-- Content blocks -->
            <select
    v-model="selectedCalloutIcon"
    @change="updateCalloutIcon"
    class="text-xs border border-gray-300 px-2 py-1"
    title="Choose callout icon"
>
                <option value="info">Info</option>
                <option value="lightbulb">Lightbulb</option>
                <option value="alert-circle">Alert Circle</option>
            </select>

            <button type="button" @click="insertCallout"
                :class="buttonClass(isActive('callout'))">
                Callout
            </button>

            <button type="button" @click="insertCard"
                :class="buttonClass(isActive('contentCard'))">
                Card
            </button>

            <button type="button" @click="insertDivider"
                :class="buttonClass(false)">
                Divider
            </button>

            <span class="w-px bg-gray-200 mx-1"></span>

            <!-- Cleanup -->
            <button type="button" @click="clearFormatting"
                :class="buttonClass(false)">Clear</button>

            <button type="button" @click="undo"
                :disabled="!editor?.can().undo()"
                :class="buttonClass(false)">Undo</button>

            <button type="button" @click="redo"
                :disabled="!editor?.can().redo()"
                :class="buttonClass(false)">Redo</button>
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
        <input type="hidden" :name="name" :value="html" />
    </div>
</template>

<script setup>
import { ref, computed, onBeforeUnmount } from "vue";
import { useEditor, EditorContent } from "@tiptap/vue-3";
import StarterKit from "@tiptap/starter-kit";
import Heading from "@tiptap/extension-heading";

import { Callout, CalloutTitle } from "./extensions/Callout";
import { ContentCard } from "./extensions/ContentCard";

const props = defineProps({
    name: { type: String, required: true },
    value: { type: String, default: "" },
});

const html = ref(props.value || "");
const selectedCalloutIcon = ref("info");

/*
|--------------------------------------------------------------------------
| Custom Heading Extension
|--------------------------------------------------------------------------
*/

const CustomHeading = Heading.extend({
    addAttributes() {
        return {
            ...this.parent?.(),
            navLabel: {
                default: null,
                parseHTML: element =>
                    element.getAttribute("data-nav-label"),
                renderHTML: attributes =>
                    attributes.navLabel
                        ? { "data-nav-label": attributes.navLabel }
                        : {},
            },
        };
    },
});

/*
|--------------------------------------------------------------------------
| Editor
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
        CustomHeading.configure({ levels: [2, 3] }),
        Callout,
        CalloutTitle,
        ContentCard,
    ],

    onUpdate: ({ editor }) => {
        const content = editor.getHTML();

        html.value = (
            content === "<p></p>" ||
            content === "<p><br></p>" ||
            content === '<p><br class="ProseMirror-trailingBreak"></p>'
        ) ? "" : content;
    },

    onSelectionUpdate: ({ editor }) => {
        if (editor.isActive("callout")) {
            selectedCalloutIcon.value =
                editor.getAttributes("callout").icon || "info";
        }
    },
});

/*
|--------------------------------------------------------------------------
| State
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
| Headings
|--------------------------------------------------------------------------
*/

const toggleHeading = level =>
    editor.value?.chain().focus().toggleHeading({ level }).run();

const setNavigationLabel = () => {
    if (!editor.value?.isActive("heading", { level: 2 })) return;

    const existing = editor.value.getAttributes("heading").navLabel ?? "";
    const label = window.prompt(
        "Navigation label (leave blank to use the full heading)",
        existing
    );

    if (label === null) return;

    editor.value.chain().focus().updateAttributes("heading", {
        navLabel: label.trim() || null,
    }).run();
};

/*
|--------------------------------------------------------------------------
| Formatting
|--------------------------------------------------------------------------
*/

const toggleBold = () =>
    editor.value?.chain().focus().toggleBold().run();

const toggleItalic = () =>
    editor.value?.chain().focus().toggleItalic().run();

const toggleBulletList = () =>
    editor.value?.chain().focus().toggleBulletList().run();

const toggleOrderedList = () =>
    editor.value?.chain().focus().toggleOrderedList().run();

const toggleBlockquote = () =>
    editor.value?.chain().focus().toggleBlockquote().run();

const setLink = () => {
    if (!editor.value) return;

    const existing = editor.value.getAttributes("link").href ?? "";
    const url = window.prompt("Enter URL (blank to remove)", existing);

    if (url === null) return;

    if (url.trim() === "") {
        editor.value.chain().focus().extendMarkRange("link").unsetLink().run();
        return;
    }

    if (/^(javascript|data|vbscript):/i.test(url.trim())) {
        window.alert("Please enter a valid link URL.");
        return;
    }

    editor.value.chain().focus().extendMarkRange("link").setLink({
        href: url.trim(),
        target: "_blank",
        rel: "noopener noreferrer",
    }).run();
};

const clearFormatting = () =>
    editor.value?.chain().focus().unsetAllMarks().clearNodes().run();

/*
|--------------------------------------------------------------------------
| Content Blocks
|--------------------------------------------------------------------------
*/

const insertCallout = () =>
    editor.value?.chain().focus()
        .insertCallout(selectedCalloutIcon.value).run();

const updateCalloutIcon = () => {
    if (!editor.value?.isActive("callout")) {
        return;
    }

    editor.value
        .chain()
        .focus()
        .updateAttributes("callout", {
            icon: selectedCalloutIcon.value,
        })
        .run();
};

const insertCard = () =>
    editor.value?.chain().focus().insertContentCard().run();

const insertDivider = () =>
    editor.value?.chain().focus().setHorizontalRule().run();

/*
|--------------------------------------------------------------------------
| History
|--------------------------------------------------------------------------
*/

const undo = () =>
    editor.value?.chain().focus().undo().run();

const redo = () =>
    editor.value?.chain().focus().redo().run();

onBeforeUnmount(() => editor.value?.destroy());
</script>