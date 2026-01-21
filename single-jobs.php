<?php get_header(); ?>

<div class="jobs-container">
<?php while (have_posts()) : the_post(); ?>

    <h1><?php the_title(); ?></h1>

    <div>
        <?php the_content(); ?>
    </div>

    <div class="job-meta">
        <span>Salary: <?php echo esc_html(get_post_meta(get_the_ID(), '_job_salary', true)); ?></span>
        <span>Location: <?php echo esc_html(get_post_meta(get_the_ID(), '_job_location', true)); ?></span>
    </div>

<?php endwhile; ?>
</div>

<?php get_footer(); ?>
