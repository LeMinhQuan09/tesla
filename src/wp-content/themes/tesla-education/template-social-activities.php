<?php 
	/*
	** Template name: Template Social Activities
	*/
	get_header();
?>

<main>
    <section class="page__title-area page__title-height page__title-overlay d-flex align-items-end" style="background-image: url(<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' );  ?>);">
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
				<div class="content term aos-item" data-aos="fade-up" data-max-width="1200px">
					<?php the_content(); ?>
				</div>
			</div>
	    </div>
	</div>
	<?php if( have_rows('section_1') ): ?>
		<div class="container-fuild mb-30-mob">
			<div class="row flex-column-reverse flex-lg-row">
			<?php while( have_rows('section_1') ): the_row(); ?>

				<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding center-vertical">
					<div class="content content-block route paddr-140">
						<div class="summary aos-item" data-aos="fade-up">
							<?php the_sub_field('description'); ?>
						</div>
					</div>
				</div>
				<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding mb-50-mob fix custom_cursor_hover no_text_cursor">
					<div class="p-relative bg right hover-bg" style="background-image: url('<?php echo get_sub_field('image')['url']; ?>');">
						<img class="wid-100 hidden" src="<?php echo get_sub_field('image')['url']; ?>" alt="" title="">
					</div>
				</div>
			<?php endwhile; ?>

		    </div>
		</div>
	<?php endif; ?>
	<?php if( have_rows('section_2') ): ?>
		<div class="container-fuild mb-30-mob">
			<div class="row">
			<?php while( have_rows('section_1') ): the_row(); ?>
				<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding mb-50-mob fix custom_cursor_hover no_text_cursor">
					<div class="p-relative bg hei-540 right hover-bg" style="background-image: url('<?php echo get_sub_field('image')['url']; ?>');">
						<img class="wid-100 hei-540 hidden" src="<?php echo get_sub_field('image')['url']; ?>" alt="" title="">
					</div>
				</div>
				<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding center-vertical start">
					<div class="content content-block route right">
						<div class="summary aos-item" data-aos="fade-up">
							<?php the_sub_field('description'); ?>
						</div>
					</div>
				</div>
			<?php endwhile; wp_reset_postdata();  ?>
		    </div>
		</div>
	<?php endif; 	
	if( have_rows('gallery') ): ?>
		<div id="" class="container mb-50 mb-30-mob">
			<div class="list-arts">
			<?php while( have_rows('gallery') ): the_row(); ?>
				<div class="thumb">
					<a href="<?php echo get_sub_field('image'); ?>" data-fancybox="images">
						<img src="<?php echo get_sub_field('image'); ?>" alt title />
					</a>
				</div>
			<?php endwhile; ?>
			</div>
		</div>
	<?php endif; ?>
	
</main>

<?php
	get_footer();
?>
