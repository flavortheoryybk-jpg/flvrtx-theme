<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
});

add_action('pre_get_posts', function ($query) {

    if (
        ! is_admin()
        && $query->is_main_query()
        && $query->is_search()
    ) {

        $query->set('post_type', [
            'recipe',
            'learn',
            'watch',
            'recommendation',
        ]);

    }

});

/**
 * Sort Watch archive by YouTube publication date.
 */
add_action('pre_get_posts', function ($query) {

    if (
        is_admin()
        || ! $query->is_main_query()
        || ! $query->is_post_type_archive('watch')
    ) {
        return;
    }

    $sort = isset($_GET['sort'])
        ? sanitize_key($_GET['sort'])
        : 'latest';

    if (! in_array($sort, ['latest', 'oldest'], true)) {
        $sort = 'latest';
    }

    $query->set('meta_key', '_flvrtx_youtube_published_at');
    $query->set('orderby', 'meta_value');
    $query->set('meta_type', 'DATETIME');
    $query->set(
        'order',
        $sort === 'oldest' ? 'ASC' : 'DESC'
    );

});



/**
 * FLVRTX YouTube → Watch Sync
 *
 * Automatically imports new YouTube uploads
 * from the FLVRTX channel into the Watch post type.
 */

/**
 * Configuration.
 */
const FLVRTX_YOUTUBE_CHANNEL_ID = 'UCQQG3Drgp1-34Hj-KjYDfqQ';
const FLVRTX_YOUTUBE_FEED_URL = 'https://www.youtube.com/feeds/videos.xml?channel_id=' . FLVRTX_YOUTUBE_CHANNEL_ID;

/**
 * Sync YouTube videos into Watch posts.
 */
function flvrtx_sync_youtube_videos()
{
    $response = wp_remote_get(
        FLVRTX_YOUTUBE_FEED_URL,
        [
            'timeout' => 15,
            'headers' => [
                'Accept' => 'application/atom+xml, application/xml, text/xml',
            ],
        ]
    );

    if (is_wp_error($response)) {
        return false;
    }

    if (wp_remote_retrieve_response_code($response) !== 200) {
        return false;
    }

    $xml_body = wp_remote_retrieve_body($response);

    if (!$xml_body) {
        return false;
    }

    libxml_use_internal_errors(true);

    $xml = simplexml_load_string($xml_body);

    if (!$xml) {
        libxml_clear_errors();
        return false;
    }

    foreach ($xml->entry as $entry) {

        /*
         * Get YouTube information for this video.
         */
        $youtube = $entry->children(
            'http://www.youtube.com/xml/schemas/2015'
        );

        $video_id = trim((string) $youtube->videoId);

        if (!$video_id) {
            continue;
        }

        $title = trim((string) $entry->title);
        $description = trim((string) $entry->summary);
        $published = trim((string) $entry->published);

        if (!$title) {
            continue;
        }

        /*
         * Build the canonical YouTube URL.
         */
        $youtube_url = 'https://www.youtube.com/watch?v=' . $video_id;

        /*
         * Find an existing Watch post.
         *
         * First check our imported video ID.
         * Then check the existing youtube_url field.
         *
         * This prevents duplicates when a video was
         * manually added before automatic syncing.
         */
        $existing_posts = get_posts([
            'post_type'      => 'watch',
            'post_status'    => 'any',
            'posts_per_page' => 1,
            'fields'         => 'ids',
            'meta_query'     => [
                'relation' => 'OR',

                [
                    'key'     => '_flvrtx_youtube_video_id',
                    'value'   => $video_id,
                    'compare' => '=',
                ],

                [
                    'key'     => 'youtube_url',
                    'value'   => $youtube_url,
                    'compare' => '=',
                ],
            ],
        ]);

        /*
         * Parse the original YouTube publication date.
         */
        $youtube_published_at = '';

        if ($published) {

            try {

                $date = new \DateTimeImmutable($published);

                $youtube_published_at = $date
                    ->setTimezone(new \DateTimeZone('UTC'))
                    ->format('Y-m-d H:i:s');

            } catch (\Exception $exception) {
                $youtube_published_at = '';
            }
        }

        /*
         * If the video already exists, update it.
         */
        if (!empty($existing_posts)) {

            $post_id = (int) $existing_posts[0];

            update_post_meta(
                $post_id,
                '_flvrtx_youtube_video_id',
                $video_id
            );

            update_post_meta(
                $post_id,
                'youtube_url',
                $youtube_url
            );

            update_post_meta(
                $post_id,
                '_flvrtx_youtube_thumbnail',
                'https://img.youtube.com/vi/' . $video_id . '/hqdefault.jpg'
            );

            if ($youtube_published_at) {

                update_post_meta(
                    $post_id,
                    '_flvrtx_youtube_published_at',
                    $youtube_published_at
                );
            }

            continue;
        }

        /*
         * Create a new Watch post.
         */
        $post_date = current_time('mysql');
        $post_date_gmt = current_time('mysql', true);

        if ($youtube_published_at) {

            $date = new \DateTimeImmutable(
                $youtube_published_at,
                new \DateTimeZone('UTC')
            );

            $post_date_gmt = $date->format('Y-m-d H:i:s');

            $post_date = $date
                ->setTimezone(wp_timezone())
                ->format('Y-m-d H:i:s');
        }

        $post_id = wp_insert_post(
            [
                'post_type'     => 'watch',
                'post_status'   => 'publish',
                'post_title'    => $title,
                'post_content'  => $description,
                'post_excerpt'  => wp_trim_words(
                    wp_strip_all_tags($description),
                    35
                ),
                'post_date'     => $post_date,
                'post_date_gmt' => $post_date_gmt,
            ],
            true
        );

        if (is_wp_error($post_id)) {
            continue;
        }

        /*
         * Save YouTube information.
         */
        update_post_meta(
            $post_id,
            '_flvrtx_youtube_video_id',
            $video_id
        );

        update_post_meta(
            $post_id,
            'youtube_url',
            $youtube_url
        );

        update_post_meta(
            $post_id,
            '_flvrtx_youtube_thumbnail',
            'https://img.youtube.com/vi/' . $video_id . '/hqdefault.jpg'
        );

        if ($youtube_published_at) {

            update_post_meta(
                $post_id,
                '_flvrtx_youtube_published_at',
                $youtube_published_at
            );
        }
    }

    return true;
}


