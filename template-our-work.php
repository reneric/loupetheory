<?php
/**
 * Template Name: Our Work
 */

get_header(); ?>
<script type="text/javascript">
jQuery(document).ready(function(){

	if (window.location.hash && document.referrer != window.location) {
		hashtext = window.location.hash.replace("#", "");
		arrHashText = hashtext.split('-'); 
		if(arrHashText!=""){
  		filter_by_category_fast(arrHashText[1]);
		}
		jQuery('html,body').animate({scrollTop: jQuery("."+arrHashText[0]).offset().top - 10}, 20, "swing");
	} else {
  	filter_by_category('commercials');
	}
});
</script>
<div id="main">
	<div id="primary">
		<div id="content" role="main">
		
			<div id="work_header">
  			<div id="title_banner">
          <h1>OUR WORK</h1>
          <?php the_field('our_work_subtitle'); ?>
        </div><!-- #title_banner -->		
        <div id="featured_work">
          <ul id="work_types">
            <li class="current">
              <a href="#commercials">
                Commercial
                <img src="<?php bloginfo('template_directory') ?>/images/commercial-icon.png" alt="Loupe Theory Video Company Commercial" />
              </a>
            </li>
              <li>
              <a href="#documentaries">
                Documentaries 
                <img src="<?php bloginfo('template_directory') ?>/images/documentary-icon.png" alt="Loupe Theory Video Company Documentaries" />
              </a>
            </li>
            <li>
              <a href="#weddings">
                Weddings 
                <img src="<?php bloginfo('template_directory') ?>/images/wedding-icon.png" alt="Loupe Theory Video Company Weddings" />
              </a>
            </li>
            <li>
              <a href="#shortfilms">
                Short Films 
                <img src="<?php bloginfo('template_directory') ?>/images/short-films-icon.png" alt="Loupe Theory Video Company Short Films" />
              </a>
            </li>

          </ul>
          <div id="work_image">
            <!-- Latest Short Film -->
            <div id="commercials_img" class="category_img">
               <?php query_posts('video_type=commercials&posts_per_page=1&post_type=projects'); while (have_posts()) : the_post(); ?>
                 <?php if ( has_post_thumbnail() ) {
                    	the_post_thumbnail(array(600,339));
                    } else { echo 'Add Featured Image';} ?><br>
                <div class="spotlight">Project Spotlight: <span><?php echo get_the_title(); ?></span></div>
                <?php endwhile; ?>   
            </div><!-- #commercial_img -->
             
             <div id="documentaries_img" class="category_img" style="display:none;">
               <?php query_posts('video_type=documentaries&posts_per_page=1&post_type=projects'); while (have_posts()) : the_post(); ?>
                 <?php if ( has_post_thumbnail() ) {
                    	the_post_thumbnail(array(600,339));
                    } else { echo 'Add Featured Image';} ?><br>
                <div class="spotlight">Project Spotlight: <span><?php echo get_the_title(); ?></span></div>
                <?php endwhile; ?>   
            </div><!-- #documentaries_img -->                  
      
            <div id="weddings_img" class="category_img" style="display:none;">
                 <?php query_posts('video_type=weddings&posts_per_page=1&post_type=projects'); while (have_posts()) : the_post(); ?>
                 <?php if ( has_post_thumbnail() ) {
                    	the_post_thumbnail(array(600,339));
                    } else { echo 'Add Featured Image';} ?><br>
                <div class="spotlight">Project Spotlight: <span><?php echo get_the_title(); ?></span></div>
                <?php endwhile; ?> 
            </div><!-- #weddings_img -->
            
             <div id="shortfilms_img" class="category_img"  style="display:none;">
                <?php query_posts('video_type=shortfilms&posts_per_page=1&post_type=projects'); while (have_posts()) : the_post(); ?>
                <?php if ( has_post_thumbnail() ) {
                    	the_post_thumbnail(array(600,339));
                    } else { echo 'Add Featured Image';} ?><br>
                <div class="spotlight">Project Spotlight: <span><?php echo get_the_title(); ?></span></div>
                <?php endwhile; ?>  
            </div><!-- #short_film_img --> 
          </div><!-- #work_image -->
          
        </div><!-- #featured_work -->
      </div><!-- #work_header -->
      <div class="clear"></div>
		  <div id="our_work">
		    <span>Sort By: </span>
		    <a href="#commercials" id="commercials_filter"><h1>Commercial</h1></a> / 
		    <a href="#documentaries" id="documentaries_filter"><h1>Documentaries</h1></a> /
		    <a href="#weddings" id="weddings_filter"><h1>Weddings</h1></a> / 
		    <a href="#shortfilms" id="shortfilms_filter"><h1>Short Films</h1></a>
		  </div><!-- #our_work -->
		  <br><br>
		  
		  <?php query_posts('posts_per_page=-1&post_type=projects'); while (have_posts()) : the_post(); ?>
		  
		  <div class="single_work <?php the_taxnomy_unlinked(); echo ' '.$post->ID;?>">
		    <?php if ( has_post_thumbnail() ) {
            	the_post_thumbnail(array(444,251),array('class' => 'video_img_thumb'));
            }
        ?>
		    <div class="work_text">
		      <h1><?php echo get_the_title(); ?></h1>
          <em><?php get_tags_no_link(); ?></em>
          <br />
          <br />
          <?php the_content(); ?>
		    </div><!-- .work_text -->
		    <div><div class="watch_film" <?php if(!get_field('projects_video_link') && !get_field('youtube_video_iframe_link')) echo "style='display:none;'"; ?>>
		      <a href="#watch_video"><img src="<?php bloginfo('template_directory'); ?>/images/watch-film.png" alt="Watch Video" /></a>
		    </div></div>  <!-- .watch_film -->
		    <div class="clear"></div>
		    <div class="video_iframe">
		    <?php if(get_field('projects_video_link')) { ?>
		      <iframe id="work_<?php echo $post->ID;?>" class="vimeo-work" src="<?php the_field('projects_video_link');?>?api=1&amp;player_id=work_<?php echo $post->ID;?>&amp;title=0&amp;byline=0&amp;portrait=0" width="900" height="346" ></iframe>
		    <?php } else if(get_field('youtube_video_iframe_link')) { 
  		    the_field('youtube_video_iframe_link');
		    } else {
  		    echo 'Please check back soon for Video';
		    }?>
		    </div>
		  </div><!-- .single_work -->
		
		<?php endwhile; ?>
		  
		  
		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main -->
	
<?php get_footer(); ?>