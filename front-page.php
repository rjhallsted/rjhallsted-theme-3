<?php get_header(); ?>

<div class="front-page-portrait center">
	<img src="<?php echo get_theme_mod('front_page_image'); ?>" class="front-page-portrait">
</div>

<h1 class="front-page-title center"><?php bloginfo('name'); ?></h1>

<div class="front-page-about center">
	<p><?php echo get_theme_mod('rjh_about'); ?></p>
</div>

<section class="projects half">
	<h2>Projects</h2> <!--link to projects-->
	<!-- projects loop here -->
</section>

<section class="writing half">
	<h2>Writing</h2> <!--link to writing-->
	<!-- blog posts loop here -->
</section>

<section class="clients">
	<!-- Client list here -->
</section>

<?php get_footer(); ?>