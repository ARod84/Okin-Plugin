<?php
/**
* The okin-plugin core functions.
*
* @link       http://okinsport.com
* @since      1.0.0
*
* @package    Okin_Plugin
* @subpackage Okin_Plugin/includes
*/

// Include post type files
require_once plugin_dir_path( dirname( __FILE__ ) ) .  'includes/post-type.php';

/*------------------------------------
 *---@snippet: add atletas taxonomy---
 *------------------------------------*/

function okin_register_cat_taxonomy() {
    $labels = [
        'name'              => _x('Categorías Okin', 'taxonomy general name'),
	'singular_name'     => _x('Categoría Okin', 'taxonomy singular name'),
	'search_items'      => __('Buscar Categorías Okin'),
	'all_items'         => __('Todas las Categorías Okin'),
	'parent_item'       => __('Categoría Principal'),
	'parent_item_colon' => __('Categoría Principal:'),
	'edit_item'         => __('Editar Categoría'),
	'update_item'       => __('Actualizar Categoría'),
	'add_new_item'      => __('Agregar nueva Categoría'),
	'new_item_name'     => __('Nueva Categoría'),
	'menu_name'         => __('Categorías Okin'),
	];
	$args = [
	'hierarchical'      => true, // make it hierarchical (like categories)
	'labels'            => $labels,
	'show_ui'           => true,
	'show_admin_column' => true,
	'query_var'         => true,
	'rewrite'           => ['slug' => 'categoria-okin'],
	];
	register_taxonomy('cat_okin', ['okin_landing'], $args);
}
add_action('init', 'okin_register_cat_taxonomy');

/* ---------------------------------------
 * @snippet: add athlete role to users
 * ---------------------------------------
 */

add_role(    'atleta'  ,
         __( 'Atleta' ),
         array( 'read' => true,  // true allows this capability
                'edit_posts'   => true,
         )
);

/**
 * Overwrite args of custom post type registered by plugin
 */
add_filter( 'register_post_type_args', 'okin_change_capabilities_landing' , 10, 2 );

function okin_change_capabilities_landing( $args, $post_type ){

 // Do not filter any other post type
 if ( 'okin_landing' !== $post_type ) {

     // Give other post_types their original arguments
     return $args;

 }

 // Change the capabilities of the "course_document" post_type
 $args['capabilities'] = array(
            'edit_post' => 'edit_landing',
            'edit_posts' => 'edit_landing',
            'edit_others_posts' => 'edit_others_landing',
            'publish_posts' => 'publish_landing',
            'read_post' => 'read_landing',
            'read_private_posts' => 'read_private_landing',
            'delete_post' => 'delete_landing',
        );

  // Give the course_document post type it's arguments
  return $args;

}

/**
* @snippet: add admin capability
*/
add_action('admin_init','okin_add_admin_caps',999);

function okin_add_admin_caps() {

    $role = get_role('administrator');
    $role->add_cap( 'read_landing');
    $role->add_cap( 'edit_landing' );
    $role->add_cap( 'edit_landing' );
    $role->add_cap( 'edit_others_landing' );
    $role->add_cap( 'edit_published_landing' );
    $role->add_cap( 'publish_landing' );
    $role->add_cap( 'read_private_landing' );
    $role->add_cap( 'delete_landing' );
    $role->add_cap( 'upload_files' );

}

/**
* @snippet: add atletas capability
*/
add_action('admin_init','okin_add_role_caps',999);

function okin_add_role_caps() {

    $role = get_role('atleta');
    $role->add_cap( 'read_landing');
    $role->add_cap( 'edit_landing' );
    $role->add_cap( 'edit_landing' );
    $role->add_cap( 'edit_published_landing' );
    $role->add_cap( 'publish_landing' );
    $role->add_cap( 'read_private_landing' );
    $role->add_cap( 'delete_landing' );
    $role->add_cap( 'upload_files' );

}

