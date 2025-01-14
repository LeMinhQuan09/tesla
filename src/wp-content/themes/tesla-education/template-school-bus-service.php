<?php
/**
 * Template Name: School Bus Service
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
		<div class="row flex-column-reverse flex-lg-row">
			<?php 
			if( $select == 'left' ) { ?>
				<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding mb-50-mob fix custom_cursor_hover no_text_cursor">
					<div class="p-relative bg hei-540 right hover-bg" style="background-image: url('<?php echo $image; ?>');">
						<img class="wid-100 hidden" src="<?php echo $image; ?>" alt="" title="">
					</div>
				</div>
				<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding center-vertical start align-start">
						<div class="content content-block route right">
							<div class="summary aos-item aos-init aos-animate" data-aos="fade-up">
							<?php echo $description; ?>
							</div>
						</div>
				</div>
			<?php } elseif( $select  == 'right' ) { ?>
				<div class="col-xxl-7 col-xl-7 col-lg-7 col-sm-12 clear-padding">
				
				</div>
				<div class="col-xxl-5 col-xl-5 col-lg-5 col-sm-12 clear-padding mb-50-mob fix custom_cursor_hover no_text_cursor">
					<div class="p-relative bg hei-540 right hover-bg" style="background-image: url('<?php echo $image; ?>');">
						<img class="wid-100 hidden" src="<?php echo $image; ?>" alt="" title="">
					</div>
				</div>
			<?php } elseif( $select  == 'none' ) { ?>
				<div class="col-12 content content-block">
					<div class="summary aos-item aos-init aos-animate" data-aos="fade-up">
						<?php echo $description; ?>
					</div>
				</div>
			<?php } ?>	
			
	    </div>
	</div>
	<?php endwhile; ?>
	<?php endif; ?>

	<?php if( have_rows('list_of_driver') ): ?>
	    <?php while( have_rows('list_of_driver') ): the_row(); 
	        $title = get_sub_field('title');
	        $description = get_sub_field('description');
	        $id = get_sub_field('id');
    ?>
    <?php if(!empty($title)) { ?>
	<div id="<?php echo $id; ?>" class="container mb-60 mb-0-mob">
		<div class="section-title mt-0-mob aos-item" data-aos="fade-up"><?php echo $title; ?></div>
		<div class="row">
			<?php if( have_rows('details') ): ?>
			    <?php while( have_rows('details') ): the_row(); 
			        $title = get_sub_field('title');
			        $description = get_sub_field('description');
			        $image = get_sub_field('image');
			        $link = get_sub_field('link');
		    ?>
			<div class="col-xxl-3 col-xl-3 col-md-6 col-12">
				<div class="blog__item white-bg mb-30 mb-25-mob transition-3 fix custom_cursor_hover no_text_cursor"> 
					<div class="blog__thumb w-img fix mb-10"> <img class="" src="<?php echo $image; ?>" alt="" title=""> </div>
					<div class="title text-center">
						<strong><?php echo $title; ?></strong> <br><?php echo $description; ?>
					</div>
				</div>
			</div>
			<?php endwhile; ?>
				<?php endif; ?>
	    </div>
	</div>
	<?php } else echo ''; ?>
	<?php endwhile; ?>
	<?php endif; ?>

	<div class="container mb-0-mob">
		<div class="row">
			<div class="col-12">
				<div class="content content-block">
					<?php if( have_rows('content_section_4') ): ?>
					    <?php while( have_rows('content_section_4') ): the_row(); 
					        $title = get_sub_field('title');
					        $content = get_sub_field('content');
					        $id = get_sub_field('id');
				    ?>
					<div id="<?php echo $id; ?>"  class="section-title mt-0-mob aos-item" data-aos="fade-up"><?php echo $title; ?></div>
					<div class="summary aos-item" data-aos="fade-up">
						<?php echo $content; ?>
					</div>
					<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

</main>
<?php get_footer(); ?>