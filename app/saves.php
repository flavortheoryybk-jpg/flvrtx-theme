<?php

/**
 * FLVRTX Saved Recipes
 *
 * Stores saved recipe post IDs in the logged-in user's user meta.
 */


/**
 * Save Recipe
 */
add_action('admin_post_flvrtx_save_recipe', function () {

    if (! is_user_logged_in()) {
        wp_safe_redirect(wp_login_url(wp_get_referer()));
        exit;
    }

    if (
        ! isset($_POST['flvrtx_save_recipe_nonce']) ||
        ! wp_verify_nonce(
            sanitize_text_field(wp_unslash($_POST['flvrtx_save_recipe_nonce'])),
            'flvrtx_save_recipe'
        )
    ) {
        wp_die('Security check failed. Please try again.');
    }

    $recipe_id = isset($_POST['recipe_id'])
        ? absint($_POST['recipe_id'])
        : 0;

    if (
        ! $recipe_id ||
        get_post_type($recipe_id) !== 'recipe'
    ) {
        wp_die('Invalid recipe.');
    }

    $user_id = get_current_user_id();

    $saved_recipes = get_user_meta(
        $user_id,
        '_flvrtx_saved_recipes',
        true
    );

    if (! is_array($saved_recipes)) {
        $saved_recipes = [];
    }

    if (! in_array($recipe_id, $saved_recipes, true)) {
        $saved_recipes[] = $recipe_id;
    }

    update_user_meta(
        $user_id,
        '_flvrtx_saved_recipes',
        array_values(array_unique($saved_recipes))
    );

    wp_safe_redirect(
        wp_get_referer() ?: get_permalink($recipe_id)
    );

    exit;
});


/**
 * Unsave Recipe
 */
add_action('admin_post_flvrtx_unsave_recipe', function () {

    if (! is_user_logged_in()) {
        wp_safe_redirect(wp_login_url(wp_get_referer()));
        exit;
    }

    if (
        ! isset($_POST['flvrtx_unsave_recipe_nonce']) ||
        ! wp_verify_nonce(
            sanitize_text_field(wp_unslash($_POST['flvrtx_unsave_recipe_nonce'])),
            'flvrtx_unsave_recipe'
        )
    ) {
        wp_die('Security check failed. Please try again.');
    }

    $recipe_id = isset($_POST['recipe_id'])
        ? absint($_POST['recipe_id'])
        : 0;

    if (
        ! $recipe_id ||
        get_post_type($recipe_id) !== 'recipe'
    ) {
        wp_die('Invalid recipe.');
    }

    $user_id = get_current_user_id();

    $saved_recipes = get_user_meta(
        $user_id,
        '_flvrtx_saved_recipes',
        true
    );

    if (! is_array($saved_recipes)) {
        $saved_recipes = [];
    }

    $saved_recipes = array_values(
        array_diff($saved_recipes, [$recipe_id])
    );

    update_user_meta(
        $user_id,
        '_flvrtx_saved_recipes',
        $saved_recipes
    );

    wp_safe_redirect(
        wp_get_referer() ?: get_permalink($recipe_id)
    );

    exit;
});
/**
 * FLVRTX Saved Learn
 *
 * Stores saved Learn article IDs in the logged-in user's user meta.
 */

/*
 * Save Learn Article
 */
add_action('admin_post_flvrtx_save_learn', function () {

    if (! is_user_logged_in()) {
        wp_safe_redirect(home_url('/login/'));
        exit;
    }

    if (
        ! isset($_POST['flvrtx_save_learn_nonce']) ||
        ! wp_verify_nonce(
            sanitize_text_field(wp_unslash($_POST['flvrtx_save_learn_nonce'])),
            'flvrtx_save_learn'
        )
    ) {
        wp_die('Security check failed. Please try again.');
    }

    $learn_id = isset($_POST['learn_id'])
        ? absint($_POST['learn_id'])
        : 0;

    if (! $learn_id || get_post_type($learn_id) !== 'learn') {
        wp_die('Invalid Learn article.');
    }

    $user_id = get_current_user_id();

    $saved_learn = get_user_meta(
        $user_id,
        '_flvrtx_saved_learn',
        true
    );

    if (! is_array($saved_learn)) {
        $saved_learn = [];
    }

    if (! in_array($learn_id, $saved_learn, true)) {
        $saved_learn[] = $learn_id;
    }

    update_user_meta(
        $user_id,
        '_flvrtx_saved_learn',
        array_values(array_unique($saved_learn))
    );

    wp_safe_redirect(
        wp_get_referer() ?: get_permalink($learn_id)
    );

    exit;
});


/*
 * Unsave Learn Article
 */
add_action('admin_post_flvrtx_unsave_learn', function () {

    if (! is_user_logged_in()) {
        wp_safe_redirect(home_url('/login/'));
        exit;
    }

    if (
        ! isset($_POST['flvrtx_unsave_learn_nonce']) ||
        ! wp_verify_nonce(
            sanitize_text_field(wp_unslash($_POST['flvrtx_unsave_learn_nonce'])),
            'flvrtx_unsave_learn'
        )
    ) {
        wp_die('Security check failed. Please try again.');
    }

    $learn_id = isset($_POST['learn_id'])
        ? absint($_POST['learn_id'])
        : 0;

    if (! $learn_id || get_post_type($learn_id) !== 'learn') {
        wp_die('Invalid Learn article.');
    }

    $user_id = get_current_user_id();

    $saved_learn = get_user_meta(
        $user_id,
        '_flvrtx_saved_learn',
        true
    );

    if (! is_array($saved_learn)) {
        $saved_learn = [];
    }

    $saved_learn = array_values(
        array_diff($saved_learn, [$learn_id])
    );

    update_user_meta(
        $user_id,
        '_flvrtx_saved_learn',
        $saved_learn
    );

    wp_safe_redirect(
        wp_get_referer() ?: get_permalink($learn_id)
    );

    exit;
});
/**
 * FLVRTX Saved Videos
 *
 * Stores saved video post IDs in the logged-in user's user meta.
 */

