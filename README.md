# WP-GraphQL-Multisite

Basically, it allows a graphql endpoint which lets you query the site urls of your Multi Site.

This is good because you can then use these urls to query stuff from the individual sites.

In the root query there is a new node called "sites" and it allows you to access values from the get_sites() function in wordpress , such as domain , site_id 
and last_updated of your subsites in a graphql query
