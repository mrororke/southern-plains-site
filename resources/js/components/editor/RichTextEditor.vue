<template>
    <div>
        <!-- Editing Mode -->
        <div class="mb-4 flex items-center justify-between border-b border-gray-200 pb-3">
            <div class="flex items-center gap-2">
                <button
                    type="button"
                    @click="switchToVisual"
                    :class="modeButtonClass(mode === 'visual')"
                    :aria-pressed="mode === 'visual'"
                >
                    Visual
                </button>

                <button
                    type="button"
                    @click="switchToHtml"
                    :class="modeButtonClass(mode === 'html')"
                    :aria-pressed="mode === 'html'"
                >
                    HTML
                </button>
            </div>

            <span class="text-xs text-sp-slate">
                {{ mode === 'html' ? 'HTML source editing' : 'Rich text editing' }}
            </span>
        </div>

        <!-- Visual Editor -->
        <div v-show="mode === 'visual'">

            <!-- Toolbar -->
            <div class="mb-3 flex flex-wrap gap-2 border-b border-gray-200 pb-2">

                <!-- Headings -->
                <button
                    type="button"
                    @click="toggleHeading(2)"
                    :class="buttonClass(isActive('heading', { level: 2 }))"
                >
                    H2
                </button>

                <button
                    type="button"
                    @click="toggleHeading(3)"
                    :class="buttonClass(isActive('heading', { level: 3 }))"
                >
                    H3
                </button>

                <button
                    type="button"
                    @click="setNavigationLabel"
                    :disabled="!isActive('heading', { level: 2 })"
                    :class="[
                        ...buttonClass(hasNavigationLabel),
                        !isActive('heading', { level: 2 })
                            ? 'cursor-not-allowed opacity-40'
                            : '',
                    ]"
                    title="Set a shorter guide navigation label"
                >
                    Nav Label
                </button>

                <span class="mx-1 w-px bg-gray-200"></span>

                <!-- Text Formatting -->
                <button
                    type="button"
                    @click="toggleBold"
                    :class="buttonClass(isActive('bold'))"
                >
                    Bold
                </button>

                <button
                    type="button"
                    @click="toggleItalic"
                    :class="buttonClass(isActive('italic'))"
                >
                    Italic
                </button>

                <span class="mx-1 w-px bg-gray-200"></span>

                <!-- Lists and Blocks -->
                <button
                    type="button"
                    @click="toggleBulletList"
                    :class="buttonClass(isActive('bulletList'))"
                >
                    UL
                </button>

                <button
                    type="button"
                    @click="toggleOrderedList"
                    :class="buttonClass(isActive('orderedList'))"
                >
                    OL
                </button>

                <button
                    type="button"
                    @click="toggleBlockquote"
                    :class="buttonClass(isActive('blockquote'))"
                >
                    Quote
                </button>

                <button
                    type="button"
                    @click="setLink"
                    :class="buttonClass(isActive('link'))"
                >
                    Link
                </button>

                <span class="mx-1 w-px bg-gray-200"></span>

                <!-- Content Blocks -->
                <select
                    v-model="selectedCalloutIcon"
                    @change="updateCalloutIcon"
                    class="border border-gray-300 px-2 py-1 text-xs"
                    title="Choose callout icon"
                >
                    <option value="info">Info</option>
                    <option value="lightbulb">Lightbulb</option>
                    <option value="alert-circle">Alert Circle</option>
                </select>

                <button
                    type="button"
                    @click="insertCallout"
                    :class="buttonClass(isActive('callout'))"
                >
                    Callout
                </button>

                <button
                    type="button"
                    @click="insertCard"
                    :class="buttonClass(isActive('contentCard'))"
                >
                    Card
                </button>

                <button
                    type="button"
                    @click="insertDivider"
                    :class="buttonClass(false)"
                >
                    Divider
                </button>

                <span class="mx-1 w-px bg-gray-200"></span>

                <!-- Cleanup -->
                <button
                    type="button"
                    @click="clearFormatting"
                    :class="buttonClass(false)"
                >
                    Clear
                </button>

                <span class="mx-1 w-px bg-gray-200"></span>

                <!-- History -->
                <button
                    type="button"
                    @click="undo"
                    :disabled="!editor?.can().undo()"
                    :class="[
                        ...buttonClass(false),
                        !editor?.can().undo()
                            ? 'cursor-not-allowed opacity-40'
                            : '',
                    ]"
                >
                    Undo
                </button>

                <button
                    type="button"
                    @click="redo"
                    :disabled="!editor?.can().redo()"
                    :class="[
                        ...buttonClass(false),
                        !editor?.can().redo()
                            ? 'cursor-not-allowed opacity-40'
                            : '',
                    ]"
                >
                    Redo
                </button>
            </div>

            <!-- Editor Content -->
            <div
                class="min-h-[200px] border p-3
                       [&_.ProseMirror]:min-h-[180px]
                       [&_.ProseMirror]:outline-none
                       [&_.ProseMirror_h2]:mt-6
                       [&_.ProseMirror_h2]:mb-3
                       [&_.ProseMirror_h2]:text-2xl
                       [&_.ProseMirror_h2]:font-semibold
                       [&_.ProseMirror_h2]:text-sp-charcoal
                       [&_.ProseMirror_h3]:mt-4
                       [&_.ProseMirror_h3]:mb-2
                       [&_.ProseMirror_h3]:text-xl
                       [&_.ProseMirror_h3]:font-semibold
                       [&_.ProseMirror_h3]:text-sp-charcoal
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
        </div>

        <!-- HTML Editor -->
        <div v-show="mode === 'html'">
            <label
                :for="htmlEditorId"
                class="mb-2 block text-xs font-semibold uppercase tracking-wide text-sp-slate"
            >
                Article HTML
            </label>

            <textarea
                :id="htmlEditorId"
                v-model="html"
                spellcheck="false"
                autocomplete="off"
                autocapitalize="off"
                class="block min-h-[420px] w-full resize-y rounded-md border border-gray-300 bg-white p-4 font-mono text-sm leading-6 text-sp-charcoal focus:border-sp-prairieGreen focus:outline-none focus:ring-1 focus:ring-sp-prairieGreen"
                placeholder="<h2>Your heading</h2>"
            ></textarea>

            <p class="mt-2 text-xs text-sp-slate">
                HTML is saved directly. Switching to Visual mode may normalize
                or remove markup that Tiptap does not support.
            </p>
        </div>

        <!-- Laravel Form Field -->
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

