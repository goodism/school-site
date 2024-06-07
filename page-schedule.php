<?php
get_header(); ?>

<div class="schedule-container">
    <h1><?php the_title(); ?></h1>
    
    <?php if( have_rows('schedule') ): ?>
        <ul class="schedule-list">
            <?php while( have_rows('schedule') ): the_row(); 
                $day = get_sub_field('day');
                $session_title = get_sub_field('session_title');
                $time = get_sub_field('time');
            ?>
                <li class="schedule-item">
                    <span class="schedule-day"><?php echo $day; ?></span>
                    <span class="schedule-session-title"><?php echo $session_title; ?></span>
                    <span class="schedule-time"><?php echo $time; ?></span>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php else : ?>
        <p>No schedule found</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
