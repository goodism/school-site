<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package School_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>


<div class="recent-posts">
        <h2>Recent Posts</h2>
        <?php
        $recent_posts = new WP_Query(array(
            'posts_per_page' => 3,
        ));
        if ($recent_posts->have_posts()) :
            while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
                <div class="post-item">
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) {
                            the_post_thumbnail('medium');
                        } ?>
                        <h3><?php the_title(); ?></h3>
                    </a>
                </div>
            <?php endwhile;
            wp_reset_postdata();
        else : ?>
            <p><?php esc_html_e('No recent posts available.', 'school-theme'); ?></p>
        <?php endif; ?>
    </div>

	</main>

<?php
get_sidebar();
get_footer();
