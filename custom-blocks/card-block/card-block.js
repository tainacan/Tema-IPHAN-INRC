var el = wp.element.createElement,
    RichText = wp.blockEditor.RichText,
    title = wp.blockEditor.RichText;
var InnerBlocks = wp.blockEditor.InnerBlocks;
var useBlockProps = wp.blockEditor.useBlockProps;

wp.blocks.registerBlockType(
    'iphan/card-block-iphan',
    {
        title: 'Card IPHAN',
        icon: 'universal-access-alt',
        category: 'text',
        attributes: {
            title: {
                type: 'string',
                source: 'html',
                selector: 'div',
            },
        },

        edit: function (props) {
            var title = props.attributes.title;
            function updateTitle(newTitle) {
                props.setAttributes({ title: newTitle });
            }
            var content = props.attributes.content;
            function updateContent(newContent) {
                props.setAttributes({ content: newContent });
            }
            var blockProps = useBlockProps({ className: 'style-card-iphan' });
            return el(
                'div',
                blockProps,
                [el(
                    RichText,
                    {
                        value: props.attributes.title,
                        tagName: 'h1',
                        type: 'text',
                        onChange: updateTitle,
                        value: title,
                        placeholder: "Insira o título",
                        className: 'is-style-title-iphan-underscore',
                    }
                ),
                el(
                    RichText,
                    {
                        value: props.attributes.content,
                        tagName: 'p',
                        type: 'text',
                        onChange: updateContent,
                        value: content,
                        placeholder: "Insira o conteúdo",
                        className: 'content-card-iphan',
                    }
                ),
                ]
            );
        },

        save: function (props) {
            var blockProps = useBlockProps.save({ className: 'style-card-iphan' });
            return el(
                'div',
                blockProps,
                [el(
                    RichText.Content,
                    {
                        tagName: 'h1',
                        value: props.attributes.title,
                        className: 'is-style-title-iphan-underscore',
                    }
                ),
                el(
                    RichText.Content,
                    {
                        tagName: 'p',
                        value: props.attributes.content,
                        className: 'content-card-iphan',
                    }
                ),
                ]
            );
        },
    }
);