<div class="popup__contact">
    <?php if( have_rows('popup_contact','option') ): ?>
	    <?php 
        while( have_rows('popup_contact','option') ): the_row(); 
	        $title_left_contact = get_sub_field('title_left_contact');
			$sl_form = get_sub_field('select_form_contact');
	        $title_right_contact = get_sub_field('title_right_contact'); ?>
            <div class="popup__contact-wrapper">
				<div class="col-left">
					<div class="content">
						<p class="title"><?php echo $title_left_contact; ?></p>
						<?php echo do_shortcode('[wpforms id="' . esc_attr($sl_form) . '"]'); ?>
					</div>
				</div>
				<div class="col-right">
					<div class="content term">
						<p class="title"><?php echo $title_right_contact; ?></p>
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
    <?php endwhile; ?>
	<?php endif; ?>
</div>