import { Node, mergeAttributes } from "@tiptap/core";

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
                    element.getAttribute("data-icon") || "info",

                renderHTML: attributes => ({
                    "data-icon": attributes.icon,
                }),
            },
        };
    },

    parseHTML() {
        return [
            {
                tag: 'div[data-content-block="callout"]',
            },
        ];
    },

    renderHTML({ HTMLAttributes }) {
        return [
            "div",
            mergeAttributes(HTMLAttributes, {
                "data-content-block": "callout",
                class: "learn-callout",
            }),
            0,
        ];
    },

    addCommands() {
        return {
            insertCallout:
                (icon = "info") =>
                ({ commands }) =>
                    commands.insertContent({
                        type: this.name,
                        attrs: { icon },
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
                tag: 'div[data-content-block="callout"] > h3',
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