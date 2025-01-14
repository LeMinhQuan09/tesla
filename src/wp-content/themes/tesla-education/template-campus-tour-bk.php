<?php
/**
 * Template Name: Template Campus Tour - BK
 */

get_header(); ?>
<main>
	<?php if( have_rows('banner_section') ): 
		while( have_rows('banner_section') ): the_row(); 
	        $background_image = get_sub_field('background_image');
	        $title = get_sub_field('title');
    ?>
    <section class="page__title-area page__title-height page__title-overlay d-flex align-items-end" style="background-image:url(<?php echo $background_image; ?>);">
		<div class="container">
			<div class="row">
				<div class="col-xxl-12">
					<div class="page__title-wrapper mb-30 mb-30-mob">
						<h1 class="page__title"><?php echo $title; ?></h1>
						<?php if( have_rows('sub_menu') ): ?>
						<nav class="nav-anchor mt-30">
							<ul>
								<?php 
									while( have_rows('sub_menu') ): the_row(); 
										$link = get_sub_field('link');
										$title = get_sub_field('title');
							    ?>
								<li>
									<a class="view_txt_cursor custom_cursor_hover" href="<?php echo $link; ?>" title=""><?php echo $title; ?></a>
								</li>
								<?php endwhile; ?>
							</ul>
						</nav>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php endwhile; ?>
	<?php endif; ?>
	
	<?php the_content(); ?>
	<!-- <div class="container">
		<div class="content aos-item" data-aos="fade-up">
		</div>
	</div> -->

	<!-- our campuses -->

	<?php
		//get_template_part('template-parts/partial/further-reading-suggestions', 'partial');
		//get_template_part('template-parts/partial/next-prev-page', 'partial');
	?>
	
</main>

<?php get_footer(); ?>