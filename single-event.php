<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>
<div class="container event">
	<section id="primary" class="content-area col-sm-12 col-lg-8">
		<main id="main" class="site-main" role="main">
    
		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content-event', get_post_format() );
      
     ?>
      <div class="event-share">
        <div class="rrss-menu col-12">
          <?php echo 'Quota ';?>
          <!--a href="https://www.instagram.com/whitebeach.restaurant/"><span class="icon-instagram-inverse light-beige"></span></a-->
          <a target="_blank" rel="nofollow" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&title=<?php the_title(); ?>"><span class="icon-facebook-logo-button light-beige"></span></a>
          <a target="_blank" rel="nofollow" href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>"><i class="fab fa-twitter white"></i></a>
          <a target="_blank" rel="nofollow" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fab fa-google-plus white"></i></a>
        </div>

      </div>
      <?php 

			    the_post_navigation();

			

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</section><!-- #primary -->
  <aside id="secondary" class="widget-area col-sm-12 col-lg-4" role="complementary">
    <?php echo do_shortcode( '[wcp-carousel id="1040" order="DESC" orderby="date" count="3"] ' );?>	
  </aside><!-- #secondary -->
   
       
</div>
<?php echo do_shortcode('[INSERT_ELEMENTOR id="1048"]'); ?>
<?php

get_footer();
