<?php 
	/*
	** Template name: Template Community
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
	
	<?php if( have_rows('category_list') ):
		while( have_rows('category_list') ): the_row();  ?>

	<?php if( get_row_layout() == 'image_content' ): ?>
		<div class="container-fuild overflow-inherit mb-100 mb-30-mob">
			<div class="row">
				<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding mb-50-mob fix custom_cursor_hover no_text_cursor">
					<div class="p-relative bg hei-540 right hover-bg" style="background-image: url('<?php echo get_sub_field('image'); ?>');">
						<img class="wid-100 hei-540 hidden" src="<?php echo get_sub_field('image'); ?>" alt="" title="">
					</div>
				</div>
				<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding center-vertical start">
					<div class="content content-block route right">
					<?php while( have_rows('content') ): the_row(); ?>

						<div class="section-title mt-0-mob aos-item" data-aos="fade-up"><?php the_sub_field('title'); ?></div>
						<div class="summary aos-item" data-aos="fade-up">
							<?php the_sub_field('description'); ?>
						</div>
						<a href="<?php the_sub_field('link'); ?>" class="e-btn mb-0 open_cursor custom_cursor_hover aos-item" data-aos="fade-up">
							<?php if(pll_current_language() == 'en'){echo 'Discover More'; }else{echo 'Khám Phá Thêm'; } ?> <i class="far fa-long-arrow-right"></i>
						</a>

					<?php endwhile; ?>
					</div>
				</div>
		    </div>
		</div>

	<?php elseif( get_row_layout() == 'image_content_image' ): ?>
		<div class="container-fuild overflow-inherit mb-100 mb-30-mob">
			<div class="row">
				<div class="col-xxl-5 col-xl-5 col-lg-6 col-sm-12 clear-padding mb-50-mob fix custom_cursor_hover no_text_cursor">
					<div class="p-relative bg hei-540 right hover-bg" style="background-image: url('<?php echo get_sub_field('image'); ?>');">
						<img class="wid-100 hidden" src="<?php echo get_sub_field('image'); ?>" alt="" title="">
					</div>
				</div>
				<div class="col-xxl-4 col-xl-4 col-lg-6 col-sm-12 clear-padding center-vertical start">
					<div class="content content-block route center">
					<?php while( have_rows('content') ): the_row(); ?>
						<div class="section-title aos-item" data-aos="fade-up"><?php the_sub_field('title'); ?></div>
						<div class="summary aos-item" data-aos="fade-up">
							<?php the_sub_field('description'); ?>
						</div>
						<a href="<?php the_sub_field('link'); ?>" class="e-btn mb-0 open_cursor custom_cursor_hover aos-item" data-aos="fade-up"><?php if(pll_current_language() == 'en'){echo 'Discover More'; }else{echo 'Khám Phá Thêm'; } ?> <i class="far fa-long-arrow-right"></i></a>
					<?php endwhile; ?>
					</div>
				</div>
				<div class="col-xxl-3 col-xl-3 d-none d-xl-block clear-padding mb-50-mob fix custom_cursor_hover no_text_cursor">
					<div class="p-relative bg hei-540 right hover-bg" style="background-image: url('<?php echo get_sub_field('image_2'); ?>');">
						<img class="wid-100 hidden" src="<?php echo get_sub_field('image_2'); ?>" alt="" title="">
					</div>
				</div>
		    </div>
		</div>
		
	<?php elseif( get_row_layout() == 'content_top_image_bg' ): ?>
		<div class="container-fuild overflow-inherit bg-after bg-padd-top-50 mb-30-mob">
			<div class="row flex-column-reverse flex-lg-row">
				<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding center-vertical">
					<div class="content content-block route paddr-140 pt-50">

					<?php while( have_rows('content') ): the_row(); ?>
						<div class="section-title aos-item" data-aos="fade-up"><?php the_sub_field('title'); ?></div>
						<div class="summary aos-item" data-aos="fade-up">
							<?php the_sub_field('description'); ?>
						</div>
						<a href="<?php the_sub_field('link'); ?>" class="e-btn mb-0 open_cursor custom_cursor_hover aos-item" data-aos="fade-up"><?php if(pll_current_language() == 'en'){echo 'Discover More'; }else{echo 'Khám Phá Thêm'; } ?> <i class="far fa-long-arrow-right"></i></a>
					<?php endwhile; ?>

					</div>
				</div>
				<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding mb-50-mob fix custom_cursor_hover no_text_cursor">
					<div class="p-relative hei-540 bg right hover-bg" style="background-image: url('<?php echo get_sub_field('image'); ?>');">
						<img class="wid-100 hidden" src="<?php echo get_sub_field('image'); ?>" alt="" title="">
					</div>
				</div>
		    </div>
		</div>
		<div class="container-fuild space-100 p-relative bg-gray mb-30-mob no-mob"></div>
		
	<?php elseif( get_row_layout() == 'content_image_bg' ): ?>
		<div class="container-fuild overflow-inherit bg-after bg-top-50 mb-100 mb-30-mob mt-145 mt-30-mob">
			<div class="row flex-column-reverse flex-lg-row">
				<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding center-vertical">
					<div class="content content-block route paddr-140">
					<?php while( have_rows('content') ): the_row(); ?>

						<div class="section-title aos-item" data-aos="fade-up"><?php the_sub_field('title'); ?></div>
						<div class="summary aos-item" data-aos="fade-up">
							<?php the_sub_field('description'); ?>
						</div>
						<a href="<?php the_sub_field('link'); ?>" class="e-btn mb-0 open_cursor custom_cursor_hover aos-item" data-aos="fade-up"><?php if(pll_current_language() == 'en'){echo 'Discover More'; }else{echo 'Khám Phá Thêm'; } ?> <i class="far fa-long-arrow-right"></i></a>
					<?php endwhile; ?>

					</div>
				</div>
				<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding mb-50-mob fix custom_cursor_hover no_text_cursor">
					<div class="p-relative hei-540 bg right hover-bg" style="background-image: url('<?php echo get_sub_field('image'); ?>');">
						<img class="wid-100 hidden" src="<?php echo get_sub_field('image'); ?>" alt="" title="">
					</div>
				</div>
		    </div>
		</div>
		
	<?php elseif( get_row_layout() == 'image_content_bg' ): ?>
		<div class="container-fuild overflow-inherit bg-after bg-after bg-mid-75 mb-100 mb-30-mob">
			<div class="row">
				<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding mb-50-mob fix custom_cursor_hover no_text_cursor">
					<div class="p-relative bg hei-540 right hover-bg" style="background-image: url('<?php echo get_sub_field('image'); ?>');">
						<img class="wid-100 hidden" src="<?php echo get_sub_field('image'); ?>" alt="" title="">
					</div>
				</div>
				<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding center-vertical start">
					<div class="content content-block route right">

					<?php while( have_rows('content') ): the_row(); ?>
						<div class="section-title aos-item" data-aos="fade-up"><?php the_sub_field('title'); ?></div>
						<div class="summary aos-item" data-aos="fade-up">
							<?php the_sub_field('description'); ?>
						</div>
						<a href="<?php the_sub_field('link'); ?>" class="e-btn mb-0 open_cursor custom_cursor_hover aos-item" data-aos="fade-up"><?php if(pll_current_language() == 'en'){echo 'Discover More'; }else{echo 'Khám Phá Thêm'; } ?> <i class="far fa-long-arrow-right"></i></a>
					<?php endwhile; ?>

					</div>
				</div>
		    </div>
		</div>

	<?php elseif( get_row_layout() == 'image_content_bg_around' ): ?>
		<div class="container-fuild overflow-inherit bg-after bg-top-50 mb-150 mb-30-mob">
			<div class="row">
				<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding mb-50-mob fix custom_cursor_hover no_text_cursor">
					<div class="p-relative bg hei-540 right hover-bg" style="background-image: url('<?php echo get_sub_field('image'); ?>');">
						<img class="wid-100 hidden" src="<?php echo get_sub_field('image'); ?>" alt="" title="">
					</div>
				</div>
				<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding center-vertical start">
					<div class="content content-block route right">

					<?php while( have_rows('content') ): the_row(); ?>
						<div class="section-title aos-item" data-aos="fade-up"><?php the_sub_field('title'); ?></div>
						<div class="summary aos-item" data-aos="fade-up">
							<?php the_sub_field('description'); ?>
						</div>
						<a href="<?php the_sub_field('link'); ?>" class="e-btn mb-0 open_cursor custom_cursor_hover aos-item" data-aos="fade-up"><?php if(pll_current_language() == 'en'){echo 'Discover More'; }else{echo 'Khám Phá Thêm'; } ?> <i class="far fa-long-arrow-right"></i></a>
					<?php endwhile; ?>

					</div>
				</div>
		    </div>
		</div>
	
	<?php elseif( get_row_layout() == 'content_image' ): ?>
		<div class="container-fuild mb-100 mb-30-mob">
			<div class="row flex-column-reverse flex-lg-row">
				<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding center-vertical">
					<div class="content content-block route paddr-140">

					<?php while( have_rows('content') ): the_row(); ?>
						<div class="section-title aos-item" data-aos="fade-up"><?php the_sub_field('title'); ?></div>
						<div class="summary aos-item" data-aos="fade-up">
							<?php the_sub_field('description'); ?>
						</div>
						<a href="<?php the_sub_field('link'); ?>" class="e-btn mb-0 open_cursor custom_cursor_hover aos-item" data-aos="fade-up"><?php if(pll_current_language() == 'en'){echo 'Discover More'; }else{echo 'Khám Phá Thêm'; } ?> <i class="far fa-long-arrow-right"></i></a>
					<?php endwhile; ?>

					</div>
				</div>
				<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding mb-50-mob fix custom_cursor_hover no_text_cursor">
					<div class="p-relative hei-540 bg right hover-bg" style="background-image: url('<?php echo get_sub_field('image'); ?>');">
						<img class="wid-100 hidden" src="<?php echo get_sub_field('image'); ?>" alt="" title="">
					</div>
				</div>
		    </div>
		</div>

	<?php elseif( get_row_layout() == 'image_content_bg_top' ): ?>
		<div class="container-fuild overflow-inherit bg-after bg-top-100 mb-100 mb-30-mob mt-100 mt-0-mob">
			<div class="row">
				<div class="col-xxl-5 col-xl-5 col-lg-5 col-sm-12 clear-padding mb-50-mob fix custom_cursor_hover no_text_cursor">
					<div class="p-relative bg hei-540 right hover-bg" style="background-image: url('<?php echo get_sub_field('image'); ?>');">
						<img class="wid-100 hidden" src="<?php echo get_sub_field('image'); ?>" alt="" title="">
					</div>
				</div>
				<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding center-vertical start">
					<div class="content content-block route right">

					<?php while( have_rows('content') ): the_row(); ?>
						<div class="section-title mt--100 mt-0-mob aos-item" data-aos="fade-up"><?php the_sub_field('title'); ?></div>
						<div class="summary aos-item" data-aos="fade-up">
							<?php the_sub_field('description'); ?>
						</div>
						<a href="<?php the_sub_field('link'); ?>" class="e-btn mb-0 open_cursor custom_cursor_hover aos-item" data-aos="fade-up"><?php if(pll_current_language() == 'en'){echo 'Discover More'; }else{echo 'Khám Phá Thêm'; } ?> <i class="far fa-long-arrow-right"></i></a>
					<?php endwhile; ?>

					</div>
				</div>
		    </div>
		</div>
	
	<?php endif; ?>

	<?php endwhile; endif; wp_reset_postdata(); ?>
	
</main>

<?php
	get_footer(); 
?>
