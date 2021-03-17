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
            'core/column',            
             array(                
               'name'  => 'column-iphan-secundary',                
               'label' =>  'Coluna IPHAN Secundária',    
               'isDefault' => true,        
            )        
        );

        register_block_style(            
            'core/group',            
             array(                
               'name'  => 'column-iphan',                
               'label' =>  'Grupo IPHAN ',   
               'isDefault' => true,  
            )        
        );

        register_block_style(            
            'core/group',            
             array(                
               'name'  => 'column-iphan-secundary',                
               'label' =>  'Grupo IPHAN secundario',   
               'isDefault' => true,  
            )        
        );

        register_block_style(            
            'core/group',            
             array(                
               'name'  => 'two-columns',                
               'label' =>  'Grupo com duas colunas fluídas',   
               'isDefault' => true,  
            )        
        );

        register_block_style(            
            'core/group',            
             array(                
               'name'  => 'three-column',                
               'label' =>  'Grupo com três colunas fluídas',   
               'isDefault' => true,  
            )        
        );
    }
}
add_action( 'init', 'iphan_block_styles' );
