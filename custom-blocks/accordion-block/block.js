const { registerBlockType } = wp.blocks

var el = wp.element.createElement,
    RichText = wp.blockEditor.RichText,
    title = wp.blockEditor.RichText;

registerBlockType(
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
                selector: 'details',
            },
        },

        edit: function (props) {
            var title = props.attributes.title;
            function updateTitle(newTitle) {
                props.setAttributes({ title: newTitle.target.value });
            }
            var content = props.attributes.content;
            function onChangeConteudo(novoConteudo) {
                props.setAttributes({ content: novoConteudo });
            }
            return el('details',
                RichText,
                el('summary',
                    el(
                        RichText,
                        {
                            tagName: 'summary',
                            type: 'text',
                            placeholder: 'Titulo',
                            value: title,
                            onChange: updateTitle,
                        }
                    )),
                el(
                    RichText,
                    {
                        tagName: 'p',
                        onChange: onChangeConteudo,
                        value: content,
                        placeholder: "Insira o seu texto"
                    }
                )
            );
        },

        save: function (props) {
            return el('details',
                el(
                    RichText.Content,
                    {
                        tagName: 'summary',
                        value: props.attributes.title
                    }),
                el(
                    RichText.Content,
                    {
                        tagName: 'p',
                        value: props.attributes.content
                    }
                )
            )
        },
    }
);
;