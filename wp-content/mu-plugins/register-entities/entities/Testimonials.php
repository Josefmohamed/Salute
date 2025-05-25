<?php

namespace Register_Entities;

class Testimonials extends Entity
{
  public static function init()
  {
    // to copy
    register_post_type('testimonials', [
        'label' => __('testimonials', 'salute'),
        'description' => __('Testimonials news and reviews', 'salute'),
        'labels' => array(
            'name' => _x('Testimonial', 'Post Type General Name', 'salute'),
            'singular_name' => _x('Testimonial', 'Post Type Singular Name', 'salute'),
            'menu_name' => __('Testimonials', 'salute'),
            'parent_item_colon' => __('Parent Testimonial', 'salute'),
            'all_items' => __('All Testimonials', 'salute'),
            'view_item' => __('View Testimonial', 'salute'),
            'add_new_item' => __('Add New Testimonial', 'salute'),
            'add_new' => __('Add New', 'salute'),
            'edit_item' => __('Edit Testimonial', 'salute'),
            'update_item' => __('Update Testimonial', 'salute'),
            'search_items' => __('Search Testimonial', 'salute'),
            'not_found' => __('Not Found', 'salute'),
            'not_found_in_trash' => __('Not found in Trash', 'salute'),
        ),
        'supports' => array(
            'title',
            'custom-fields',
        ),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'menu_icon' => 'dashicons-testimonial',
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'show_in_rest' => true,
    ]);
    
  }
}


