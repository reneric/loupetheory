<?php
/**
 * Template Name: About Us Copy Old
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

<div id="main">
	<div id="primary">
		<div id="content" role="main">
			<div id="meet_customers">
    <h1>Recent Stories We're Proud Of</h1>
        <p>
    Here's just a handful of satisfied clients who we've had the great fortune of working with.
    </p>
			</div>
		
      
      <!-- About Page Title -->
      <div id="about_title">
	       <ul id="customers_list">
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
	      
	      
      </div><!-- about_title -->
       <div id="our-clients">
       	<h1>Our Clients</h1>
       	<div id="customer_intro">
	       	<!---<img class="customer_border" src="<?php bloginfo('template_directory'); ?>/images/black-banner.png" alt="Loupe Theory Video and Production" />
	       	Here's just a handful of satisfied clients who we've had the great fortune of working with.--->
	     <div class="partners">
	     	
	     	<div class="proudly">
	     		<div class="drop-arrow"></div><h2>Proudly Fueled By</h2><div class="arrow-right"></div>
		     	<div class="fueled">	
		     		<img src="<?php bloginfo('template_directory'); ?>/images/partners.png" alt="Partners Image" />
		     	</div>
		     	<div class="arrow-down"></div>
	     	</div>
	     	<div class="clients">
	     	
	     		<ul class="client">
	     			<li><img src="<?php bloginfo('template_directory'); ?>/images/pepsi.png" alt="Client Logo" /></li>
	     			<li><img src="<?php bloginfo('template_directory'); ?>/images/pepsi.png" alt="Client Logo" /></li>
	     			<li><img src="<?php bloginfo('template_directory'); ?>/images/pepsi.png" alt="Client Logo" /></li>
	     			<li style="margin-right:0;"><img src="<?php bloginfo('template_directory'); ?>/images/pepsi.png" alt="Client Logo" /></li>

	     		</ul>
	     		
	     	</div>
	     	
	     </div><!-- partners -->
	    <!-- About Page Title -->
      <div id="story_title">We Believe Your Story Matters</div><!-- about_title -->

      <!-- What sets us apart -->
      <div id="apart_desc">
        <h3>What sets us apart?</h3>
<p>We care. We collaborate. We keep our word. From start to finish we strive for excellence and take great pride in our work. We do this because we know you do too.</p>
      </div><!-- #apart_desc -->
      <div id="wedding_photo">
        <img src="http://loupetheory.us/wp-content/themes/loupetheory/images/Loupe-Theory-Story-Telling-Photo.png" alt="" />
      </div><!-- wedding_photo -->
		  <div id="story_telling">
		     <p>Loupe Theory Studios is a video production company that tells your unique story through beautiful, creative, engaging content.</p>
<ul>
<li>We value: intentionality, people, &amp; community.</li>
<li>We make: short films, documentary, wedding &amp; commercial content.</li>
<li>We want: your story, trust, &amp; smile.</li>
<li>We&#8217;re in the business of telling your story.</li>
</ul>
<p>&nbsp;</p>
      </div><!-- story_telling -->
	     
       	</div>
       
       </div>
          
      
		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main -->
	
	<!-- Meet The Team -->
	<div class="meet_team">
    <div class="teal_squares">Loupe Theory Studios is a video production company in Baton Rouge Louisiana that is in the business of telling your story through beautiful, creative, engaging content. Get in the Loupe.</div>
    <div class="meet_team_wrapper">
      <h1 class="team_title"><?php the_field('meet_the_team_title');?></h1>
      <br><br><br>
      <div class="full">
      	<ul class="team-members">
      		<li>
      			<img src="<?php bloginfo('template_directory'); ?>/images/max.png" alt="Employee Name" />
      			<strong>Max Zoghbi</strong>
      			<span>Co-founder // Director // Writer // Editor</span>
      			
      		</li>
      		<li>
      			<img src="<?php bloginfo('template_directory'); ?>/images/max.png" alt="Employee Name" />
      			<strong>Max Zoghbi</strong>
      			<span>Co-founder // Director // Writer // Editor</span>
      			
      		</li>
      		<li>
      			<img src="<?php bloginfo('template_directory'); ?>/images/max.png" alt="Employee Name" />
      			<strong>Max Zoghbi</strong>
      			<span>Co-founder // Director // Writer // Editor</span>
      			
      		</li>
      		<li style="margin-right:0">
      			<img src="<?php bloginfo('template_directory'); ?>/images/max.png" alt="Employee Name" />
      			<strong>Max Zoghbi</strong>
      			<span>Co-founder // Director // Writer // Editor</span>
      			
      		</li>
      		
      	</ul>
      </div>
      	<div class="team-bio">
      		<div class="g8">
      		<h3>CRAFTY FILMMAKER, CREATIVE THINK-TANK, ROCKS CLEAN DREADS</h3>
      		<ul class="contact-list">
      			<li><span>Title:</span>Founder,Creator</li>
      			<li><span>Role:</span>Founder,Creator</li>
      			<li><span>Twitter:</span><a href="#" >Founder,Creator</a></li>
      		</ul>
      		</div>
      		<div class="g4">
      			<div class="mark">"</div>
      			<p class="quote">
      			What you do when you don't have to will determine what you will become when you can no longer help it.
      			</p>
      		</div>
      	</div>
      	<div class="full">
      	<ul class="team-members">
      		<li>
      			<img src="<?php bloginfo('template_directory'); ?>/images/max.png" alt="Employee Name" />
      			<strong>Max Zoghbi</strong>
      			<span>Co-founder // Director // Writer // Editor</span>
      			
      		</li>
      		<li>
      			<img src="<?php bloginfo('template_directory'); ?>/images/max.png" alt="Employee Name" />
      			<strong>Max Zoghbi</strong>
      			<span>Co-founder // Director // Writer // Editor</span>
      			
      		</li>
      		<li>
      			<img src="<?php bloginfo('template_directory'); ?>/images/max.png" alt="Employee Name" />
      			<strong>Max Zoghbi</strong>
      			<span>Co-founder // Director // Writer // Editor</span>
      			
      		</li>
      		<li style="margin-right:0">
      			<img src="<?php bloginfo('template_directory'); ?>/images/max.png" alt="Employee Name" />
      			<strong>Max Zoghbi</strong>
      			<span>Co-founder // Director // Writer // Editor</span>
      			
      		</li>
      		
      	</ul>
      </div>
         

                 
    </div><!-- meet_team_wrapper -->
    <div class="clear"></div>
  </div><!-- meet_team -->
   <div class="what_we_do">
	   <div class="what_we_do_wrapper">
		   <h1>What We Do</h1><br><br>
		   <h3>We apply strategic thinking, artistic creativity and practicality to each of our projects.<br />
Our approach is simple &amp; comprehensive, with the goal of delivering an intentional and emotive product.</h3>
      	<br /><br />
      	<div class="what-list">
      		      		
      		<div class="list-item">
      			<div class="list-left">
      			<img src="<?php bloginfo('template_directory'); ?>/images/conslut.png" alt="Icon Image" />
      			</div>
      			<div class="list-right">
      			<strong>Consult</strong>
      			
      			
      			<ul class="list-items">
      				<li>non-profit</li>
      				<li>non-profit</li>
      				<li>non-profit</li>
      				<li>non-profit</li>
      				<li>non-profit</li>
      			
      			</ul>
      			</div>
      		</div>
      		<div class="list-item">
      			<div class="list-left">
      			<img src="<?php bloginfo('template_directory'); ?>/images/conslut.png" alt="Icon Image" />
      			</div>
      			<div class="list-right">
      			<strong>Consult</strong>
      			
      			
      			<ul class="list-items">
      				<li>non-profit</li>
      				<li>non-profit</li>
      				<li>non-profit</li>
      				<li>non-profit</li>
      				<li>non-profit</li>
      				
      			</ul>
      			</div>
      		</div>

<div class="list-item">
      			<div class="list-left">
      			<img src="<?php bloginfo('template_directory'); ?>/images/conslut.png" alt="Icon Image" />
      			</div>
      			<div class="list-right">
      			<strong>Consult</strong>
      			
      			
      			<ul class="list-items">
      				<li>non-profit</li>
      				<li>non-profit</li>
      				<li>non-profit</li>
      				<li>non-profit</li>
      				<li>non-profit</li>
      				<li>non-profit</li>
      				<li>non-profit</li>
      				<li>non-profit</li>
      			</ul>
      			</div>
      		</div>

<div class="list-item">
      			<div class="list-left">
      			<img src="<?php bloginfo('template_directory'); ?>/images/conslut.png" alt="Icon Image" />
      			</div>
      			<div class="list-right">
      			<strong>Consult</strong>
      			
      			
      			<ul class="list-items">
      				<li>non-profit</li>
      				<li>non-profit</li>
      				<li>non-profit</li>
      				<li>non-profit</li>
      				<li>non-profit</li>
      				<li>non-profit</li>
      				<li>non-profit</li>
      				<li>non-profit</li>
      			</ul>
      			</div>
      		</div>

      	
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
      <h1>A<br>Few<br>Fun<br>Facts</h1>
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
        <span>We</span> know our stuff <span>and we’re</span> great <span>at what we do.</span><br><em>Over 5 years in the biz</em>
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
  
  <!-- Meet Our Customers -->
  <div id="meet_customers">
    <h1>Recent Stories We're Proud Of</h1><br /><br />
    <!-- #customer_intro -->
   
    <div class="clear"></div>
    <br /><br />
    <div id="customer_story" style="display:none;">
      <!-- customer story description goes here -->
    </div>
    <div class="clear"></div>
  </div><!-- #meet_customers -->

     
  <div id="core_des">
    <div id="core_text">
    <?php the_field('at_the_core_text'); ?>
    </div><!-- core_text -->
    <div id="core_title"><h1><img align="right" src="<?php bloginfo('template_directory'); ?>/images/star_ribbon.png" alt="" /><?php the_field('at_the_core_title'); ?></h1></div>
    <div class="clear"></div>
  </div><!-- #core_des -->
  
  <div id="link_buttons">
    <a href="<?php bloginfo('url'); ?>/contact-us/"><img src="<?php bloginfo('template_directory'); ?>/images/button-contact-us.png" alt="" /></a>
    <a href="#" onclick="return scrollToTop();"><img src="<?php bloginfo('template_directory'); ?>/images/button-top-page.png" alt="" /></a>
  </div><!-- link_buttons -->
  <script>

  </script>
  <?php get_footer(); ?>