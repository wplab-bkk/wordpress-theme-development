<?php
include_once get_template_directory() . '/includes/wp_define.php';


function add_enqueue_style()
{
    wp_enqueue_style('thinny-all', WP_THINNY_STYLE_DIR . '/all.css', false, false, MQ_ALL); 
    wp_enqueue_style('thinny-variable', WP_THINNY_STYLE_DIR . '/variable.css', false, false, MQ_ALL); 
    wp_enqueue_style('thinny-buttons', WP_THINNY_STYLE_DIR . '/buttons.css', false, false, MQ_DESKTOP); 
    wp_enqueue_style('thinny-nav', WP_THINNY_STYLE_DIR. '/style_nav.css', false, false, MQ_DESKTOP); 
    wp_enqueue_style('thinny-font_awesome', WP_THINNY_FONT_AWESOME_DIR . '/css/all.min.css', false, false, MQ_ALL); 
}

// add scripts
function add_enqueue_scripts()
{
    //wp_enqueue_script('test_js', get_template_directory_uri() . '/js/test_js.js', array('jquery'), true);
    wp_enqueue_script('modrnizr', WP_THINNY_JS_DIR . '/modernizr-2.6.2.min.js', null, true);
    wp_enqueue_script('detectizr', WP_THINNY_JS_DIR . '/detectizr.js', null, true);
    //wp_enqueue_script('lazyload', WP_THINNY_JS_DIR . '/lazyload.min.js', null, true);
    wp_enqueue_script('myScript', WP_THINNY_JS_DIR . '/my.min.js', null, true);
}

function  remove_jquery($lib)
{
    if (!is_admin()) {
        wp_deregister_script($lib);
        wp_dequeue_script($lib);
        wp_deregister_script($lib);
    }
}

function disable_emojis()
{
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');

}

function disable_emojis_tinymce($plugins)
{
    if (is_array($plugins)) {
        return array_diff($plugins, array('wpemoji'));
    } else {
        return array();
    }
}

function wpassist_remove_block_library_css()
{
    if (!is_admin()) wp_dequeue_style('wp-block-library');
}

function hide_admin_bar()
{
    return !is_admin() ? false : true;
}

function themename_custom_logo_setup() {
    $defaults = array(
    'height'      => 100,
    'width'       => 400,
    'flex-height' => true,
    'flex-width'  => true,
    'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
   }
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );

function fetch_youtube(){
    return '<iframe width="100%" height="500" src="https://www.youtube-nocookie.com/embed/PzXvQL3llx4?start=1" 
            frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
            allowfullscreen></iframe>';
}
add_shortcode('wp-youtube', 'fetch_youtube');


add_action( 'admin_init', 'eg_settings_api_init' );


// init filter
add_filter('show_admin_bar', 'hide_admin_bar');


// init fucntion 
add_action('init', 'disable_emojis');
//add_action('wp_enqueue_scripts', 'wpassist_remove_block_library_css');




// execute all action
add_action('wp_enqueue_scripts', 'add_enqueue_style');
add_action('wp_enqueue_scripts', 'add_enqueue_scripts');