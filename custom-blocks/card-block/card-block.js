var el = wp.element.createElement,
    RichText = wp.blockEditor.RichText,
    title = wp.blockEditor.RichText;
var InnerBlocks = wp.blockEditor.InnerBlocks;
var useBlockProps = wp.blockEditor.useBlockProps;

wp.blocks.registerBlockType(
    'iphan/card-block-iphan',
    {
        title: 'Card IPHAN',
        icon:'universal-access-alt',
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
            var blockProps = useBlockProps();
            return el(
                'div',
                blockProps,
                [el(
                    RichText,
                    {
                        value: props.attributes.title,
                        tagName: 'span',
                        type: 'text',
                        onChange: updateTitle,

                        value: title,
                        placeholder: "Insira o título",
                        className: 'tainacan-icon tainacan-icon-plus span-summary',
                    }
                ),
                el(InnerBlocks,
                    {
                        className: 'p-details collapse'
                    }),
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