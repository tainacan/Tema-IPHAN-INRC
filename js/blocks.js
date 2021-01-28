function updateButtonBlock( settings, name ) {
    if ( name !== 'core/button' ) {
        return settings;
    }
    
    settings.styles = [];
    settings.styles.push({ 
        name: "outline",
        label: "Padrão",
        isDefault: true
    });
    settings.styles.push({ 
        name: "clear",
        label: "Secundário",
        isDefault: true
    });
    return settings;
}

wp.hooks.addFilter(
    'blocks.registerBlockType',
    'iphan_inrc',
    updateButtonBlock
);