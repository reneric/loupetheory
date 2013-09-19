<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>


	<footer id="colophon" role="contentinfo">
    <div id="footer_light">
			<?php
				/* A sidebar in the footer? Yep. You can can customize
				 * your footer with three columns of widgets.
				 */
				if ( ! is_404() )
					get_sidebar( 'footer' );
			?>

  			<div id="credits">&copy; <script type="text/javascript">
        var theDate=new Date();
        document.write(theDate.getFullYear());
        </script> Loupe Theory Studios - All rights reserved.   Site by <a href="http://www.yolodesign.com">YOLO Design</a>.
        </div><!-- #credits -->
      </div><!-- #footer_light -->
	</footer><!-- #colophon -->

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-32781287-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<div id="preload-01"></div>
<?php wp_footer(); ?>

</body>
</html>