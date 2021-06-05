import { registerBlockType } from '@wordpress/blocks';
import { InnerBlocks, useBlockProps } from '@wordpress/block-editor';


function updateTitle(newTitle) {
    console.log(props.attributes.title)
    props.setAttributes({ title: newTitle.slice(0, 5) });
    props.attributes.title = props.attributes.title.slice(0, 5)
}

function updateContent(newContent) {
    if (newContent.length <= 10) {
        props.setAttributes({ content: newContent });
    } else {
        props.setAttributes({ content: newContent.slice(0, 10) });
    }
}

const TEMPLATE = [['core/heading', { placeholder: 'Insira o conteúdo do título', className: 'is-style-title-iphan-underscore', onchange: updateTitle }],
['core/paragraph', { placeholder: 'Insira o conteúdo', onchange: updateContent }],
['core/buttons', {}],
]


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
            /*          function updateTitle(newTitle) {
                         console.log(props.attributes.title)
                         props.setAttributes({ title: newTitle.slice(0, 5) });
                         props.attributes.title = props.attributes.title.slice(0, 5)
                     }
                     var content = props.attributes.content;
                     function updateContent(newContent) {
                         if (newContent.length <= 10) {
                             props.setAttributes({ content: newContent });
                         } else {
                             props.setAttributes({ content: newContent.slice(0, 10) });
                         }
                     } */
            var blockProps = useBlockProps({ className: 'style-card-iphan' });
            return (
                <div {...blockProps}>
                    <InnerBlocks template={TEMPLATE} templateLock='all' key='card' />
                </div>
            )
        },

        save: function (props) {
            var blockProps = useBlockProps.save({ className: 'style-card-iphan' });
            return (

                <div {...blockProps}>
                    <InnerBlocks.Content />
                </div>
            );
        },
    }
);