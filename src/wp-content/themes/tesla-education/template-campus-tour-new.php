<?php
/**
 * Template Name: Template Campus Tour - New
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
	
	<!-- Content -->
	<?php $campus = get_field('gallery_campus');
	if($campus){ ?>
	<section class="campus-tour-gallery mt-80 mb-40">
		<div class="container">
			<div class="gallery-header mb-40">
				<?php if($campus['title']) {
					echo '<h2 class="title">'. $campus['title'] .'</h2>';
				}
				// if($campus['description']){
				// 	echo '<div class="desc">'. $campus['description'] .'</div>';
				// } ?>
			</div>
			<div class="row gallery-row">
				<div class="col-lg-2">
					<a href="<?php echo esc_url($campus['lists_image']['image_left']['url']); ?>" class="item" data-fancybox="images">
						<img src="<?php echo esc_url($campus['lists_image']['image_left']['url']); ?>" alt="">
					</a>
				</div>
				<div class="col-lg-7">
					<?php if($campus['lists_image']['image_center']){
						$count = 0; ?>
						<?php foreach($campus['lists_image']['image_center'] as $image){
							if ($count % 2 === 0) {
								echo '<div class="gallery-center d-flex">';
							} ?>
							<a href="<?php echo esc_url($image['url']); ?>" class="item" data-fancybox="images">
								<img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
							</a>
						<?php $count++;
							if ($count % 2 === 0) {
								echo '</div>';
							}
						}
						if ($count % 2 !== 0) {
							echo '</div>';
						} ?>
					<?php } ?>
				</div>
				<div class="col-lg-3">
					<a href="<?php echo esc_url($campus['lists_image']['image_right']['url']); ?>" class="item" data-fancybox="images">
						<img src="<?php echo esc_url($campus['lists_image']['image_right']['url']); ?>" alt="">
					</a>
				</div>
			</div>
		</div>
	</section>
	<?php }
	$form_campus = get_field('form_campus');
	if($form_campus){ ?>
		<section class="campus-tour-form mt-80 mb-40">
			<div class="container">
				<div class="wrapper">
					<?php if($form_campus['title_form']){ ?>
					<h2 class="title text-center"><?php echo $form_campus['title_form']; ?></h2>
					<?php }
					if($campus['description']){
						echo '<div class="desc text-center">'. $campus['description'] .'</div>';
					} ?>
					<?php if($form_campus['sl_form']){
						echo '<div class="form-campus">';
						echo do_shortcode('[wpforms id="' . esc_attr($form_campus['sl_form']) . '"]');
						echo '</div>';
					} ?>
				</div>
			</div>
		</section>
	<?php } ?>
</main>

<?php get_footer(); ?>