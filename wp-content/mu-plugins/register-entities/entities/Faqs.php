<?php

namespace Register_Entities;

class Faqs extends Entity
{
  public static function init()
  {
    // to copy
    register_post_type('faqs', [
        'label' => __('faqs', 'salute'),
        'description' => __('Faqs news and reviews', 'salute'),
        'labels' => array(
            'name' => _x('Faqs', 'Post Type General Name', 'salute'),
            'singular_name' => _x('Faqs', 'Post Type Singular Name', 'salute'),
            'menu_name' => __('Faqs', 'salute'),
            'parent_item_colon' => __('Parent Faqs', 'salute'),
            'all_items' => __('All Faqs', 'salute'),
            'view_item' => __('View Faqs', 'salute'),
            'add_new_item' => __('Add New Faqs', 'salute'),
            'add_new' => __('Add New', 'salute'),
            'edit_item' => __('Edit Faqs', 'salute'),
            'update_item' => __('Update Faqs', 'salute'),
            'search_items' => __('Search Faqs', 'salute'),
            'not_found' => __('Not Found', 'salute'),
            'not_found_in_trash' => __('Not found in Trash', 'salute'),
        ),
      // Features this CPT supports in Post Editor
        'supports' => array(
            'title',
            'editor',
            'custom-fields',
            'revisions'
        ),
      // You can associate this CPT with a taxonomy or custom taxonomy.
      /* A hierarchical CPT is like Pages and can have
      * Parent and child items. A non-hierarchical CPT
      * is like Posts.
      */
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'menu_icon' => 'dashicons-format-status',
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 9,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'show_in_rest' => true,
    ]);
  }
}


