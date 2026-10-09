import { Node, mergeAttributes } from "@tiptap/core";
import { VueNodeViewRenderer } from "@tiptap/vue-3";
import CalloutView from "../nodeviews/CalloutView.vue";

export const allowedCalloutIcons = [
    "info",
    "lightbulb",
    "alert-circle",
];

export const Callout = Node.create({
    name: "callout",

    group: "block",

    content: "calloutTitle block+",

    defining: true,

    addAttributes() {
        return {
            icon: {
                default: "info",

                parseHTML: element => {
                    const icon = element.getAttribute("data-icon");

                    return allowedCalloutIcons.includes(icon)
                        ? icon
                        : "info";
                },

                renderHTML: attributes => ({
                    "data-icon": allowedCalloutIcons.includes(attributes.icon)
                        ? attributes.icon
                        : "info",
                }),
            },
        };
    },

    parseHTML() {
        return [
            {
                tag: 'div[data-content-block="callout"]',
                contentElement: ".learn-callout-content",
            },
        ];
    },

    renderHTML({ HTMLAttributes }) {
        const icon = allowedCalloutIcons.includes(HTMLAttributes["data-icon"])
            ? HTMLAttributes["data-icon"]
            : "info";

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
                    "data-lucide": icon,
                    "aria-hidden": "true",
                },
            ],
            [
                "div",
                { class: "learn-callout-content" },
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
                            icon: allowedCalloutIcons.includes(icon)
                                ? icon
                                : "info",
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