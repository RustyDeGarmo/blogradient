<?php

/*
Enqueue scripts and styles
*/

if(!function_exists('theme_setup')) {

    /* Theme Setup */

    function theme_setup() {

        load_theme_textdomain('blogradient', get_template_directory() . '/languages');
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support(
            'html5', 
            array(
                'search-form', 
                'comment-form', 
                'comment-list', 
                'gallery', 
                'caption'
            )
        );

        add_theme_support('customize-selective-refresh-widgets');
        add_theme_support('responsive-embeds');

        register_nav_menus(
            array(
                'primary' => esc_html__("Primary Menu", 'blogradient')
            )
        );
    }
}

add_action('after_setup_theme', 'theme_setup');

function assets() {

    // Enqueue CSS files
    wp_enqueue_style('google-font', '//fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap', array(), '1.0', 'all');

    wp_enqueue_style('bootstrap', get_theme_file_uri('assets/css/bootstrap.min.css'), array(), 'v5.2.3', 'all');

    wp_enqueue_style('flaticon', get_theme_file_uri('assets/font/flaticon.css'), array(), false, 'all');

    wp_enqueue_style('blogradient', get_stylesheet_uri(), array('bootstrap'), '1.0', 'all');

    // Enqueue JS files

    wp_enqueue_script('bootstrap', get_theme_file_uri('assets/js/bootstrap.min.js'), array(), 'v5.2.3', true);

    wp_enqueue_script('blogradient-js', get_theme_file_uri('assets/js/main-script.js'), array('jquery', 'jquery-ui-core', 'jquery-ui-selectmenu'), '1.0', true);

    if( is_singular() && comments_open() && get_option('thread_comments')){
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'assets');

/*  Custom readmore text for excerpts  */
function excerpt_readmore($more){
    return ' ...';
}

add_filter('excerpt_more', 'excerpt_readmore');

/* Some pagination magic */

function pagination(){
    global $wp_query;
    $links = paginate_links(
        array(
            'current'   => max(1, get_query_var('paged')), 
            'total'     => $wp_query -> max_num_pages, 
            'type'      => 'list', 
            'prev_text' => '<-', 
            'next_text' => '->'
        )
    );

    $links = '<nav class="pagination">' . $links;
    $links .= '</nav>';

    echo wp_kses_post($links);
    
}


/* Add Kirki Customizer Functionality */
require get_template_directory() . '/includes/customizer.php';











