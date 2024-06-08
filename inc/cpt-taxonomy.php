<?php
function fwd_register_custom_post_types_students() {
    
    // Register student CPT
    $labels = array(
        'name'                  => _x( 'Students', 'post type general name' ),
        'singular_name'         => _x( 'Student', 'post type singular name'),
        'menu_name'             => _x( 'Students', 'admin menu' ),
        'name_admin_bar'        => _x( 'Student', 'add new on admin bar' ),
        'add_new'               => _x( 'Add New', 'student' ),
        'add_new_item'          => __( 'Add New Student' ),
        'new_item'              => __( 'New Student' ),
        'edit_item'             => __( 'Edit Student' ),
        'view_item'             => __( 'View Student' ),
        'all_items'             => __( 'All Students' ),
        'search_items'          => __( 'Search Students' ),
        'parent_item_colon'     => __( 'Parent Students:' ),
        'not_found'             => __( 'No students found.' ),
        'not_found_in_trash'    => __( 'No students found in Trash.' ),
        'archives'              => __( 'Student Archives'),
        'insert_into_item'      => __( 'Insert into student'),
        'uploaded_to_this_item' => __( 'Uploaded to this student'),
        'filter_item_list'      => __( 'Filter students list'),
        'items_list_navigation' => __( 'Students list navigation'),
        'items_list'            => __( 'Students list'),
        'featured_image'        => __( 'Student featured image'),
        'set_featured_image'    => __( 'Set student featured image'),
        'remove_featured_image' => __( 'Remove student featured image'),
        'use_featured_image'    => __( 'Use as featured image'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'students' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-admin-users',
        'supports'           => array( 'title', 'thumbnail', 'editor' ),
        'template'           => array( array( 'core/paragraph' ), array( 'core/button' ) ),
        'template_lock'      => 'all'
    );

    register_post_type( 'student', $args );

    // Register staff CPT
    $labels = array(
        'name'               => _x( 'Staff', 'post type general name' ),
        'singular_name'      => _x( 'Staff Member', 'post type singular name' ),
        'menu_name'          => _x( 'Staff', 'admin menu' ),
        'name_admin_bar'     => _x( 'Staff Member', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'staff member' ),
        'add_new_item'       => __( 'Add New Staff Member' ),
        'new_item'           => __( 'New Staff Member' ),
        'edit_item'          => __( 'Edit Staff Member' ),
        'view_item'          => __( 'View Staff Member' ),
        'all_items'          => __( 'All Staff Members' ),
        'search_items'       => __( 'Search Staff Members' ),
        'parent_item_colon'  => __( 'Parent Staff Members:' ),
        'not_found'          => __( 'No staff members found.' ),
        'not_found_in_trash' => __( 'No staff members found in Trash.' ),
        'archives'           => __( 'Staff Member Archives'),
        'insert_into_item'   => __( 'Insert into staff member'),
        'uploaded_to_this_item' => __( 'Uploaded to this staff member'),
        'filter_item_list'   => __( 'Filter staff members list'),
        'items_list_navigation' => __( 'Staff members list navigation'),
        'items_list'         => __( 'Staff members list'),
        'featured_image'     => __( 'Staff Member featured image'),
        'set_featured_image' => __( 'Set staff member featured image'),
        'remove_featured_image' => __( 'Remove staff member featured image'),
        'use_featured_image' => __( 'Use as featured image'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'staff' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-groups',
        'supports'           => array( 'title' ),
    );

    register_post_type( 'fwd-staff', $args );

}
add_action( 'init', 'fwd_register_custom_post_types_students' );

// Taxonomies
function fwd_register_taxonomies() {
    $labels = array(
        'name'              => _x( 'Departments', 'taxonomy general name' ),
        'singular_name'     => _x( 'Department', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Departments' ),
        'all_items'         => __( 'All Departments' ),
        'parent_item'       => __( 'Parent Department' ),
        'parent_item_colon' => __( 'Parent Department:' ),
        'edit_item'         => __( 'Edit Department' ),
        'update_item'       => __( 'Update Department' ),
        'add_new_item'      => __( 'Add New Department' ),
        'new_item_name'     => __( 'New Department Name' ),
        'menu_name'         => __( 'Departments' ),
    );

    $args = array(
        'hierarchical'      => true, 
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'department' ),
    );

    register_taxonomy( 'department', array( 'fwd-staff' ), $args );

    // Register student taxonomy
    $labels = array(
        'name'              => _x( 'Positions', 'taxonomy general name' ),
        'singular_name'     => _x( 'Position', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Positions' ),
        'all_items'         => __( 'All Positions' ),
        'parent_item'       => __( 'Parent Position' ),
        'parent_item_colon' => __( 'Parent Position:' ),
        'edit_item'         => __( 'Edit Position' ),
        'update_item'       => __( 'Update Position' ),
        'add_new_item'      => __( 'Add New Position' ),
        'new_item_name'     => __( 'New Position Name' ),
        'menu_name'         => __( 'Positions' ),
    );

    $args = array(
        'hierarchical'      => true, 
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'position' ),
    );

    register_taxonomy( 'position', array( 'student' ), $args );
}
add_action( 'init', 'fwd_register_taxonomies' );

// Taxonomy Terms
function fwd_create_staff_taxonomy_terms() {
    if ( !term_exists( 'Faculty', 'department' ) ) {
        wp_insert_term(
            'Faculty',
            'department'
        );
    }

    if ( !term_exists( 'Administrative', 'department' ) ) {
        wp_insert_term(
            'Administrative',
            'department'
        );
    }
}
add_action( 'init', 'fwd_create_staff_taxonomy_terms' );

function fwd_create_student_taxonomy_terms() {
    if ( !term_exists( 'Designer', 'position' ) ) {
        wp_insert_term(
            'Designer',
            'position'
        );
    }

    if ( !term_exists( 'Developer', 'position' ) ) {
        wp_insert_term(
            'Developer',
            'position'
        );
    }
}
add_action( 'init', 'fwd_create_student_taxonomy_terms' );

// Flush permalinks
function fwd_rewrite_flush() {
    fwd_register_custom_post_types();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'fwd_rewrite_flush' );