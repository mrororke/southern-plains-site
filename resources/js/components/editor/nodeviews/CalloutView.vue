<template>
    <NodeViewWrapper
        class="learn-callout"
        data-content-block="callout"
        :data-icon="node.attrs.icon"
    >
        <div class="flex items-start gap-4">

            <!-- Icon -->
            <div
                class="mt-0.5 h-6 w-6 shrink-0 text-sp-prairieOchre"
                contenteditable="false"
                aria-hidden="true"
                v-html="iconSvg"
            ></div>

            <!-- Editable Content -->
            <NodeViewContent
                class="learn-callout-content flex-1 min-w-0"
            />

        </div>
    </NodeViewWrapper>
</template>

<script setup>
import { computed } from "vue";
import {
    NodeViewWrapper,
    NodeViewContent,
    nodeViewProps,
} from "@tiptap/vue-3";

import {
    createElement,
    Info,
    Lightbulb,
    CircleAlert,
} from "lucide";

const props = defineProps(nodeViewProps);

const iconComponents = {
    info: Info,
    lightbulb: Lightbulb,
    "alert-circle": CircleAlert,
};

const iconSvg = computed(() => {
    const icon = iconComponents[props.node.attrs.icon] || Info;

    /*
     * Lucide's icon definitions are SVG element data.
     * Build a static SVG string for display inside the editor.
     */

    const svg = createElement(icon, {
        width: 24,
        height: 24,
        strokeWidth: 2,
    });

    return svg.outerHTML;
});
</script>