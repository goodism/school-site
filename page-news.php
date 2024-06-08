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

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php
        $news_query = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => -1,
        ));

        if ($news_query->have_posts()) :
            while ($news_query->have_posts()) : $news_query->the_post();?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
                    </header>
                    <?php
                    if ( 'post' === get_post_type() ) :
			        ?>
			        <div class="entry-meta">
                    <?php
                    school_theme_posted_on();
                    school_theme_posted_by();
                    ?>
			        </div><!-- .entry-meta -->
		            <?php endif; ?>

                    <div class="entry-thumbnail">
                        <?php school_theme_post_thumbnail(); ?>
                    </div>

                    <div class="entry-excerpt">
                        <?php the_excerpt(); ?>
                    </div>

                </article>

            <?php endwhile;
            wp_reset_postdata();
        else : ?>

            <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>

        <?php endif; ?>

    </main>
</div>

<div class="sidebar-before-footer">
    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
