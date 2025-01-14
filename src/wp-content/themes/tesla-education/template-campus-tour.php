<?php
/**
 * Template Name: Template Campus Tour
 */

get_header(); ?>
<main>
	<?php if( have_rows('banner_section') ): ?>
	    <?php while( have_rows('banner_section') ): the_row(); 
	        $background_image = get_sub_field('background_image');
	        $title = get_sub_field('title');
    ?>
    <section class="page__title-area page__title-height page__title-overlay d-flex align-items-end" style="background-image:url(<?php echo $background_image; ?>);">
		<div class="container">
			<div class="row">
				<div class="col-xxl-12">
					<div class="page__title-wrapper mb-30 mb-40-mob">
						<h1 class="page__title"><?php echo $title; ?></h1> 
						<nav class="nav-anchor mt-30">
							<ul>
								<?php if( have_rows('sub_menu') ): ?>
								    <?php while( have_rows('sub_menu') ): the_row(); 
								        $link = get_sub_field('link');
								        $title = get_sub_field('title');
							    ?>
								<li> <a class="view_txt_cursor custom_cursor_hover" href="<?php echo $link; ?>" title=""><?php echo $title; ?></a> </li>
								<?php endwhile; ?>
								<?php endif; ?>
							</ul>
						</nav>	
					</div>
				</div>
			</div>
		</div>
	</section>
		<?php endwhile; ?>
	<?php endif; ?>
	
	<?php $content_section = get_field('content_section'); ?>
	<div class="container mt-100 mb-100 mt-30-mob mb-30-mob">
		<?php if(!empty($content_section)) { ?>
		<div class="row">
			<div class="col-xxl-12">
				<div class="content term aos-item" data-aos="fade-up">
					<?php echo get_field('content_section'); ?>
				</div>
			</div>
	    </div>
	<?php } elseif(empty($content_section)) { ?>
		<script type="text/javascript">jQuery('.container').removeClass('mb-200');</script>
	<?php } ?>
	</div>
	
	<div class="container mt-100 mb-100 mt-30-mob mb-30-mob">
		<div class="row">
			<div class="col-xxl-12">
				<div class="content aos-item" data-aos="fade-up">
					<?php the_content(); ?>
				</div>
			</div>
	    </div>
	</div>
	</div>

	<!-- our campuses -->
	<?php if( have_rows('content_section_left_5') ): ?>
	    <?php while( have_rows('content_section_left_5') ): the_row(); 
	        $content = get_sub_field('content');
	        $title = get_sub_field('title');
	        $first_address_name = get_sub_field('first_address_name');
	        $first_address = get_sub_field('first_address');
	        $first_phone = get_sub_field('first_phone');
	        $first_email = get_sub_field('first_email');
	        $first_email_link = get_sub_field('first_email_link');
	        $second_address_name = get_sub_field('second_address_name');
	        $second_address = get_sub_field('second_address');
	        $second_phone = get_sub_field('second_phone');
	        $second_email = get_sub_field('second_email');
	        $second_email_link = get_sub_field('second_email_link');
	        $image = get_sub_field('image');
	        $image_2 = get_sub_field('image_2');
	        $sologan = get_sub_field('sologan');
		?>
		<?php if(!empty($title)) {?>
		<div class="container-fuild  bg-after bg-mid-25 mb-100 mb-30-mob">
		<div class="row flex-column-reverse flex-lg-row">
			<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding center-vertical">
				<div class="content route">
					<div class="section-title aos-item" data-aos="fade-up" data-aos-duration="500"><?php echo $title; ?></div>
					<div class="summary mb-40 maxw-550 aos-item" data-aos="fade-up" data-aos-duration="500"><?php echo $content; ?></div>
					<div class="our-campuses__tab-2 aos-item" data-aos="fade-up" data-aos-duration="500">
						<ul class="nav nav-tabs" id="our-campuses-tab" role="tablist">
							<li class="nav-item custom_cursor_hover no_text_cursor" role="presentation">
								<button class="nav-link active" id="tan-binh-campus-tab" data-bs-toggle="tab" data-bs-target="#tan-binh-campus" type="button" role="tab" aria-controls="tan-binh-campus" aria-selected="true"> <span><?php echo $first_address_name; ?></span> </button>
							</li>
							<li class="nav-item custom_cursor_hover no_text_cursor" role="presentation">
								<button class="nav-link " id="phu-nhuan-campus-tab" data-bs-toggle="tab" data-bs-target="#phu-nhuan-campus" type="button" role="tab" aria-controls="phu-nhuan-campus" aria-selected="false"> <span><?php echo $second_address_name; ?></span> </button>
							</li>
						</ul>
					</div>
					<div class="our-campuses__tab-content aos-item" data-aos="fade-up" data-aos-duration="500">
						<div class="tab-content" id="our-campusesTabContent">
							<div class="tab-pane fade show active" id="tan-binh-campus" role="tabpanel" aria-labelledby="tan-binh-campus-tab">
								<p class="c-blue-2"><i class="fal fa-map-marker-alt"></i> <?php echo $first_address; ?></p>
								<p class="c-blue-2"><i class="fal fa-phone-alt"></i> <?php echo $first_phone; ?></p>
								<p class="c-blue-2"><i class="fal fa-envelope"></i> <a class="custom_cursor_hover view_txt_cursor" href="<?php echo $first_email_link; ?>" title="<?php echo $first_email; ?>"><?php echo $first_email; ?></a></p>
							</div>
							<div class="tab-pane fade" id="phu-nhuan-campus" role="tabpanel" aria-labelledby="phu-nhuan-campus-tab">
								<p class="c-blue-2"><i class="fal fa-map-marker-alt"></i> <?php echo $second_address; ?></p>
								<p class="c-blue-2"><i class="fal fa-phone-alt"></i> <?php echo $second_phone; ?></p>
								<p class="c-blue-2"><i class="fal fa-envelope"></i> <a class="custom_cursor_hover view_txt_cursor" href="<?php echo $second_email_link; ?>" title="<?php echo $second_email; ?>"><?php echo $second_email; ?></a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding mb-50-mob fix custom_cursor_hover no_text_cursor">
				<div class="bg-campus-1 p-relative hei-540 bg right hover-bg" style="background-image: url('<?php echo $image; ?>');">
					<img class="wid-100 hidden" src="<?php echo $image; ?>" alt="" title="">
				</div>
				<div class="bg-campus-2 p-relative hei-540 bg right hover-bg" style="background-image: url('<?php echo $image_2; ?>');display: none;">
					<img class="wid-100 hidden" src="<?php echo $image_2; ?>" alt="" title="">
				</div>
			</div>
	    </div>
		</div>
		<?php } else {?><script type="text/javascript">jQuery('.container-fuild').hide(); </script><?php } ?>
	<?php endwhile; ?>
			<?php endif; ?>

	
	<div class="container overflow-inherit mb-75 mb-30-mob tp-form-contact">
		<div class="section-title mb-50 mt-30-mob aos-item" data-aos="fade-up"><?php the_field('form_title'); ?></div>
		<div class="mb-50 mt-30-mob aos-item" data-aos="fade-up"><?php the_field('sub_title'); ?></div>
		<?php 	$form_content  = get_field('form_content') ;
				echo do_shortcode($form_content); ?>
	</div>
	
	<?php if( have_rows('testimonials_section') ): ?>
	    <?php while( have_rows('testimonials_section') ): the_row(); 
	        $title = get_sub_field('title');
    ?>
    <?php if(!empty($title)) { ?>
	<section class="testimonial__area pt-50 pb-50 bg-gray">
		<div class="container">
			<div class="section-title text-center mt-0-mob aos-item" data-aos="fade-up"><?php echo $title; ?></div>
			<div class="col-xxl-12">
				<div class="testimonial__slider swiper-container">
					<div class="testimonial__slider-inner swiper-wrapper">
						<?php if( have_rows('details') ): ?>
						    <?php while( have_rows('details') ): the_row(); 
						        $image = get_sub_field('image');
						        $name = get_sub_field('name');
						        $description = get_sub_field('description');
						        $location = get_sub_field('location');
					    ?>
						<div class="testimonial__item text-center swiper-slide">
							<div class="testimonial__content">
								<?php echo $description; ?>
						   </div>
						   <div class="testimonial__thumb">
								<img src="<?php echo $image; ?>" alt="">
							</div>
							<div class="testimonial__info"> <strong><?php echo $name; ?> - <?php echo $location; ?></strong> </div>
						</div>
						<?php endwhile; ?>
						<?php endif; ?>
					</div>
					<div class="swiper-button-next swiper-nav"></div>
					<div class="swiper-button-prev swiper-nav"></div>
				</div>
			</div>
		</div>
	</section>
	<?php } else echo ''; ?>
	<?php endwhile; ?>
	<?php endif; ?>

</main>

<?php get_footer(); ?>