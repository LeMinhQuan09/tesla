<?php 
	/*
	* Template name: Template Cafeteria
	*/
	get_header();
?>

<main>
    <section class="page__title-area page__title-height page__title-overlay d-flex align-items-end" style="background-image: url(<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' );  ?>);" >
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
	
	<div class="container mt-100 mb-150 mt-30-mob mb-30-mob">
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
	<?php endif; ?>
	<?php if( have_rows('section_2') ): ?>
		<div class="container-fuild mb-30-mob pb-3">
			<div class="row flex-column-reverse flex-lg-row">
			<?php while( have_rows('section_2') ): the_row(); ?>

				<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding center-vertical">
					<div class="content content-block route paddr-140">
						<div class="summary aos-item" data-aos="fade-up">
							<?php the_sub_field('description'); ?>
						</div>
					</div>
				</div>
				<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding mb-50-mob fix custom_cursor_hover no_text_cursor">
					<div class="p-relative bg right hover-bg" style="background-image: url('<?php echo get_sub_field('image'); ?>');">
						<img class="wid-100 hidden" src="<?php echo get_sub_field('image'); ?>" alt="" title="">
					</div>
				</div>
			<?php endwhile; ?>

		    </div>
		</div>
	<?php endif; ?>
	<?php if( have_rows('gallery') ): ?>
		<div id="" class="container mb-0 mb-30-mob">
			<div class="list-arts">
			<?php while( have_rows('gallery') ): the_row(); ?>
				<div class="thumb">
					<a href="<?php echo get_sub_field('image'); ?>" data-fancybox="images">
						<img class="mh-image" src="<?php echo get_sub_field('image'); ?>" alt title />
					</a>
				</div>
			<?php endwhile; ?>
			</div>
		</div>
	<?php endif; ?>
	<div class="container overflow-inherit mt-80 mb-0 mt-30-mob mb-0-mob">	

		<?php $query = new WP_Query(array(
				'post_type' => 'cafeteria',
				'post_status' => 'publish',
				'posts_per_page' =>  3,
				'orderby' => 'date',
				'order'   => 'DESC',
			)); 
				if($query->have_posts()): ?>
					
		<div class="section-title aos-item" data-aos="fade-up"><?php echo get_field('title_cafeteria'); ?></div>
			<div class="row">

			<?php	while ( $query->have_posts() ) : $query->the_post();
				
					$srcImage = get_the_post_thumbnail_url( get_the_ID(), 'custom-image-size-600-600' );
			?>

			<div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 aos-item" data-aos="fade-up">
				<div class="blog__item white-bg mb-30 transition-3 fix custom_cursor_hover scroll_view_more_txt">
					<div class="blog__thumb w-img fix">
					   <a href="<?php the_permalink(); ?>" title=""><img src="<?php echo $srcImage; ?>" alt="" title=""/> </a>
					</div>
					<div class="blog__content">
						<div class="blog__title"><a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a></div>
						<div class="blog__excerpt"> <p><?php echo get_post_meta(get_the_ID(), 'custom_excerpt', true); ?></p> </div>
						<div class="blog__read-more v2"><a href="<?php the_permalink(); ?>" title=""><?php if(pll_current_language() == 'en'){echo 'Read more '; }else{echo 'Xem Thêm '; } ?><i class="fal fa-angle-right"></i></a></div>
					</div>
				</div>
			</div>

		<?php endwhile; ?>

			 </div>
		</div>

	<?php endif; wp_reset_postdata(); ?>	   
	
</main>

<?php
	get_footer();
?>
