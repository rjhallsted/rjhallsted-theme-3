<?php
/*
Template Name: Projects Page
*/
?>

<?php get_header(); ?>

<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

<h1 class="title"><?php the_title(); ?></h1>
	
	<?php
	//projects loop
	$args = array( 'post_type' => 'project' );
	$project_query = new WP_Query( $args );
	?>

	<?php if( $project_query->have_posts() ) : ?>

	<ul class="projects">
		<?php while( $project_query->have_posts() ) : $project_query->the_post(); ?>

			<li class="single-project">
				<h3 class="project-title"><?php the_title(); ?></h3>
				<div class="project-description"><?php the_content(); ?></div>
				<p><a href="<?php echo rjh_get_project_link($project_query->post->ID); ?>" class="project-link"><?php echo rjh_get_project_link($project_query->post->ID); ?></a></p>
			</li>

		<?php endwhile; ?>
	</ul>

	<?php endif; //end projects loop ?>

	<?php wp_reset_postdata(); ?>


<?php endwhile; ?>
<?php else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<?php get_footer(); ?>