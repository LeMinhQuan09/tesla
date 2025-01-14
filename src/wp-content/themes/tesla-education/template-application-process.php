<?php
/**
 * Template Name: Application Process
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
				<div class="content term aos-item" data-aos="fade-up" data-max-width="1200px">
					<?php echo get_field('content_section'); ?>
				</div>
			</div>
	    </div>
	<?php } elseif(empty($content_section)) { ?>
		<script type="text/javascript">jQuery('.container').removeClass('mb-200');</script>
	<?php } ?>
	</div>
	
	<?php if( have_rows('content_section_2') ): ?>
	    <?php while( have_rows('content_section_2') ): the_row(); 
	        $step_1 = get_sub_field('step_1');
	        $description_1 = get_sub_field('description_1');
	        $step_2 = get_sub_field('step_2');
	        $description_2 = get_sub_field('description_2');
	        $step_3 = get_sub_field('step_3');
	        $description_3 = get_sub_field('description_3');
    ?>
	<div class="container overflow-inherit mt-100 mt-30-mob">
		<div class="row">
			<div class="col-xxl-12 col-xl-12 col-lg-12 col-sm-12">
				<div class="section-title fz-40 aos-item" data-aos="fade-up"><?php echo $step_1; ?></div>
				<div class="content content-block mb-100 mt-30-mob">
					<?php echo $description_1; ?>
				</div>
				<div class="section-title fz-40 mb-100 mt-30-mob aos-item" data-aos="fade-up"><?php echo $step_2; ?></div>
				<div class="content content-block mb-100 mt-30-mob">
					<div class="summary aos-item" data-aos="fade-up">
						<p><?php echo $description_2; ?></p>
						<div class="accordion" id="accordion-faq">
							<?php
							$show = 1; 
							 if( have_rows('content') ): ?>
						    <?php while( have_rows('content') ): the_row(); 
						        $title = get_sub_field('title');
						        $description = get_sub_field('description');
						        
				        	?>
							<div class="accordion-item mb-20">
								<div class="accordion-header" id="heading-0<?php echo $show; ?>">
									<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-0<?php echo $show; ?>" aria-expanded="true" aria-controls="collapse-0<?php echo $show; ?>"><strong><?php echo $title; ?></strong></button>
								</div>
								<div id="collapse-0<?php echo $show; ?>" class="accordion-collapse collapse <?php if( $show == 1  ){ echo 'show'; } ?>" aria-labelledby="heading-0<?php echo $show; ?>" data-bs-parent="#accordion-faq">
									<div class="accordion-body">
										<?php echo $description; ?>
									</div>
								</div>
							</div>
							<?php  $show++; endwhile;  ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="section-title fz-40 aos-item" data-aos="fade-up"><?php echo $step_3; ?></div>
				<div class="content content-block mb-100 mt-30-mob">
					<div class="summary aos-item" data-aos="fade-up">
						<?php echo $description_3; ?>
					</div>
				</div>
				<div class="content content-block mb-0 mt-30-mob">
					<div class="summary aos-item" data-aos="fade-up">
						<p>
							<?php if( have_rows('sub_menu') ): ?>
							    <?php while( have_rows('sub_menu') ): the_row(); 
							        $link = get_sub_field('link');
							        $title = get_sub_field('title');
						    ?>
						 	<a class="e-btn full-mob mb-20-mob mr-20 open_cursor custom_cursor_hover aos-item" data-aos="fade-up" href="<?php echo $link; ?>" data-bs-toggle="modal" data-bs-target="<?php echo $link; ?>" title=""><?php echo $title; ?></a>
							<?php endwhile; ?>
							<?php endif; ?>
						</p>
					</div>
				</div>
			</div>
	    </div>
	</div>
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