<?php
/**
 * @package Nexgen Core
 */

function nxg_portfolio_register_post_type() {

  $labels = array(
    'name'                  => __( 'Portfolio', 'nexgen-portfolio' ),
    'singular_name'         => __( 'Item', 'nexgen-portfolio' ),
    'menu_name'             => __( 'Portfolio', 'nexgen-portfolio' ),
    'all_items'             => __( 'All Items', 'nexgen-portfolio' ),
    'add_new'               => __( 'Add New', 'nexgen-portfolio' ),
    'add_new_item'          => __( 'Add New Portfolio Item', 'nexgen-portfolio' ),
    'edit_item'             => __( 'Edit Item', 'nexgen-portfolio' ),
    'new_item'              => __( 'New Portfolio Item', 'nexgen-portfolio' ),
    'view_item'             => __( 'View Item', 'nexgen-portfolio' ),
    'search_items'          => __( 'Search Items', 'nexgen-portfolio' ),
    'not_found'             => __( 'No items found', 'nexgen-portfolio' ),
    'not_found_in_trash'    => __( 'No items found in trash', 'nexgen-portfolio' ),
    'parent_item_colon'     => __( 'Parent Portfolio:', 'nexgen-portfolio' ),
    'featured_image'        => __( 'Featured image', 'nexgen-portfolio' ),
    'set_featured_image'    => __( 'Set featured image', 'nexgen-portfolio' ),
    'remove_featured_image' => __( 'Remove featured image', 'nexgen-portfolio' ),
    'use_featured_image'    => __( 'Use featured image', 'nexgen-portfolio' ),
    'archives'              => __( 'Portfolio items archive', 'nexgen-portfolio' ),
    'insert_into_item'      => __( 'Insert into item', 'nexgen-portfolio' ),
    'uploaded_to_this_item' => __( 'Upload to this item', 'nexgen-portfolio' ),
    'filter_items_list'     => __( 'Filter items', 'nexgen-portfolio' ),
    'items_list_navigation' => __( 'Portfolio items list navigation', 'nexgen-portfolio' ),
    'items_list'            => __( 'Portfolio items list', 'nexgen-portfolio' ),
    'parent_item_colon'     => __( 'Parent Portfolio:', 'nexgen-portfolio' ),
  );

  $args = array(
    'label'               => __( 'Portfolio', 'nexgen-portfolio' ),
    'labels'              => $labels,
    'description'         => __( 'Portfolio post type for Nexgen WordPress Theme.', 'nexgen-portfolio' ),
    'public'              => true,
    'publicly_queryable'  => true,
    'show_ui'             => true,
    'show_in_rest'        => true,
    'rest_base'           => '',
    'has_archive'         => false,
    'show_in_menu'        => true,
    'exclude_from_search' => false,
    'capability_type'     => 'post',
    'map_meta_cap'        => true,
    'hierarchical'        => false,
    'rewrite'             => array( 'slug' => 'portfolio', 'with_front' => true ),
    'query_var'           => true,
    'menu_position'       => 5,
    'menu_icon'           => 'dashicons-portfolio',
    'supports'            => array( 'title', 'excerpt', 'comments', 'editor', 'thumbnail' ),
  );

  register_post_type( 'nexgen-portfolio', $args );
}

add_action( 'init', 'nxg_portfolio_register_post_type' );

function nxg_portfolio_category_init() {

  $labels = array(
    'name'                       => _x( 'Categories', 'taxonomy general name', 'nexgen-portfolio' ),
    'singular_name'              => _x( 'Category', 'taxonomy singular name', 'nexgen-portfolio' ),
    'search_items'               => __( 'Search Categories', 'nexgen-portfolio' ),
    'popular_items'              => __( 'Popular Categories', 'nexgen-portfolio' ),
    'all_items'                  => __( 'Categories', 'nexgen-portfolio' ),
    'parent_item'                => null,
    'parent_item_colon'          => null,
    'edit_item'                  => __( 'Edit Category', 'nexgen-portfolio' ),
    'update_item'                => __( 'Update Category', 'nexgen-portfolio' ),
    'add_new_item'               => __( 'Add New Category', 'nexgen-portfolio' ),
    'new_item_name'              => __( 'New Portfolio Category', 'nexgen-portfolio' ),
    'separate_items_with_commas' => __( 'Separate categories with commas', 'nexgen-portfolio' ),
    'add_or_remove_items'        => __( 'Add or remove categories', 'nexgen-portfolio' ),
    'choose_from_most_used'      => __( 'Choose from the most used categories', 'nexgen-portfolio' ),
    'not_found'                  => __( 'No categories found.', 'nexgen-portfolio' ),
    'menu_name'                  => __( 'Categories', 'nexgen-portfolio' ),
  );

  $args = array(
    'hierarchical'          => false,
    'labels'                => $labels,
    'show_ui'               => true,
    'show_in_rest'          => true,
    'show_admin_column'     => true,
    'query_var'             => true,
    'rewrite'               => array( 'slug' => 'portfolio-category' ),
  );

  register_taxonomy( 'nexgen-portfolio-category', array( 'nexgen-portfolio' ), $args );

  $labels = array(
    'name'                       => _x( 'Tags', 'taxonomy general name', 'nexgen-portfolio' ),
    'singular_name'              => _x( 'Tag', 'taxonomy singular name', 'nexgen-portfolio' ),
    'search_items'               => __( 'Search Tags', 'nexgen-portfolio' ),
    'popular_items'              => __( 'Popular Tags', 'nexgen-portfolio' ),
    'all_items'                  => __( 'Tags', 'nexgen-portfolio' ),
    'parent_item'                => null,
    'parent_item_colon'          => null,
    'edit_item'                  => __( 'Edit Tag', 'nexgen-portfolio' ),
    'update_item'                => __( 'Update Tag', 'nexgen-portfolio' ),
    'add_new_item'               => __( 'Add New Tag', 'nexgen-portfolio' ),
    'new_item_name'              => __( 'New Portfolio Tag', 'nexgen-portfolio' ),
    'separate_items_with_commas' => __( 'Separate tags with commas', 'nexgen-portfolio' ),
    'add_or_remove_items'        => __( 'Add or remove tags', 'nexgen-portfolio' ),
    'choose_from_most_used'      => __( 'Choose from the most used tags', 'nexgen-portfolio' ),
    'not_found'                  => __( 'No tags found.', 'nexgen-portfolio' ),
    'menu_name'                  => __( 'Tags', 'nexgen-portfolio' ),
  );

  $args = array(
    'hierarchical'          => false,
    'labels'                => $labels,
    'show_ui'               => true,
    'show_in_rest'          => true,
    'show_admin_column'     => true,
    'query_var'             => true,
    'rewrite'               => array( 'slug' => 'portfolio-tag' ),
  );

  register_taxonomy( 'nexgen-portfolio-tag', array( 'nexgen-portfolio' ), $args );
}

add_action( 'init', 'nxg_portfolio_category_init' );