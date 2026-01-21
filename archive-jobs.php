<?php get_header(); ?>

<div class="jobs-container">
    <h1>Job Openings</h1>

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

            <div class="job-card">
                <h2>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h2>

                <div class="job-meta">
                    <span>Salary: <?php echo esc_html(get_post_meta(get_the_ID(), '_job_salary', true)); ?></span>
                    <span>Location: <?php echo esc_html(get_post_meta(get_the_ID(), '_job_location', true)); ?></span>
                </div>
            </div>

        <?php endwhile; ?>
    <?php else : ?>
        <p>No jobs found.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
