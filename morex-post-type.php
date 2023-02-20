<?php

/**
 * Plugin Name: Morex Post Type
 * Description: Adds portfolio post types
 * Version: 1.0.0
 * Requires at least: 5.2
 * Requires PHP: 7.2
 * Author: Maxjn
 * Author URI: https://www.rtl-theme.com/author/maxjn/products/
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI: https://github.com/maxjn/morex-post-type
 * Text Domain: morex-post-type
 * Domain Path: /languages
 */

/**
 * Load plugin textdomain.
 */
load_plugin_textdomain('morex-post-type', false, dirname(plugin_basename(__FILE__)) . '/languages');


/**
 * Create one taxonomy, Categories for the post type "portfolio".
 *
 * @see register_post_type() for registering custom post types.
 */
function portfolio_taxonomies()
{
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => _x('Categories', 'taxonomy general name', 'morex-post-type'),
        'singular_name'     => _x('Category', 'taxonomy singular name', 'morex-post-type'),
        'search_items'      => __('Search Categories', 'morex-post-type'),
        'all_items'         => __('All Categories', 'morex-post-type'),
        'parent_item'       => __('Parent Category', 'morex-post-type'),
        'parent_item_colon' => __('Parent Category:', 'morex-post-type'),
        'edit_item'         => __('Edit Category', 'morex-post-type'),
        'update_item'       => __('Update Category', 'morex-post-type'),
        'add_new_item'      => __('Add New Category', 'morex-post-type'),
        'new_item_name'     => __('New Category Name', 'morex-post-type'),
        'menu_name'         => __('Categories', 'morex-post-type'),
    );

    $args = array(
        'hierarchical'      => false,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => false,

    );

    register_taxonomy('portfolio_category', array('portfolio'), $args);

    unset($args);
    unset($labels);
}
add_action('init', 'portfolio_taxonomies', 0);

/**
 * Register a custom post type called "Portfolio".
 *
 * @see get_post_type_labels() for label keys.
 */
function portfolio_post_type()
{
    $labels = array(
        'name'                  => _x('Portfolios', 'Post type general name', 'morex-post-type'),
        'singular_name'         => _x('Portfolio', 'Post type singular name', 'morex-post-type'),
        'menu_name'             => _x('Portfolios', 'Admin Menu text', 'morex-post-type'),
        'name_admin_bar'        => _x('Portfolio', 'Add New on Toolbar', 'morex-post-type'),
        'add_new'               => __('Add New', 'morex-post-type'),
        'add_new_item'          => __('Add New Portfolio', 'morex-post-type'),
        'new_item'              => __('New Portfolio', 'morex-post-type'),
        'edit_item'             => __('Edit Portfolio', 'morex-post-type'),
        'view_item'             => __('View Portfolio', 'morex-post-type'),
        'all_items'             => __('All Portfolios', 'morex-post-type'),
        'search_items'          => __('Search Portfolios', 'morex-post-type'),
        'parent_item_colon'     => __('Parent Portfolios:', 'morex-post-type'),
        'not_found'             => __('No portfolios found.', 'morex-post-type'),
        'not_found_in_trash'    => __('No portfolios found in Trash.', 'morex-post-type'),
        'featured_image'        => _x('portfolio Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'morex-post-type'),
        'set_featured_image'    => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'morex-post-type'),
        'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'morex-post-type'),
        'use_featured_image'    => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'morex-post-type'),
        'archives'              => _x('portfolio archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'morex-post-type'),
        'insert_into_item'      => _x('Insert into portfolio', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'morex-post-type'),
        'uploaded_to_this_item' => _x('Uploaded to this portfolio', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'morex-post-type'),
        'filter_items_list'     => _x('Filter portfolios list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'morex-post-type'),
        'items_list_navigation' => _x('Portfolios list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'morex-post-type'),
        'items_list'            => _x('Portfolios list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'morex-post-type'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'portfolio'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'supports'           => array('title', 'editor', 'thumbnail'),
        'taxonomies'         => array('portfolio_category'),
        'menu_icon'   => 'dashicons-portfolio',
    );

    register_post_type('portfolio', $args);
}
add_action('init', 'portfolio_post_type');