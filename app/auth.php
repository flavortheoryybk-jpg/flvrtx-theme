<?php

/**
 * FLVRTX Membership
 *
 * Handles public registration for FLVRTX Food Lovers.
 */

add_action('admin_post_nopriv_flvrtx_register', 'flvrtx_handle_registration');
add_action('admin_post_flvrtx_register', 'flvrtx_handle_registration');

function flvrtx_handle_registration()
{
    /*
     * Security
     */
    if (
        ! isset($_POST['flvrtx_register_nonce']) ||
        ! wp_verify_nonce(
            sanitize_text_field(wp_unslash($_POST['flvrtx_register_nonce'])),
            'flvrtx_register'
        )
    ) {
        wp_die('Security check failed. Please go back and try again.');
    }

    /*
     * Get submitted values
     */
    $name = isset($_POST['name'])
        ? sanitize_text_field(wp_unslash($_POST['name']))
        : '';

    $email = isset($_POST['email'])
        ? sanitize_email(wp_unslash($_POST['email']))
        : '';

    $password = isset($_POST['password'])
        ? (string) $_POST['password']
        : '';

    /*
     * Validation
     */
    if ($name === '' || $email === '' || $password === '') {
        wp_die('Please complete all fields.');
    }

    if (! is_email($email)) {
        wp_die('Please enter a valid email address.');
    }

    if (strlen($password) < 8) {
        wp_die('Your password must be at least 8 characters.');
    }

    /*
     * Check whether email already exists
     */
    if (email_exists($email)) {
        wp_die(
            'An account with this email already exists. Please sign in instead.'
        );
    }

    /*
     * Create username from email
     */
    $username_base = sanitize_user(
        current(explode('@', $email)),
        true
    );

    if ($username_base === '') {
        $username_base = 'flvrtxuser';
    }

    $username = $username_base;
    $counter = 1;

    while (username_exists($username)) {
        $username = $username_base . $counter;
        $counter++;
    }

    /*
     * Create WordPress user
     */
    $user_id = wp_create_user(
        $username,
        $password,
        $email
    );

    if (is_wp_error($user_id)) {
        wp_die(
            'We could not create your account. Please try again.'
        );
    }

    /*
     * Set display name
     */
    wp_update_user([
        'ID'           => $user_id,
        'display_name' => $name,
        'nickname'     => $name,
        'role'         => 'subscriber',
    ]);

    /*
     * Log the new member in
     */
    wp_set_auth_cookie($user_id, true);
    wp_set_current_user($user_id);

    /*
     * Redirect to homepage
     */
    wp_safe_redirect(home_url('/'));

    exit;
}

/**
 * FLVRTX Login
 */

add_action('admin_post_nopriv_flvrtx_login', 'flvrtx_handle_login');
add_action('admin_post_flvrtx_login', 'flvrtx_handle_login');

function flvrtx_handle_login()
{
    /*
     * Security
     */
    if (
        ! isset($_POST['flvrtx_login_nonce']) ||
        ! wp_verify_nonce(
            sanitize_text_field(wp_unslash($_POST['flvrtx_login_nonce'])),
            'flvrtx_login'
        )
    ) {
        wp_die('Security check failed. Please go back and try again.');
    }

    /*
     * Get submitted values
     */
    $email = isset($_POST['email'])
        ? sanitize_email(wp_unslash($_POST['email']))
        : '';

    $password = isset($_POST['password'])
        ? (string) $_POST['password']
        : '';

    $remember = ! empty($_POST['remember']);

    /*
     * Validation
     */
    if ($email === '' || $password === '') {
        wp_die('Please enter your email and password.');
    }

    if (! is_email($email)) {
        wp_die('Please enter a valid email address.');
    }

    /*
     * Find user by email
     */
    $user = get_user_by('email', $email);

    if (! $user) {
        wp_die('Invalid email or password.');
    }

    /*
     * Authenticate
     */
    $credentials = [
        'user_login'    => $user->user_login,
        'user_password' => $password,
        'remember'      => $remember,
    ];

    $authenticated = wp_signon($credentials, is_ssl());

    if (is_wp_error($authenticated)) {
        wp_die('Invalid email or password.');
    }

    /*
     * Set current user
     */
    wp_set_current_user($authenticated->ID);

    /*
     * Redirect back to the page the user came from
     */
    $redirect_to = isset($_POST['redirect_to'])
        ? esc_url_raw(wp_unslash($_POST['redirect_to']))
        : home_url('/');
    
    if (! $redirect_to || ! wp_validate_redirect($redirect_to, false)) {
        $redirect_to = home_url('/');
    }
    
    wp_safe_redirect($redirect_to);
    
    exit;
}

