<?php
/* Bones Custom Post Type Example
This page walks you through creating 
a custom post type and taxonomies. You
can edit this one or copy the following code 
to create another one. 

I put this in a separate file so as to 
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

Developed by: Eddie Machado
URL: http://themble.com/bones/
*/

// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'bones_flush_rewrite_rules' );


// Flush your rewrite rules
function bones_flush_rewrite_rules() {
	flush_rewrite_rules();
}



// let's create the function for the custom type
function race_rally_post_type() { 
	// creating (registering) the custom type 
	register_post_type( 'race_rally', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Race Rally', 'bonestheme' ), /* This is the Title of the Group */
			'singular_name' => __( 'Race Rally Report', 'bonestheme' ), /* This is the individual type */
			'all_items' => __( 'All Race Rally Reports', 'bonestheme' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'bonestheme' ), /* The add new menu item */
			'add_new_item' => __( 'Add New Report', 'bonestheme' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Report', 'bonestheme' ), /* Edit Display Title */
			'new_item' => __( 'New Report', 'bonestheme' ), /* New Display Title */
			'view_item' => __( 'View Report', 'bonestheme' ), /* View Display Title */
			'search_items' => __( 'Search Reports', 'bonestheme' ), /* Search Custom Type Title */ 
			'not_found' =>  __( 'Nothing found in the Database.', 'bonestheme' ), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __( 'Nothing found in Trash', 'bonestheme' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Race Rally reports display differently than a normal post would in WordPress, and are intended to describe an event.', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/icon-race-rally.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'report', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'race-rally', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
		) /* end of options */
	); /* end of register post type */
		
}


// adding the function to the Wordpress init
add_action( 'init', 'race_rally_post_type');

// now let's add custom categories (these act like categories)
register_taxonomy( 'rally_category', 
	array('race_rally'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array('hierarchical' => true,     /* if this is true, it acts like categories */
		'labels' => array(
			'name' => __( 'Rally Categories', 'bonestheme' ), /* name of the custom taxonomy */
			'singular_name' => __( 'Rally Category', 'bonestheme' ), /* single taxonomy name */
			'search_items' =>  __( 'Search Rally Categories', 'bonestheme' ), /* search title for taxomony */
			'all_items' => __( 'All Rally Categories', 'bonestheme' ), /* all title for taxonomies */
			'parent_item' => __( 'Parent Rally Category', 'bonestheme' ), /* parent title for taxonomy */
			'parent_item_colon' => __( 'Parent Rally Category:', 'bonestheme' ), /* parent taxonomy title */
			'edit_item' => __( 'Edit Rally Category', 'bonestheme' ), /* edit custom taxonomy title */
			'update_item' => __( 'Update Rally Category', 'bonestheme' ), /* update title for taxonomy */
			'add_new_item' => __( 'Add New Rally Category', 'bonestheme' ), /* add new title for taxonomy */
			'new_item_name' => __( 'New Rally Category Name', 'bonestheme' ) /* name title for taxonomy */
		),
		'show_admin_column' => true, 
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'rally-cat' ),
	)
);



function rally_reports() {
	
	// set up some arguments
	$args = array(
		"post_type"		=>	"race_rally"
	);

	if ( is_front_page() || is_home() ) {
		$args["posts_per_page"] = 3;
	}

	// The Query
	$the_query = new WP_Query( $args );

	// The Loop
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		?>
		<div class="rally-report">
			<h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
			<?php the_excerpt() ?>
		</div>
		<?php
	}

	/* Restore original Post Data 
	 * NB: Because we are using new WP_Query we aren't stomping on the 
	 * original $wp_query and it does not need to be reset.
	*/
	wp_reset_postdata();

}


function rally_photo() {
	
	// set up some arguments
	$args = array(
		"post_type"		=>	"race_rally",
		"posts_per_page"		=>	1
	);

	// The Query
	$the_query = new WP_Query( $args );

	// The Loop
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		the_post_thumbnail( "full" );
	}

	/* Restore original Post Data 
	 * NB: Because we are using new WP_Query we aren't stomping on the 
	 * original $wp_query and it does not need to be reset.
	*/
	wp_reset_postdata();

}


?>