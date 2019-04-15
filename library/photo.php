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



// let's create the function for the custom type
function photo_post_type() { 
	// creating (registering) the custom type 
	register_post_type( 'photo', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
				'name' => __( 'Photos', 'bonestheme' ), /* This is the Title of the Group */
				'singular_name' => __( 'Photo', 'bonestheme' ), /* This is the individual type */
				'all_items' => __( 'All Photos', 'bonestheme' ), /* the all items menu item */
				'add_new' => __( 'Add New', 'bonestheme' ), /* The add new menu item */
				'add_new_item' => __( 'Add New Photo', 'bonestheme' ), /* Add New Display Title */
				'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
				'edit_item' => __( 'Edit Photo', 'bonestheme' ), /* Edit Display Title */
				'new_item' => __( 'New Photo', 'bonestheme' ), /* New Display Title */
				'view_item' => __( 'View Photo', 'bonestheme' ), /* View Display Title */
				'search_items' => __( 'Search Photos', 'bonestheme' ), /* Search Custom Type Title */ 
				'not_found' =>  __( 'Nothing found in the Database.', 'bonestheme' ), /* This displays if there are no entries yet */ 
				'not_found_in_trash' => __( 'Nothing found in Trash', 'bonestheme' ), /* This displays if there is nothing in the trash */
				'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'The photo custom post type is used to create albums - photos can be added to multiple albums to create groupings of photos.', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/icon-photos.png', /* the icon for the custom post type menu */
			'rewrite' => array( 'slug' => "photo", "with_front" => false ), /* you can specify its url slug */
			'has_archive' => 'photos', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions')
		) /* end of options */
	); /* end of register post type */
	
}


// adding the function to the Wordpress init
add_action( 'init', 'photo_post_type');

// now let's add custom categories (these act like categories)
register_taxonomy( 'album', 
	array('photo'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array('hierarchical' => true,     /* if this is true, it acts like categories */
		'labels' => array(
			'name' => __( 'Albums', 'bonestheme' ), /* name of the custom taxonomy */
			'singular_name' => __( 'Album', 'bonestheme' ), /* single taxonomy name */
			'search_items' =>  __( 'Search Albums', 'bonestheme' ), /* search title for taxomony */
			'all_items' => __( 'All Albums', 'bonestheme' ), /* all title for taxonomies */
			'parent_item' => __( 'Parent Album', 'bonestheme' ), /* parent title for taxonomy */
			'parent_item_colon' => __( 'Parent Album:', 'bonestheme' ), /* parent taxonomy title */
			'edit_item' => __( 'Edit Album', 'bonestheme' ), /* edit custom taxonomy title */
			'update_item' => __( 'Update Album', 'bonestheme' ), /* update title for taxonomy */
			'add_new_item' => __( 'Add New Album', 'bonestheme' ), /* add new title for taxonomy */
			'new_item_name' => __( 'New Album Name', 'bonestheme' ) /* name title for taxonomy */
		),
		'show_admin_column' => true, 
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'album' ),
	)
);




set_post_thumbnail_size( 400, 400, true );




function photo_album( $album_id ) {
	
	// set up some arguments
	$args = array(
		"post_type"			=>	"photo",
		"album"				=>	$album_id,
		"posts_per_page" 	=>	-1
	);

	if ( is_front_page() || is_home() ) {
		$args["posts_per_page"] = 25;
	}

	// The Query
	$the_query = new WP_Query( $args );

	// The Loop
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
		$url = $thumb[0];
		?><div class="photo" data-caption="<?php the_title() ?>"><a href="<?php print $url; ?>"><?php the_post_thumbnail( "thumbnail" ) ?></a></div><?php
	}

	/* Restore original Post Data 
	 * NB: Because we are using new WP_Query we aren't stomping on the 
	 * original $wp_query and it does not need to be reset.
	*/
	wp_reset_postdata();

}




function photo_album_list() {
	wp_tag_cloud( array( 
		'taxonomy' 	=>	'album', 
		'format' 	=>	'list' ,
		'smallest'	=>	1, 
    	'largest'	=>	1,
    	'unit'		=>	'em'
	) );
}


	

?>
