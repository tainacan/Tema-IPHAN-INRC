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
               'name'  => 'title-iphan-underscore',                
               'label' =>  'Título IPHAN Sublinhado ',            
            )        
        );

        register_block_style(            
            'core/heading',            
             array(                
               'name'  => 'title-iphan',                
               'label' =>  'Título IPHAN',            
            )        
        );

        register_block_style(            
            'core/heading',            
             array(                
               'name'  => 'title-ipha-inverse',                
               'label' =>  'Título IPHAN Invertido',            
            )        
        );

        register_block_style(            
            'core/column',            
             array(                
               'name'  => 'column-iphan',                
               'label' =>  'Coluna IPHAN ',            
            )        
        );

        register_block_style(            
            'core/column',            
             array(                
               'name'  => 'column-iphan-gray',                
               'label' =>  'Coluna IPHAN com fundo cinza',            
            )        
        );
    }
}add_action( 'init', 'iphan_block_styles' );