<?php

namespace Flynt;

use Flynt\Utils\FileLoader;

require_once __DIR__ . '/vendor/autoload.php';

if (!defined('WP_ENV')) {
    define('WP_ENV', function_exists('wp_get_environment_type') ? wp_get_environment_type() : 'production');
} elseif (!defined('WP_ENVIRONMENT_TYPE')) {
    define('WP_ENVIRONMENT_TYPE', WP_ENV);
}

// Check if the required plugins are installed and activated.
// If they aren't, this function redirects the template rendering to use
// plugin-inactive.php instead and shows a warning in the admin backend.
if (Init::checkRequiredPlugins()) {
    FileLoader::loadPhpFiles('inc');
    add_action('after_setup_theme', ['Flynt\Init', 'initTheme']);
    add_action('after_setup_theme', ['Flynt\Init', 'loadComponents'], 101);
}

// Remove the admin-bar inline-CSS as it isn't compatible with the sticky footer CSS.
// This prevents unintended scrolling on pages with few content, when logged in.
add_theme_support('admin-bar', array('callback' => '__return_false'));

add_action('after_setup_theme', function () {
    /**
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_theme_textdomain('flynt', get_template_directory() . '/languages');
});

add_action( 'do_meta_boxes', function() {
  remove_meta_box('commentstatusdiv', 'post', 'normal');
  remove_meta_box('commentsdiv', 'post', 'normal');
});

/*
 * Override default vimeo oembed behavior
 */
add_action('init', function() {

        // Unregister default Vimeo embed
        $format = '#https?://(.+\.)?vimeo\.com/.*#i';
        wp_oembed_remove_provider($format);

        // set vimeo oembed args
        // see full list here: developer.vimeo.com/apis/oembed
        $args = array(
            'title'     => false,
            'portrait'  => false,
            'byline'    => false,
            'api'       => true,
            'player_id' => uniqid('vimeo-'),
            'color' => '0060ff'
        );

        // set regex and oembed url
        $provider = 'http://vimeo.com/api/oembed.{format}?' . http_build_query($args);

        // override the default vimeo configuration
        return wp_oembed_add_provider($format, $provider, true);
});