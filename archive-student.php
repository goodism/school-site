<?php
/**
 * Template Name: Student List
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package School_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				// the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
            $args = array(
                'post_type'      => 'student',
                'posts_per_page' => -1,
                'order'          => 'ASC',
                'orderby'        => 'title',
                // 'tax_query'      => array(
                //     array(
                //         'taxonomy' => 'fwd-work-category',
                //         'field'    => 'slug',
                //         'terms'    => 'web'
                //     )
                // )
            );
            $query = new WP_Query( $args );
            
            if ( $query->have_posts() ) {
                echo "<h2>The Class</h2>";
                echo '<section class="student-section">';
                while( $query->have_posts() ) {
                    $query->the_post(); 
                    ?>
                    <article>
                        <a href="<?php the_permalink(); ?>">
                            <h2><?php the_title(); ?></h2>
                            <?php the_post_thumbnail('large'); ?>
                        </a>
                        <?php the_excerpt(); ?>
                    </article>
                    <?php
                }
                wp_reset_postdata();
                echo '</section>';
            } 

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();
