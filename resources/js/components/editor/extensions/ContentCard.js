import { Node, mergeAttributes } from "@tiptap/core";

export const ContentCard = Node.create({
    name: "contentCard",

    group: "block",

    content: "block+",

    defining: true,

    parseHTML() {
        return [
            {
                tag: 'div[data-content-block="card"]',
            },
        ];
    },

    renderHTML({ HTMLAttributes }) {
        return [
            "div",
            mergeAttributes(HTMLAttributes, {
                "data-content-block": "card",
                class: "learn-content-card",
            }),
            0,
        ];
    },

    addCommands() {
        return {
            insertContentCard:
                () =>
                ({ commands }) =>
                    commands.insertContent({
                        type: this.name,
                        content: [
                            {
                                type: "paragraph",
                                content: [
                                    {
                                        type: "text",
                                        text: "Write your card content here.",
                                    },
                                ],
                            },
                        ],
                    }),
        };
    },
});