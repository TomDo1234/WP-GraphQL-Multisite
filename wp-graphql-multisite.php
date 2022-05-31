<?php
/**
 * Plugin Name:       WP GraphQL for Multisites
 * Description:       Adds graphql nodes for multisite or network queries
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Tom Do
 */

register_activation_hook( __FILE__, 'child_plugin_activate' );
function child_plugin_activate(){

    // Require parent plugin
    if ( ! is_plugin_active( 'wp-graphql/wp-graphql.php' ) && current_user_can( 'activate_plugins' ) ) {
        // Stop activation redirect and show error
        wp_die('Sorry, but this plugin requires the WP GraphQL base plugin to be installed and active. <br><a href="' . admin_url( 'plugins.php' ) . '">&laquo; Return to Plugins</a>');
    }
}

add_action( 'graphql_register_types', 'register_site_type' );
function register_site_type() {
    register_graphql_object_type( 'Site', [
      'fields' => [
        'blog_id' => [
            'type' => 'String',
        ],
        'domain' => [
            'type' => 'String',
        ],
        'path' => [
            'type' => 'String',
        ],		  
        'site_id' => [
            'type' => 'String',
        ],
        'registered' => [
            'type' => 'String',
        ],
        'last_updated' => [
            'type' => 'String',
        ],
        'public' => [
            'type' => 'String',
        ],		  
        'archived' => [
            'type' => 'String',
        ],
        'mature' => [
            'type' => 'String',
        ],
        'spam' => [
            'type' => 'String',
        ],
        'deleted' => [
            'type' => 'String',
        ],
        'lang_id' => [
            'type' => 'String',
        ],
      ],
    ] );
}

add_action( 'graphql_register_types', function() {
	
	
	
	register_graphql_fields( 'RootQuery', [
		'Sites' => [
			'type'        => ["list_of" => "Site"],
			'resolve'     => function() {
				return get_sites();
			}
		]
	] );
} );
