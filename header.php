<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Mission Atletica
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="content" class="site-content container">

	<div class="row box"> 
	<div class="col-md-12 main"> 
		<div class="row header">
			<div class="col-md-3"><a href="/">
				<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/logo_338x120.png" width="338" height="120" alt="Mission Atletica" /></a>
			</div>
			
				<div class="col-md-9">

					<div class="row social-media">
						<ul class="social">
							<li><a href="https://www.facebook.com/missionatletica"><img src="/wp-content/themes/mission-atletica/images/social/fb.png" alt="Facebook" width="20" height="20" /></a></li>
							<li><a href="https://www.linkedin.com/pub/edgar-hernandez/58/880/708"><img src="/wp-content/themes/mission-atletica/images/social/li.png" alt="LinkedIn" width="20" height="20" /></a></li>
							<li><a href="https://www.youtube.com/channel/UCm54G-1cM1kK_AMRBWhV_qA"><img src="/wp-content/themes/mission-atletica/images/social/yt.png" alt="YouTube" width="20" height="20" /></a></li>
						</ul>
					</div>

					<div class="row menu">
						<?php wp_nav_menu( array(
							'theme_location'    => 'primary',
							'depth'             => 2,
							'container'         => 'div',
							'container_class'   => 'collapse navbar-collapse',
							'container_id'      => 'bs-example-navbar-collapse-1',
							'menu_class'        => 'nav navbar-nav',
							'walker'            => new wp_bootstrap_navwalker(),
						) ); ?>
					</div>

				</div>
			


		</div>