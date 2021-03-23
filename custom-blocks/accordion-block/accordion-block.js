var el = wp.element.createElement,
    RichText = wp.blockEditor.RichText,
    title = wp.blockEditor.RichText;

wp.blocks.registerBlockType(
    'iphan/accordion-custom',
    {
        title: 'Accordion',
        icon: 'arrow-down',
        category: 'text',
        attributes: {
            title: {
                type: 'string',
                source: 'html',
                selector: 'summary',
                className: 'tainacan-icon tainacan-icon-showmore'
            },
            content: {
                type: 'string',
                source: 'html',
                selector: 'p',
            },
        },

        edit: function (props) {
            var title = props.attributes.title;
            function updateTitle(newTitle) {
                props.setAttributes({ title: newTitle });
            }
            var content = props.attributes.content;
            function onChangeConteudo(novoConteudo) {
                props.setAttributes({ content: novoConteudo });
            }
            function onClickSummary() {
                if (jQuery('.collapse').hasClass('show')) {
                    jQuery('.collapse').removeClass('show')
                } else {
                    jQuery('.collapse').addClass('show')
                }
            }
            return el('div',
                RichText,
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
                        className: 'tainacan-icon tainacan-icon-showmore span-summary',
                    },
                ),
                el(
                    RichText,
                    {
                        value: props.attributes.content,
                        tagName: 'p',
                        type: 'text',
                        onChange: onChangeConteudo,
                        value: content,
                        placeholder: "Insira o seu texto",
                        className: 'p-details collapse show',
                    }
                )]
            );
        },
        save: function (props) {
            var blockProps = wp.blockEditor.useBlockProps.save();
            return (el('details',
                blockProps,
                [el('summary',
                    RichText.Content,
                    {
                        tagName: 'summary',
                        value: props.attributes.title,
                        className: 'tainacan-icon tainacan-icon-showmore span-summary'
                    }
                ),
                el(
                    RichText.Content,
                    {
                        tagName: 'p',
                        value: props.attributes.content
                    }
                )]
            ))
        },
    }
);
