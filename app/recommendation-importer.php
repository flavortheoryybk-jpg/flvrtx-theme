<?php

/**
 * FLVRTX Recommendation Product Importer.
 */

namespace App;


/**
 * ---------------------------------------------------------
 * Admin Menu
 * ---------------------------------------------------------
 */

add_action('admin_menu', function () {

    add_submenu_page(
        'edit.php?post_type=recommendation',
        'Import Product',
        'Import Product',
        'edit_posts',
        'flvrtx-import-recommendation',
        __NAMESPACE__ . '\\flvrtx_render_import_page'
    );

});


/**
 * ---------------------------------------------------------
 * Import Product Page
 * ---------------------------------------------------------
 */

function flvrtx_render_import_page()
{
    $product_url = isset($_GET['product_url'])
        ? esc_url_raw(wp_unslash($_GET['product_url']))
        : '';

    $product_name = isset($_GET['product_name'])
        ? sanitize_text_field(wp_unslash($_GET['product_name']))
        : '';

    $retailer = $product_url
        ? flvrtx_detect_retailer($product_url)
        : '';

    $amazon_asin = '';

    if ($retailer === 'amazon') {
        $amazon_asin = flvrtx_extract_amazon_asin($product_url);
    }

    ?>

    <div class="wrap">

        <h1>Import Product</h1>

        <p>
            Paste a product URL and enter the product name to create a FLVRTX recommendation.
        </p>


        <?php if ($product_url) : ?>

            <?php if ($retailer === 'unknown') : ?>

                <div class="notice notice-error">

                    <p>
                        This retailer is not currently supported.
                        Please use an Amazon or Meesho product URL.
                    </p>

                </div>


            <?php else : ?>

                <div class="notice notice-success">

                    <p>
                        <strong>Product detected successfully.</strong>
                    </p>

                </div>


                <div
                    style="
                        max-width: 700px;
                        margin-top: 24px;
                        padding: 24px;
                        background: #fff;
                        border: 1px solid #dcdcde;
                        border-radius: 12px;
                    "
                >

                    <h2 style="margin-top: 0;">
                        Product Preview
                    </h2>


                    <table class="widefat striped">

                        <tbody>

                            <tr>

                                <td>
                                    <strong>Product Name</strong>
                                </td>

                                <td>
                                    <?php
                                    echo esc_html(
                                        $product_name ?: 'Not provided'
                                    );
                                    ?>
                                </td>

                            </tr>


                            <tr>

                                <td>
                                    <strong>Retailer</strong>
                                </td>

                                <td>
                                    <?php
                                    echo esc_html(
                                        ucfirst($retailer)
                                    );
                                    ?>
                                </td>

                            </tr>


                            <?php if ($amazon_asin) : ?>

                                <tr>

                                    <td>
                                        <strong>ASIN</strong>
                                    </td>

                                    <td>
                                        <?php echo esc_html($amazon_asin); ?>
                                    </td>

                                </tr>

                            <?php endif; ?>


                            <tr>

                                <td>
                                    <strong>Product URL</strong>
                                </td>

                                <td>

                                    <a
                                        href="<?php echo esc_url($product_url); ?>"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                    >

                                        <?php echo esc_html($product_url); ?>

                                    </a>

                                </td>

                            </tr>

                        </tbody>

                    </table>


                    <form
                        method="post"
                        action="<?php echo esc_url(admin_url('admin-post.php')); ?>"
                        style="margin-top: 24px;"
                    >

                        <input
                            type="hidden"
                            name="action"
                            value="flvrtx_create_recommendation"
                        >

                        <input
                            type="hidden"
                            name="product_url"
                            value="<?php echo esc_attr($product_url); ?>"
                        >

                        <input
                            type="hidden"
                            name="product_name"
                            value="<?php echo esc_attr($product_name); ?>"
                        >

                        <?php wp_nonce_field('flvrtx_create_recommendation'); ?>


                        <?php submit_button(
                            'Create Draft Recommendation',
                            'primary',
                            'submit',
                            false
                        ); ?>

                    </form>

                </div>


            <?php endif; ?>

        <?php endif; ?>


        <?php if (! $product_url || $retailer === 'unknown') : ?>

            <form
                method="get"
                action="<?php echo esc_url(admin_url('edit.php')); ?>"
                style="margin-top: 24px;"
            >

                <input
                    type="hidden"
                    name="post_type"
                    value="recommendation"
                >

                <input
                    type="hidden"
                    name="page"
                    value="flvrtx-import-recommendation"
                >


                <table class="form-table">

                    <tr>

                        <th scope="row">

                            <label for="product_url">
                                Product URL
                            </label>

                        </th>

                        <td>

                            <input
                                type="url"
                                id="product_url"
                                name="product_url"
                                class="regular-text"
                                style="width: 500px; max-width: 100%;"
                                placeholder="https://www.amazon.in/..."
                                value="<?php echo esc_attr($product_url); ?>"
                                required
                            >

                            <p class="description">
                                Paste an Amazon or Meesho product URL.
                            </p>

                        </td>

                    </tr>


                    <tr>

                        <th scope="row">

                            <label for="product_name">
                                Product Name
                            </label>

                        </th>

                        <td>

                            <input
                                type="text"
                                id="product_name"
                                name="product_name"
                                class="regular-text"
                                style="width: 500px; max-width: 100%;"
                                placeholder="Example: Stainless Steel Frying Pan"
                                value="<?php echo esc_attr($product_name); ?>"
                                required
                            >

                            <p class="description">
                                Enter the product name you want to use on FLVRTX.
                            </p>

                        </td>

                    </tr>

                </table>


                <?php submit_button('Detect Product'); ?>

            </form>

        <?php endif; ?>

    </div>

    <?php
}


