<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  
<?php
  $sticky_menu_left = wp_get_nav_menu_items( (pll_current_language() == 'en'?'Left Sticky':'Left Sticky Italian') );
?>

<div class="sticky-left">
  
  <div class="short-menu">
    
    <?php foreach($sticky_menu_left as $menu_item): ?>
    <a href="<?= $menu_item->url; ?>" class="bg-black d-block">
      <div class="menu-item-container">
        <span class="light-beige <?= $menu_item->classes[0]; ?>"></span>
      </div>
    </a>
    <?php endforeach; ?>
    
  </div>
  
</div>
  
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wp-bootstrap-starter' ); ?></a>
	<header id="masthead" class="bg-black site-header navbar-static-top <?php echo wp_bootstrap_starter_bg_class(); ?>" role="banner">
      <div class="phone-container">
          <div class="phones">
            <span class="gray">Ristorante:</span>
            <span class="montserrat white">+39 331 8162643</span>
            <span class="gray">|</span>
            <span class="gray">Noleggio:</span>
            <span class="montserrat white">+39 347 6598812</span>
          </div>  
      </div>
    
      <div class="container">
            <nav class="navbar navbar-expand-xl p-0">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="burger-dot white"></span>
                    <span class="burger-dot white"></span>
                    <span class="burger-dot white"></span>
                </button>
              
                <div class="navbar-brand">
                    <?php if ( get_theme_mod( 'wp_bootstrap_starter_logo' ) ): ?>
                        <a href="<?php echo esc_url( home_url( '/' )); ?>">
                            <img src="<?php echo esc_attr(get_theme_mod( 'wp_bootstrap_starter_logo' )); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                        </a>
                    <?php else : ?>
                        <a class="site-title" href="<?php echo esc_url( home_url( '/' )); ?>"><?php esc_url(bloginfo('name')); ?></a>
                    <?php endif; ?>

                </div>

                <?php
                 wp_nav_menu(array(
                'theme_location'    => 'primary',
                'container'       => 'div',
                'container_id'    => 'main-nav',
                'container_class' => 'collapse navbar-collapse justify-content-end',  
                'menu_id'         => false,
                'menu_class'      => 'navbar-nav',
                'depth'           => 0,
                'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                'walker'          => new wp_bootstrap_navwalker()
                ));
                global $post;
                ?>
              
                <div class="rrss-menu">
                    <a href="https://www.instagram.com/whitebeach.restaurant/"><span class="icon-instagram-inverse"></span></a>
                    <a href="#"><span class="icon-facebook-logo-button"></span></a>
                    <a href="#"><span class="icon-owl-eyes"></span></a>
                    <a href="#"><span class="v-line"></span></a>
                    <a class="lang" href="<?= get_permalink (pll_get_post($post->ID, (pll_current_language()=="en"?"it":"en") ) ); ?>">
                      <span class="str"><?= (pll_current_language()=="en"?"ITA":"ENG") ?></span>
                      <span class="icon-globe"></span>
                      <span class="lang-current"><?= (pll_current_language()=="en"?"English":"Italiano") ?></span>
                    </a>
                </div>

            </nav>
        </div>
	</header><!-- #masthead -->