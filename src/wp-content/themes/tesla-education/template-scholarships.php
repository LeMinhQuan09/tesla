<?php
/**
 * Template Name: Template Scholarships
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
	
	<?php
	$title_section = get_field('title_section'); 
	$content_section = get_field('content_section');
	$link_pdf = get_field('link_pdf');
	$button_name = get_field('button_name');
	$sidebar = get_field('sidebar'); ?>
	<section class="scholarships__area pt-80 pt-30-mob pb-80 pb-30-mob">
		<div class="container">
			<div class="row">
				<div class="col-xxl-9 col-xl-9 col-lg-9">
					<div class="wrapper">
					<?php if($title_section){
						echo '<div class="title">'. $title_section .'</div>';
					}
					if($content_section){
						echo '<div class="content">'. $content_section .'</div>';
					}
					if($link_pdf){
						$button_text = $button_name ?? 'Download';
						echo '<div class="btn-file">
						<a class="e-btn full-mob open_cursor custom_cursor_hover" href="'. $link_pdf .'" target="_blank">'. esc_html($button_text) .'</a></div>';
					} ?>
					</div>
				</div>
				<div class="col-xxl-3 col-xl-3 col-lg-3">
					<div class="scholarships__sidebar">
						<?php if($sidebar){ ?>
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
	</section>
</main>
<?php get_footer(); ?>