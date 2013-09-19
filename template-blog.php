<?php
/**
 * Template Name: Blog
 */

get_header(); ?>
<script type="text/javascript">
function relative_time(time_value) {
  var values = time_value.split(" ");
  time_value = values[1] + " " + values[2] + ", " + values[5] + " " + values[3];
  var parsed_date = Date.parse(time_value);
  var relative_to = (arguments.length > 1) ? arguments[1] : new Date();
  var delta = parseInt((relative_to.getTime() - parsed_date) / 1000);
  delta = delta + (relative_to.getTimezoneOffset() * 60);
  
  var r = '';
  if (delta < 60) {
	r = 'a minute ago';
  } else if(delta < 120) {
	r = 'couple of minutes ago';
  } else if(delta < (45*60)) {
	r = (parseInt(delta / 60)).toString() + ' minutes ago';
  } else if(delta < (90*60)) {
	r = 'an hour ago';
  } else if(delta < (24*60*60)) {
	r = '' + (parseInt(delta / 3600)).toString() + ' hours ago';
  } else if(delta < (48*60*60)) {
	r = '1 day ago';
  } else {
	r = (parseInt(delta / 86400)).toString() + ' days ago';
  }
  
  return r;
}  
String.prototype.linkify = function() {
  return this.replace(/[A-Za-z]+:\/\/[A-Za-z0-9-_]+\.[A-Za-z0-9-_:%&\?\/.=]+/, function(m) {
    return m.link(m);
    });
};
jQuery.getJSON('http://api.twitter.com/1/statuses/user_timeline.json?screen_name=loupetheory&count=3&callback=?', function(data){
        jQuery.each(data, function(index, item){
                jQuery('#twitter_feed').append('<div class="tweet"><p>' + item.text.linkify() + '</p><div class="time">' + relative_time(item.created_at) + '</div></div><div class="twitter_spacer"></div>');
        });
});
</script>
  <div id="main">
		<div id="primary">
			<div id="content" role="main">
      
        <div id="who_we_are">We are Loupe Theory Studios. Loupe Theory Film Productions is a film production company that tells your story, unique to you, through beautiful, creative, engaging content. We are based out of Baton Rouge, LA</div>
        
        <!-- HEADLINE -->
        <div id="headline">
          <?php the_field('homepage_headline'); ?>
        </div><!-- #headline -->
        
        <!-- FEATURED VIDEO -->
        <div id="featured_video">
            <a href="<?php the_field('featured_video_link'); ?>" rel="prettyPhoto" title="<?php the_field('featured_video_title'); ?>">
                <div id="playbutton">
                  <span class="rollover" style="opacity: 0;-ms-filter: 'progid:DXImageTransform.Microsoft.Alpha(Opacity=0)'; filter: alpha(opacity=0);"></span>
                  <img alt="" src="<?php bloginfo('template_directory'); ?>/images/play_white.png">
                </div><!-- #playbutton -->
                <?php if(get_field('featured_video_banner_line_1')){ ?>
                <div id="video_banner">
                    <img alt="" src="<?php bloginfo('template_directory'); ?>/images/fold.png">
                    <h2><?php the_field('featured_video_banner_line_1'); ?></h2>
                    <span><?php the_field('featured_video_banner_line_2'); ?></span>
                </div><!-- #video_banner -->
                <?php } ?>
                <img src="<?php the_field('featured_video_screenshot'); ?>" alt="<?php the_field('featured_video_title'); ?>" />
            </a>
        </div><!-- #featured_video -->
        <br>
          <h1 id="featured_heading">Featured Products:</h1><br>
          <div id="featured_products">
          <?php
          $i=1;
          $attr = array();
          query_posts( array( 'post_type' => 'projects', 'posts_per_page' => 4));
          if ( have_posts() ) : while ( have_posts() ) : the_post();	?>	
            <a id="featured_image" rel="prettyPhoto" href="<?php the_field('projects_video_link');?>">
              <?php 
              if(!($i % 2)){$attr = array('class'	=> "no-margin-right");}
              if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                the_post_thumbnail(array(317,189),$attr);
              } 
              $i++; unset($attr);
              ?>
            </a> 
          <?php endwhile; endif; 	wp_reset_query();?> 
          <div id="view_more_work">
            <a href="<?php bloginfo('url');?>/our-work/">VIEW MORE OF OUR WORK</a>
          </div>
          <div id="latest_from_blog">
            
            <div id="latest_title">
              <img alt="" src="<?php bloginfo('template_directory'); ?>/images/fold.png">
              <a href="">Our Latest From the Loupe Theory Studio Blog</a>
            </div><!-- #latest_title -->
            
            <div id="latest_post">
              <?php
                query_posts( array( 'post_type' => 'post', 'posts_per_page' => 1));
                if ( have_posts() ) : the_post();	
                the_title('<h1>', '</h1>');
                echo get_the_excerpt();
              endif; wp_reset_query();?> 
              
            </div><!-- latest_post -->
            <div class="clear"></div>
          </div><!-- latest_from_blog -->
        
        </div><!-- #featured_products -->
        
        <div id="about_loupe">
          <div class="box">
            <div class="border">
              <div class="inside">
                <h1>LOUPE THEORY IS</h1>
                <br>
                We are a film production company 
                from Louisiana. We are storytellers 
                through film. We specialize in three 
                types of films: short films, 
                documentary and commercial 
                content.
                <br><br>
                <a href="<?php bloginfo('url'); ?>/who-we-are/">Learn More>></a>
              </div><!-- .inside -->
            </div><!-- .border -->
          </div><!-- .box -->
          <br>
           <div class="box">
            <div class="border">
              <div class="inside">
                <h1>GET IN THE LOUPE</h1>
                <br>
                <div id="twitter_feed"></div>
              </div><!-- .inside -->
            </div><!-- .border -->
          </div><!-- .box -->
        

        </div><!-- #about_loupe -->			
        
        <div class="clear border-bottom"><br></div><br>
        <div id="film_overview">
          <div id="film_title">
            <h1>Film - It’s What We Do:</h1>
            A brief overview of what, exactly,
            we do around here.
            <br>
            <span class="more">Click an image for more info >></span>
          </div><!-- #film_title -->
          
          <!-- Film 1 -->
          <?php if(get_field('film_type_1_image')){ ?>
            <div id="film_type_1" class="film_type">
              <img src="<?php the_field('film_type_1_image');?>" alt="Loupe Theory Studios of Baton Rouge does <?php the_field('film_type_1_label'); ?>" />
              <div class="film_label"><?php the_field('film_type_1_label'); ?></div><!-- .film_label -->
            </div><!-- #film_type_1 -->
          <?php } ?>
          
          <!-- Film 2 -->
          <?php if(get_field('film_type_2_image')){ ?>
            <div id="film_type_2" class="film_type">
              <img src="<?php the_field('film_type_2_image');?>" alt="Loupe Theory Studios of Baton Rouge does <?php the_field('film_type_2_label'); ?>" />
              <div class="film_label"><?php the_field('film_type_2_label'); ?></div><!-- .film_label -->
            </div><!-- #film_type_2 -->
          <?php } ?>
          
          <!-- Film 3 -->
          <?php if(get_field('film_type_3_image')){ ?>
            <div id="film_type_3" class="film_type">
              <img src="<?php the_field('film_type_3_image');?>" alt="Loupe Theory Studios of Baton Rouge does <?php the_field('film_type_3_label'); ?>" />
              <div class="film_label"><?php the_field('film_type_3_label'); ?></div><!-- .film_label -->
            </div><!-- #film_type_3 -->
          <?php } ?>
          
          <!-- Film 4 -->
          <?php if(get_field('film_type_4_image')){ ?>
            <div id="film_type_4" class="film_type">
              <img src="<?php the_field('film_type_4_image');?>" alt="Loupe Theory Studios of Baton Rouge does <?php the_field('film_type_4_label'); ?>" />
              <div class="film_label"><?php the_field('film_type_4_label'); ?></div><!-- .film_label -->
            </div><!-- #film_type_4 -->
          <?php } ?>
          
          <div class="clear"></div>        
        </div><!-- #film_overview -->
        
			</div><!-- #content -->
		</div><!-- #primary -->
    </div><!-- #main -->


