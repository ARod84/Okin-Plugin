<?php

/**
* The create custom post type functions.
*
* @link       https://okinsport.com
* @since      1.0.0
*
* @package    Okin_Plugin
* @subpackage Okin_Plugin/includes
*/

 
function okin_landing_post_type() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Landing', 'Post Type General Name', 'okin-plugin' ),
        'singular_name'       => _x( 'Landing', 'Post Type Singular Name', 'okin-plugin' ),
        'menu_name'           => __( 'Landing', 'okin-plugin' ),
        'parent_item_colon'   => __( 'Perfil', 'okin-plugin' ),
        'all_items'           => __( 'Todos los perfiles', 'okin-plugin' ),
        'view_item'           => __( 'Ver perfil', 'okin-plugin' ),
        'add_new_item'        => __( 'Agregar landing', 'okin-plugin' ),
        'add_new'             => __( 'Agregar nueva', 'okin-plugin' ),
        'edit_item'           => __( 'Editar landing', 'okin-plugin' ),
        'update_item'         => __( 'Actualizar landing', 'okin-plugin' ),
        'search_items'        => __( 'Buscar perfiles', 'okin-plugin' ),
        'not_found'           => __( 'No encontrado', 'okin-plugin' ),
        'not_found_in_trash'  => __( 'No encontrado en la papelera', 'okin-plugin' ),
        'featured_image'      => __( 'Imagen Principal', 'okin-plugin' ),
        'remove_featured_image' => __( 'Eliminar imagen', 'okin-plugin' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'okin_landing', 'okin-plugin' ),
        'description'         => __( 'Perfil Atleta Okin', 'okin-plugin' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor

        'taxonomies'          => array( 'cat_okin', 'tag_okin' ),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'rewrite' 	      => array('slug' => 'okin_landing', 'with_front' => true, 'feed' => true),
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
        'supports'            => array( 'title', 'thumbnail' ),
    );
     
    // Registering your Custom Post Type
    register_post_type( 'okin_landing', $args );
 
}
 
add_action( 'init', 'okin_landing_post_type');

/**
 * Add gallery to landing post type
 *
 * @param $galleries
 */

add_filter( 'sortable_wordpress_galleries', 'add_sortable_gallery' );

function add_sortable_gallery( $galleries ) {
	$galleries[] = array(
		'class' => 'Sortable_WordPress_Gallery',
		'id' => 'okin-gallery-metabox',
		'title' => 'Galería Okin' 
	);
	return $galleries;
}

add_filter( 'sortable_wordpress_gallery_okin-gallery-metabox_post_types',  'second_gallery_only_on_page' );
function second_gallery_only_on_page( $post_types ) {
  
  return array( 'okin_landing' );
}
