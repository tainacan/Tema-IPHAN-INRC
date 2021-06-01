import { registerBlockType } from '@wordpress/blocks';
import { InnerBlocks, useBlockProps } from '@wordpress/block-editor';


registerBlockType(
    'iphan/card-block-iphan',
    {
        title: 'Cartão do IPHAN',
        icon: 'text',
        category: 'text',
        attributes: {
            title: {
                type: 'string',
                source: 'html',
                selector: 'h1',
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
                console.log(props.attributes.title)
                props.setAttributes({ title: newTitle.slice(0, 50) });
                props.attributes.title = props.attributes.title.slice(0, 50)
            }
            var content = props.attributes.content;
            function updateContent(newContent) {
                if (newContent.length <= 200) {
                    props.setAttributes({ content: newContent });
                } else {
                    props.setAttributes({ content: newContent.slice(0, 200) });
                }
            }
            var blockProps = useBlockProps({ className: 'style-card-iphan' });
            return (/* el(
                'div',
                blockProps,
                [el(
                    RichText,
                    {
                        value: title,
                        tagName: 'h1',
                        type: 'text',
                        height: '100px',
                        onChange: updateTitle,
                        placeholder: "Insira o título",
                        className: 'is-style-title-iphan-underscore ',
                    }
                ),
                el(
                    RichText,
                    {
                        value: content,
                        tagName: 'p',
                        type: 'text',
                        onChange: updateContent,
                        placeholder: "Insira o conteúdo",
                        className: 'content-card-iphan',
                    }
                ),
                el(
                    InnerBlocks,
                    { allowedBlocks: ['core/buttons'] }
                )
                ]); */

                <div {...blockProps}>
                    <h1 {...blockProps} onChange={updateTitle} placeholder="Insira o título" style=" height: 100px" className="is-style-title-iphan-underscore" >{this.attributes.title}</h1>
                    <p {...blockProps} onChange={updateContent} placeholder="Insira o conteúdo" className="content-card-iphan" >{this.attributes.content}</p>
                    <div>
                        <InnerBlocks />
                    </div>
                </div >)
        },

        save: function (props) {
            var blockProps = useBlockProps.save({ className: 'style-card-iphan' });
            return el(
                'div',
                blockProps,
                [el(
                    RichText.Content,
                    {
                        tagName: 'h1',
                        value: props.attributes.title,
                        className: 'is-style-title-iphan-underscore'
                    }
                ),
                el(
                    RichText.Content,
                    {
                        tagName: 'p',
                        value: props.attributes.content,
                        className: 'content-card-iphan'
                    }
                ),
                el(
                    InnerBlocks.Content,
                ),
                ]
            );
        },
    }
);