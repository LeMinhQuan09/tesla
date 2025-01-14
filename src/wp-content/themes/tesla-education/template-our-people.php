<?php
/**
 * Template Name: Our People
 */
get_header(); ?>
<main class="our-people">
	<?php if( have_rows('banner_section') ): ?>
	    <?php while( have_rows('banner_section') ): the_row(); 
	        $background_image = get_sub_field('background');
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
	<div class="container mt-100 mb-100 mt-30-mob mb-30-mob">
		<div class="row">
			<div class="col-xxl-12">
				<div class="content term aos-item" data-aos="fade-up" data-max-width="1200px">
					<?php echo get_field('description'); ?>
				</div>
			</div>
	    </div>
	</div>
<!--  #tam thoi khoa thay Tim -->
	<?php if( have_rows('principal') ): ?>
	    <?php while( have_rows('principal') ): the_row(); 
	        $image = get_sub_field('image');
	        $title = get_sub_field('title');
	        $description = get_sub_field('description');
	        $name = get_sub_field('name');
	        $position = get_sub_field('position');
	        $id = get_sub_field('id');
    ?> 
	<div id="<?php echo $id; ?>" class="container-fuild overflow-inherit bg-gray mb-100 mb-30-mob">
		<div class="row">
			
			<div class="col-xxl-4 col-xl-4 col-lg-5 col-md-12 clear-padding center-992">
				<img src="<?php echo $image; ?>" alt title class="mt--40 mb-40 custom_cursor_hover no_text_cursor aos-item" data-aos="fade-right" />
			</div>
			<div class="col-xxl-8 col-xl-8 col-lg-7 col-md-12 about-paddl-50 center-vertical start">
				<div class="content content-block mt-55 mb-55 mt-0-mob mb-30-mob">
					<div class="section-title aos-item" data-aos="fade-up"><?php echo $title; ?></div>
					<div class="summary aos-item" data-aos="fade-up" data-max-width="950px">
						<?php echo $description; ?>
					</div>
					<div class="summary aos-item" data-aos="fade-up">
						<p><strong><?php echo $name; ?></strong> <br/><?php echo $position; ?></p>
					</div>
				</div>
			</div>
	    </div>
	</div>
	<?php endwhile; ?>
	<?php endif; ?>

	<?php if( have_rows('our_people') ): ?>
	    <?php while( have_rows('our_people') ): the_row(); 
	        $position = get_sub_field('position');
	        $id = get_sub_field('id');
    ?>
	<div id="<?php echo $id; ?>" class="container-1440 mb-100 mb-30-mob">
		<div class="section-title fz-40 mb-40 aos-item" data-aos="fade-up"><?php echo $position; ?></div>
		<ul class="list-board aos-item" data-aos="fade-up">
			<?php if( have_rows('details') ): ?>
			    <?php while( have_rows('details') ): the_row(); 
			    	$image = get_sub_field('image');
			        $name = get_sub_field('name');
			        $position = get_sub_field('position');
			        $description = get_sub_field('description');
		    ?>
			<li>
				<div class="thumb">
					<img src="<?php echo $image; ?>" alt title />
					<div class="content">
						<div class="cont-wrap">
							<div class="cont-relative">
								<?php echo $description; ?>
							</div>
						</div>
					</div>
				</div>
				<div class="title text-center fz-18">
					<strong><?php echo $name; ?></strong> <br/><?php echo $position; ?>
				</div>
			</li>
			<?php endwhile; ?>
			<?php endif; ?>
		</ul>
	</div>
	<?php endwhile; ?>
		<?php endif; ?>
	
	<?php if( have_rows('our_people_2') ): ?>
		    <?php while( have_rows('our_people_2') ): the_row(); 
		        $position = get_sub_field('position');
		        $id = get_sub_field('id');
    ?>
	<div id="<?php echo $id; ?>" class="container-1440 mb-100 mb-30-mob">
		<div class="section-title fz-40 mb-40 aos-item" data-aos="fade-up"><?php echo $position; ?></div>
		<ul class="list-board aos-item" data-aos="fade-up">
			<?php if( have_rows('details') ): ?>
			    <?php while( have_rows('details') ): the_row(); 
			    	$image = get_sub_field('image');
			        $name = get_sub_field('name');
			        $position = get_sub_field('position');
			        $description = get_sub_field('description');
		    ?>
			<li>
				<div class="thumb">
					<img src="<?php echo $image; ?>" alt title />
					<div class="content">
						<div class="cont-wrap">
							<div class="cont-relative">
								<?php echo $description; ?>
							</div>
						</div>
					</div>
				</div>
				<div class="title text-center fz-18">
					<strong><?php echo $name; ?></strong> <br/><?php echo $position; ?>
				</div>
			</li>
			<?php endwhile; ?>
			<?php endif; ?>
		</ul>
	</div>
	<?php endwhile; ?>
		<?php endif; ?>

	<?php if( have_rows('our_people_3') ): ?>
		    <?php while( have_rows('our_people_3') ): the_row(); 
		        $position = get_sub_field('position');
		        $id = get_sub_field('id');
    ?>
	<div id="<?php echo $id; ?>" class="container-1440 mb-30-mob">
		<div class="section-title fz-40 mb-40 aos-item" data-aos="fade-up"><?php echo $position; ?></div>
		<ul class="list-board aos-item" data-aos="fade-up">
			<?php if( have_rows('details') ): ?>
			    <?php while( have_rows('details') ): the_row(); 
			    	$image = get_sub_field('image');
			        $name = get_sub_field('name');
			        $position = get_sub_field('position');
			        $description = get_sub_field('description');
		    ?>
			<li>
				<div class="thumb">
					<img src="<?php echo $image; ?>" alt title />
					<div class="content">
						<div class="cont-wrap">
							<div class="cont-relative">
								<?php echo $description; ?>
							</div>
						</div>
					</div>
				</div>
				<div class="title text-center fz-18">
					<strong><?php echo $name; ?></strong> <br/><?php echo $position; ?>
				</div>
			</li>
			<?php endwhile; ?>
			<?php endif; ?>
		</ul>
	</div>
	<?php endwhile; ?>
	<?php endif; ?>
	
</main>
<?php get_footer(); ?>