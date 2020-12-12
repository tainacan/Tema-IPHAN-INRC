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
        register_block_style(            
            'core/heading',            
             array(                
               'name'  => 'title-iphan',                
               'label' =>  'Título IPHAN ',            
            )        
        );

        register_block_style(            
            'core/column',            
             array(                
               'name'  => 'column-iphan',                
               'label' =>  'Coluna IPHAN ',            
            )        
        );
    }
}add_action( 'init', 'iphan_block_styles' );