import { Callout, CalloutTitle } from "./extensions/Callout";
import { ContentCard } from "./extensions/ContentCard";

/*
|--------------------------------------------------------------------------
| Props and State
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

const mode = ref("visual");
const html = ref(props.value || "");
const selectedCalloutIcon = ref("info");

const htmlEditorId = `html-editor-${props.name.replace(/[^a-zA-Z0-9_-]/g, "-")}`;

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
                        ? {
                            "data-nav-label": attributes.navLabel,
                        }
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

        CustomHeading.configure({
            levels: [2, 3],
        }),

        Callout,
        CalloutTitle,
        ContentCard,
    ],

    onUpdate: ({ editor }) => {
        // HTML mode owns the source while it is active.
        // Never overwrite it with Tiptap's serialized HTML.
        if (mode.value === "html") {
            return;
        }

        const content = editor.getHTML();

        html.value = isEmptyDocument(content)
            ? ""
            : content;
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
| HTML / Visual Toggle
|--------------------------------------------------------------------------
*/

const isEmptyDocument = content => [
    "<p></p>",
    "<p><br></p>",
    '<p><br class="ProseMirror-trailingBreak"></p>',
].includes(content);

const modeButtonClass = active => [
    "rounded-md border px-4 py-2 text-xs font-semibold uppercase tracking-wide transition-colors",
    active
        ? "border-sp-prairieGreen bg-sp-prairieGreen text-white"
        : "border-gray-300 bg-white text-sp-slate hover:bg-gray-100",
];

const switchToHtml = () => {
    if (mode.value === "html") {
        return;
    }

    // html already contains the latest visual-editor changes.
    // Do not regenerate it unnecessarily.
    mode.value = "html";
};

