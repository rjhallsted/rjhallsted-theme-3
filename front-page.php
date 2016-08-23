<?php get_header(); ?>

<div class="front-page-portrait center">
	<img src="<?php echo get_theme_mod('front_page_image'); ?>" class="front-page-portrait">
</div>

<h1 class="front-page-title center"><?php bloginfo('name'); ?></h1>

<div class="front-page-about center">
	<p><?php echo wpautop( get_theme_mod('rjh_about') ); ?></p>
</div>

<div class="links-container">
	<?php
	$project_query = new WP_Query(array( 'post_type' => 'project' ));

	if( $project_query->have_posts() ) :
	?>
	<section class="projects-container half">
		<h2>Projects</h2> <!--link to projects-->
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
	</section>
	<?php endif;?>
	<?php wp_reset_postdata(); ?>

	<?php
	$writing_query = new WP_Query( array(
		'posts_per_page' => 5,
		'post_type' => array('post', 'writing-link') ) );
	if( $writing_query->have_posts() ) :
	?>
	<section class="writing half">
		<h2>Writing</h2> <!--link to writing-->
			<ul class="post-list">
		<?php while( $writing_query->have_posts() ) : $writing_query->the_post(); ?>
		<?php 
		if($writing_query->post->post_type == 'writing-link') {
			$the_link = rjh_get_writing_link_url( $writing_query->post->ID );
		} else {
			$the_link = get_permalink();
		}
		?>
				<li><a href="<?php echo $the_link; ?>"><?php the_title(); ?></a></li>
		<?php endwhile; ?>
			</ul>
	</section>
	<?php endif; ?>
	<?php wp_reset_postdata(); ?>


	<?php 
	$client_query = new WP_Query( array( 'post_type' => 'client', 'posts_per_page' => -1 ) );

	if( $client_query->have_posts() ):
	?>
	<section class="clients">
		<h2>Clients</h2>
			<ul>
				<?php while( $client_query->have_posts() ) : $client_query->the_post(); ?>
					<li>
						<span class="single"><a href="<?php echo rjh_get_client_url( $client_query->post->ID ); ?>"><?php the_title(); ?></a></span>
					</li>
				<?php endwhile; ?>
			</ul>
	</section>

	<?php endif; ?>

	<?php wp_reset_postdata(); ?>
</div>
<?php get_footer(); ?>