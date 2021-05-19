var el = wp.element.createElement,
    RichText = wp.blockEditor.RichText,
    title = wp.blockEditor.RichText;
var InnerBlocks = wp.blockEditor.InnerBlocks;
var useBlockProps = wp.blockEditor.useBlockProps;

const accordionIcon = el('svg', { version: '1.1', viewBox: '0 0 137.5 137.5' },
    el('g', { transform: "translate(.054061 -1.114)" },
        el('g', { transform: "matrix(1.143 0 0 1.143 5.8333 7.0014)" },
            [el('path', { d: "m7 6v98h96v-98zm92 94h-88v-12h88zm0-16h-88v-42h88zm0-46h-88v-12h88zm-88-16v-12h88v12z" }),
            el('g', { transform: "translate(-1.0251 .17085)", ariaLabel: "+" },
                el('path', { d: "m92.094 12.331v2.9718h2.9604v1.3384h-2.9604v2.9718h-1.3498v-2.9718h-2.9604v-1.3384h2.9604v-2.9718z", strokeWidth: ".29037" })
            ),
            el('g', { transform: "translate(-1.0251 78.25)", ariaLabel: "+" },
                el('path', {
                    d: "m92.094 12.331v2.9718h2.9604v1.3384h-2.9604v2.9718h-1.3498v-2.9718h-2.9604v-1.3384h2.9604v-2.9718z",
                    strokeWidth: ".29037"
                })
            ),
            ]
        )));


wp.blocks.registerBlockType(
    'iphan/inner-accordion-custom',
    {
        title: 'Collapse',
        icon:
            accordionIcon,
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