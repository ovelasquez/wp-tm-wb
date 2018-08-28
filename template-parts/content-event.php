<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

$page_start_date = get_post_meta( get_the_ID(), 'event-start-date', true );
$page_end_date = get_post_meta( get_the_ID(), 'event-date', true );
$page_time = get_post_meta( get_the_ID(), 'event-time', true ); 
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<header class="entry-header">
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
    
    

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php wp_bootstrap_starter_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->
  <div class="post-thumbnail">
		<?php the_post_thumbnail(); ?>
	</div>
	<div class="entry-content">
    
  <div class="entry-datetime">
    <span class="event_start_date">		
        <span class="montserrat"><?php echo date_i18n( 'd', esc_attr($page_start_date) ).', '; ?></span>
          <?php       echo date_i18n( 'F', esc_attr($page_start_date) );?>
                <?php echo ' e il <span class="montserrat">'. date_i18n( 'd', esc_attr($page_end_date) ).'</span>, '; ?>
           <?php            echo date_i18n( 'F', esc_attr($page_start_date) );?>
        </span>
        <p class="event_time" class="">		
          <?php echo 'Dalle  ';?><span class="montserrat"><?php echo $page_time; ?></span>
        </p>
    </div>
		<?php
        if ( is_single() ) :
			the_content();
        else :
            the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'wp-bootstrap-starter' ) );
        endif;

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wp-bootstrap-starter' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php wp_bootstrap_starter_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