<div id="approach">
  <div id="teal_squares">Loupe Theory Studios is a video production company in Baton Rouge that is in the business of telling your story. Get in the Loupe.</div>
  <div id="approach_wrapper">
      We apply strategic thinking, artistic creativity and practicality to each of our projects. <br>
Our approach is simple, yet comprehensive, with the goal of delivering a intentional and emotive product.
  
  <div id="approach_steps">
    <div id="idea" class="step">
     <img src="<?php bloginfo('template_directory'); ?>/images/Loupe-Theory-Approach-Idea.gif" alt="Film Company Baton Rouge - Loupe Theory Approach - Have an Idea" />    
    </div><!-- #idea -->
    <div id="think" class="step">
     <img src="<?php bloginfo('template_directory'); ?>/images/Loupe-Theory-Approach-Think.gif" alt="Film Company Baton Rouge - Loupe Theory Approach - Think" />
    </div><!-- #think -->
    <div id="create" class="step">
     <img src="<?php bloginfo('template_directory'); ?>/images/Loupe-Theory-Approach-Create.gif" alt="Film Company Baton Rouge - Loupe Theory Approach - Create" />
    </div><!-- #create -->
    <div id="share" class="step last">
     <img src="<?php bloginfo('template_directory'); ?>/images/Loupe-Theory-Approach-Share.gif" alt="Film Company Baton Rouge - Loupe Theory Approach - Share" />
    </div><!-- #share -->
  </div><!-- #approach_steps -->
  <div class="clear"></div>
  <div id="sets_us_apart">
    What sets us apart?
  </div>
  <div id="sets_us_apart_text">
    <div id="approach_learn_more">
      <a href="#">Learn More About Our Approach</a>
    </div>
    We care. We collaborate. We do great work. <br>
    And we do it with a smile, because we're pretty excited to do what we do.
    
  </div> 

  </div><!-- #approach_wrapper -->
</div><!-- #approach -->
<?php get_footer(); ?>