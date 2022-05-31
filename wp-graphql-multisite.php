<?php
/**
 * Plugin Name:       WP GraphQL for Multisites
 * Description:       Adds graphql nodes for multisite or network queries
 * Version:           0.0.3
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

add_action( 'graphql_register_types', function() {
	
	register_graphql_fields( 'RootQuery', [
		'SiteUrls' => [
			'type'        => ["list_of" => "String"],
			'resolve'     => function() {
                $sitedata = get_sites();
				$namelist = [];
				foreach ($sitedata as $site) {
				  $namelist[] = $site->domain;
				}
				return $namelist;
			}
		]
	] );
} );