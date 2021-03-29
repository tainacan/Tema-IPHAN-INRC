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
            function onClickSummary() {
                var element = document.getElementsByClassName('span-summary')
                var irmao = element[0].nextSibling.childNodes[0].childNodes[0]
                if (!jQuery(irmao).hasClass('collapse')) {
                    jQuery(irmao).addClass('collapse')
                    jQuery(irmao).addClass('show')
                }
                if (jQuery('.collapse').hasClass('show')) {
                    jQuery('.collapse').removeClass('show')
                    jQuery('.span-summary').removeClass('tainacan-icon-plus')
                    jQuery('.span-summary').addClass('tainacan-icon-minus')
                } else {
                    jQuery('.collapse').addClass('show')
                    jQuery('.span-summary').addClass('rotate-icon')
                    jQuery('.span-summary').removeClass('tainacan-icon-minus')
                    jQuery('.span-summary').addClass('tainacan-icon-plus')
                }
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
                        onClick: onClickSummary,
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
                        className: 'tainacan-icon tainacan-icon-showmore'
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