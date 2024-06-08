<?php
get_header();

echo '<div class="staff-template-content">';

$faculty_staff = new WP_Query(array(
    'post_type' => 'fwd-staff',
    'tax_query' => array(
        array(
            'taxonomy' => 'department',
            'field'    => 'slug',
            'terms'    => 'faculty',
        ),
    ),
));

if ($faculty_staff->have_posts()) {
    echo '<h2>Staff</h2>';
    echo '<p>Our dedicated staff is here to help our students succeed. You will find the faculty and administrative staff listed below. Please contact the appropriate individual with any questions. Vestibulum pretium neque leo, nec euismod ex interdum vitae. Etiam viverra, lorem sed lobortis mattis, lectus enim eleifend nisi, non dapibus nulla purus malesuada risus. Donec consectetur neque turpis, vitae varius lectus commodo vel.</p>';

    while ($faculty_staff->have_posts()) {
        $faculty_staff->the_post();
        echo '<div class="staff-member">';
        echo '<h3>' . get_the_title() . '</h3>';
        
        $short_bio = get_field('staff_bio');
        if (!empty($short_bio)) {
            echo '<p>' . esc_html($short_bio) . '</p>';
        }
        
        $courses_taught = get_field('courses');
        if (!empty($courses_taught)) {
            echo '<p><strong>Courses Taught:</strong> ' . esc_html($courses_taught) . '</p>';
        }
        
        $website_url = get_field('instructor_website');
        if (!empty($website_url)) {
            echo '<p><strong>Website:</strong> <a href="' . esc_url($website_url) . '" target="_blank">' . esc_url($website_url) . '</a></p>';
        }
        
        echo '</div>';
    }
    wp_reset_postdata();
}

$administrative_staff = new WP_Query(array(
    'post_type' => 'fwd-staff',
    'tax_query' => array(
        array(
            'taxonomy' => 'department',
            'field'    => 'slug',
            'terms'    => 'administrative',
        ),
    ),
));

if ($administrative_staff->have_posts()) {
    echo '<h2>Administrative</h2>';
    while ($administrative_staff->have_posts()) {
        $administrative_staff->the_post();
        echo '<div class="staff-member">';
        echo '<h3>' . get_the_title() . '</h3>';
        
        $short_bio = get_field('staff_bio');
        if (!empty($short_bio)) {
            echo '<p>' . esc_html($short_bio) . '</p>';
        }
        
        echo '</div>';
    }
    wp_reset_postdata();
}

echo '</div>';

get_footer();
?>
