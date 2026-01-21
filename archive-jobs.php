<?php get_header(); ?>

<h1>Job Openings</h1>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

        <div style="margin-bottom:20px; padding:10px; border:1px solid #ccc;">
            <h2>
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
            </h2>

            <p><strong>Salary:</strong>
                <?php echo esc_html(get_post_meta(get_the_ID(), '_job_salary', true)); ?>
            </p>

            <p><strong>Location:</strong>
                <?php echo esc_html(get_post_meta(get_the_ID(), '_job_location', true)); ?>
            </p>
        </div>

    <?php endwhile; ?>
<?php else : ?>
    <p>No jobs found.</p>
<?php endif; ?>

<?php get_footer(); ?>
