<?php
/**
 * Template Name: Homepage
 */

get_header(); ?>

  <div id="main">
		<div id="primary">
			<div id="content" role="main">

        <div id="who_we_are">We are Loupe Theory Studios. Loupe Theory Film Productions is a video production company that tells your story, unique to you, through beautiful, creative, engaging content. We are based out of Baton Rouge, LA</div>

        <!-- HEADLINE -->
        <div id="headline">
          <?php the_field('homepage_headline'); ?>
        </div><!-- #headline -->


        <!-- FEATURED VIDEO -->
        <div id="featured_video">
            <a id="featured_video_image" href="#" title="<?php the_field('featured_video_title'); ?>">
                <!-- <div id="playbutton">
                  <span class="rollover" style="opacity: 0;-ms-filter: 'progid:DXImageTransform.Microsoft.Alpha(Opacity=0)'; filter: alpha(opacity=0);"></span>
                  <img alt="" src="<?php //bloginfo('template_directory'); ?>/images/play_white.png">
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
            <iframe id="featured_video_iframe"  class="vimeo" src="<?php the_field('featured_video_link'); ?>?api=1&amp;player_id=featured_video_iframe&amp;title=0&amp;byline=0&amp;portrait=0" width="960" height="380" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>

        </div><!-- #featured_video -->
        
        <h1 id="notable_header">Select Clients:</h1>
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

        <br>
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
            <a href="<?php bloginfo('url');?>/our-work/">VIEW MORE OF OUR WORK</a>
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
                <a href="<?php bloginfo('url'); ?>/about/">Learn More>></a>
              </div><!-- .inside -->
            </div><!-- .border -->
          </div><!-- .box -->
          <br>
           <div class="box">
            <div class="border">
              <div class="inside twitter_box">
                <h1>GET IN THE LOUPE  <img src="http://www.loupetheory.us/wp-content/themes/loupetheory/images/twitter-icon-orange.png" width="" height="16px" padding-left="0px" /></h1>
                <br>
                <div id="twitter_feed">
                  <?php	        
        	        function buildBaseString($baseURI, $method, $params) {
                        $r = array();
                        ksort($params);
                        foreach($params as $key=>$value){
                            $r[] = "$key=" . rawurlencode($value);
                        }
                        return $method."&" . rawurlencode($baseURI) . '&' . rawurlencode(implode('&', $r));
                    }
                    
                    function buildAuthorizationHeader($oauth) {
                        $r = 'Authorization: OAuth ';
                        $values = array();
                        foreach($oauth as $key=>$value)
                            $values[] = "$key=\"" . rawurlencode($value) . "\"";
                        $r .= implode(', ', $values);
                        return $r;
                    }
                    
                    $url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
                    
                    $oauth_access_token = "17578957-sDQJXUHrQG7HZg83uWLjSxCN1wRSWNMzlPkpQGF2Q";
                    $oauth_access_token_secret = "SdV29pDi492tWqHkoNjhFwaroBcooNUcdgKcI3Tv4";
                    $consumer_key = "g71YlX2GDX1gUVyFwL1dTw";
                    $consumer_secret = "S4U1sOHFZtObevkQOcZfwrQcpOBgpmlEh4hKoRzsM";
                    
                          
                    $oauth = array( 'oauth_consumer_key' => $consumer_key,
                                    'oauth_nonce' => time(),
                                    'oauth_signature_method' => 'HMAC-SHA1',
                                    'oauth_token' => $oauth_access_token,
                                    'oauth_timestamp' => time(),
                                    'oauth_version' => '1.0',
                                    'screen_name' => 'loupetheory',
                                    'count'=>2);
                    
                    $base_info = buildBaseString($url, 'GET', $oauth);
                    $composite_key = rawurlencode($consumer_secret) . '&' . rawurlencode($oauth_access_token_secret);
                    $oauth_signature = base64_encode(hash_hmac('sha1', $base_info, $composite_key, true));
                    $oauth['oauth_signature'] = $oauth_signature;
                    
                    // Make Requests
                    $header = array(buildAuthorizationHeader($oauth), 'Expect:');
                    $options = array( CURLOPT_HTTPHEADER => $header,
                                      //CURLOPT_POSTFIELDS => $postfields,
                                      CURLOPT_HEADER => false,
                                      CURLOPT_URL => $url . '?screen_name=loupetheory&count=2',
                                      CURLOPT_RETURNTRANSFER => true,
                                      CURLOPT_SSL_VERIFYPEER => false);
                    
                    $feed = curl_init();
                    curl_setopt_array($feed, $options);
                    $json = curl_exec($feed);
                    curl_close($feed);
                    $twitter_data = json_decode($json);
                    //var_dump($twitter_data);
                    echo '<div class="tweet"><p>' . $twitter_data[0]->{"text"} .'</p>';
                    
                    $time = explode(" ",$twitter_data[0]->{'created_at'});
                    echo '<div class="time">'.$time[2] . ' ' . $time[1].'</div></div><div class="twitter_spacer"></div>';
                    echo '<div class="tweet"><p>' . $twitter_data[1]->{"text"} .'</p>';
                    
                    $time = explode(" ",$twitter_data[1]->{'created_at'});
                    echo '<div class="time">'.$time[2] . ' ' . $time[1].'</div></div><div class="twitter_spacer"></div>';
                     ?>

                </div>
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
          <?php if(get_field('film_type_1_image')){ ?>
            <div id="film_type_1" class="film_type">
              <img src="<?php the_field('film_type_1_image');?>" alt="Loupe Theory Studios of Baton Rouge does <?php the_field('film_type_1_label'); ?>" />
              <div class="film_label"><?php the_field('film_type_1_label'); ?></div><!-- .film_label -->
            </div><!-- #film_type_1 -->
          <?php } ?>
          </a>
          <!-- Film 2 -->
          <a href="http://loupetheory.us/our-work/">
          <?php if(get_field('film_type_2_image')){ ?>
            <div id="film_type_2" class="film_type">
              <img src="<?php the_field('film_type_2_image');?>" alt="Loupe Theory Studios of Baton Rouge does <?php the_field('film_type_2_label'); ?>" />
              <div class="film_label"><?php the_field('film_type_2_label'); ?></div><!-- .film_label -->
            </div><!-- #film_type_2 -->
          <?php } ?>
          </a>
          <!-- Film 3 -->
          <a href="http://loupetheory.us/our-work/">
          <?php if(get_field('film_type_3_image')){ ?>
            <div id="film_type_3" class="film_type">
              <img src="<?php the_field('film_type_3_image');?>" alt="Loupe Theory Studios of Baton Rouge does <?php the_field('film_type_3_label'); ?>" />
              <div class="film_label"><?php the_field('film_type_3_label'); ?></div><!-- .film_label -->
            </div><!-- #film_type_3 -->
          <?php } ?>
          </a>
          <!-- Film 4 -->
          <a href="http://loupetheory.us/our-work/">
          <?php if(get_field('film_type_4_image')){ ?>
            <div id="film_type_4" class="film_type no-margin-right">
              <img src="<?php the_field('film_type_4_image');?>" alt="Loupe Theory Studios of Baton Rouge does <?php the_field('film_type_4_label'); ?>" />
              <div class="film_label"><?php the_field('film_type_4_label'); ?></div><!-- .film_label -->
            </div><!-- #film_type_4 -->
          <?php } ?>
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
      <a href="<?php bloginfo('url'); ?>/images/who-we-are">Learn More About Us</a>
    </div>
    We care. We collaborate. We do great work. <br>
    And we do it with a smile, because we're pretty excited to do what we do.

  </div>

  </div><!-- #approach_wrapper -->
</div><!-- #approach -->
<?php get_footer(); ?>