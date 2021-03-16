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

        edit: function () {
            var blockProps = useBlockProps();

            return el(
                'details',
                blockProps,
                el(InnerBlocks)
            );
        },

        save: function () {
            var blockProps = useBlockProps.save();

            return el(
                'details',
                blockProps,
                el(InnerBlocks.Content)
            );
        },
    }
);