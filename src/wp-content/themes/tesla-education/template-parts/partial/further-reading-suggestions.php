<?php $further_reading_suggestions_section_template = get_field('further_reading_suggestions_section_template');
	$background_image = esc_url( $further_reading_suggestions_section_template['background_image'] );
?>
<?php if(!empty($background_image)) { ?>
	<?php if( have_rows('further_reading_suggestions_section_template') ): ?>
	    <?php while( have_rows('further_reading_suggestions_section_template') ): the_row(); 
	        $background_image = get_sub_field('background_image');
	        $title = get_sub_field('title');
		?>
		<div id="further-reading-suggestions" class="container-fuild fix bg-gradient-f0f0f0" data-background="<?php echo $background_image; ?>">
			<div class="container">
				<div class="row">
					<div class="col-xxl-5 col-xl-4 col-lg-4 col-sm-12 center-vertical start">
						<div class="section-title fz-40 c-black mb-0 aos-item" data-aos="fade-up" data-aos-duration="500" data-max-width="450px"><?php echo $title; ?></div>
					</div>
					<div class="col-xxl-3 col-xl-5 col-lg-5 col-sm-12">
						<ul class="list-suggestions aos-item" data-aos="fade-up" data-aos-duration="750">
							<?php if( have_rows('details_post') ): ?>
							    <?php while( have_rows('details_post') ): the_row(); 
							        $content = get_sub_field('content');
							        $title = get_sub_field('title');
							        $link = get_sub_field('link'); 
						    ?>
							<li>
								<a class="open_cursor custom_cursor_hover" href="<?php echo $link; ?>" title=""> <strong><?php echo $title; ?></strong> <br/><?php echo $content; ?></a>
							</li>
							<?php endwhile; ?>
							<?php endif; ?>
						</ul>
					</div>
					<?php if( have_rows('quick_info_template') ): ?>
					    <?php while( have_rows('quick_info_template') ): the_row(); 
					        $title = get_sub_field('title');
				    ?>
					<div class="col-xxl-4 col-xl-3 col-lg-3 col-sm-12 center-vertical end">
						<div class="quick-info custom_cursor_hover no_text_cursor aos-item" data-aos="fade-up" data-aos="fade-up" data-aos-duration="1000">
							<label><?php echo $title; ?></label>
							<div class="dropdown">
								<button class="dropdown-toggle" type="button" id="dropdown-menu" data-bs-toggle="dropdown" aria-expanded="false"> <?php echo $title; ?> </button>
								<ul class="dropdown-menu" aria-labelledby="dropdown-menu">
									<?php if( have_rows('sub_menu') ): ?>
									    <?php while( have_rows('sub_menu') ): the_row(); 
									        $title = get_sub_field('title');
									        $link = get_sub_field('link');
								    ?>
									<li><a href="<?php echo $link; ?>"><?php echo $title; ?></a></li>
									<?php endwhile; ?>
									<?php endif; ?>
								</ul>
							</div>
						</div>
					</div>
					<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php endwhile; ?>
		<?php endif; ?>
<?php } elseif(empty($background_image)) { ?>	
	<?php if(get_locale() == 'vi') { ?>
	<?php if( have_rows('phan_de_xuat_doc_them', 'option') ): ?>
	    <?php while( have_rows('phan_de_xuat_doc_them', 'option') ): the_row(); 
	        $anh_nen = get_sub_field('anh_nen');
	        $tieu_de = get_sub_field('tieu_de');
	?>
	<div id="further-reading-suggestions" class="container-fuild fix bg-gradient-f0f0f0" data-background="<?php echo $anh_nen; ?>">
		<div class="container">
			<div class="row">
				<div class="col-xxl-5 col-xl-4 col-lg-4 col-sm-12 center-vertical start">
					<div style="font-size: 30px;" class="section-title c-black mb-0 aos-item" data-aos="fade-up" data-aos-duration="500" data-max-width="350px"><?php echo $tieu_de; ?></div>
				</div>
				<div class="col-xxl-3 col-xl-5 col-lg-5 col-sm-12">
					<ul class="list-suggestions aos-item" data-aos="fade-up" data-aos-duration="750">
						<?php if( have_rows('chi_tiet_bai_viet', 'option') ): ?>
						    <?php while( have_rows('chi_tiet_bai_viet', 'option') ): the_row(); 
						        $noi_dung = get_sub_field('noi_dung');
						        $tieu_de = get_sub_field('tieu_de');
						        $lien_ket = get_sub_field('lien_ket'); 
					    ?>
						<li>
							<a class="open_cursor custom_cursor_hover" href="<?php echo $lien_ket; ?>" title=""> <strong><?php echo $tieu_de; ?></strong> <br/><?php echo $noi_dung; ?></a>
						</li>
						<?php endwhile; ?>
						<?php endif; ?>
					</ul>
				</div>
				<?php if( have_rows('tim_hieu_nhanh', 'option') ): ?>
				    <?php while( have_rows('tim_hieu_nhanh', 'option') ): the_row(); 
				        $tieu_de = get_sub_field('tieu_de');
			    ?>
				<div class="col-xxl-4 col-xl-3 col-lg-3 col-sm-12 center-vertical end">
					<div class="quick-info custom_cursor_hover no_text_cursor aos-item" data-aos="fade-up" data-aos="fade-up" data-aos-duration="1000">
						<label><?php echo $tieu_de; ?></label>
						<div class="dropdown">
							<button class="dropdown-toggle" type="button" id="dropdown-menu" data-bs-toggle="dropdown" aria-expanded="false"> <?php echo $tieu_de; ?> </button>
							<ul class="dropdown-menu" aria-labelledby="dropdown-menu">
								<?php if( have_rows('sub_menu', 'option') ): ?>
								    <?php while( have_rows('sub_menu', 'option') ): the_row(); 
								        $tieu_de = get_sub_field('tieu_de');
								        $lien_ket = get_sub_field('lien_ket');
							    ?>
								<li><a href="<?php echo $lien_ket; ?>"><?php echo $tieu_de; ?></a></li>
								<?php endwhile; ?>
								<?php endif; ?>
							</ul>
						</div>
					</div>
				</div>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php endwhile; ?>
	<?php endif; ?>
	<?php } else if(get_locale() == 'en_US') { ?>
		<?php if( have_rows('further_reading_suggestions_section', 'option') ): ?>
	    <?php while( have_rows('further_reading_suggestions_section', 'option') ): the_row(); 
	        $background_image = get_sub_field('background_image');
	        $title = get_sub_field('title');
	?>
	<div id="further-reading-suggestions" class="container-fuild fix bg-gradient-f0f0f0" data-background="<?php echo $background_image; ?>">
		<div class="container">
			<div class="row">
				<div class="col-xxl-5 col-xl-4 col-lg-4 col-sm-12 center-vertical start">
					<div class="section-title fz-40 c-black mb-0 aos-item" data-aos="fade-up" data-aos-duration="500" data-max-width="450px"><?php echo $title; ?></div>
				</div>
				<div class="col-xxl-3 col-xl-5 col-lg-5 col-sm-12">
					<ul class="list-suggestions aos-item" data-aos="fade-up" data-aos-duration="750">
						<?php if( have_rows('details_post', 'option') ): ?>
						    <?php while( have_rows('details_post', 'option') ): the_row(); 
						        $content = get_sub_field('content');
						        $title = get_sub_field('title');
						        $link = get_sub_field('link'); 
					    ?>
						<li>
							<a class="open_cursor custom_cursor_hover" href="<?php echo $link; ?>" title=""> <strong><?php echo $title; ?></strong> <br/><?php echo $content; ?></a>
						</li>
						<?php endwhile; ?>
						<?php endif; ?>
					</ul>
				</div>
				<?php if( have_rows('quick_info', 'option') ): ?>
				    <?php while( have_rows('quick_info', 'option') ): the_row(); 
				        $title = get_sub_field('title');
			    ?>
				<div class="col-xxl-4 col-xl-3 col-lg-3 col-sm-12 center-vertical end">
					<div class="quick-info custom_cursor_hover no_text_cursor aos-item" data-aos="fade-up" data-aos="fade-up" data-aos-duration="1000">
						<label><?php echo $title; ?></label>
						<div class="dropdown">
							<button class="dropdown-toggle" type="button" id="dropdown-menu" data-bs-toggle="dropdown" aria-expanded="false"> <?php echo $title; ?> </button>
							<ul class="dropdown-menu" aria-labelledby="dropdown-menu">
								<?php if( have_rows('sub_menu', 'option') ): ?>
								    <?php while( have_rows('sub_menu', 'option') ): the_row(); 
								        $title = get_sub_field('title');
								        $link = get_sub_field('link');
							    ?>
								<li><a href="<?php echo $link; ?>"><?php echo $title; ?></a></li>
								<?php endwhile; ?>
								<?php endif; ?>
							</ul>
						</div>
					</div>
				</div>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php endwhile; ?>
	<?php endif; ?>
	<?php } ?>
<?php } ?>