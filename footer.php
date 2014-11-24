<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Mission Atletica
 */
?>
		</div>
	</div>
</div>
<div class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<ul class="left-footer">
					<li>Providing running shoes and running races for the youth of Guatemala.</li>
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Mission Atletica</a> is a 501C(3) non-profit organization. Marin Link Inc. serves as the fiscal sponsor.</li>
				</ul>
			</div>
			<div class="col-md-4 right-footer">
				<p style="margin-bottom:0;">&copy; <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Mission Atletica</a>, <?php date( 'Y' ); ?>. All rights reserved.<br />
				<a href="http://gives.beawimp.org" class="wimpgives-footer"><img src="<?php echo esc_url( get_template_directory_uri() . '/images/WIMPgivesFooter.png' ); ?>" alt="Built during WIMPgives 2014" /></a> Website donated and built by <a href="http://gives.beawimp.org">WIMPgives</a>.</p>
			</div>
		</div>
	</div>
</div>

<?php wp_footer(); ?>

</body>
</html>
