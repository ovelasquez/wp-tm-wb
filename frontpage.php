<?php
/**
 * Template Name: Home Page
 *
 */

get_header();?>

<section class="container-fluid" id="primary">

  <?= the_content(); ?>
  
  <!-- Newsletter suscription begins -->  
  <div class="row">
    <?php get_template_part( 'newsletter' );?>
  </div>
  <!-- Newsletter suscription ends -->  
  
  <!-- Google maps begins -->  
  <div></div>
  <!-- Google maps ends -->  

</section>

<?php get_footer();