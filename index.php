<?php get_header(); ?>

<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
	<article>	
		<h1><?php the_title(); ?></h1>

		<div class="content">
			<?php the_content(); ?>
		</div>
	</article>
<?php endwhile; ?>
<?php else : ?>
	<p>Sorry, but we couln't find what you were looking for.</p>
<?php endif; ?>

<?php get_footer(); ?>