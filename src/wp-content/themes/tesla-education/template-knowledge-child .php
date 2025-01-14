<?php 
	/*
	** Template name: Template Knowledge child
	*/
	get_header();
?>
<style>
	.summary strong{
		font-size: 24px;
		line-height: 1.5;
	}
	@media only screen and (max-width: 1400px){
		.summary strong{
			font-size: 18px;
			line-height: 1.3;
		}
	}
</style>
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
	
	<?php if( have_rows('knowledge_group') ):
		while( have_rows('knowledge_group') ): the_row();  ?>

		<?php if( get_row_layout() == 'image_content' ): ?>
			<?php if(!empty(get_the_content())): ?>
				<div class="container mt-100 mb-100 mt-30-mob mb-30-mob">
					<div class="row">
						<div class="col-xxl-12">
							<div class="content term aos-item" data-aos="fade-up" data-max-width="1200px">
								<?php the_content(); ?>
							</div>
						</div>
				    </div>
				</div>
			<?php endif; ?>
			<div class="container-fuild overflow-inherit mb-70 mb-30-mob">
				<div class="row">
					<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding mb-50-mob fix custom_cursor_hover no_text_cursor">
						<div class="p-relative bg right hover-bg" style="background-image: url('<?php echo get_sub_field('image'); ?>');">
							<img class="wid-100 hidden" src="<?php echo get_sub_field('image'); ?>" alt="" title="">
						</div>
					</div>
					<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding center-vertical start">
						<div class="content content-block route right">
							<div class="summary aos-item" data-aos="fade-up">
								<?php the_sub_field('description'); ?>
							</div>
						</div>
					</div>
			    </div>
			</div>
		<?php elseif( get_row_layout() == 'content_image' ): ?>
			<div class="container-fuild mt-100 mb-50 mb-0-mob mt-30-mob">
				<div class="row flex-column-reverse flex-lg-row">
					<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding center-vertical">
						<div class="content content-block route paddr-140">
							<div class="summary aos-item" data-aos="fade-up">
								<?php 
									if(!empty(get_the_content())){
										echo '<div class="mb-100 mb-30-mob">'.get_the_content().'</div>';
									}?>
									<div class="show-mob mb-30">
										<img src="<?php echo get_sub_field('image'); ?>" alt="" title="">
									</div>									
								<?php the_sub_field('description'); ?>
							</div>
						</div>
					</div>
					<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding mb-50-mob fix custom_cursor_hover no_text_cursor d-none d-lg-block">
						<div class="p-relative bg right hover-bg" style="background-image: url('<?php echo get_sub_field('image'); ?>');">
							<img class="wid-100 hidden" src="<?php echo get_sub_field('image'); ?>" alt="" title="">
						</div>
					</div>
		    	</div>
			</div>
		<?php elseif( get_row_layout() == 'content' ): ?>
			<div class="container overflow-inherit mb-30 mb-0-mob">
				<div class="row">
					<div class="col-xxl-12 col-xl-12 col-lg-12 col-sm-12">
						<div class="content content-block">
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

		<?php endif; 
	endwhile; endif; wp_reset_postdata();
	?>
	
</main>

<?php get_footer(); ?>
