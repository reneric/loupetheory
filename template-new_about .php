<?php
/**
 * Template Name: New About 
 */

get_header(); ?>
<style type="text/css">body{min-width: 1031px;}</style>
<script type='text/javascript' src='http://loupetheory.us/wp-content/themes/loupetheory/js/jquery.flip.min.js?ver=2.1'></script>
<script>
    var boolFlip = true;
   // Set the initial height 
    var sliderHeight = "152px"; 
     // Set the initial slider state 
    var slider_state = "close"; 
    
    jQuery(document).ready(function(){ 
        // Show the team bio slider content 
        jQuery('.slider').show(); 
         
        jQuery('.slider').each(function () { 
            var current = jQuery(this); 
            current.attr("box_h", current.height()); 
        }); 
         
        jQuery(".slider").css("height", sliderHeight); 
        jQuery(".slider_menu a").addClass('closed');
        
        // set Continue Reading on click event
        jQuery('.slider_menu a').click( function(e) { 
            e.preventDefault();
            $slider = jQuery(this).parent().siblings('.slider');
            console.log($slider);
            if (jQuery(this).hasClass('closed')) 
            { 
                sliderOpen($slider); 
                jQuery(this).removeClass('closed').addClass('open').html('Close'); 
            } 
            else
            { 
                sliderClose($slider); 
                jQuery(this).removeClass('open').addClass('closed').html('More...'); 
            } 
        }); 
        
      //https://api.instagram.com/v1/users/search?q=max_zoghbi&access_token=16283802.e0f3b80.05330e5d558c42b685eff33d5aaf2624
      
      //Fun Facts flips
      jQuery('#fun_facts').bind('inview', function (event, visible) {
        if (visible == true){
          flip_facts();
        }
      });
      
      jQuery('a.team_nav').click(function(e){
        e.preventDefault();
        if(jQuery(this).attr('id') =='team_left'){
          //Left
          jQuery('#team_member_slider').animate({'margin-left':'+=479px'},800,'swing');
        } else {
          //Right
          jQuery('#team_member_slider').animate({'margin-left':'-=479px'},800,'swing');
        }
      });
      
    }); //end on load 
     
    function flip_facts(){
      if (boolFlip){
        jQuery("#facts1").flip({
        	direction:'lr',
        	content: jQuery("#facts1").children('.facts_content'),
        	color: '#fff',
        	onAnimation: function(){
        			jQuery("#facts1").children('.facts_content').fadeIn();
        	},
        	onEnd: function(){
        			jQuery("#facts2").flip({
            	 direction:'lr',
            	 content: jQuery("#facts2").children('.facts_content'),
            	 color: '#fff',
            	 onEnd: function(){
            	     jQuery("#facts3").flip({
                  	 direction:'lr',
                  	 content: jQuery("#facts3").children('.facts_content'),
                  	 color: '#fff'
                   });
               }
            	});
          }
        }); 
        boolFlip = false;
      }
      
    } 
    function relative_time(time_value) {
     	  var values = time_value.split(" ");
     	  return (values[2] + " " + values[1]); 
     	}
     	
     	String.prototype.linkify = function() {
     		return this.replace(/[A-Za-z]+:\/\/[A-Za-z0-9-_]+\.[A-Za-z0-9-_:%&\?\/.=]+/, function(m) {
     			return m.link(m);
     		});
     	};      
    function sliderOpen($slider) 
    { 
        var open_height = $slider.attr("box_h") + "px"; 
        $slider.animate({"height": open_height}, {duration: "slow" }); 
    } 
     
    function sliderClose($slider) 
    { 
        $slider.animate({"height": sliderHeight}, {duration: "slow" }); 
    }
  </script>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div id="main">
	<div id="primary">
		<div id="content" role="main">
			<div id="meet_customers">
                <h1><?php the_field('top_header');?></h1>
                <p><?php the_field('top_header_sub'); ?></p>
			</div>
		
      
      <!-- About Page Title -->
      <div id="about_title">
	       <ul class="customers_list">
      <?php $i = 1; query_posts('posts_per_page=4&post_type=recent_stories'); while (have_posts()) : the_post(); ?>
        <li <?php if($i==4) echo 'class="no-margin"';?>>
            <a href="#">
            <img src="<?php the_field('story_icon'); ?>" alt="Loupe Theory Baton Rouge Video Story <?php echo get_the_title(); ?>" />
            <div class="view_story">View Customer Story</div>
            <div id="story_<?php echo $i; ?>" class="story_html" style="display:none;">
                <?php the_field('customer_story'); ?>
            </div>
            </a>
         </li>
      <?php $i++; endwhile; wp_reset_query();?>
    </ul>
	 <div class="clear"></div>
    <br />
    <div id="customer_story" style="display:none;">
      <!-- customer story description goes here -->
    </div>
    <div class="clear"></div>     
	      
      </div><!-- about_title -->
       <div id="our-clients">
       	<h1><?php the_field('gray_section_top_title');?></h1>
       	<div id="customer_intro">
	       	
	     <div class="partners">
	     	
	     	<div class="proudly">
	     		<div class="drop-arrow"></div><h2><?php the_field('fueled_by_arrow_text');?></h2><div class="arrow-right"></div>
		     	<div class="fueled">	
		     		<img src="<?php bloginfo('template_directory'); ?>/images/partners.png" alt="Partners Image" />
		     	</div>
		     	<div class="arrow-down"></div>
	     	</div>
            <div class="clients">
	     	<ul class="client">
	     	<?php $i = 1; query_posts('posts_per_page=-1&post_type=clients'); while (have_posts()) : the_post(); ?>
        <li <?php if($i % 4 == 0) echo 'class="no-margin"';?>>
            <a href="<?php the_field('client_website');?>" target="_blank" >
            <img src="<?php the_field('client_logo'); ?>" alt="<?php the_field('client_name'); ?>"  />
            
            </a>
         </li>
      <?php $i++; endwhile; wp_reset_query();?>
	     	</ul>	
	     		
	     		
	     	</div>
	     	
	     </div><!-- partners -->
	    <!-- About Page Title -->
      <div id="story_title"><?php the_field('gray_section_bottom_title');?></div><!-- about_title -->

      <!-- What sets us apart -->
      <div id="apart_desc">
        <?php the_field('gray_section_bottom_left');?>
      </div><!-- #apart_desc -->
      <div id="wedding_photo">
        <img src="<?php the_field('gray_section_bottom_img'); ?>" alt="" />
      </div><!-- wedding_photo -->
		  <div id="story_telling"><?php the_field('gray_section_bottom_right');?></div><!-- story_telling -->
	     
       	</div>
       
       </div>
          
      
		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main -->
	
	<!-- Meet The Team -->
	<div class="meet_team">
    <div class="teal_squares">Loupe Theory Studios is a video production company in Baton Rouge Louisiana that is in the business of telling your story through beautiful, creative, engaging content. Get in the Loupe.</div>
    <div class="meet_team_wrapper">
      <h1 class="team_title"><?php the_field('employee_title');?></h1>
      <br />
      
      	<?php $i = 1; $count = wp_count_posts('team_member')->publish;  query_posts('post_type=team_member'); while (have_posts()) : the_post(); 
			$team_bio = '<div class="clear"></div><div id="team-bio" ></div><div class="clear"></div>';
			$top = '<div class="full"><ul class="team-members">';
			$btm = '</ul></div>';
		?>
        <?php if($i== 1 || $i == 5) {echo $top;} ?>
            <li <?php if($i==4) echo 'class="no-margin"';?>>
            	<div class="img_circle <?php if($i==1) echo 'selected';?>">
      				<img src="<?php the_field('image'); ?>" alt="Employee <?php the_field('name'); ?> Photo" />
               	</div> 
      			<strong><?php the_field('name'); ?></strong>
      			<span><?php the_field('titles'); ?></span>
           			<div id="member_<?php echo $i; ?>" class="hidden-bio" style="display:none;">
                		<div class="g8">
                        	<h3><?php the_field('description'); ?></h3>
                       	 	
                            	<?php if( get_field('contact_information')): ?>
                                	<ul class="contact-list">
									<?php while( has_sub_field('contact_information')): ?>
                                        <li><span><?php the_sub_field('title'); ?>:</span>
                                        	<?php if ( get_sub_field('link') ): ?>
                                            	<a href="<?php the_sub_field('link'); ?>" target="_blank" ><?php the_sub_field('information'); ?></a>
                                             <?php else: ?>
                                             	<?php the_sub_field('information'); ?>
                                             <?php endif; ?>   
                                       </li>
                                    <? endwhile; ?>
                                    </ul>
                                <? endif; ?>
                        	
                        </div>
                        <div class="g4">
                            <div class="mark">"</div>
                            <p class="quote"><?php the_field('quote'); ?></p>
                        </div>
                </div>
      		</li>
             <?php 
			 	if($i == 4 || $i == 8) echo $btm;
				if ($i == 4) echo $team_bio; 
				?>
             
           <?php $i++; endwhile; if($i !== 4 || $i !== 8) echo $btm; 
		   	if ($count <= 3){
				echo $team_bio;
			}
		   
		   wp_reset_query();?>
