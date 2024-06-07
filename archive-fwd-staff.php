<?php
get_header();

echo '<div class="staff-template-content">';

echo '<p>This is a paragraph of text before displaying the staff members.</p>';

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
    echo '<h2>Faculty</h2>';
    while ($faculty_staff->have_posts()) {
        $faculty_staff->the_post();
        echo '<div class="staff-member">';
        echo '<h3>' . get_the_title() . '</h3>';
        $bio = get_post_meta(get_the_ID(), 'bio', true);
        if (!empty($bio)) {
            echo '<p>' . esc_html($bio) . '</p>';
        }
        $website_url = get_post_meta(get_the_ID(), 'instructor_website', true);
        if (!empty($website_url)) {
            echo '<p>Website: <a href="' . esc_url($website_url) . '">' . esc_url($website_url) . '</a></p>';
        }
        $courses_taught = get_post_meta(get_the_ID(), 'courses', true);
        if (!empty($courses_taught)) {
            echo '<p>Courses Taught: ' . esc_html($courses_taught) . '</p>';
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
        $bio = get_post_meta(get_the_ID(), 'bio', true);
        if (!empty($bio)) {
            echo '<p>' . esc_html($bio) . '</p>';
        }
        echo '</div>';
    }
    wp_reset_postdata();
}

echo '</div>';

get_footer();
?>
