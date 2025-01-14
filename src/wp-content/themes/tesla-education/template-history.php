<?php
/**
 * Template Name: History Tesla
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
	<div class="container mt-100 mb-200 mt-30-mob mb-90-mob">
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
	        $image = get_sub_field('image');
	        $description = get_sub_field('description');
	        $sub_title = get_sub_field('sub_title');
    ?>
	<div class="container-fuild mb-20 mb-0-mob">
		<div class="row flex-column-reverse flex-lg-row">
			<div class="col-xxl-7 col-xl-7 col-lg-7 col-sm-12 clear-padding center-vertical">
				<div class="content content-block route n-850 paddr-30">
					<div class="summary aos-item" data-aos="fade-up">
						<?php echo $description; ?>
					</div>
				</div>
			</div>
			<div class="col-xxl-1 col-xl-1 col-lg-1"> </div>
			<div class="col-xxl-4 col-xl-4 col-lg-4 col-sm-12 clear-padding mb-50-mob custom_cursor_hover no_text_cursor">
				<div class="p-relative hei-100-per text-right bg-before-gray">
					<img class="mb-25" src="<?php echo $image; ?>" alt="" title="">
					<i class="caption-image fz-18"><?php echo $sub_title; ?></i>
				</div>
			</div>
	    </div>
	</div>
		<?php endwhile; ?>
	<?php endif; ?>
	
</main>
<?php get_footer(); ?>