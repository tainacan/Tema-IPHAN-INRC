import { registerBlockType } from '@wordpress/blocks';
import { InnerBlocks, useBlockProps } from '@wordpress/block-editor';

const TEMPLATE = [['core/heading', { placeholder: 'Insira o conteúdo do título', className: 'is-style-title-iphan-underscore' }],
['core/paragraph', { placeholder: 'Insira o conteúdo', maxLength: 10 }],
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
            var blockProps = useBlockProps({ className: 'style-card-iphan' });
            return (
                <div {...blockProps}>
                    <InnerBlocks template={TEMPLATE} />
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