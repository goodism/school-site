<?php

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php
        if (function_exists('have_rows') && have_rows('schedule_items')) :
            echo '<h2>Schedule</h2>';
            echo '<ul>';

            while (have_rows('schedule_items')) : the_row();
                $date = get_sub_field('date');
                $course = get_sub_field('course');
                $instructor = get_sub_field('instructor');

                echo '<li>';
                echo '<strong>Date:</strong> ' . esc_html($date) . '<br>';
                echo '<strong>Course:</strong> ' . esc_html($course) . '<br>';
                echo '<strong>Instructor:</strong> ' . esc_html($instructor);
                echo '</li>';
            endwhile;

            echo '</ul>';
        else :
            echo '<p>No schedule items found.</p>';
        endif;
        ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
