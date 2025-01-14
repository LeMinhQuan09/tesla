<?php
/**
 * Template Name: Template Contact
 */

get_header();
$current_lang = get_locale(); ?>
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
	        $title = get_sub_field('title');
			$sl_form = get_sub_field('sl_form');
	        $title_right = get_sub_field('title_right');
    ?>
	<section class="sec-contact mt-100 mt-30-mod mb-100 mb-30-mob">
		<div class="container">
			<div class="row box">
				<div class="col-xxl-8 col-xl-8 col-lg-8 col-sm-12 col-left">
					<div class="content pt-30 pb-30 pr-40 pl-60">
						<h2 class="title"><?php echo $title; ?></h2>
						<?php 
						echo do_shortcode('[wpforms id="' . esc_attr($sl_form) . '"]');
						//echo do_shortcode($form); ?>
					</div>
				</div>
				<div class="col-xxl-4 col-xl-4 col-lg-4 col-sm-12 col-right">
					<div class="content term">
						<p class="title mb-20"><?php echo $title_right; ?></p>
						<?php $contact_inf = get_field('contact_inf','option');
						if($contact_inf){ ?>
						<ul class="list-inf">
							<?php if($contact_inf['address'] || $contact_inf['address_en']){ ?>
							<li class="item">
								<span class="sub"><?php echo __('Địa chỉ','tesla-education'); ?></span>
								<a href="<?php echo $contact_inf['link_map']; ?>" target="_blank">
									<?php if($current_lang == 'vi'){
										echo $contact_inf['address'];
									} else {
										echo $contact_inf['address_en'];
									} ?>
								</a>
							</li>
							<?php } ?>
							<?php if($contact_inf['email']){ ?>
							<li class="item">
								<span class="sub">Email</span>
								<a href="mailto:<?php echo $contact_inf['email']; ?>" target="_blank">
									<?php echo $contact_inf['email']; ?>
								</a>
							</li>
							<?php } ?>
							<?php if($contact_inf['hotline']){ ?>
							<li class="item">
								<span class="sub"><?php echo __('Số điện thoại','tesla-education'); ?></span>
								<a href="tel:<?php echo $contact_inf['hotline']; ?>">
									<?php echo $contact_inf['hotline']; ?>
								</a>
							</li>
							<?php } ?>
							<?php if($contact_inf['website']){ ?>
							<li class="item">
								<span class="sub">Website</span>
								<a href="<?php echo $contact_inf['website']; ?>">
									<?php echo $contact_inf['website']; ?>
								</a>
							</li>
							<?php } ?>
						</ul>
						<?php } ?>
						
						<ul class="social-list mt-20">
							<?php if( have_rows('socials', 'option') ): 
							while( have_rows('socials', 'option') ): the_row(); 
								$image = get_sub_field('image');
								$link = get_sub_field('link');
							?>
							<li>
								<a class="face custom_cursor_hover view_txt_cursor" href="<?php echo $link; ?>" title="">
									<img src="<?php echo $image; ?>" alt="" title=""/>
								</a>
							</li>
							<?php endwhile; ?>
							<?php endif; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php endwhile; ?>
	<?php endif; ?>
	<?php $iframe_map = get_field('contact_inf','option');
	if($contact_inf['iframe_map']){ ?>
	<section class="sec-ggmap">
		<?php echo $contact_inf['iframe_map']; ?>
	</section>
	<?php } ?>
	
</main>

<?php get_footer(); ?>