<script>


jQuery(function() {
	$bio =  jQuery('ul.team-members li').children('#member_1');
	jQuery('#team-bio').addClass('member_1');
	jQuery('#team-bio').append($bio.html());
});
  




</script>
            
            
      </div>
            
	      
      	
      </div>
         

                 
    </div><!-- meet_team_wrapper -->
    <div class="clear"></div>
  </div><!-- meet_team -->
   <div class="what_we_do">
	   <div class="what_we_do_wrapper">
		   <h1><?php the_field('black_section_header'); ?></h1><br>
			<?php the_field('black_section_sub_text'); ?>
      	<br /><br />
      	<div class="what-list">
      		<?php if( get_field('loupe_theory_process')): ?>
            	
                <?php while(has_sub_field('loupe_theory_process')): ?>
                <div class="list-item">
      				<div class="list-left">
                    	<img src="<?php the_sub_field('process_img'); ?>" alt="Icon <?php the_sub_field('process_name'); ?>" />
                    </div>
      				<div class="list-right">
                    	<strong><?php the_sub_field('process_name'); ?></strong>
      						<ul class="list-items">
                            	<?php if( get_sub_field('process_task') ): ?>
                                	<?php while( has_sub_field('process_task') ): ?>
      									<li><?php the_sub_field('task'); ?></li>
									<?php endwhile; ?>
                                <?php endif; ?>
      						</ul>
      				</div>
      			</div>
             
      		<?php endwhile; ?>
            <?php endif; ?>
      		   </div>

      	
      	</div>
      
      	</div>
  
   <div id="learn_our_process">
  <div id="dark_teal_squares">Loupe Theory Studio's approach is simple & comprehensive, with the goal of delivering an intentional and emotive videos in Baton Rouge Louisiana. </div>
  <div id="learn_our_process_wrapper">
      <h1><?php the_field('learn_our_process_title'); ?></h1><br><br>
      <h3><?php the_field('learn_our_process_subtitle'); ?></h3>
      <br /><br />
      <ul id="process_steps">
      <li>
        <h1><img src="<?php bloginfo('template_directory');?>/images/process-idea.gif" alt="" />Idea</h1>
        <?php the_field('idea_text'); ?>
      </li>
      <li>
        <h1><img src="<?php bloginfo('template_directory');?>/images/process-think.gif" alt="" />Think</h1>
        <?php the_field('think_text'); ?>
      </li>
      <li>
        <h1><img src="<?php bloginfo('template_directory');?>/images/process-create.gif" alt="" />Create</h1>
        <?php the_field('create_text'); ?>
      </li>
      <li class="nomargin">
        <h1><img src="<?php bloginfo('template_directory');?>/images/process-share.gif" alt="" />Share</h1>
        <?php the_field('share_text'); ?>
      </li>
      </ul>
    </div><!-- #learn_our_process_wrapper -->
  </div><!-- #learn_our_process -->
  
  <!-- Fun Facts -->
  <div id="fun_facts_wrapper">
    <div id="fun_facts_intro">
      <h1>A<br>Few<br>Fun<br>Facts</h1>
    </div><!-- fun_facts_intro -->
    <div id="fun_facts">
      <div id="facts1" class="facts">
        <div class="facts_content" style="display:none;">
        <span>The</span> heart <span>behind our business is</span> God-<span>centered.</span><br><em>Our foundation is solid</em>
        <img src="<?php bloginfo('template_directory'); ?>/images/heart.png" alt="The heart of Loupe Theory is God centered. Our foundation is solid." />
        </div><!-- .facts_content -->
      </div><!-- #facts1 -->
      <div id="facts2" class="facts">
        <div class="facts_content" style="display:none;">
        <span>We</span> know our stuff <span>and we’re</span> great <span>at what we do.</span><br><em>Over 15 years in the biz</em>
        <img src="<?php bloginfo('template_directory'); ?>/images/five-clocks.png" alt="At Loupe Theory, we know our stuff and we’re great at what we do. Over 5 years in the biz" />
        </div><!-- .facts_content -->
      </div><!-- #facts2 -->
      <div id="facts3" class="facts last">
      <div class="facts_content" style="display:none;">
        <span>We are based out of</span> Baton Rouge.<br><em>Southern hospitality at its finest</em>        <img src="<?php bloginfo('template_directory'); ?>/images/loupe-theory-baton-rouge-louisiana.png" alt="At Loupe Theory, we know our stuff and we’re great at what we do. Over 5 years in the biz" />
        </div><!-- .facts_content -->
      </div><!-- #facts3 -->
    </div>
  </div>
  
 

     
  <div id="core_des">
    <div id="core_text">
    <?php the_field('at_the_core_text'); ?>
    </div><!-- core_text -->
    <div id="core_title"><h1><img align="right" src="<?php bloginfo('template_directory'); ?>/images/star_ribbon.png" alt="" /><?php the_field('at_the_core_title'); ?></h1></div>
    <div class="clear"></div>
  </div><!-- #core_des -->
  <div class="buttons">
  	<div class="four">&nbsp;</div>
    <div class="four">
  		<div class="link_buttons">
   		 <a href="<?php bloginfo('url'); ?>/connect/"><img src="<?php bloginfo('template_directory'); ?>/images/button-contact-us.png" alt="" /></a>
    	 <a href="#" onclick="return scrollToTop();"><img src="<?php bloginfo('template_directory'); ?>/images/button-top-page.png" alt="" /></a>
  		</div><!-- link_buttons -->
     </div>
     <div class="four">&nbsp;</div>
     </div>
  <script>

  </script>
  <?php endwhile; // end of the loop. ?>
  <?php get_footer(); ?>