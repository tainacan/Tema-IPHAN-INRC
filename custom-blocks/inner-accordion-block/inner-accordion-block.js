/* (function (blocks, element, blockEditor) { */
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
            content: {
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
            /*             var content = props.attributes.content;
                        function onChangeConteudo(novoConteudo) {
                            props.setAttributes({ content: novoConteudo });
                        } */
            var blockProps = useBlockProps();
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
                        placeholder: "Insira o título"
                    }
                ),
                el(
                    blockProps,
                    el(InnerBlocks)
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
                    blockProps,
                    el(InnerBlocks.Content)
                )]
            ))
        },
    }
);
/* }) */