/**
 * ---------------------------------------------------------
 * Detect Retailer
 * ---------------------------------------------------------
 */

function flvrtx_detect_retailer($url)
{
    $host = wp_parse_url($url, PHP_URL_HOST);

    if (! $host) {
        return 'unknown';
    }

    $host = strtolower($host);


    /*
     * Amazon India.
     */
    if (
        str_contains($host, 'amazon.in') ||
        $host === 'amzn.in' ||
        str_ends_with($host, '.amzn.in')
    ) {
        return 'amazon';
    }


    /*
     * Meesho.
     */
    if (str_contains($host, 'meesho.com')) {
        return 'meesho';
    }


    /*
     * Flipkart — future support.
     */
    if (str_contains($host, 'flipkart.com')) {
        return 'flipkart';
    }


    return 'unknown';
}


/**
 * ---------------------------------------------------------
 * Extract Amazon ASIN
 * ---------------------------------------------------------
 */

function flvrtx_extract_amazon_asin($url)
{
    $patterns = [
        '~/(?:dp|gp/product)/([A-Z0-9]{10})(?:[/?]|$)~i',
    ];


    foreach ($patterns as $pattern) {

        if (preg_match($pattern, $url, $matches)) {

            return strtoupper($matches[1]);

        }

    }


    return '';
}


/**
 * ---------------------------------------------------------
 * Create Recommendation Draft
 * ---------------------------------------------------------
 */

add_action(
    'admin_post_flvrtx_create_recommendation',
    __NAMESPACE__ . '\\flvrtx_create_recommendation'
);


function flvrtx_create_recommendation()
{
    /*
     * Permission check.
     */
    if (! current_user_can('edit_posts')) {

        wp_die(
            'You do not have permission to create recommendations.'
        );

    }


    /*
     * Nonce check.
     */
    check_admin_referer('flvrtx_create_recommendation');


    /*
     * Product URL.
     */
    $product_url = isset($_POST['product_url'])
        ? esc_url_raw(wp_unslash($_POST['product_url']))
        : '';


    /*
     * Product name.
     */
    $product_name = isset($_POST['product_name'])
        ? sanitize_text_field(wp_unslash($_POST['product_name']))
        : '';


    if (! $product_url) {

        wp_die(
            'Product URL is missing.'
        );

    }


    if (! $product_name) {

        wp_die(
            'Product name is required.'
        );

    }


    /*
     * Detect retailer.
     */
    $retailer = flvrtx_detect_retailer($product_url);


    if ($retailer === 'unknown') {

        wp_die(
            'This retailer is not currently supported.'
        );

    }


    /*
     * Extract Amazon ASIN.
     */
    $amazon_asin = '';


    if ($retailer === 'amazon') {

        $amazon_asin = flvrtx_extract_amazon_asin(
            $product_url
        );

    }


    /*
     * Create Recommendation as Draft.
     */
    $post_id = wp_insert_post(
        [
            'post_type'   => 'recommendation',
            'post_status' => 'draft',
            'post_title'  => $product_name,
        ],
        true
    );


    if (is_wp_error($post_id)) {

        wp_die(
            $post_id->get_error_message()
        );

    }


    /*
     * Store original source URL.
     */
    update_post_meta(
        $post_id,
        '_flvrtx_source_url',
        $product_url
    );


    /*
     * Store retailer.
     */
    update_post_meta(
        $post_id,
        'retailer',
        $retailer
    );


    /*
     * Store Amazon ASIN.
     */
    if (
        $retailer === 'amazon' &&
        $amazon_asin
    ) {

        update_post_meta(
            $post_id,
            'product_id',
            $amazon_asin
        );

    }


    /*
     * Meesho product ID is not implemented yet.
     */
    if ($retailer === 'meesho') {

        update_post_meta(
            $post_id,
            'product_id',
            ''
        );

    }


    /*
     * Initial import status.
     */
    update_post_meta(
        $post_id,
        'import_status',
        'pending'
    );


    /*
     * Store affiliate URL.
     */
    if ($retailer === 'amazon') {

        update_post_meta(
            $post_id,
            'amazon_link',
            $product_url
        );

    }


    if ($retailer === 'meesho') {

        update_post_meta(
            $post_id,
            'meesho_link',
            $product_url
        );

    }


    /*
     * Open the new Recommendation draft.
     */
    wp_safe_redirect(
        admin_url(
            'post.php?post=' .
            $post_id .
            '&action=edit'
        )
    );


    exit;
}