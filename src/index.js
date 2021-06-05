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
            return (
                /*                 <div {...blockProps}>
                                    <h1 {...blockProps} onChange={updateTitle} placeholder="Insira o título" style=" height: 100px" className="is-style-title-iphan-underscore" >{props.attributes.title}</h1>
                                    <p {...blockProps} onChange={updateContent} placeholder="Insira o conteúdo" className="content-card-iphan" >{props.attributes.content}</p>
                                    <div>
                                        <InnerBlocks  allowedBlocks={ 'core/button' }/>
                                    </div>
                                </div> */
                <div {...blockProps}>
                    <InnerBlocks allowedBlocks={['core/buttons']} />
                </div>
            )
        },

        save: function (props) {
            var blockProps = useBlockProps.save({ className: 'style-card-iphan' });
            return (

                <div {...blockProps}>
                    <InnerBlocks.Content />
                </div>
                /*                 <div {...blockProps}>
                                    <h1 {...blockProps} style=" height: 100px" className="is-style-title-iphan-underscore" >{props.attributes.title}</h1>
                                    <p {...blockProps} className="content-card-iphan" >{props.attributes.content}</p>
                                    <div>
                                        <InnerBlocks.Content />
                                    </div>
                                </div> */
            );
        },
    }
);