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
            return el('details',
                RichText,
                [el(
                    RichText,
                    {
                        value: props.attributes.title,
                        tagName: 'summary',
                        type: 'text',
                        onChange: updateTitle,
                        value: title,
                        placeholder: "Insira o título",
                        className: 'tainacan-icon tainacan-icon-showmore',
                    }
                ),
                el(
                    RichText,
                    {
                        value: props.attributes.content,
                        tagName: 'p',
                        type: 'text',
                        onChange: onChangeConteudo,
                        value: content,
                        placeholder: "Insira o seu texto"
                    }
                )]
            );
        },
        save: function (props) {
            var blockProps = wp.blockEditor.useBlockProps.save();
            return (el('details',
                blockProps,
                [el(
                    RichText.Content,
                    {
                        tagName: 'summary',
                        className: 'tainacan-icon tainacan-icon-showmore',
                        value: props.attributes.title
                    }),
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
;