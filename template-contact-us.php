<?php
/**
 * Template Name: Contact Us
 */

get_header(); ?>
<div id="main">
	<div id="primary">
		<div id="content" role="main">

			<div id="contact_header">
         <img src="<?php bloginfo('template_directory');?>/images/bkg-contact-bridge.jpg"><br />
			   <div id="contact_banner">
  			   <h1>Got An Idea?</h1><br>

              Let's make it a reality. Coffee's on us.
               <br><br>
              <b>Give us a ring</b><br><span>+225-773-5336</span> <br>
               <br>
              <b>Drop us a line</b> <br>
              <span><a href="mailto:hello@loupetheory.us">hello@loupetheory.us</a></span> <br>
               <br>
            	<ul id="contact_social">
			     			<li id="facebook"><a href="<?php the_field('facebook_link', 'options'); ?>">Like Loupe Theory On Facebook</a></li>
			     			<li id="twitter"><a href="<?php the_field('twitter_link', 'options'); ?>">Follow Loupe Theory On Twitter</a></li>
			     			<li id="youtube"><a href="http://www.youtube.com/user/LoupeTheoryStudios">Follow Loupe Theory On Youtube</a></li>
			     			<li id="vimeo"><a href="https://vimeo.com/loupetheorystudios">Follow Loupe Theory On Vimeo</a></li>
			  			</ul>
			  			</div>
      </div><!-- #contact_header -->
      <div class="clear"></div>
      <div id="contact_form">
          <h1>Send us a message right away</h1>
          <?php echo do_shortcode('[contact-form-7 id="165" title="Contact Form"]'); ?>
      </div>
		  		  <br><br><br><br><br>

		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main -->

<?php get_footer(); ?>