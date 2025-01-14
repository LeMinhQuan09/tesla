<?php
/**
 * Template Name: Template Calendar
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

 
	<section class="sec-calendar">
		<div class="container mt-100 mt-30-mob mb-30-mob">
			<?php if( have_rows('calendar_section') ): ?>
			    <?php while( have_rows('calendar_section') ): the_row(); 
			        $iframe = get_sub_field('iframe');
			        $title = get_sub_field('title');
			        $link = get_sub_field('link');
					$link_2 = get_sub_field('link_2');
			        $image = get_sub_field('image');
					$link_url_2 = $link_2['url'];
    				$link_title_2 = $link_2['title'];
		    ?>
			<div class="section-title mt-0-mob aos-item aos-init aos-animate"><?php echo $title; ?>
				<div class="mt-30 iframe-calendar">
					<?php echo $iframe; ?>
				</div>
			</div>
			<div class="content text-center content-block mb-0 mt-30-mob">
				<div class=" aos-item aos-init" data-aos="fade-up">
					<div class="text-center image-down mb-50">
						<img src="<?php echo $image; ?>">
					</div>
					<?php if($link){ ?>
					<a style="display:none; margin-bottom:20px;" class="e-btn full-mob mb-20-mob open_cursor custom_cursor_hover aos-item aos-init" data-aos="fade-up" href="<?php if($link['url']){ echo $link['url']; } ?>" target="_blank" title="">
						<?php if($link['title']) { echo $link['title']; } ?>
					</a>
					<?php } ?>
					<?php if($link_2){ ?>
					<p>
						<a class="e-btn full-mob mb-20-mob open_cursor custom_cursor_hover aos-item aos-init" data-aos="fade-up" href="<?php if($link_url_2){ echo $link_url_2; }  ?>" target="_blank" title="">
							<?php if($link_title_2){ echo $link_title_2; } ?>
						</a>
					</p>
					<?php } ?>
					
				</div>
			</div>
			<?php endwhile; ?>
			<?php endif; ?>         
		</div>
	</section>
	
</main>
<?php get_footer(); ?>