<?php 
/*
Template Name: Front Page
*/

get_header(); 


$about_page = get_post( 6 );
$coach_page = get_post( 8 );

?>

		<div class="home-about">
			<div class="wrap">
				<div class="icon">
					<a href="/about"><img src="<?php bloginfo( "template_url" ); ?>/library/images/icon-home-about.png"></a>
				</div>
				<div class="description">
					<?php print $about_page->post_excerpt; ?>
				</div>
			</div>
		</div>

		<div class="home-content">
	
			<div class="wrap">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

					<?php the_content(); ?>

				</article>
			
				<?php endwhile; endif; ?>
			</div>

		</div>

		<div class="home-coach">
			<img src="<?php bloginfo( "template_url" ); ?>/library/images/photo-coach.jpg" class="full-width">
			<div class="wrap">
				<div class="box">
					<div class="icon">
						<a href="/coach-t/"><img src="<?php bloginfo( "template_url" ); ?>/library/images/icon-home-coach.png"></a>
					</div>
					<div class="description">
						<?php print $coach_page->post_excerpt ?>
						<p class="read-more"><a href="<?php print $coach_page->guid ?>">[ Read More ]</a></p>
					</div>
				</div>
			</div>
		</div>

		<div class="home-rally">
			<header>
				<div class="wrap">
					<div class="icon">
						<a href="/race-rally/"><img src="<?php bloginfo( "template_url" ); ?>/library/images/icon-home-rally.png"></a>
					</div>
					<h3>Team Performance</h3>
				</div>
			</header>
			<div class="wrap group">
				<div class="sixcol first rally-reports">
					<?php rally_reports() ?>
				</div>
				<div class="sixcol last rally-photo text-center">
					<img src="<?php bloginfo("template_url") ?>/library/images/photo-rally.jpg">
				</div>
			</div>
		</div>

		<div class="home-photos photo-album">
			<div class="gallery">
				<?php photo_album( $album_id ); ?>
			</div>
			<div class="album-list">
				<h3>Albums</h3>
				<?php photo_album_list(); ?>
				<p class="text-center note">Have photos from a<br>
					race or event?<br>
					<a href="/contact/">Email us!</a></p>

				<div class="icon">
					<a href="/photos/"><img src="<?php bloginfo( "template_url" ); ?>/library/images/icon-home-photos.png"></a>
				</div>
			</div>
		</div>

		<div class="home-posts">
			<header>
				<div class="wrap">
					<div class="icon">
						<a href="/blog/"><img src="<?php bloginfo( "template_url" ); ?>/library/images/icon-home-posts.png"></a>
					</div>
					<h3>Life Under the Red Visor</h3>
					<a href="/blog/" class="button">Archives</a>
					<img src="<?php bloginfo( "template_url" ); ?>/library/images/red-visor.png" class="visor">
				</div>
			</header>
			<div class="wrap">
				<div class="post-list">
					<?php 
					
					// The Query
					$the_query = new WP_Query( "post_type=post&posts_per_page=4" );

					// The Loop
					if ( $the_query->have_posts() ) { 
						while ( $the_query->have_posts() ) {
							$the_query->the_post(); ?>
						<div class="entry-content">
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<?php the_excerpt(); ?>
						</div>
							<?php
						}
					} else {
						// no posts found
					}
					/* Restore original Post Data */
					wp_reset_postdata();

					?>					
				</div>
			</div>
		</div>

		<div class="home-shop">
			<header>
				<div class="wrap">
					<div class="icon">
						<a href="http://redvisorwear.bigcartel.com/"><img src="<?php bloginfo( "template_url" ); ?>/library/images/icon-home-shop.png"></a>
					</div>
				</div>
			</header>
			<div class="wrap">
				<div class="shop-widgets">
					<?php 
					if ( is_active_sidebar( 'shop-widgets' ) ) : 
						dynamic_sidebar( 'shop-widgets' ); 
					endif; 
					?>
				</div>
			</div>
			<footer>
				<div class="wrap">
					<div class="icon">
						<a href="http://redvisorwear.bigcartel.com/" target="_blank"><img src="<?php bloginfo( "template_url" ); ?>/library/images/icon-home-rvw.png"></a>
					</div>
				</div>
			</footer>
		</div>

<?php 
get_footer(); 
?>
