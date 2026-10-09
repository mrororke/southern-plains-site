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
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <!-- Info -->
                    <template v-if="node.attrs.icon === 'info'">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M12 16v-4" />
                        <path d="M12 8h.01" />
                    </template>

                    <!-- Lightbulb -->
                    <template v-else-if="node.attrs.icon === 'lightbulb'">
                        <path
                            d="M9 18h6m-5 4h4m-5-7.09A6 6 0 1 1 15
                               14.9c-.64.5-1 1.1-1 2.1h-4
                               c0-1-.36-1.6-1-2.09Z"
                        />
                    </template>

                    <!-- Alert Circle -->
                    <template v-else>
                        <circle cx="12" cy="12" r="10" />
                        <path d="M12 8v4" />
                        <path d="M12 16h.01" />
                    </template>
                </svg>
            </div>

            <!-- Editable title and body -->
            <NodeViewContent
                class="learn-callout-content flex-1 min-w-0"
            />
        </div>
    </NodeViewWrapper>
</template>

<script setup>
import {
    NodeViewWrapper,
    NodeViewContent,
    nodeViewProps,
} from "@tiptap/vue-3";

defineProps(nodeViewProps);
</script>