/**
 * FLVRTX Forgot Password
 */

add_action('admin_post_nopriv_flvrtx_forgot_password', 'flvrtx_handle_forgot_password');
add_action('admin_post_flvrtx_forgot_password', 'flvrtx_handle_forgot_password');

function flvrtx_handle_forgot_password()
{
    if (
        ! isset($_POST['flvrtx_forgot_password_nonce']) ||
        ! wp_verify_nonce(
            sanitize_text_field(wp_unslash($_POST['flvrtx_forgot_password_nonce'])),
            'flvrtx_forgot_password'
        )
    ) {
        wp_die('Security check failed. Please go back and try again.');
    }

    $email = isset($_POST['email'])
        ? sanitize_email(wp_unslash($_POST['email']))
        : '';

    if (! is_email($email)) {
        wp_safe_redirect(
            add_query_arg(
                'reset',
                'invalid',
                home_url('/forgot-password/')
            )
        );

        exit;
    }

    $user = get_user_by('email', $email);

    /*
     * Only send an email when the account exists.
     */
    if ($user) {

        $key = get_password_reset_key($user);

        if (! is_wp_error($key)) {

            $reset_url = add_query_arg(
                [
                    'key'   => rawurlencode($key),
                    'login' => rawurlencode($user->user_login),
                ],
                home_url('/reset-password/')
            );

            $subject = 'Reset your FLVRTX password';

            $message = "Hi {$user->display_name},\n\n";
            $message .= "We received a request to reset your FLVRTX password.\n\n";
            $message .= "Reset your password here:\n";
            $message .= $reset_url . "\n\n";
            $message .= "If you did not request this, you can safely ignore this email.\n\n";
            $message .= "— FLVRTX";

            wp_mail(
                $user->user_email,
                $subject,
                $message
            );
        }
    }

    /*
     * Always show the same success message.
     * This prevents revealing whether an email belongs to an account.
     */
    wp_safe_redirect(
        add_query_arg(
            'reset',
            'sent',
            home_url('/forgot-password/')
        )
    );

    exit;
}

/**
 * FLVRTX Reset Password
 */

add_action('admin_post_nopriv_flvrtx_reset_password', 'flvrtx_handle_reset_password');
add_action('admin_post_flvrtx_reset_password', 'flvrtx_handle_reset_password');

function flvrtx_handle_reset_password()
{
    if (
        ! isset($_POST['flvrtx_reset_password_nonce']) ||
        ! wp_verify_nonce(
            sanitize_text_field(wp_unslash($_POST['flvrtx_reset_password_nonce'])),
            'flvrtx_reset_password'
        )
    ) {
        wp_die('Security check failed. Please try again.');
    }

    $key = isset($_POST['key'])
        ? sanitize_text_field(wp_unslash($_POST['key']))
        : '';

    $login = isset($_POST['login'])
        ? sanitize_user(wp_unslash($_POST['login']))
        : '';

    $password = isset($_POST['password'])
        ? (string) $_POST['password']
        : '';

    $password_confirm = isset($_POST['password_confirm'])
        ? (string) $_POST['password_confirm']
        : '';

    if (! $key || ! $login) {
        wp_die('This password reset link is invalid.');
    }

    $user = check_password_reset_key($key, $login);

    if (is_wp_error($user)) {
        wp_die('This password reset link is invalid or has expired.');
    }

    if (strlen($password) < 8) {
        wp_die('Your password must be at least 8 characters.');
    }

    if ($password !== $password_confirm) {
        wp_die('The passwords do not match.');
    }

    reset_password($user, $password);

    wp_safe_redirect(
        add_query_arg(
            'reset',
            'success',
            home_url('/login/')
        )
    );

    exit;
}

/**
 * FLVRTX Frontend Logout
 */
add_action('init', function () {

    if (
        ! isset($_GET['flvrtx_logout']) ||
        $_GET['flvrtx_logout'] !== '1'
    ) {
        return;
    }

    if (! is_user_logged_in()) {
        wp_safe_redirect(home_url('/'));
        exit;
    }

    if (
        ! isset($_GET['_wpnonce']) ||
        ! wp_verify_nonce(
            sanitize_text_field(wp_unslash($_GET['_wpnonce'])),
            'flvrtx_logout'
        )
    ) {
        wp_die('Security check failed. Please try again.');
    }

    wp_logout();

    wp_safe_redirect(home_url('/'));

    exit;
});