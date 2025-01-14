 <?php
/**
 * Template Name: Community Voice
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
	
	<?php if( have_rows('content_section') ): ?>
	    <?php while( have_rows('content_section') ): the_row(); 
	        $content = get_sub_field('content');
	        $iframe = get_sub_field('iframe');
    ?>
	<div class="container mt-100 mt-30-mob mb-30-mob">
		<div class="row">
			<div class="col-xxl-12">
				<div class="content term aos-item" data-aos="fade-up" data-max-width="1200px">
					<?php echo $content; ?>
				</div>
			</div>
			<div class="mt-100 mb-70">
				<div class="col-xxl-12 col-xl-12"><?php echo $iframe; ?></div>
			</div>
	    </div>
	</div>
	
	<div class="container mb-50 mb-30-mob">
		<div class="row flex-column-reverse flex-lg-row">
			<?php if( have_rows('details') ): ?>
			    <?php while( have_rows('details') ): the_row(); 
			        $description = get_sub_field('description');
			        $image = get_sub_field('image');
			        $name = get_sub_field('name');
			        $location = get_sub_field('location');
		    ?>
			<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12">
				<div class="box-community bg-gray text-center">
					<div class="content"><?php echo $description; ?></div>
					<div class="thumb">
						<img src="<?php echo $image; ?>" alt="">
					</div>
					<div class="info"> <strong><?php echo $name; ?> - <?php echo $location; ?></strong> </div>
				</div>
			</div>
			<?php endwhile; ?>
			<?php endif; ?>
	    </div>
	</div>
	<?php endwhile; ?>
	<?php endif; ?>
	
</main>

<?php get_footer(); ?>