<?php
/** Adds a body_id() function to WordPress.
  * Assigns a different ID to the <body> element of a WordPress site.
  *
  * @author Gabriele Romanato
  * @version 1.0
  * @param None
  * @return String id="ID"
  *
  */
  
   
if(!function_exists('body_id')) {
    
    function body_id() {
        
        global $post;
        global $wp_query;
        $post_id = $post->ID;
        $id = '';
        
        if(is_home() || is_front_page()) {
            
            $id = 'home';
            
        }
        
        if(is_single()) {
            
            $id = 'post-' . $post_id;
            
        }
        
        if(is_page()) {
            
            $id = 'page-' . $post_id;
            
        }
        
        if(is_paged()) {
        
            $current_page = $wp_query->query_vars['paged'];
            
            if($current_page > 0) {
            
                $id = 'paged-' . $current_page;
            
            }
        
        }
        
        if(is_category() || is_archive()) {
            
            $cat_name = get_query_var('category_name');
            
            if(!empty($cat_name)) {
                
                $id = 'category-' . $cat_name;
                
            } else {
                
                $id = 'archive';
                
                
            }
            
            
            
            
        }
        
        
        
        
        if(is_tag()) {
            
            $id = 'tag-' . get_query_var('tag');
            
        }
        
        if(is_404()) {
            
            $id = 'error404';
            
        }
        
        echo ' id="'. $id .'" ';
    }
    
}
?>