/**
 * Schedule the YouTube sync.
 */
add_action('init', function () {

    if (!wp_next_scheduled('flvrtx_youtube_sync_event')) {

        wp_schedule_event(
            time() + 300,
            'twicedaily',
            'flvrtx_youtube_sync_event'
        );
    }

});


/**
 * Run the scheduled sync.
 */
add_action(
    'flvrtx_youtube_sync_event',
    __NAMESPACE__ . '\\flvrtx_sync_youtube_videos'
);

/**
 * FLVRTX YouTube manual sync.
 */
add_action('admin_post_flvrtx_sync_youtube', function () {

    if (!current_user_can('manage_options')) {
        wp_die('You do not have permission to run this sync.');
    }

    check_admin_referer('flvrtx_sync_youtube');

    flvrtx_sync_youtube_videos();

    wp_safe_redirect(
        add_query_arg(
            [
                'page'   => 'flvrtx-youtube-sync',
                'synced' => '1',
            ],
            admin_url('tools.php')
        )
    );

    exit;
});


/**
 * Add sync page under Tools.
 */
add_action('admin_menu', function () {

    add_management_page(
        'FLVRTX YouTube Sync',
        'FLVRTX YouTube Sync',
        'manage_options',
        'flvrtx-youtube-sync',
        function () {

            ?>

            <div class="wrap">

                <h1>FLVRTX YouTube Sync</h1>

                <p>
                    Import new videos from the FLVRTX YouTube channel
                    into the Watch section.
                </p>

                <?php if (isset($_GET['synced'])) : ?>

                    <div class="notice notice-success is-dismissible">

                        <p>
                            YouTube sync completed.
                        </p>

                    </div>

                <?php endif; ?>

                <form
                    method="post"
                    action="<?php echo esc_url(admin_url('admin-post.php')); ?>">

                    <input
                        type="hidden"
                        name="action"
                        value="flvrtx_sync_youtube">

                    <?php wp_nonce_field('flvrtx_sync_youtube'); ?>

                    <p>

                        <button
                            type="submit"
                            class="button button-primary button-large">

                            Sync YouTube Videos

                        </button>

                    </p>

                </form>

            </div>

            <?php
        }
    );

});

/**
 * FLVRTX Watch Categories
 */
add_action('init', function () {

    register_taxonomy(
        'watch_category',
        ['watch'],
        [
            'labels' => [
                'name'              => 'Watch Categories',
                'singular_name'     => 'Watch Category',
                'search_items'      => 'Search Watch Categories',
                'all_items'         => 'All Watch Categories',
                'parent_item'       => 'Parent Watch Category',
                'parent_item_colon' => 'Parent Watch Category:',
                'edit_item'         => 'Edit Watch Category',
                'update_item'       => 'Update Watch Category',
                'add_new_item'      => 'Add New Watch Category',
                'new_item_name'     => 'New Watch Category Name',
                'menu_name'         => 'Categories',
            ],

            'public'            => true,
            'hierarchical'      => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_rest'      => true,

            'rewrite' => [
                'slug' => 'watch-category',
            ],
        ]
    );

});

/**
 * Filter Watch archive by Watch Category.
 */
add_action('pre_get_posts', function ($query) {

    if (
        is_admin()
        || ! $query->is_main_query()
        || ! $query->is_post_type_archive('watch')
    ) {
        return;
    }

    if (! empty($_GET['watch_category'])) {

        $category = sanitize_title($_GET['watch_category']);

        $query->set(
            'tax_query',
            [
                [
                    'taxonomy' => 'watch_category',
                    'field'    => 'slug',
                    'terms'    => $category,
                ],
            ]
        );
    }

});

/**
 * FLVRTX Recommendation Categories
 */
add_action('init', function () {

    register_taxonomy(
        'recommendation_category',
        ['recommendation'],
        [
            'labels' => [
                'name'              => 'Recommendation Categories',
                'singular_name'     => 'Recommendation Category',
                'search_items'      => 'Search Recommendation Categories',
                'all_items'         => 'All Recommendation Categories',
                'edit_item'         => 'Edit Recommendation Category',
                'update_item'       => 'Update Recommendation Category',
                'add_new_item'      => 'Add New Recommendation Category',
                'new_item_name'     => 'New Recommendation Category Name',
                'menu_name'         => 'Categories',
            ],

            'public'            => true,
            'hierarchical'      => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_rest'      => true,

            'rewrite' => [
                'slug' => 'recommendation-category',
            ],
        ]
    );

});

/**
 * Filter Recommendation archive by Recommendation Category.
 */
add_action('pre_get_posts', function ($query) {

    if (
        is_admin()
        || ! $query->is_main_query()
        || ! $query->is_post_type_archive('recommendation')
    ) {
        return;
    }

    if (! empty($_GET['recommendation_category'])) {

        $category = sanitize_title($_GET['recommendation_category']);

        $query->set(
            'tax_query',
            [
                [
                    'taxonomy' => 'recommendation_category',
                    'field'    => 'slug',
                    'terms'     => $category,
                ],
            ]
        );
    }

});

