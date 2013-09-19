<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php	wp_register_script( 'jquery-gmap', get_bloginfo('template_directory') .'/js/jquery.gmap.min.js', array('jquery'),'2.1'); ?>
<?php	wp_register_script( 'jquery-plugins', get_bloginfo('template_directory') .'/js/jquery.plugins.js', array('jquery')); ?>
<?php	wp_register_script( 'jquery-flip', get_bloginfo('template_directory') .'/js/jquery.flip.min.js', array('jquery'),'2.1'); ?>
<?php	//wp_register_script( 'jquery-bxslider', 'http://bxslider.com/sites/default/files/jquery.bxSlider.min.js', array('jquery'),'1.0'); ?>
<?php	//wp_register_script( 'jquery-jshowoff', 'https://raw.github.com/ekallevig/jShowOff/master/jquery.jshowoff.min.js', array('jquery'),'1.0'); ?>
<?php	wp_register_script( 'jquery-jcarousel', get_bloginfo('template_directory') .'/js/jquery.jcarousel.js', array('jquery'),'1.0'); ?>
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
   wp_enqueue_script("jquery");
   wp_enqueue_script("jquery-plugins");
   if(is_page('who-we-are') || is_page('about') || is_page(7)){
    wp_enqueue_script("jquery-flip");
    //wp_enqueue_script("jquery-bxslider");
    //wp_enqueue_script("jquery-jshowoff");
    wp_enqueue_script("jquery-jcarousel");
   }
	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
<script>
  function filter_by_category($category){
         if($category == "" || $category == null){
    	     jQuery('.single_work').hide().fadeIn();
    	   } else {
    	     jQuery('.single_work').fadeOut(200).filter('.'+ $category).fadeIn();
    	   }
    	   jQuery('#our_work a').removeClass('current');
    	   jQuery('#our_work a#'+ $category +'_filter').addClass('current');
    }
    function filter_by_category_fast($category){
         if($category == "" || $category == null){
    	     jQuery('.single_work').hide().show();
    	   } else {
    	     jQuery('.single_work').css('display','none').filter('.'+ $category).css('display','block');
    	   }
    	   jQuery('#our_work a').removeClass('current');
    	   jQuery('#our_work a#'+ $category +'_filter').addClass('current');
    }
</script>
</head>

<body <?php body_class(); ?> >

	<header id="branding" role="banner">
		<div id="logo_menu">	
		<a href="<?php bloginfo('url');?>"><img id="logo" src="<?php bloginfo('template_directory'); ?>/images/Loupe-Theory-Logo.png" alt="Loupe Theory Film Productions - We are film production company that tells your story, unique to you, through beautiful, creative, engaging content. We are based out of Baton Rouge Louisiana" /></a>
		<div id="loupe_lightbox" class="fancybox_content">
		<div class="lightbox_content">
			<div class="inner_lightbox_content">
				<h1>Video Production Baton Rouge</h1>
				<p>
				Loupe Theory Video Production Baton Rouge creates <a href="http://loupetheory.us/our-work/"><strong>unique</strong> and creative <strong>videos</strong></a>. Visit our <a href="http://loupetheory.us/our-work/">video production portfolio</a> showing some Baton Rouge, Louisiana's best videos. We are an innovative and multi-talented team that believes the best videos are made by small groups that own the problem at hand.
          
              Loupe Theory has produced videos for companies all over the United States and Germany.
				</p>
				<p><a href="http://loupetheory.us/about/">See how Loupe Theory can create you the best video in baton rouge, the best video in New Orleans, or the best video in Louisiana.</a></p>
			</div>
		</div>
	</div>
		<nav id="access" role="navigation">
				<h3 class="assistive-text"><?php _e( 'Main menu', 'twentyeleven' ); ?></h3>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' , 'after' => '<span class="seperater">/</span>' ) ); ?>
  			</nav><!-- #access -->
  		  <ul id="social_media">
			     <li id="facebook"><a href="<?php the_field('facebook_link', 'options'); ?>">Like Loupe Theory On Facebook</a></li>
			     <li id="twitter"><a href="<?php the_field('twitter_link', 'options'); ?>">Follow Loupe Theory On Twitter</a></li>
			  </ul>
	   </div><!-- logo_menu -->
		</header><!-- #branding -->