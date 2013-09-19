<?php
/**
 * Template Name: Homepage Copy
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
jQuery.getJSON('https://api.twitter.com/1/statuses/user_timeline.json?include_entities=true&include_rts=true&screen_name=loupetheory&count=2&callback=?', function(data){
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
          We make unique videos that tell your story with beautiful, engaging, creative content.        </div><!-- #headline -->


        <!-- FEATURED VIDEO -->
        <div id="featured_video">
            <a id="featured_video_image" href="#" title="">
                <!-- <div id="playbutton">
                  <span class="rollover" style="opacity: 0;-ms-filter: 'progid:DXImageTransform.Microsoft.Alpha(Opacity=0)'; filter: alpha(opacity=0);"></span>
                  <img alt="" src="/images/play_white.png">
                </div><!-- #playbutton -->
                                <div id="video_banner">
                    <img alt="" src="http://loupetheory.us/wp-content/themes/loupetheory/images/fold.png">
                    <h2>Welcome to Loupe Theory Studios</h2>
                    <span></span>
                </div><!-- #video_banner -->
                                <img src="http://loupetheory.us/wp-content/uploads/2012/02/loupe-temp-page1.jpg" alt="" />
            </a>
            <iframe id="featured_video_iframe"  class="vimeo" src="http://player.vimeo.com/video/29577969?api=1&amp;player_id=featured_video_iframe&amp;title=0&amp;byline=0&amp;portrait=0" width="960" height="380" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>

        </div><!-- #featured_video -->

              <!-- Meet Our Customers -->
<!--   <div id="meet_customers">
    <h1>Recent Stories We're Proud Of</h1><br /><br />
    <div id="customer_intro">
      <img class="customer_border" src="http://loupetheory.us/wp-content/themes/loupetheory/images/black-banner.png" alt="Loupe Theory Video and Production" />
      Here's just a handful of satisfied clients who we've had the great fortune of working with.
    </div><!-- #customer_intro -->
<!--     <ul id="customers_list">
              <li >
            <a href="#">
            <img src="http://loupetheory.us/wp-content/uploads/2012/06/Loupe-Theory-Video-Baton-Rouge-Outter-Box.png" alt="Loupe Theory Baton Rouge Video Story Otter Box" />
            <div class="view_story">View Customer Story</div>
            <div id="story_1" class="story_html" style="display:none;">
                <p>I really enjoyed working with you and your team. The final version of the film is amazing. Even after seeing each iteration, I still got choked up watching the latest version. Your team was great at understanding what we were after and at making tweaks as we brought them up. The video definitely hits the mark of what we were after.</p>
<p style="text-align: right;"><span style="color: #999999;">- Ingrid LaMonte // Otterbox Marketing Team</span></p>
            </div>
            </a>
         </li>
              <li >
            <a href="#">
            <img src="http://loupetheory.us/wp-content/uploads/2012/06/Loupe-Theory-Video-Baton-Rouge-Yello-Jacket.png" alt="Loupe Theory Baton Rouge Video Story Yellow Jacket" />
            <div class="view_story">View Customer Story</div>
            <div id="story_2" class="story_html" style="display:none;">
                <p>I came to Loupe Theory with the idea of producing a video for my invention Yellow Jacket, an iPhone case with a built in stun gun. Max was incredible! He and his team took the time to understand the back story and the tone we intended to set, and carefully storyboarded the entire scene to show the plan for each scene. Execution went by without a hitch and the artistic design elements Loupe Theory incorporated tied the package together in an absolutely perfect way.  They collectively wanted to capture the pure emotion of the whole story, and it&#8217;s hard to think they could have done a much better job.</p>
<p style="text-align: right;"><em><span style="color: #999999;">-Seth Froom // Co-Founder &amp; Inventor of Yellow Jacket</span></em></p>
            </div>
            </a>
         </li>
              <li >
            <a href="#">
            <img src="http://loupetheory.us/wp-content/uploads/2012/06/Loupe-Theory-Video-Baton-Rouge-Gardere-Christian-Community-School.png" alt="Loupe Theory Baton Rouge Video Story Gardere" />
            <div class="view_story">View Customer Story</div>
            <div id="story_3" class="story_html" style="display:none;">
                <p>Customer Story Coming Soon!</p>
            </div>
            </a>
         </li>
              <li class="no-margin">
            <a href="#">
            <img src="http://loupetheory.us/wp-content/uploads/2012/06/Loupe-Theory-Video-Baton-Rouge-Dig-Magazine.png" alt="Loupe Theory Baton Rouge Video Story Dig Magazine" />
            <div class="view_story">View Customer Story</div>
            <div id="story_4" class="story_html" style="display:none;">
                <p>The storyboarding process of Loupe is one thing that really sold me.  Its so great to be in there with the founders who are actually invested in your project.  Im so happy with the finished product.  I can&#8217;t wait to work with Loupe again.  It&#8217;s a mutually beneficial experience through every aspect of creating, making &amp; executing the project.</p>
<p style="text-align: right;"><span style="color: #999999;"><em>-Daniel Hawkes // </em></span><em style="color: #999999;">Director of Brand Development at DIG Magazine</em></p>
            </div>
            </a>
         </li>
          </ul>
    <div class="clear"></div>
    <br /><br />
    <div id="customer_story" style="display:none;">
      <!-- customer story description goes here -->
<!--     </div>
    <div class="clear"></div>
  </div><!-- #meet_customers -->

      
		<h1 id="notable_header">Fresh Produce:</h1>
		<div id="notable_clients">
			<ul class="n_clients">
	     <li style="margin:0">
            <a href="http://www.hunterhayes.com/" target="_blank" >
            <img src="http://loupetheory.us/wp-content/themes/loupetheory/images/loupe-homepage-hh.png" alt="Hunter Hayes"  style="float:left"  />
            
            </a>
         </li>
              <li >
            <a href="http://www.otterbox.com/" target="_blank" >
            <img src="http://loupetheory.us/wp-content/themes/loupetheory/images/loupe-homepage-lsu.png" alt="LSU's E. J. Ourso College of Business"  />
            
            </a>
         </li>
              <li >
            <a href="http://www.yellowjacketcase.com/" target="_blank" >
            <img src="http://loupetheory.us/wp-content/themes/loupetheory/images/loupe-homepage-lamar.png" alt="Lamar"  />
            
            </a>
         </li>
             
              <li >
            <a href="http://www.pepsi.com/" target="_blank" >
            <img src="http://loupetheory.us/wp-content/themes/loupetheory/images/loupe-homepage-pepsi.png" alt="Pepsi"   />
            
            </a>
         </li>
          <li style="margin:0">
            <a href="http://business.lsu.edu/" target="_blank" >
            <img src="http://loupetheory.us/wp-content/themes/loupetheory/images/loupe-homepage-otter.png" alt="Otter Box"  style="float:right" />
            
            </a>
         </li>
         </ul>
		</div>
            <h1 id="featured_heading">Featured Projects:</h1><br>
          <div id="featured_products">
          <?php
          $i=1;
          $attr = array();
          query_posts( array( 'post_type' => 'projects', 'posts_per_page' => 4, 'featured_project'=>'featured'));
          if ( have_posts() ) : while ( have_posts() ) : the_post();	?>
            <a id="featured_image" href="<?php bloginfo('url'); ?>/our-work/#<?php echo $post->ID .'-'; the_taxnomy_unlinked('-'); ?>">
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
            <a href="http://loupetheory.us/our-work/">VIEW MORE OF OUR WORK</a>
          </div>
           <div id="latest_from_blog">

            <div id="latest_title">
              <img alt="" src="<?php bloginfo('template_directory'); ?>/images/fold.png">
              <a href="<?php bloginfo('url'); ?>/culture/">Ours Latest From the Loupe Theory Studio Blog</a>
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
                <h1>A BIT ABOUT US</h1>
                <br>
                We are a video production company from Louisiana.  From businesses and screenwriters to future brides and fellow creatives, we're in the business of telling your story.  Small or huge budget? No worries! We uniquely specialize in commercial, documentary, wedding and short films.
                <br><br>
                <a href="http://loupetheory.us/who-we-are/">Learn More>></a>
              </div><!-- .inside -->
            </div><!-- .border -->
          </div><!-- .box -->
          <br>
           <div class="box">
            <div class="border">
              <div class="inside twitter_box">
                <h1>GET IN THE LOUPE  <img src="http://www.loupetheory.us/wp-content/themes/loupetheory/images/twitter-icon-orange.png" width="" height="16px" padding-left="0px" /></h1>
                <br>
                <div id="twitter_feed"></div>
              </div><!-- .inside -->
            </div><!-- .border -->
          </div><!-- .box -->


        </div><!-- #about_loupe -->

        <div class="clear border-bottom"><br></div><br>
        <div id="film_overview">
          <div id="film_title">
            <h1>Storytelling,<br>It’s What We Do:</h1>
            A brief overview of what, exactly,
            we do around here.
            <br>
            <span class="more">Click an image for examples of our work >></span>
          </div><!-- #film_title -->

          <!-- Film 1 -->
          <a href="http://loupetheory.us/our-work/">
                      <div id="film_type_1" class="film_type">
              <img src="http://loupetheory.us/wp-content/uploads/2012/02/Screen-Shot-2012-10-02-at-2.33.20-PM.png" alt="Loupe Theory Studios of Baton Rouge does Commercial" />
              <div class="film_label">Commercial</div><!-- .film_label -->
            </div><!-- #film_type_1 -->
                    </a>
          <!-- Film 2 -->
          <a href="http://loupetheory.us/our-work/">
                      <div id="film_type_2" class="film_type">
              <img src="http://loupetheory.us/wp-content/uploads/2012/02/Screen-Shot-2012-10-02-at-2.36.33-PM.png" alt="Loupe Theory Studios of Baton Rouge does Documentary" />
              <div class="film_label">Documentary</div><!-- .film_label -->
            </div><!-- #film_type_2 -->
                    </a>
          <!-- Film 3 -->
          <a href="http://loupetheory.us/our-work/">
                      <div id="film_type_3" class="film_type">
              <img src="http://loupetheory.us/wp-content/uploads/2012/02/Screen-Shot-2012-10-02-at-2.39.55-PM.png" alt="Loupe Theory Studios of Baton Rouge does Weddings" />
              <div class="film_label">Weddings</div><!-- .film_label -->
            </div><!-- #film_type_3 -->
                    </a>
          <!-- Film 4 -->
          <a href="http://loupetheory.us/our-work/">
                      <div id="film_type_4" class="film_type no-margin-right">
              <img src="http://loupetheory.us/wp-content/uploads/2012/02/shorts1.png" alt="Loupe Theory Studios of Baton Rouge does Short Film" />
              <div class="film_label">Short Film</div><!-- .film_label -->
            </div><!-- #film_type_4 -->
                    </a>
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
     <img src="http://loupetheory.us/wp-content/themes/loupetheory/images/Loupe-Theory-Approach-Idea.gif" alt="Film Company Baton Rouge - Loupe Theory Approach - Have an Idea" />
    </div><!-- #idea -->
    <div id="think" class="step">
     <img src="http://loupetheory.us/wp-content/themes/loupetheory/images/Loupe-Theory-Approach-Think.gif" alt="Film Company Baton Rouge - Loupe Theory Approach - Think" />
    </div><!-- #think -->
    <div id="create" class="step">
     <img src="http://loupetheory.us/wp-content/themes/loupetheory/images/Loupe-Theory-Approach-Create.gif" alt="Film Company Baton Rouge - Loupe Theory Approach - Create" />
    </div><!-- #create -->
    <div id="share" class="step last">
     <img src="http://loupetheory.us/wp-content/themes/loupetheory/images/Loupe-Theory-Approach-Share.gif" alt="Film Company Baton Rouge - Loupe Theory Approach - Share" />
    </div><!-- #share -->
  </div><!-- #approach_steps -->
  <div class="clear"></div>
  <div id="sets_us_apart">
    What sets us apart?
  </div>
  <div id="sets_us_apart_text">
    <div id="approach_learn_more">
      <a href="http://loupetheory.us/images/who-we-are">Learn More About Us</a>
    </div>
    We care. We collaborate. We do great work. <br>
    And we do it with a smile, because we're pretty excited to do what we do.

  </div>

  </div><!-- #approach_wrapper -->
</div><!-- #approach -->
<?php get_footer(); ?>