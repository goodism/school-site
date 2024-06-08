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

    <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <header class="entry-header">
                <?php
                the_title( '<h1 class="entry-title">', '</h1>' );
                ?>
            </header>

            <div class="entry-content">
            <?php
            the_post_thumbnail('thumbnail', array('class' => 'alignright') );
            the_content();

            $taxonomy = 'position';
            $terms    = get_the_terms(get_the_ID(), 'position');
            if($terms && ! is_wp_error($terms) ){
                foreach($terms as $term){
                    $args = array(
                        'post_type'      => 'student',
                        'posts_per_page' => -1,
                        'post__not_in' => array(get_the_ID()),
                        'tax_query'      => array(
                            array(
                                'taxonomy' => $taxonomy,
                                'field'    => 'slug',
                                'terms'    => $term->slug,
                            )
                        ),
                    );
                    
                    $query = new WP_Query( $args );
                    
                    if ( $query -> have_posts() ) {
                        // Output Term name.
                        echo '<h3>Meet other ' . esc_html( $term->name ) . ' students:</h3>';
                    
                        // Output Content.
                        while ( $query -> have_posts() ) {
                            $query -> the_post();
                                ?>
                                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                <?php
                        }
                        wp_reset_postdata();
                    }
                }
            }
            ?>
            </div>

        </article>

    <?php endwhile; ?>

    </main>

<?php
get_footer();
