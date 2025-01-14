<?php 
	/*
	** Template name: Template Video + Testimonial
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
				<div class="content term aos-item" data-aos="fade-up" data-max-width="1200px">
					<?php the_content(); ?>
				</div>
			</div>
	    </div>
	</div>
	<?php if( get_field('video')['url'] ): ?>
		<div class="container mb-100 mb-0-mob">
			<div class="row">
				<div class="col-xxl-12">
					<video controls autoplay muted loop>
						<source src="<?php echo get_field('video')['url']; ?>" type="video/mp4">
						Your browser does not support HTML video.
					</video>
				</div>
		    </div>
		</div>
	<?php endif; ?>
	<?php if( have_rows('testimonial') ): ?>
		<section class="testimonial__area pt-50 pb-50 bg-gray">
			<div class="container">
				<div class="col-xxl-12">
					<div class="testimonial__slider swiper-container">
						<div class="testimonial__slider-inner swiper-wrapper">
							<div class="testimonial__item text-center swiper-slide">
							<?php while( have_rows('testimonial') ): the_row();  ?>
								<div class="testimonial__content">
									<p><?php the_sub_field('description'); ?></p>
							   </div>
							   <div class="testimonial__thumb">
									<img src="<?php echo get_sub_field('image')['url']; ?>" alt="">
								</div>
								<div class="testimonial__info"> <strong><?php the_sub_field('name'); ?></strong> </div>
							<?php endwhile; ?>
							</div>
						</div>
						<div class="swiper-button-next swiper-nav"></div>
						<div class="swiper-button-prev swiper-nav"></div>
					</div>
				</div>
			</div>
		</section>	
	<?php endif; ?>
	
</main>

<?php
	get_footer();
?>
