<?php
get_header();

if (have_posts()) :
    while (have_posts()) : the_post(); ?>

        <h1><?php the_title(); ?></h1>

        <?php if ($short_bio = get_field('staff_bio')) : ?>
            <h2>Biography</h2>
            <p><?php echo esc_html($short_bio); ?></p>
        <?php endif; ?>

        <?php if ($courses_taught = get_field('courses')) : ?>
            <h2>Courses</h2>
            <p><?php echo esc_html($courses_taught); ?></p>
        <?php endif; ?>

        <?php if ($website_url = get_field('instructor_website')) : ?>
            <h2>Instructor Website</h2>
            <p><a href="<?php echo esc_url($website_url); ?>" target="_blank"><?php echo esc_url($website_url); ?></a></p>
        <?php endif; ?>

    <?php endwhile;
endif;

get_footer();
?>