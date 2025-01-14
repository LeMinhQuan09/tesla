<?php
/**
 * Template Name: Dilpoma Program
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
	<div class="container mb-200 mt-100 mt-30-mob mb-30-mob">
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

	<?php if( have_rows('content_section_3') ): ?>
	    <?php while( have_rows('content_section_3') ): the_row(); 
	        $image = get_sub_field('image');
	        $select = get_sub_field('select');
	        $title = get_sub_field('title');
	        $id = get_sub_field('id');
	        $select_space = get_sub_field('select_space');
	        $description = get_sub_field('description');
	        $button_title = get_sub_field('button_title');
	        $button_link = get_sub_field('button_link');
    ?>
	<div id="<?php echo $id; ?>" class=" <?php echo implode( ' ', $select_space ); ?>">
		<?php 
		if( $select == 'right' ) { ?>
			<div class="row flex-column-reverse flex-lg-row">
				<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 mt-100 mt-30-mob clear-padding">
					<div class="content content-block route paddr-140">
						<?php if(!empty($title)) { ?>
						<div class="section-title aos-item" data-aos="fade-up"><?php echo $title; ?></div>
						<?php } else echo '';?>
						<div class="summary aos-item" data-aos="fade-up">
							<?php echo $description; ?>
						</div>
						<?php if(!empty($button_title)) { ?>
						<a href="<?php echo $button_link; ?>" class="e-btn open_cursor custom_cursor_hover aos-item" data-aos="fade-up"><?php echo $button_title; ?> <i class="far fa-long-arrow-right"></i></a>
						<?php } else echo '';?>
					</div>
				</div>
				<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding mb-50-mob fix custom_cursor_hover no_text_cursor">
					<div class="p-relative bg hei-540 right hover-bg" style="background-image: url('<?php echo $image; ?>');">
						<img class="wid-100 hidden" src="<?php echo $image; ?>" alt="" title="">
					</div>
				</div>
			</div>	
		<?php } elseif( $select  == 'left' ) { ?>
			<div class="row flex-lg-row">
				<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding mb-50-mob fix custom_cursor_hover no_text_cursor">
					<div class="p-relative bg right hover-bg" style="background-image: url('<?php echo $image; ?>');">
						<img class="wid-100 hidden" src="<?php echo $image; ?>" alt="" title="">
					</div>
				</div>
				<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding mt-100 mt-0-mob start">
					<div class="content content-block route right">
						<?php if(!empty($title)) { ?>
						<div class="section-title aos-item" data-aos="fade-up"><?php echo $title; ?></div>
						<?php } else echo '';?>
						<div class="summary aos-item" data-aos="fade-up">
							<?php echo $description; ?>
						</div>
						<?php if(!empty($button_title)) { ?>
						<a href="<?php echo $button_link; ?>" class="e-btn open_cursor custom_cursor_hover aos-item" data-aos="fade-up"><?php echo $button_title; ?> <i class="far fa-long-arrow-right"></i></a>
						<?php } else echo '';?>
					</div>
				</div>
			</div>
		<?php } elseif( $select  == 'none' ) { ?>
			<div class="col-12 content content-block">
				<div class="section-title fz-40 mb-40 aos-item aos-init aos-animate" data-aos="fade-up"><?php echo $title; ?></div>
				<div class="summary aos-item aos-init aos-animate" data-aos="fade-up">
					<?php echo $description; ?>
				</div>
			</div>
		<?php } ?>
	</div>
	<?php endwhile; ?>
	<?php endif; ?>
	
	<?php if( have_rows('content_section_2') ): ?>
	    <?php while( have_rows('content_section_2') ): the_row(); 
	        $image_right = get_sub_field('image_right');
	        $title = get_sub_field('title');
	        $description = get_sub_field('description');
	        $button_title = get_sub_field('button_title');
	        $button_link = get_sub_field('button_link');
    ?>
    <?php if(!empty($image)) { ?>
	<div class="container-fuild mt-0-mob mb-100 mb-0-mob">
		<div class="row flex-column-reverse flex-lg-row">
			<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 mt-0-mob clear-padding ">
				<div class="content content-block route pr-0">
					<?php if(!empty($title)) { ?>
					<div class="section-title aos-item" data-aos="fade-up"><?php echo $title; ?></div>
					<?php } else echo '';?>
					<div class="summary aos-item" data-aos="fade-up">
						<p><?php echo $description; ?></p>
					</div>
					<?php if(!empty($button_title)) { ?>
						<a href="<?php echo $button_link; ?>" class="e-btn open_cursor custom_cursor_hover aos-item" data-aos="fade-up"><?php echo $button_title; ?> <i class="far fa-long-arrow-right"></i></a>
					<?php } else echo '';?>
				</div>
			</div>
			<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 pr-0 pt-0 pb-0 padd-left-140 mb-50-mob fix custom_cursor_hover no_text_cursor">
				<div class="p-relative hei-1000 bg right hover-bg" style="background-image: url('<?php echo $image_right; ?>');">
					<img class="wid-100 hidden" src="<?php echo $image_right; ?>" alt="" title="">
				</div>
			</div>
	    </div>
	</div>
	<?php } else echo ''; ?>
	<?php endwhile; ?>
	<?php endif; ?>
	
</main>
<?php get_footer(); ?>