function posts_for_current_author($query) {
    global $pagenow;

    if( 'edit.php' != $pagenow || !$query->is_admin )
        return $query;

    if( !current_user_can( 'manage_options' ) ) {
        global $user_ID;
        $query->set('author', $user_ID );
    }
    return $query;
}
add_filter('pre_get_posts', 'posts_for_current_author');

/**
 * custom single template for okin landing
 */

function okin_landing_template( $template ) {
    global $post;

    if ( 'okin_landing' === $post->post_type && locate_template( array( 'single-okin_landing.php' ) ) !== $template ) {
        return plugin_dir_path( dirname( __FILE__ ) ) . '/templates/single-okin_landing.php';
    }

    return $template;
}

add_filter( 'single_template', 'okin_landing_template' );

/**
 * Register meta boxes.
 */
function okin_landing_register_meta_boxes() {
    add_meta_box( 'okin-landing-1', __( 'Perfil Okin', 'okin-landing' ), 'okin_landing_display_callback', 'okin_landing' );
}
add_action( 'add_meta_boxes', 'okin_landing_register_meta_boxes' );

/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function okin_landing_display_callback( $post ) {
    include plugin_dir_path( __FILE__ ) . './form.php';
}

/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
function okin_landing_save_meta_box( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( $parent_id = wp_is_post_revision( $post_id ) ) {
        $post_id = $parent_id;
    }
    $fields = [
        'okin_lema',
        'okin_motiv',
	'okin_historia',
        'okin_metas',
    ];
    foreach ( $fields as $field ) {
        if ( array_key_exists( $field, $_POST ) ) {
            update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
        }
     }
}
add_action( 'save_post', 'okin_landing_save_meta_box' );

/**
 * Set Atletas Okin Page
 *
 * @param int $post_id Post ID
 */

function okin_set_atletas_page() {
		// Page Atletas Okin
		$okin_atletas_page_title = 'Atletas Okin';
		$okin_atletas_page_content = '[okin_get_atletas]';

		$okin_atletas_page_check = get_page_by_title($okin_atletas_page_title);
		$okin_atletas_page = array(
		        'post_type' => 'page',
		        'post_title' => $okin_atletas_page_title,
		        'post_content' => $okin_atletas_page_content,
		        'post_status' => 'publish',
		        'post_author' => 1,
		);
		if(!isset($okin_atletas_page_check->ID)){
		    $okin_atletas_page_id = wp_insert_post($okin_atletas_page);
		}
		// END
}

add_action( 'init', 'okin_set_atletas_page' );

/**
 * Get and include template files.
 *
 * @param mixed $template_name
 * @param array $args (default: array())
 * @param string $template_path (default: '')
 * @param string $default_path (default: '')
 * @return void
 */

if ( ! function_exists( 'get_okin_template' ) ) {
	function get_okin_template( $template_name, $args = array(), $template_path = 'okin-templates', $default_path = '' ) {
		if ( $args && is_array( $args ) ) {
			extract( $args );
		}
		include( locate_okin_template( $template_name, $template_path, $default_path ) );
	}
}

if ( ! function_exists( 'locate_okin_template' ) ) {
	function locate_okin_template( $template_name, $template_path = 'okin-templates', $default_path = '' ) {
		// Look within passed path within the theme - this is priority
		$template = locate_template(
			array(
				trailingslashit( $template_path ) . $template_name,
				$template_name
			)
		);

		// Get default template
		if ( ! $template && $default_path !== false ) {
			$default_path = $default_path ? $default_path : plugin_dir_path( dirname( __FILE__ ) ) . '/templates/';
			if ( file_exists( trailingslashit( $default_path ) . $template_name ) ) {
				$template = trailingslashit( $default_path ) . $template_name;
			}
		}

		// Return what we found
		return apply_filters( 'okin_locate_template', $template, $template_name, $template_path );
	}
}
