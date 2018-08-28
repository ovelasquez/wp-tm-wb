<?php

function dad_setup() {
  /* Dad style */
  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

add_action( 'wp_enqueue_scripts' , 'dad_setup' );

function basic_setup() {
  
  /* Our CSS */
  wp_enqueue_style( 'main-css', get_stylesheet_directory_uri().'/css/main.css' , array(), null );  

  /* Our JS */
  wp_enqueue_script( 'main-js', get_stylesheet_directory_uri().'/js/main.js' , array(), null );  
  wp_enqueue_script( 'EQCSS-js', get_stylesheet_directory_uri().'/js/EQCSS.min.js' , array(), null );  
  
  /* Google Font Styles */
  wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat|Raleway:300,500', array(), null );

}

add_action( 'wp_enqueue_scripts', 'basic_setup', PHP_INT_MAX );


function get_ft_img($target_id){
    return wp_get_attachment_image_src( get_post_thumbnail_id( $target_id ), 'post-thumbnail' )[0];
}

function menu_shortcode() {
    
    $cats = array();
    $args_menus = array(
        'post_type'     =>  array('menu' ), // your CPT
        'post_status' => 'publish',
        'orderby'        => 'menucategory');
 
    $consulta_menus = new WP_Query( $args_menus );
    
    if ($consulta_menus->have_posts()) //si existen  libros
    {
            while ( $consulta_menus->have_posts() ) :  
                  $post = $consulta_menus->the_post();
                  $post_categories = wp_get_post_terms( get_the_ID(), 'menucategory', array( 'fields' => 'all' ) ); //wp_get_post_categories( get_the_ID() );                  
                  foreach($post_categories as $cat) {
                      if (!array_key_exists($cat->slug,$cats)):
                        $cats[$cat->slug][0] =  (object) ['name' => $cat->name, 'slug' => $cat->slug];                 
                      endif;
                      $cats[$cat->slug][] = array(get_the_title(),apply_filters( 'the_content', get_the_content() ), get_post_meta( get_the_ID(), 'prezzo',true ));                      
                  }
                  
            endwhile;                              
         
    }
  wp_reset_postdata();
  $list = '';
  $desc = '';
  $i =0;
  foreach($cats as $cat) {
      if (count($cat)>1){
        $list.='<li class="nav-item"><a class="nav-link '.($i==0?'active':'').'" data-toggle="tab" href="#'.$cat[0]->slug.'" role="tab" aria-controls="'.$cat[0]->slug.'">'.$cat[0]->name.'</a></li>';
        $desc.='<div class="tab-pane '.($i==0?'active':'').'" id="'.$cat[0]->slug.'" role="tabpanel"><h3>'.$cat[0]->name.'</h3><ul>';       
        foreach($cat as $c) {
          if(!is_object($c)) {
              $desc.='<li class="menuitem"><a href="#" class="row"><span class="name-menu col-10">'.$c[0].'</span> <span class="price-menu col-2">'.$c[2].'</span></a>'.$c[1].'</li>';       
          }
          
        }
        $desc.='</ul></div>';
      } 
    $i++;
  }
  //echo "<pre>";var_dump($cats); echo "</pre>";exit();
  return  '<div class="row menu-ilr"><div class="col-4 cats"><ul class="nav nav-tabs flex-column" id="myTab" role="tablist"  aria-orientation="vertical">'.$list.' </ul></div>'.'<div  class="col-8 cat-items"><div class="tab-content" >'.$desc.'</div></div></div>';
  
}
add_shortcode('menu', 'menu_shortcode'); 
 

?>