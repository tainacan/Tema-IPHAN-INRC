var el = wp.element.createElement,
    RichText = wp.blockEditor.RichText,
    title = wp.blockEditor.RichText;
var InnerBlocks = wp.blockEditor.InnerBlocks;
var useBlockProps = wp.blockEditor.useBlockProps;

wp.blocks.registerBlockType(
    'iphan/card-block',
    {
        title: 'Card Block IPHAN',
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