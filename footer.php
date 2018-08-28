<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

  $col_1 = get_page_by_title( 'Logo & Social Networks' , OBJECT , 'footer' );
  $col_2 = get_page_by_title( 'Phone Numbers' , OBJECT , 'footer' );
  $col_3 = get_page_by_title( 'Location' , OBJECT , 'footer' );
  $copyr = get_page_by_title( 'Copyright' , OBJECT , 'footer' );

  $data_col_1 = get_fields( ( pll_current_language() == 'en'? $col_1->ID : ( pll_get_post($col_1->ID,'it') ) ) );
  $data_col_2 = get_fields( ( pll_current_language() == 'en'? $col_2->ID : ( pll_get_post($col_2->ID,'it') ) ) );
  $data_col_3 = get_fields( ( pll_current_language() == 'en'? $col_3->ID : ( pll_get_post($col_3->ID,'it') ) ) );
  $data_copyr = get_fields( ( pll_current_language() == 'en'? $copyr->ID : ( pll_get_post($copyr->ID,'it') ) ) );
  
  $logo_wb = get_ft_img( ( pll_current_language() == 'en'? $col_1->ID : pll_get_post($col_1->ID,'it') ) );
  $logo_jumperr = get_ft_img( ( pll_current_language() == 'en'? $copyr->ID : pll_get_post($copyr->ID,'it') ) );

 /* echo var_dump($data_col_1);
  echo var_dump($data_col_2);
  echo var_dump($data_col_3);
  echo var_dump($data_copyr);
  echo var_dump($logo_wb);
  echo var_dump($data_jumperr);
*/
  

?>
<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #content -->
    <?php get_template_part( 'footer-widget' ); ?>

  <footer id="colophon" class="site-footer <?php echo wp_bootstrap_starter_bg_class(); ?> container-fluid" role="contentinfo">
    <div class="row bg-dark-black">
      <?php
        wp_nav_menu(array(
        'theme_location'    => 'primary',
        'container'       => 'div',
        'container_id'    => 'footer-nav',
        'container_class' => 'container menu',
        'menu_id'         => false,
        'menu_class'      => 'navbar-nav gray',
        'depth'           => 3,
        'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
        'walker'          => new wp_bootstrap_navwalker()
        ));
      ?>
    </div>
    <div class="row bg-dark-black">
      <div class="container main-footer-section">
        <div class="row">
          
          <div class="col-12 col-md-4 footer-col-1">
            <div class="row">
              <div class="col-12">
                <a class="logo" href="<?php echo get_site_url(); ?>">
                  <img src="<?= $logo_wb; ?>">
                </a>
              </div>
              <div class="rrss-menu col-12">
                <a href="<?= $data_col_1['instagram']; ?>"><span class="icon-instagram-inverse light-beige"></span></a>
                <a href="<?= $data_col_1['facebook']; ?>"><span class="icon-facebook-logo-button light-beige"></span></a>
                <a href="<?= $data_col_1['owl']; ?>"><span class="icon-owl-eyes light-beige"></span></a>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-4 footer-col-2">
            <p class="gray">Info line Ristorante</p>
            <p class="white  montserrat"> <span class="icon-call light-beige"></span><?= $data_col_2['phone_1']; ?></p>
            <p class="gray">Info line Noleggio</p> 
            <p class="white  montserrat"> <span class="icon-call light-beige"></span><?= $data_col_2['phone_2']; ?></p>
          </div>

          <div class="col-12 col-md-4 footer-col-3">
            <p class="gray"><?= $data_col_3['main_location']; ?></p>
            <p class="light-beige"><?= $data_col_3['location']; ?></p>
          </div>
          
        </div>
      </div>
    </div>
    <div class="row bg-black">
      <div class="container copyright">
        <?= $data_copyr['copyright']; ?>
      </div>
    </div>
    <div class="row bg-black">
      <div class="container img-jumperr">
        <img src="<?= $logo_jumperr; ?>" alt="jumperr-logo">
      </div>
    </div>
  </footer><!-- #colophon -->
<?php endif; ?>

<?php
  $sticky_menu_bottom = wp_get_nav_menu_items( (pll_current_language() == 'en'?'Bottom Sticky':'Bottom Sticky Italian') );
?>

<div class="sticky-bottom bg-beige">
  
  <div class="full-width-menu d-flex">
    
    <?php foreach($sticky_menu_bottom as $menu_item): ?>
    <a href="<?= $menu_item->url; ?>" class="flex-fill">
      <div class="menu-float-item-container">
        <span class="white <?= $menu_item->classes[0]; ?>"></span>
        <p class="white item-title"><?= $menu_item->post_title; ?></p>
      </div>
    </a>
    <?php endforeach; ?>
    
  </div>
  
</div>

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>