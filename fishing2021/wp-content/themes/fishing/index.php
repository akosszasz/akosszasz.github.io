<?php get_header(); ?>
<div class="content" role="main">

	<div class="inner-wrapper">

		<h1 class="content__title ct_home"><img src="http://fishingonorfu.hu/wp-content/uploads/2015/02/btn_friss.png" alt="Friss" style="margin-top: -0.2em;"></h1>

		<div class="content__inner">
			<div class="content__inner--scrollzone">

				<?php
					$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
					$args = array(
					'paged' => $paged,
					'posts_per_page'	=> 10,
					'category_name'		=> 'friss'
					);
					$query = new WP_Query( $args );
				?>

				<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

					<section class="content__inner--block">
					
					<div class="post-heading">
						<h3 class="post-title"><?php the_title(); ?></h3>
						<span class="post-date"><?php the_date('Y-m-d'); ?></span>
					</div>
					
					<?php the_content(); ?>

				</section><!-- //end post block-->

				<?php endwhile; ?>
				<?php else : ?>
					<section class="content__inner--block">
						<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
					</section>
				<?php endif; ?>

				<?php wp_pagenavi(); ?>

			</div><!-- //end scrollzone -->

		</div>

	</div>

</div>
<?php get_footer(); ?>