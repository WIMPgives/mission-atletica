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
			<div class="col-md-3"><a href="/"><img class="img-responsive" src="/wp-content/themes/mission-atletica/images/logo_338x120.png" alt="Mission Atletica" /></a></div>
			<div class="col-md-6">Menu</div>
			<div class="col-md-3"><h2>sample testing text that isn't too long</h2></div>
		</div>