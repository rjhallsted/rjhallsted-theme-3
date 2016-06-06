<?php get_header(); ?>

<div class="front-page-portrait center">
	<img src="<?php echo get_theme_mod('front_page_image'); ?>" class="front-page-portrait">
</div>

<h1 class="front-page-title center"><?php bloginfo('name'); ?></h1>

<div class="front-page-about center">
	<p><?php echo get_theme_mod('rjh_about'); ?></p>
</div>

<div class="links-container">
	<section class="projects-container half">
		<h2>Projects</h2> <!--link to projects-->
		<?php
		$project_query = new WP_Query(array( 'post_type' => 'project' ));

		if( $project_query->have_posts() ) :
		?>
			<ul class="projects">

		<?php while( $project_query->have_posts() ) : $project_query->the_post(); ?>

				<li class="single-project">
					<div class="project-title"><?php the_title(); ?></div>
					<div class="collapsed">
						<div class="project-description"><?php the_content(); ?></div>
						<p><a href="<?php echo rjh_get_project_link($project_query->post->ID); ?>" class="project-link"><?php echo rjh_get_project_link($project_query->post->ID); ?></a></p>
					</div>
				</li>

		<?php endwhile; ?>
			</ul>
		<?php else: ?>
			<p>Sorry, but nothing was found here.</p>
		<?php endif; ?>
	</section>

	<section class="writing half">
		<h2>Writing</h2> <!--link to writing-->
		<!-- blog posts loop here -->
	</section>
</div>

<section class="clients">
	<!-- Client list here -->
</section>

<?php get_footer(); ?>