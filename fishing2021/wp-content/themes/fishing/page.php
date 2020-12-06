<?php get_header(); ?>
<div class="content" role="main">

	<div class="inner-wrapper">

		<h1 class="content__title">
			<?php if(get_field('cim_kepe')) { ?>
					
				<img src="<?php echo get_field('cim_kepe'); ?>" alt="<?php the_title(); ?>" style="margin-top: -0.2em;">
				
			<?php } else 
            $parent_title = get_the_title($post->post_parent);
            echo $parent_title; ?>
		</h1>
		<nav role="navigation">

            <div class="content__title--sublist">
            	<?php if(get_field('almenu_1')) { ?>

				<ul>

					<li><a href="<?php echo get_field('almenu_1'); ?>"><img src="<?php echo get_field('almenu_1_kep'); ?>"></a></li>
					
					<?php if(get_field('almenu_2')) { ?>
					<li><a href="<?php echo get_field('almenu_2'); ?>"><img src="<?php echo get_field('almenu_2_kep'); ?>"></a></li>
					<?php } ?>

					<?php if(get_field('almenu_3')) { ?>
					<li><a href="<?php echo get_field('almenu_3'); ?>"><img src="<?php echo get_field('almenu_3_kep'); ?>"></a></li>
					<?php } ?>

					<?php if(get_field('almenu_4')) { ?>
					<li><a href="<?php echo get_field('almenu_4'); ?>"><img src="<?php echo get_field('almenu_4_kep'); ?>"></a></li>
					<?php } ?>

				</ul>

				<?php } ?>
            </div>

		</nav>

		<div class="content__inner">
			<div class="content__inner--scrollzone">
				
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<section class="content__inner--block">
				
				<?php the_content(); ?>

				</section><!-- //end post block-->

				<?php endwhile; else : ?>

				<section class="content__inner--block">
					<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
				</section><!-- //end post block-->

				<?php endif; ?>

			</div><!-- //end scrollzone -->

		</div>

	</div>

</div>
<?php get_footer(); ?>