<!DOCTYPE html>
<html>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title(); ?></title>

	<?php wp_head(); ?>
</head>
<body <?php body_class('no-js'); ?>>
	<header class="container center site-header">	
		<?php wp_nav_menu('top-menu'); ?>
	</header>
	<div class="container center">