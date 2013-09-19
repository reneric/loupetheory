<?php
/**
 * Template Name: About Us Old1
 */

get_header(); ?>
<style type="text/css">body{min-width: 1031px;}</style>
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

     

      <!-- Meet Our Customers -->
  <div id="meet_customers">
    <h1>Recent Stories We're Proud Of</h1><br /><br />
    <div id="customer_intro">
      <img class="customer_border" src="<?php bloginfo('template_directory'); ?>/images/black-banner.png" alt="Loupe Theory Video and Production" />
      Here's just a handful of satisfied clients who we've had the great fortune of working with.
    </div><!-- #customer_intro -->
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
    <div class="clear"></div>
    <br /><br />
    <div id="customer_story" style="display:none;">
      <!-- customer story description goes here -->
    </div>
    <div class="clear"></div>
  </div><!-- #meet_customers -->

      <!-- About Page Title -->
      <div id="about_title"><?php the_field('about_us_title'); ?></div><!-- about_title -->

      <!-- What sets us apart -->
      <div id="apart_desc">
        <?php the_field('about_us_left_column');?>
      </div><!-- #apart_desc -->
      <div id="wedding_photo">
        <img src="<?php bloginfo('template_directory');?>/images/Loupe-Theory-Story-Telling-Photo.png" alt="" />
      </div><!-- wedding_photo -->
      <div id="story_telling">
         <?php the_field('about_us_right_column');?>
      </div><!-- story_telling -->

    </div><!-- #content -->
  </div><!-- #primary -->
</div><!-- #main -->

  <!-- Meet The Team -->
  <div id="meet_team">
    <div class="teal_squares">Loupe Theory Studios is a video production company in Baton Rouge Louisiana that is in the business of telling your story through beautiful, creative, engaging content. Get in the Loupe.</div>
    <div id="meet_team_wrapper">
      <h1 class="team_title"><?php the_field('meet_the_team_title');?></h1>
      <br><br><br>
      <a href="#" id="team_right" class="team_nav"><img src="<?php bloginfo('template_directory'); ?>/images/team_button_right.png" alt="Right" height="55px"/></a>
      <a href="#" id="team_left" class="team_nav"><img src="<?php bloginfo('template_directory'); ?>/images/team_button_left.png" alt="Left" height="55px"/></a>
      <div id="slider_wrapper">
      <div id="team_member_slider">
      <?php query_posts('posts_per_page=-1&post_type=team&order=ASC'); while (have_posts()) : the_post(); ?>
      <div class="team_member">
      <script>
      jQuery(document).ready(function(){
      //Get Twitter Updates
        jQuery.getJSON('https://api.twitter.com/1/statuses/user_timeline.json?include_entities=true&include_rts=true&screen_name=<?php the_field('twitter_username');?>&count=1&callback=?', function(data){
            jQuery.each(data, function(index, item){
              jQuery('.<?php the_field('team_first_name');?>_twitter').append('<div class="member_tweet">' + item.text.linkify() + '</div><div class="tweet_date">' + relative_time(item.created_at) + '</div>');
            });
        });

        jQuery.ajax({
          type: "GET",
          dataType: "jsonp",
          cache: false,
          url: "https://api.instagram.com/v1/users/<?php the_field('instagram_user_id');?>/media/recent?client_id=e0f3b80320844bd7bd2461c3a7577aa2&access_token=16283802.e0f3b80.05330e5d558c42b685eff33d5aaf2624",
          success: function(data) {
              for (var i = 0; i<8; i++) {
                if(data.data[i]){
                if(i%4 == 3) noright="class='noright'"; else noright="";
                jQuery(".<?php the_field('team_first_name');?>_instagram_pics").append("<a target='_blank' href='" + data.data[i].link +
                  "'><img " + noright + " src='" + data.data[i].images.low_resolution.url +"' height='90' width='90'></img></a>");
                  }
              }
          }
        });

        });
        </script>
          <div class="member_twitter"><div class="twitter_bird"><img src="<?php bloginfo('template_directory');?>/images/twitter_bird.png" alt=""/></div><div class="<?php the_field('team_first_name');?>_twitter tweet_quote"></div> <div class="follow">follow <a href="http://twitter.com/#!/<?php the_field('twitter_username');?>">@<?php the_field('twitter_username');?></a></div>
          </div><!-- member_twitter -->
          <img class="member_img" src="<?php the_field('headshot_image');?>" alt="Loupe Theory Team Member <?php the_field('team_first_name');?> <?php the_field('team_last_name');?> - <?php the_field('team_title');?>" />
          <br><br>
          <h1><?php the_field('team_first_name');?> <?php the_field('team_last_name');?></h1>
          <h3><?php the_field('team_title');?></h3>
          <br>
          <div class="slider">
              <div class="team-description"><?php the_field('team_description');?></div>
              <br>
              <?php the_field('team_biography');?>
          </div><!-- .slider -->
          <div class="slider_menu">
            <a href="#">Continue Reading</a>
        </div><!-- .slider_menu -->
        <div class="team_instagram">
            <h1><?php the_field('team_first_name');?>’s Instagram Feed</h1>
            <div class="<?php the_field('team_first_name');?>_instagram_pics instagram_pics"></div>
        </div><!-- .team_instagram -->
      </div><!-- #team_member -->
      <?php endwhile; wp_reset_query();?>
      </div><!-- #team_member_slider -->
      </div><!-- #slider_wrapper -->


    </div><!-- meet_team_wrapper -->
    <div class="clear"></div>
  </div><!-- meet_team -->

    <div id="what_we_do">
  <div id="what_we_do_wrapper">
      <h1><?php the_field('what_we_do_title'); ?></h1><br><br>
      <h3><?php the_field('what_we_do_subtitle'); ?></h3>
      <br /><br />
      <ul id="what_we_do_process_steps">
      <li>
        <h1>Consult</h1>
        <?php the_field('consult_text'); ?>
      </li>
      <li>
        <h1>PrePro</h1>
        <?php the_field('prepro_text'); ?>
      </li>
      <li>
        <h1>Production</h1>
        <?php the_field('production_text'); ?>
      </li>
      <li class="nomargin">
        <h1>Post</h1>
        <?php the_field('post_text'); ?>
      </li>
      </ul>
    </div><!-- #learn_our_process_wrapper -->
  </div><!-- #learn_our_process -->

   <div id="learn_our_process">
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
      <div id="powered_by">
        <h1>Proudly Powered By</h1>
        <img src="<?php bloginfo('template_directory');?>/images/Brands.png" alt="" />
      </div>
<!--       <div id="our_clients">
        <h1>Our Clients</h1>
        <?php query_posts('posts_per_page=-1&post_type=clients&order=ASC'); while (have_posts()) : the_post(); ?>
        <a href="<?php the_field('client_website');?>">
          <img class="grayscale" src="<?php the_field('client_logo');?>" />
        </a>
        <?php endwhile; wp_reset_query();?>
      </div> -->
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
        <span>We</span> know our stuff <span>and we’re</span> great <span>at what we do.</span><br><em>Over 10 years in the biz</em>
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

  <div id="link_buttons">
    <a href="<?php bloginfo('url'); ?>/connect/"><img src="<?php bloginfo('template_directory'); ?>/images/button-contact-us.png" alt="" /></a>
    <a href="#" onclick="return scrollToTop();"><img src="<?php bloginfo('template_directory'); ?>/images/button-top-page.png" alt="" /></a>
  </div><!-- link_buttons -->
  <script>

  </script>
  <?php get_footer(); ?>