=== WP GraphQL for Multisites ===
Contributors: tomdo
Tags: Wordpress, Multisite, GraphQL , WPGraphQL
Requires at least: 5.0.0
Tested up to: 6.1
Stable tag: 1.0.0
License: GNU GENERAL PUBLIC LICENSE
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Run a Github auto build webhook every post update and creation

== Description ==

Basically, it allows a graphql endpoint which lets you query the site urls of your Multi Site. This is good because you can then use these urls to query stuff from the individual sites.
In the root query there is a new node called "sites" and it allows you to access values from the get_sites() function in wordpress , such as domain , site_id 
and last_updated of your subsites in a graphql quer.

