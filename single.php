<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

<div id="primary">
<div class="black_squares_border"></div>
  <div id="main">
      <div id="blog_page">
      <h1 id="blog_page_header"><a href="<?php bloginfo('url'); ?>/culture">Loupe Theory <span>Blog</span></a></h1>
      <?php get_sidebar(); ?>
      <div id="blog_posts">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'single' ); ?>
					
					<nav id="nav-single">
						<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentyeleven' ); ?></h3>
						<span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous', 'twentyeleven' ) ); ?></span>
						<span class="nav-next"><?php next_post_link( '%link', __( 'Next <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) ); ?></span>
					</nav><!-- #nav-single -->
					
					<?php //comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>
				</div><!-- #blog_posts -->
      </div><!-- #blog_page -->
		</div><!-- #main -->
		
</div><!-- #primary -->

<?php get_footer(); ?>