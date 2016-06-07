<?php
/*
Template Name: Writing Archive
*/
?>

<?php get_header(); ?>

<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

<h1 class="title"><?php the_title(); ?></h1>
	
	<?php
	//projects loop
	$args = array( 
		'post_type' => array('post', 'writing-link' ),
		'posts_per_page' => -1 );
	$writing_query = new WP_Query( $args );
	?>

	<?php if( $writing_query->have_posts() ) : ?>

	<?php while( $writing_query->have_posts() ) : $writing_query->the_post(); ?>
		<article class="single-post-summary">
			<?php 
				if( $writing_query->post->post_type == 'post' ) {
					$the_link = get_permalink();
					$the_summary = get_the_excerpt();
				} elseif( $writing_query->post->post_type == 'writing-link' ) {
					$the_link = rjh_get_writing_link_url( $writing_query->post->ID );
					$the_summary = '<a href="' . $the_link . '">' . $the_link . '</a>';
				}
			?>
			<h3><a href="<?php echo $the_link; ?>"><?php the_title(); ?></a></h3>
			<p><?php echo $the_summary; ?></p>
		</article>

	<?php endwhile; ?>

	<?php endif; //end projects loop ?>

	<?php wp_reset_postdata(); ?>


<?php endwhile; ?>
<?php else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<?php get_footer(); ?>