<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

    <h1><?php the_title(); ?></h1>

    <div>
        <?php the_content(); ?>
    </div>

    <p><strong>Salary:</strong>
        <?php echo esc_html(get_post_meta(get_the_ID(), '_job_salary', true)); ?>
    </p>

    <p><strong>Location:</strong>
        <?php echo esc_html(get_post_meta(get_the_ID(), '_job_location', true)); ?>
    </p>

<?php endwhile; ?>

<?php get_footer(); ?>
