<?php
/**
 * Template Name: Template General
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
								<li> <a class="view_txt_cursor custom_cursor_hover" href="<?php echo $link; ?>" ><?php echo $title; ?></a> </li>
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
	<div class="container mt-100 mb-100 mt-30-mob mb-0-mob">
		<?php if(!empty($content_section)) { ?>
		<div class="row">
			<div class="col-xxl-12">
				<div class="content term aos-item" data-aos="fade-up" data-max-width="1300px">
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
	        $title = get_sub_field('title');
	        $description = get_sub_field('description');
	        $button_title = get_sub_field('button_title');
	        $button_link = get_sub_field('button_link');
	        $message = get_sub_field('message');
	        $name = get_sub_field('name');
    ?>
    <?php if($image) { ?> <!-- update boi KHa bỏ dấu thang trước empty-->
	<div class="container-fuild overflow-inherit bg-gray mt-240 mb-40 mb-0-mob">
		<div class="row">
			<div class="col-xxl-4 col-xl-4 col-lg-5 col-md-12 clear-padding center-992">
				<img src="<?php echo $image; ?>" alt title class="mt--120 custom_cursor_hover no_text_cursor aos-item" data-aos="fade-right" />
			</div>
			<div class="col-xxl-8 col-xl-8 col-lg-7 col-md-12 about-paddl-50">
				<div class="content content-block mt-55 mb-55 mb-30-mob">
					<div class="section-title fz-48 aos-item" data-aos="fade-up"><?php echo $title; ?></div>
					<div class="summary aos-item" data-aos="fade-up" data-max-width="950px">
						<?php echo $description; ?>	
					</div>
				</div>
			</div>
	    </div>
	</div>
	<?php } else echo ''; ?>
	<?php endwhile; ?>
	<?php endif; ?>

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
				<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding center-vertical">
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
					<div class="p-relative bg hei-540 right hover-bg" style="background-image: url('<?php echo $image; ?>');">
						<img class="wid-100 hidden" src="<?php echo $image; ?>" alt="" title="">
					</div>
				</div>
				<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding center-vertical start">
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

	<?php if( have_rows('our_core_values') ): ?>
	    <?php while( have_rows('our_core_values') ): the_row(); 
	        $title = get_sub_field('title');
	        $description = get_sub_field('description');
	        $id = get_sub_field('id');
    ?>
    <?php if(!empty($title)) { ?>
	<section id="<?php echo $id; ?>" class="bg-gray pt-55 pb-30 mb-100 mb-30-mob">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section-title text-center aos-item mb-40" data-aos="fade-up" data-aos-duration="500"><?php echo $title; ?></div>
					<div class="summary fz-18 text-center div-center aos-item aos-init aos-animate" data-aos="fade-up" data-max-width="950px"><?php echo $description; ?></div>
				</div>
			</div>
		</div>
		<div class="container mt-60">
			<div class="row">
				<?php if( have_rows('details') ): ?>
				    <?php while( have_rows('details') ): the_row(); 
				        $title = get_sub_field('title');
				        $description = get_sub_field('description');
				        $image = get_sub_field('image');
				        $link = get_sub_field('link');
			    ?>
					<div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6">
						<div class="our-item text fix mb-30 aos-item custom_cursor_hover view_txt_cursor" data-aos="fade-up" data-aos-duration="500">
							<div class="our-thumb w-img p-relative">
								<a href="<?php echo $link; ?>" title="<?php echo $title; ?>"> 
									<img src="<?php echo $image; ?>" alt=""> 
								</a>
	                        </div>
							<div class="our-content">
								<div class="title text-center"><?php echo $title; ?></div>
								<?php echo $description; ?>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</section>
	<?php } else echo ''; ?>
	<?php endwhile; ?>
	<?php endif; ?>

	<?php if( have_rows('gallery_section_2') ): ?>
		    <?php while( have_rows('gallery_section_2') ): the_row(); 
		        $title = get_sub_field('title');
		        $id = get_sub_field('id');
	    ?>
	    <div id="<?php echo $id; ?>" class="container mb-50 mb-30-mob">
    	<div class="section-title fz-40 mb-40 aos-item aos-init" data-aos="fade-up"><?php echo $title; ?></div>
	<div class="list-arts">
    	<?php if( have_rows('gallery_image') ): ?>
		    <?php while( have_rows('gallery_image') ): the_row(); 
		        $image = get_sub_field('image');
		        $description = get_sub_field('description');
	    ?>
	    <?php if(!empty($image)) { ?>
    	<div class="thumb"> 
			<div class="blog__item transition-3 fix"> 
				<div class="gall-relative blog__thumb w-img" >
					<a href="<?php echo $image; ?>" data-fancybox="images">
					<img class="mh-image" src="<?php echo $image; ?>" alt title />
					</a>
					<div class="content">
						<div class="cont-wrap">
							<div class="cont-relative">
								<p><?php echo $description; ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php } else { ?>
		<script type="text/javascript">jQuery('.container').removeClass('mb-50');</script>
	<?php } ?>
		<?php endwhile; ?>
		<?php endif; ?>
		
	</div>
	</div>
	<?php endwhile; ?>
	<?php endif; ?>
	
</main>
<?php get_footer(); ?>