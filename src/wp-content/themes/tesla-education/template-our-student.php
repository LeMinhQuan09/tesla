 <?php
/**
 * Template Name: Our Student
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
								        $title = get_sub_field('title');
								        $link = get_sub_field('link');
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
	
	<div class="container mt-100 mb-100 mt-30-mob mb-30-mob">
		<div class="row">
			<div class="col-xxl-12">
				<div class="content term aos-item" data-aos="fade-up" data-max-width="1200px">
					<?php echo get_field('description'); ?>
				</div>
			</div>
	    </div>
	</div>
	
	<?php if( have_rows('content_section') ): ?>
	    <?php while( have_rows('content_section') ): the_row(); 
	        $content = get_sub_field('content');
	        $id = get_sub_field('id');
    ?>
	<div id="<?php echo $id; ?>" class="container-fuild mb-100 mb-0-mob">
		<div class="row flex-column-reverse flex-lg-row">
			<?php echo $content; ?>
	    </div>
	</div>
	<?php endwhile; ?>
			<?php endif; ?>

	<?php 
		$mb = 0;
		if( have_rows('content_section_2') ): ?>
	    <?php while( have_rows('content_section_2') ): the_row(); 
	        $title = get_sub_field('title');
	        $id = get_sub_field('id');
    ?>
	<div id="<?php echo $id; ?>" class="container <?php if($mb == 0) { echo 'mb-50';} ?> mb-30-mob">
		<div class="section-title fz-40 mb-40 aos-item" data-aos="fade-up"><?php echo $title; ?></div>
		<ul class="list-board per-4 aos-item" data-aos="fade-up">
			<?php if( have_rows('content') ): ?>
		    <?php while( have_rows('content') ): the_row(); 
		        $image = get_sub_field('image');
		        $name = get_sub_field('name');
		        $grade = get_sub_field('grade');
	    	?>
			<li>
				<div class="thumb">
					<img src="<?php echo $image; ?>" alt title />
				</div>
				<div class="title text-center fz-18">
					<strong><?php echo $name; ?></strong> <br/><?php echo $grade; ?>
				</div>
			</li>
			<?php endwhile; ?>
			<?php endif; ?>
		</ul>
	</div>
	
	<?php $mb++; endwhile; ?>
	<?php endif; ?>

</main>

<?php get_footer(); ?>