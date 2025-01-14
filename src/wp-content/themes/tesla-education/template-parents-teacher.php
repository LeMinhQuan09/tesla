<?php 
	/*
	** Template name: Template Content + Testimonial
	*/
	get_header();
?>

<main>
    <section class="page__title-area page__title-height page__title-overlay d-flex align-items-end" style="background-image: url(<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>);">
		<div class="container">
			<div class="row">
				<div class="col-xxl-12">
					<div class="page__title-wrapper mb-30 mb-40-mob">
						<h1 class="page__title"><?php the_title(); ?></h1>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<div class="container mt-100 mb-100 mt-30-mob mb-30-mob">
		<div class="row">
			<div class="col-xxl-12">
				<div class="content term aos-item" data-aos="fade-up">
					<?php while ( have_posts() ) : the_post() ;
				        the_content(); 
				    endwhile; ?>
				</div>
			</div>
	    </div>
	</div>

<?php if( have_rows('content') ): 
	while( have_rows('content') ): the_row(); 
		if( get_row_layout() == 'image_content' ): ?>
			<div class="container-fuild mb-150 mb-30-mob">
				<div class="row">
					<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding mb-50-mob fix custom_cursor_hover no_text_cursor">
						<div class="p-relative bg hei-540 right hover-bg" style="background-image: url('<?php echo get_sub_field('image'); ?>');">
							<img class="wid-100 hidden" src="<?php echo get_sub_field('image'); ?>" alt="" title="">
						</div>
					</div>
					<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding center-vertical start align-start">
						<div class="content content-block route right">
							<?php if(!empty(get_sub_field('title'))): ?>
								<div class="section-title aos-item" data-aos="fade-up"><?php the_sub_field('title'); ?></div>
							<?php endif; ?>
							<div class="summary aos-item" data-aos="fade-up">
								<?php the_sub_field('description'); ?>
							</div>
						</div>
					</div>
			    </div>
			</div>
		<?php elseif( get_row_layout() == 'content_image' ): ?>
			<div class="container-fuild mb-100 mb-30-mob">
				<div class="row flex-column-reverse flex-lg-row">
					<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding center-vertical">
						<div class="content content-block route paddr-140">
							<?php if(!empty(get_sub_field('title'))): ?>
								<div class="section-title aos-item" data-aos="fade-up"><?php the_sub_field('title'); ?></div>
							<?php endif; ?>
							<div class="summary aos-item" data-aos="fade-up">
								<?php the_sub_field('description'); ?>
							</div>
						</div>
					</div>
					<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding mb-50-mob fix custom_cursor_hover no_text_cursor">
						<div class="p-relative hei-540 bg right hover-bg" style="background-image: url('<?php echo get_sub_field('image'); ?>');">
							<img class="wid-100 hidden" src="<?php echo get_sub_field('image'); ?>" alt="" title="">
						</div>
					</div>
			    </div>
			</div>	
		<?php endif; ?>
<?php endwhile; endif; wp_reset_postdata(); ?>
</main>

<?php get_footer(); ?>