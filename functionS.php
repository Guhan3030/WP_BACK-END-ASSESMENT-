<?php

function register_jobs_cpt() {
    $labels = array(
        'name'               => 'Jobs',
        'singular_name'      => 'Job',
        'add_new'            => 'Add New Job',
        'add_new_item'       => 'Add New Job',
        'edit_item'          => 'Edit Job',
        'new_item'           => 'New Job',
        'view_item'          => 'View Job',
        'search_items'       => 'Search Jobs',
        'not_found'          => 'No jobs found',
        'menu_name'          => 'Jobs'
    );

    $args = array(
        'labels'        => $labels,
        'public'        => true,
        'has_archive'   => true,
        'rewrite'       => array('slug' => 'jobs'),
        'supports'      => array('title', 'editor'),
        'menu_icon'     => 'dashicons-id'
    );

    register_post_type('jobs', $args);
}
add_action('init', 'register_jobs_cpt');


function jobs_meta_boxes() {
    add_meta_box(
        'jobs_details',
        'Job Details',
        'jobs_meta_box_callback',
        'jobs',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'jobs_meta_boxes');

function jobs_meta_box_callback($post) {
    $salary   = get_post_meta($post->ID, '_job_salary', true);
    $location = get_post_meta($post->ID, '_job_location', true);
    ?>
    <p>
        <label><strong>Salary:</strong></label><br>
        <input type="text" name="job_salary" value="<?php echo esc_attr($salary); ?>" style="width:100%;">
    </p>
    <p>
        <label><strong>Location:</strong></label><br>
        <input type="text" name="job_location" value="<?php echo esc_attr($location); ?>" style="width:100%;">
    </p>
    <?php
}

function save_jobs_meta($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    if (isset($_POST['job_salary'])) {
        update_post_meta($post_id, '_job_salary', sanitize_text_field($_POST['job_salary']));
    }

    if (isset($_POST['job_location'])) {
        update_post_meta($post_id, '_job_location', sanitize_text_field($_POST['job_location']));
    }
}
add_action('save_post', 'save_jobs_meta');