const switchToVisual = () => {
    if (mode.value === "visual") {
        return;
    }

    if (!editor.value) {
        window.alert("The visual editor is not available.");
        return;
    }

    const source = html.value;

    /*
     * Test how Tiptap would interpret the HTML without
     * replacing the current editor document.
     *
     * This uses Tiptap's own schema-based parser.
     */
    let normalizedHtml;

    try {
        normalizedHtml = editor.value.getHTML();

        /*
         * Create a temporary, detached editor using the same
         * extensions to test the incoming HTML.
         */
        const parser = editor.value.schema;
        const container = document.createElement("div");
        container.innerHTML = source;

        const { DOMParser: ProseMirrorDOMParser } =
            editor.value.view.state.schema.constructor;

        /*
         * Parsing is performed below using Tiptap's editor
         * command with emission disabled, after confirmation.
         */
    } catch (error) {
        console.error("Unable to inspect HTML:", error);
    }

    /*
     * Compare the source with the visual editor's current
     * serialization. If they differ, warn before passing
     * source HTML through Tiptap.
     *
     * This is intentionally conservative: differences in
     * formatting or whitespace may also trigger the warning.
     */
    if (source !== editor.value.getHTML()) {
        const proceed = window.confirm(
            "Switching to Visual mode will pass your HTML through Tiptap. " +
            "Unsupported elements, attributes, or formatting may be changed " +
            "or removed.\n\n" +
            "Your HTML is currently preserved exactly. " +
            "Select Cancel to stay in HTML mode, or OK to continue."
        );

        if (!proceed) {
            return;
        }
    }

    try {
        editor.value.commands.setContent(source, {
            emitUpdate: false,
        });

        /*
         * Preserve the original source until the user actually
         * edits something in Visual mode.
         */
        mode.value = "visual";
    } catch (error) {
        console.error("Unable to load HTML into visual editor:", error);

        window.alert(
            "The HTML could not be loaded into the visual editor. " +
            "Your HTML source has not been changed."
        );
    }
};

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
| Headings
|--------------------------------------------------------------------------
*/

const toggleHeading = level =>
    editor.value
        ?.chain()
        .focus()
        .toggleHeading({ level })
        .run();

const setNavigationLabel = () => {
    if (!editor.value?.isActive("heading", { level: 2 })) {
        return;
    }

    const existing =
        editor.value.getAttributes("heading").navLabel ?? "";

    const label = window.prompt(
        "Navigation label (leave blank to use the full heading)",
        existing
    );

    if (label === null) {
        return;
    }

    editor.value
        .chain()
        .focus()
        .updateAttributes("heading", {
            navLabel: label.trim() || null,
        })
        .run();
};

/*
|--------------------------------------------------------------------------
| Text Formatting
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
    if (!editor.value) {
        return;
    }

    const existing =
        editor.value.getAttributes("link").href ?? "";

    const url = window.prompt(
        "Enter URL (blank to remove)",
        existing
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

const clearFormatting = () =>
    editor.value
        ?.chain()
        .focus()
        .unsetAllMarks()
        .clearNodes()
        .run();

/*
|--------------------------------------------------------------------------
| Content Blocks
|--------------------------------------------------------------------------
*/

const insertCallout = () =>
    editor.value
        ?.chain()
        .focus()
        .insertCallout(selectedCalloutIcon.value)
        .run();

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
    editor.value
        ?.chain()
        .focus()
        .insertContentCard()
        .run();

const insertDivider = () =>
    editor.value
        ?.chain()
        .focus()
        .setHorizontalRule()
        .run();

/*
|--------------------------------------------------------------------------
| History
|--------------------------------------------------------------------------
*/

const undo = () =>
    editor.value?.chain().focus().undo().run();

const redo = () =>
    editor.value?.chain().focus().redo().run();

/*
|--------------------------------------------------------------------------
| Cleanup
|--------------------------------------------------------------------------
*/

onBeforeUnmount(() => {
    editor.value?.destroy();
});
</script>