import { Node, mergeAttributes } from "@tiptap/core";
import { VueNodeViewRenderer } from "@tiptap/vue-3";
import CalloutView from "../nodeviews/CalloutView.vue";

export const allowedCalloutIcons = [
    "info",
    "lightbulb",
    "alert-circle",
];

const normalizeIcon = icon =>
    allowedCalloutIcons.includes(icon) ? icon : "info";

export const Callout = Node.create({
    name: "callout",

    group: "block",

    content: "calloutTitle block+",

    defining: true,

    addAttributes() {
        return {
            icon: {
                default: "info",

                parseHTML: element =>
                    normalizeIcon(element.getAttribute("data-icon")),

                renderHTML: attributes => ({
                    "data-icon": normalizeIcon(attributes.icon),
                }),
            },
        };
    },

    parseHTML() {
        return [
            {
                tag: 'div[data-content-block="callout"]',

                // Existing callouts may have content directly
                // inside the wrapper or inside this container.
                contentElement: element =>
                    element.querySelector(
                        ":scope > .learn-callout-content"
                    ) ||
                    element.querySelector(
                        ":scope > div > .learn-callout-content"
                    ) ||
                    element,
            },
        ];
    },

    renderHTML({ HTMLAttributes }) {
        const icon = normalizeIcon(HTMLAttributes["data-icon"]);

        return [
            "div",
            mergeAttributes(HTMLAttributes, {
                "data-content-block": "callout",
                class: "learn-callout",
            }),
            [
                "span",
                {
                    class: "learn-callout-icon",
                    "data-lucide":
                        icon === "alert-circle"
                            ? "circle-alert"
                            : icon,
                    "aria-hidden": "true",
                },
            ],
            [
                "div",
                {
                    class: "learn-callout-content",
                },
                0,
            ],
        ];
    },

    addNodeView() {
        return VueNodeViewRenderer(CalloutView);
    },

    addCommands() {
        return {
            insertCallout:
                (icon = "info") =>
                ({ commands }) =>
                    commands.insertContent({
                        type: this.name,

                        attrs: {
                            icon: normalizeIcon(icon),
                        },

                        content: [
                            {
                                type: "calloutTitle",
                                content: [
                                    {
                                        type: "text",
                                        text: "Callout title",
                                    },
                                ],
                            },
                            {
                                type: "paragraph",
                                content: [
                                    {
                                        type: "text",
                                        text: "Write your callout here.",
                                    },
                                ],
                            },
                        ],
                    }),
        };
    },
});

export const CalloutTitle = Node.create({
    name: "calloutTitle",

    group: "block",

    content: "inline*",

    defining: true,

    parseHTML() {
        return [
            {
                tag: "h3.learn-callout-title",
            },
        ];
    },

    renderHTML({ HTMLAttributes }) {
        return [
            "h3",
            mergeAttributes(HTMLAttributes, {
                class: "learn-callout-title",
            }),
            0,
        ];
    },
});