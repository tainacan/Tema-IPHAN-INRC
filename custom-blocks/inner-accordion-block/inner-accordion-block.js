var el = wp.element.createElement,
    RichText = wp.blockEditor.RichText,
    title = wp.blockEditor.RichText;
var InnerBlocks = wp.blockEditor.InnerBlocks;
var useBlockProps = wp.blockEditor.useBlockProps;

wp.blocks.registerBlockType(
    'iphan/inner-accordion-custom',
    {
        title: 'Collapse',
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
            jQuery('span').on('click', function (event) {
                if (!jQuery(this).siblings().hasClass('collapse')) {
                    jQuery(this).siblings().addClass('collapse')
                    jQuery(this).siblings().addClass('show')
                }
                if (jQuery(this).siblings().hasClass('show')) {
                    jQuery(this).siblings().removeClass('show')
                    jQuery(this).removeClass('tainacan-icon-plus')
                    jQuery(this).addClass('tainacan-icon-minus')
                } else {
                    jQuery(this).siblings().addClass('show')
                    jQuery(this).removeClass('tainacan-icon-minus')
                    jQuery(this).addClass('tainacan-icon-plus')
                }
            })
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