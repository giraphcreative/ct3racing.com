<?php
/*
This is the custom post type taxonomy template.
If you edit the custom taxonomy name, you've got
to change the name of this template to
reflect that name change.

i.e. if your custom taxonomy is called
register_taxonomy( 'shoes',
then your single template should be
taxonomy-shoes.php

*/
$qo = get_queried_object();
$album_id = $qo->slug;
?>

<?php get_header(); ?>


		<div class="wrap">
			<h1 class="text-center"><?php single_cat_title(); ?></h1>
		</div>
		<div class="photo-album">
			<div class="gallery">

				<?php photo_album( $album_id ); ?>

			</div>
			<div class="album-list">
				<h3>Other Albums</h3>
				<?php photo_album_list(); ?>
				<p class="text-center note">Have photos from a<br>
					race or event?<br>
					<a href="/contact/">Email us!</a></p>

				<div class="icon">
					<a href="/photos/"><img src="<?php bloginfo( "template_url" ); ?>/library/images/icon-home-photos.png"></a>
				</div>
			</div>
		</div>

<?php get_footer(); ?>
