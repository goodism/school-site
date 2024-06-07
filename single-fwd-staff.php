<?php
get_header();
if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>

        <h1><?php the_title(); ?></h1>

        <?php if( $short_bio = get_field('staff_bio') ): ?>
            <h2>Biography</h2>
            <p><?php echo esc_html($short_bio); ?></p>
        <?php endif; ?>

        <?php if( $courses = get_field('courses') ): ?>
            <h2>Courses</h2>
            <p><?php echo esc_html($courses); ?></p>
        <?php endif; ?>

        <?php if( $website = get_field('instructor_website') ): ?>
            <h2>Instructor Website</h2>
            <p><a href="<?php echo esc_url($website); ?>" target="_blank"><?php echo esc_url($website); ?></a></p>
        <?php endif; ?>

    <?php endwhile;
endif;
get_footer();
?>
