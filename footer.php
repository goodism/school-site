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

		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'school-theme' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'school-theme' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'school-theme' ), 'school-theme', '<a href="https://tayloraustinwyatt.com/">Austin Wyatt, Aaron Bence</a>' );
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
