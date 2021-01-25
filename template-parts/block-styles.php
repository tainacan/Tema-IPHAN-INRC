<?php
/**
 * Block Styles
 */
if ( function_exists( 'register_block_style' ) ) {
	/**
	 * Register block styles.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function iphan_block_styles() {
        wp_register_style('style', get_template_directory_uri() . '/style.css', false);
        register_block_style(            
            'core/heading',            
             array(                
               'name'  => 'title-iphan-underscore',                
               'label' =>  'Título IPHAN Sublinhado ', 
                'isDefault' => true, 
            )        
        );

        register_block_style(            
            'core/column',            
             array(                
               'name'  => 'column-iphan',                
               'label' =>  'Coluna IPHAN ',    
               'isDefault' => true,        
            )        
        );

        register_block_style(            
            'core/group',            
             array(                
               'name'  => 'column-iphan',                
               'label' =>  'Coluna IPHAN ',   
               'isDefault' => true,  
            )        
        );
    }
}add_action( 'init', 'iphan_block_styles' );

?>