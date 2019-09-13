<?php

define('WP_THINNY_THEME_DIR', get_template_directory_uri());
define('WP_THINNY_COMPONENT_DIR', get_template_directory_uri() . '/includes');
define('WP_THINNY_JS_DIR', get_template_directory_uri() . '/js');
define('WP_THINNY_STYLE_DIR', get_template_directory_uri() . '/css');
define('WP_THINNY_FONT_DIR', get_template_directory_uri() . '/fonts');
define('WP_THINNY_FONT_AWESOME_DIR', WP_THINNY_FONT_DIR . '/fontawesome');

// media query
define('MQ_ALL', 'all');
define('MQ_DESKTOP', '(min-width: 1024px)');
define('MQ_IPAD', '(max-width: 767px)');
define('MQ_IMOBILE', '(max-width: 479px)');