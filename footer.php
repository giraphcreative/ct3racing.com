			<footer class="footer" role="contentinfo">

				<div id="inner-footer" class="wrap clearfix">

					<div class="sixcol first">
						<nav role="navigation">
							<?php bones_footer_links(); ?>
						</nav>
					</div>

					<div class="sixcol last">
						<p class="source-org copyright">&copy; <?php echo date('Y'); ?> All Rights Reserved <?php bloginfo( 'name' ); ?></p>
					</div>

				</div>

			</footer>

		</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</body>

</html>
