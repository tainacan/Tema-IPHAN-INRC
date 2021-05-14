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
            function updateTitle(newContent) {
                props.setAttributes({ content: newContent });
            }
            var blockProps = useBlockProps({ className: 'style-card-iphan' });
            return el(
                'div',
                blockProps,
                [el(
                    RichText,
                    el(
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
                    )
                ),
                el(
                    RichText,
                    el(
                        RichText,
                        {
                            value: props.attributes.content,
                            tagName: 'p',
                            type: 'text',
                            onChange: updateTitle,
                            value: title,
                            placeholder: "Insira o título",
                            className: 'tainacan-icon tainacan-icon-plus span-summary',
                        }
                    )
                ),
                ]
            );
        },

        save: function (props) {
            var blockProps = useBlockProps.save();
            return el(
                'details',
                blockProps,
                [el(
                    RichText.Content,
                    {
                        tagName: 'summary',
                        value: props.attributes.title,
                        className: 'tainacan-icon tainacan-icon-plus',
                    }
                ),
                el(
                    InnerBlocks.Content,
                    {
                        className: 'p-details collapse'
                    }
                ),
                ]
            );
        },
    }
);