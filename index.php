<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 */

get_header(); ?>

<div id="primary">
<div class="black_squares_border"></div>
<div id="awards">
	<?php $args = array ( 'post_type' => "awards" );
	$custom_query = new WP_Query( $args );
	if ( $custom_query->have_posts() ):
	   	while ( $custom_query->have_posts() ) : $custom_query->the_post();?>
			<a class="award" href="<?php the_field("link"); ?>" target="_blank">
		   		<div class="inner">
		   			<span class="icon" style="background-image:url(../images/<?php the_field('icon');?>.png);"></span>
		   			<div class="info">
		   				<h1><?php the_title(); ?></h1>
		   				<div class="description">
		   					<p><?php the_content(); ?></p>
		   				</div>
		   			</div>
		   		</div>
		   	</a>
		<?php endwhile; ?>
	<?php endif; ?>
</div>
  <div id="main">
      <div id="blog_page">
      <h1 id="blog_page_header"><a href="<?php bloginfo('url'); ?>/culture">Loupe Theory <span>Blog</span></a></h1>
      <?php get_sidebar(); ?>
      <div id="blog_posts">
			<?php if ( have_posts() ) : ?>

				<?php //twentyeleven_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ $count = 0; ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', get_post_format() ); ?>
				  <?php if($count%2 != 0){ echo '<div style="clear:both;"></div>';} ?>

				<?php $count++; endwhile; ?>

				<?php //twentyeleven_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Currently No Posts. Please check back soon.', 'twentyeleven' ); ?></p>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>
      </div><!-- #blog_posts -->
      </div><!-- #blog_page -->
		</div><!-- #main -->
		
</div><!-- #primary -->

<?php get_footer(); ?>