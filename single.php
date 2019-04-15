<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap narrow clearfix">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

							<header class="article-header">

								<h1 class="entry-title single-title text-center" itemprop="headline"><?php the_title(); ?></h1>
								<p class="byline vcard text-center"><?php
									printf( __( 'Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span> in %4$s', 'bonestheme' ), get_the_time( 'n/j/Y' ), get_the_time( 'n/j/Y' ), bones_get_the_author_posts_link(), get_the_category_list(', ') );
								?></p>

							</header>

							<section class="entry-content clearfix" itemprop="articleBody">
								<?php the_content(); ?>
							</section>

							<footer class="article-footer">
								<?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>

							</footer>
							
							<hr>
							<?php comments_template(); ?>

						</article>

					<?php endwhile; ?>

					<?php else : ?>

						<article id="post-not-found" class="hentry clearfix">
								<header class="article-header">
									<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
								</header>
								<section class="entry-content">
									<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
								</section>
								<footer class="article-footer">
										<p><?php _e( 'This is the error message in the single.php template.', 'bonestheme' ); ?></p>
								</footer>
						</article>

					<?php endif; ?>

				</div>

			</div>

<?php get_footer(); ?>
