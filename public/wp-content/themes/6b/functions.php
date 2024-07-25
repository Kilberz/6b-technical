<?php

//
// Custom Logo
//
function mytheme_setup() {
    add_theme_support('custom-logo', array(
        'height'      => 50,
        'width'       => 50,
        'flex-height' => false,
        'flex-width'  => false,
        'header-text' => array('site-title', 'site-description'),
    ));
}
add_action('after_setup_theme', 'mytheme_setup');

function mytheme_custom_logo_attributes($html) {
    // Add custom classes and styles
    $html = str_replace('custom-logo', 'custom-logo h-16 w-16 mr-8 inline-block', $html); // Add Tailwind classes
    return $html;
}
add_filter('get_custom_logo', 'mytheme_custom_logo_attributes');


//
// Navigation
//
function setup() {
    // Add theme support for menus
    add_theme_support('menus');
    // Register a primary menu location
    register_nav_menus(array(
        'primary' => __('Primary Menu', '6b'),
    ));
}
add_action('after_setup_theme', 'setup');


//
// Navigation Walker
//
class Tailwind_Nav_Walker extends Walker_Nav_Menu {

    // Start Level
    function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $classes = array('sub-menu');
        $class_names = join(' ', apply_filters('nav_menu_submenu_css_class', $classes, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
        $output .= "\n$indent<ul$class_names>\n";
    }

    // Start Element
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $output .= $indent . '<li' . $class_names .'>';

        $attributes = array();
        $attributes['title']  = !empty($item->attr_title) ? $item->attr_title : '';
        $attributes['target'] = !empty($item->target) ? $item->target : '';
        $attributes['rel']    = !empty($item->xfn) ? $item->xfn : '';
        $attributes['href']   = !empty($item->url) ? $item->url : '';

        $attributes = apply_filters('nav_menu_link_attributes', $attributes, $item, $args, $depth);
        $attr_string = '';

        foreach ($attributes as $attr => $value) {
            if (!empty($value)) {
                $value = ( 'href' === $attr ) ? esc_url($value) : esc_attr($value);
                $attr_string .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $title = apply_filters('the_title', $item->title, $item->ID);
        $item_output = $args->before;
        $item_output .= '<a class="hover:text-primary" ' . $attr_string .'>';
        $item_output .= $args->link_before . $title . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    // End Level
    function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    // End Element
    function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= "</li>\n";
    }
}


//
// Styles
//
function enqueue_styles() {
    wp_enqueue_style('main-styles', get_template_directory_uri() . '/css.css');
}
add_action('wp_enqueue_scripts', 'enqueue_styles');


//
// JAVASCRIPT
//
function enqueue_scripts() {
    // Enqueue a JavaScript file
    wp_enqueue_script(
        'my-theme-script', // Handle
        get_stylesheet_directory_uri() . '/main.js', // Script URL
        array('jquery'), // Dependencies (optional)
        null, // Version (optional)
        true // Load in footer (true) or header (false)
    );
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');


?>
