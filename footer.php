<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package School_Theme
 */

?>

	<footer id="colophon" class="site-footer">

        <div class="footer-logo">
            <?php 
            if ( function_exists( 'the_custom_logo' ) ) {
                the_custom_logo();
            }
            ?>
        </div>

		<div class="site-info">
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( 'Created by <a href="https://tayloraustinwyatt.com/">Austin Wyatt & Aaron Bence</a>.' );
				?>
		</div><!-- .site-info -->

        <div class="footer-menus">
            <h2>Links</h2>
            <nav id="footer-navigation" class="footer-navigation">
                <?php wp_nav_menu( array( 'theme_location' => 'footer-right') ); ?>
            </nav>
        </div>

	</footer><!-- #colophon -->
</div><!-- #page -->


<?php wp_footer(); ?>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    AOS.init();
  });
</script>

</body>
</html>
