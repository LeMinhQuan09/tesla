<?php
/**
 * Template Name: Photo Gallery
 */

get_header(); ?>
<main>
	<?php if( have_rows('banner_section') ): ?>
	    <?php while( have_rows('banner_section') ): the_row(); 
	        $background_image = get_sub_field('background_image');
	        $title = get_sub_field('title');
    ?>
    <section class="page__title-area page__title-height page__title-overlay d-flex align-items-end mb-100 mb-30-mob" style="background-image:url(<?php echo $background_image; ?>);">
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
	
	<?php if( have_rows('gallery_section') ): ?>
		    <?php while( have_rows('gallery_section') ): the_row(); 
		        $title = get_sub_field('title');
		        $id = get_sub_field('id');
	    ?>
	    <div id="<?php echo $id; ?>" class="container mb-50 mb-30-mob">
    	<div class="section-title fz-40 mb-40 aos-item aos-init" data-aos="fade-up"><?php echo $title; ?></div>
		<div class="list-gallery">
	    	<?php if( have_rows('gallery_image') ): ?>
			    <?php while( have_rows('gallery_image') ): the_row(); 
			        $image = get_sub_field('image');
			        $link = get_sub_field('link');
			        $link_url = $link['url'];
    				$link_title = $link['title'];
		    ?>
			<div class="thumb">
				<div class="blog__item transition-3 fix"> 
					<div class="gall-relative blog__thumb w-img" >
						<a href="<?php echo $link_url; ?>">
							<img class="mh-image" src="<?php echo $image; ?>" alt title />
						</a>
						<div class="content">
							<div class="cont-wrap">
								<div class="cont-relative">
									<p><?php echo $link_title; ?></p>
								</div>
							</div>
						</div>
					</div>
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