/*
 * Save Video
 */
add_action('admin_post_flvrtx_save_video', function () {

    if (! is_user_logged_in()) {
        wp_safe_redirect(home_url('/login/'));
        exit;
    }

    if (
        ! isset($_POST['flvrtx_save_video_nonce']) ||
        ! wp_verify_nonce(
            sanitize_text_field(wp_unslash($_POST['flvrtx_save_video_nonce'])),
            'flvrtx_save_video'
        )
    ) {
        wp_die('Security check failed. Please try again.');
    }

    $video_id = isset($_POST['video_id'])
        ? absint($_POST['video_id'])
        : 0;

    if (! $video_id || get_post_type($video_id) !== 'watch') {
        wp_die('Invalid video.');
    }

    $user_id = get_current_user_id();

    $saved_videos = get_user_meta(
        $user_id,
        '_flvrtx_saved_videos',
        true
    );

    if (! is_array($saved_videos)) {
        $saved_videos = [];
    }

    if (! in_array($video_id, $saved_videos, true)) {
        $saved_videos[] = $video_id;
    }

    update_user_meta(
        $user_id,
        '_flvrtx_saved_videos',
        array_values(array_unique($saved_videos))
    );

    wp_safe_redirect(
        wp_get_referer() ?: get_permalink($video_id)
    );

    exit;
});


/*
 * Unsave Video
 */
add_action('admin_post_flvrtx_unsave_video', function () {

    if (! is_user_logged_in()) {
        wp_safe_redirect(home_url('/login/'));
        exit;
    }

    if (
        ! isset($_POST['flvrtx_unsave_video_nonce']) ||
        ! wp_verify_nonce(
            sanitize_text_field(wp_unslash($_POST['flvrtx_unsave_video_nonce'])),
            'flvrtx_unsave_video'
        )
    ) {
        wp_die('Security check failed. Please try again.');
    }

    $video_id = isset($_POST['video_id'])
        ? absint($_POST['video_id'])
        : 0;

    if (! $video_id || get_post_type($video_id) !== 'watch') {
        wp_die('Invalid video.');
    }

    $user_id = get_current_user_id();

    $saved_videos = get_user_meta(
        $user_id,
        '_flvrtx_saved_videos',
        true
    );

    if (! is_array($saved_videos)) {
        $saved_videos = [];
    }

    $saved_videos = array_values(
        array_diff($saved_videos, [$video_id])
    );

    update_user_meta(
        $user_id,
        '_flvrtx_saved_videos',
        $saved_videos
    );

    wp_safe_redirect(
        wp_get_referer() ?: get_permalink($video_id)
    );

    exit;
});
/**
 * FLVRTX Saved Picks
 *
 * Stores saved recommendation IDs in the logged-in user's user meta.
 */

/*
 * Save Pick
 */
add_action('admin_post_flvrtx_save_pick', function () {

    if (! is_user_logged_in()) {
        wp_safe_redirect(home_url('/login/'));
        exit;
    }

    if (
        ! isset($_POST['flvrtx_save_pick_nonce']) ||
        ! wp_verify_nonce(
            sanitize_text_field(wp_unslash($_POST['flvrtx_save_pick_nonce'])),
            'flvrtx_save_pick'
        )
    ) {
        wp_die('Security check failed. Please try again.');
    }

    $pick_id = isset($_POST['pick_id'])
        ? absint($_POST['pick_id'])
        : 0;

    if (! $pick_id || get_post_type($pick_id) !== 'recommendation') {
        wp_die('Invalid recommendation.');
    }

    $user_id = get_current_user_id();

    $saved_picks = get_user_meta(
        $user_id,
        '_flvrtx_saved_picks',
        true
    );

    if (! is_array($saved_picks)) {
        $saved_picks = [];
    }

    if (! in_array($pick_id, $saved_picks, true)) {
        $saved_picks[] = $pick_id;
    }

    update_user_meta(
        $user_id,
        '_flvrtx_saved_picks',
        array_values(array_unique($saved_picks))
    );

    wp_safe_redirect(
        wp_get_referer() ?: get_permalink($pick_id)
    );

    exit;
});


/*
 * Unsave Pick
 */
add_action('admin_post_flvrtx_unsave_pick', function () {

    if (! is_user_logged_in()) {
        wp_safe_redirect(home_url('/login/'));
        exit;
    }

    if (
        ! isset($_POST['flvrtx_unsave_pick_nonce']) ||
        ! wp_verify_nonce(
            sanitize_text_field(wp_unslash($_POST['flvrtx_unsave_pick_nonce'])),
            'flvrtx_unsave_pick'
        )
    ) {
        wp_die('Security check failed. Please try again.');
    }

    $pick_id = isset($_POST['pick_id'])
        ? absint($_POST['pick_id'])
        : 0;

    if (! $pick_id || get_post_type($pick_id) !== 'recommendation') {
        wp_die('Invalid recommendation.');
    }

    $user_id = get_current_user_id();

    $saved_picks = get_user_meta(
        $user_id,
        '_flvrtx_saved_picks',
        true
    );

    if (! is_array($saved_picks)) {
        $saved_picks = [];
    }

    $saved_picks = array_values(
        array_diff($saved_picks, [$pick_id])
    );

    update_user_meta(
        $user_id,
        '_flvrtx_saved_picks',
        $saved_picks
    );

    wp_safe_redirect(
        wp_get_referer() ?: get_permalink($pick_id)
    );

    exit;
});