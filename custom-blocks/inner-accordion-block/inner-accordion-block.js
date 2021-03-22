var el = wp.element.createElement,
    RichText = wp.blockEditor.RichText,
    title = wp.blockEditor.RichText;
var InnerBlocks = wp.blockEditor.InnerBlocks;
var useBlockProps = wp.blockEditor.useBlockProps;

wp.blocks.registerBlockType(
    'iphan/inner-accordion-custom',
    {
        title: 'Inner block',
        icon: 'arrow-down',
        category: 'text',
        attributes: {
            title: {
                type: 'string',
                source: 'html',
                selector: 'summary',
            },
        },

        edit: function (props) {
            var title = props.attributes.title;
            function updateTitle(newTitle) {
                props.setAttributes({ title: newTitle });
            }
            var blockProps = useBlockProps();
            return el(
                'details',
                blockProps,
                [el('summary',
                    RichText,
                    el(
                        RichText,
                        {
                            value: props.attributes.title,
                            tagName: 'span',
                            type: 'text',
                            onChange: updateTitle,
                            value: title,
                            placeholder: "Insira o título",
                        }
                    ),
                ),
                el(InnerBlocks),
                ]
            );
        },

        save: function (props) {
            var blockProps = useBlockProps.save();
            return el(
                'details',
                blockProps,
                [
                    el('summary',
                        RichText.Content,
                        el(
                            RichText.Content,
                            {
                                tagName: 'span',
                                value: props.attributes.title
                            }
                        )),
                    el(InnerBlocks.Content),
                ]
            );
        },
    }
);