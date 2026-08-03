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
        ]);

    }

});