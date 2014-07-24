<?php
/**
 * Post Type Tool
 * 
 * Creates post_types to work with Advanced Custom Fields
 * @since 0.1
 */

/**
 * Creates the post type timeline
 * @since 0.1
 */
function post_type_timeline() 
{
    $labels = array(
            'name'                  => __('Timeline', 'redsuns-timeline'),
            'singular_name'         => __('Timeline', 'redsuns-timeline'),
            'add_new'               => __('Add new', 'redsuns-timeline'),
            'add_new_item'          => __('New Item', 'redsuns-timeline'),
            'edit_item'             => __('Edit Item', 'redsuns-timeline'),
            'new_item'              => __('New Item', 'redsuns-timeline'),
            'view_item'             => __('View Item', 'redsuns-timeline'),
            'search_items'          => __('Search Itens', 'redsuns-timeline'),
            'not_found'             => __('No registers found', 'redsuns-timeline'),
            'not_found_in_trash'    => __('No registers found in trash', 'redsuns-timeline'),
            'parent_item_colon'     => '',
            'menu_name'             => __('Timeline', 'redsuns-timeline'),
            );

    $args = array(
            'labels'            => $labels,
            'public'            => true,
            'public_queryable'  => true,
            'show_ui'           => true,  
            'query_var'         => true,
            'rewrite'           => true,
            'capability_type'   => 'post',
            'has_archive'       => true,
            'hierarchical'      => false,
            'menu_position'     => 5,
            'menu_icon'         => 'dashicons-backup',
            'supports'          => array('title','editor')
    );

    register_post_type( 'timeline' , $args );
    flush_rewrite_rules();
    
    register_custom_taxonomy();
}

add_action('init', 'post_type_timeline');


/**
 * Register taxonomy for Timeline post type
 * @since 0.1
 */
function register_custom_taxonomy()
{
    $labels = array(
            'name'              => __( 'Categories', 'redsuns-timeline' ),
            'singular_name'     => __( 'Category', 'redsuns-timeline' ),
            'search_items'      => __( 'Search Categories', 'redsuns-timeline' ),
            'all_items'         => __( 'All Categories', 'redsuns-timeline' ),
            'parent_item'       => __( 'Parent Category', 'redsuns-timeline' ),
            'parent_item_colon' => __( 'Parent Category:', 'redsuns-timeline' ),
            'edit_item'         => __( 'Edit Category', 'redsuns-timeline' ),
            'update_item'       => __( 'Update Category', 'redsuns-timeline' ),
            'add_new_item'      => __( 'Add New Category', 'redsuns-timeline' ),
            'new_item_name'     => __( 'New Category Name', 'redsuns-timeline' ),
            'menu_name'         => __( 'Categories', 'redsuns-timeline' ),
    );

    $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'timeline-category' ),
    );

    register_taxonomy( 'timeline-category', array( 'timeline' ), $args );
}
