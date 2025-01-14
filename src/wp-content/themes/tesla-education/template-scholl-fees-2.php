<?php
/**
 * Template Name: School Fees - Demo
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
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php endwhile; ?>
	<?php endif; ?>
	
	<div class="container section-school-fees overflow-inherit mt-50 mb-50 mt-30-mob mb-20-mob">
		<div class="row">
			<div class="col-xxl-9 col-xl-9 col-lg-9 col-table">
				<?php $lists_table = get_field('lists_table');
				$show = 1;
				$i = 0;
				if($lists_table){ ?>
				<div class="wrapper mb-30">
					<div class="accordion" id="accordion-fees">
						<?php foreach($lists_table as $val) {
							$i++; ?>
							<div class="accordion-item">
								<div class="accordion-header" id="heading-0<?php echo $show; ?>">
									<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-0<?php echo $show; ?>" aria-expanded="<?php if($i == 1){ echo 'true'; } else { echo 'false'; } ?>" aria-controls="collapse-0<?php echo $show; ?>">
									<?php if($val['title_table']){
										echo $val['title_table']; 
									} ?>
									</button>
								</div>
								<div id="collapse-0<?php echo $show; ?>" class="accordion-collapse collapse <?php if( $show == 1  ){ echo 'show'; } ?>" aria-labelledby="heading-0<?php echo $show; ?>" data-bs-parent="#accordion-fees">
									<div class="accordion-body">
										<?php if($val['main_table']){
											echo $val['main_table'];
										}
										if($val['upload_pdf']){
											echo '<div class="btn-file">';
											echo '<a href="'. $val['upload_pdf'] .'" target="_blank" class="e-btn full-mob open_cursor custom_cursor_hover">'. $val['button_name'] .'</a>';
											echo '</div>';
										} ?>
									</div>
								</div>
							</div>
							<?php 
							// echo '<div class="box mb-50">';
							// if($val['title_table']){
							// 	echo '<h3 class="title mb-20">'. $val['title_table'] .'</h3>';
							// }
							// if($val['main_table']){
							// 	echo '<div class="main-table">';
							// 	echo $val['main_table'];
							// 	echo '</div>';
							// }
							// if($val['upload_pdf']){
							// 	echo '<div class="btn-file">';
							// 	echo '<a href="'. $val['upload_pdf'] .'" target="_blank" class="e-btn full-mob open_cursor custom_cursor_hover">'. $val['button_name'] .'</a>';
							// 	echo '</div>';
							// }
							// echo '</div>';
							?>
						<?php $show++; 
					} ?>
						<?php 
						// $download_bieu_phi = get_field('download_bieu_phi');
						// if($download_bieu_phi){ ?>
							<!-- <a href="<?php //echo $download_bieu_phi; ?>" class="btn-fee" target="_blank">
								<i class="fas fa-plus"></i>
								<span><?php //echo get_field('button_download'); ?></span>
							</a> -->
						<?php //} ?>
					</div>
				</div>
				<?php } ?>
			</div>
			<div class="col-xxl-3 col-xl-3 col-lg-3">
				<div class="scholarships__sidebar">
					<?php $sidebar = get_field('sidebar');
					if($sidebar){ ?>
					<div class="sidebar__form">
						<?php if($sidebar['form_title']){
							echo '<p class="title_widget">'. $sidebar['form_title'] .'</p>';
						}
						$select_form = $sidebar['select_form'];
						if ($select_form) {
							echo do_shortcode('[wpforms id="' . esc_attr($select_form) . '"]');
						} ?>
					</div>
					<?php } ?>
					
				</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>