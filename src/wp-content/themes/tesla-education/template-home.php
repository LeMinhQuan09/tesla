<?php
/**
 * Template Name: Home Page
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Tesla
 * @since Tesla 1.0
 */

get_header(); ?>
<main>
    <!-- hero area start -->
	<section class="slider__area p-relative custom_cursor_hover">
		<div class="slider__wrapper swiper-container scroll_cursor scroll_cursor_txt">
			<div class="swiper-wrapper">
				<?php if( have_rows('banner_section') ): ?>
				    <?php while( have_rows('banner_section') ): the_row(); 
				        $video = get_sub_field('video_mp4');
				        $title = get_sub_field('title');
				        $button_title = get_sub_field('button_title');
				        $button_link = get_sub_field('button_link');
		        ?>
				<div class="single-slider swiper-slide slider__height slider__overlay d-flex align-items-center">
					<video autoplay muted loop id="myVideo">
						<source src="<?php echo $video; ?>" type="video/mp4">
						Your browser does not support HTML5 video.
					</video>
					<div class="slider__content">
						<a href="<?php echo $button_link; ?>" class="e-btn slider__btn"> <i class="far fa-play-circle"></i> <?php echo $button_title; ?></a> 
						<div class="slider__title"><?php echo $title; ?></div>
					</div>
				</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
		<div class="swiper-container slider__nav d-none d-md-block">
			<div class="swiper-wrapper center">
				<div class="slider__nav-item swiper-slide"> </div>
				<div class="slider__nav-item swiper-slide"> </div>
			</div>
		</div>
		<a class="btn-scroll-down" href="#welcome-block" title=""> <i class="fal fa-arrow-down"></i> </a>
	</section>
	<section class="sec-the-content">
		<div class="container">
			<?php the_content(); ?>
		</div>
	</section>
    <!-- hero area end -->
	<!-- welcome -->
	<section id="welcome-block">
		<div class="container-fuild">
			<?php if( have_rows('content_section') ): ?>
			    <?php while( have_rows('content_section') ): the_row(); 
			        $image_left = get_sub_field('image_left');
			        $image_mobile = get_sub_field('image_mobile');
			        $title = get_sub_field('title');
			        $content = get_sub_field('content');
			        $button_title = get_sub_field('button_title');
			        $button_link = get_sub_field('button_link');
        	?>
			<div class="welcome-image custom_cursor_hover no_text_cursor">
				<img class="aos-item" data-aos="fade-right" src="<?php echo $image_left; ?>" alt="" title=""/>
			</div>
			<div class="content-block">
				<div class="section-title aos-item" data-aos="fade-zoom-in"><?php echo $title; ?></div>
				<div class="summary mb-40 aos-item" data-aos="fade-up"><?php echo $content; ?></div>
				<a href="<?php echo $button_link; ?>" class="e-btn aos-item open_cursor custom_cursor_hover" data-aos="fade-up"><?php echo $button_title; ?><i class="far fa-long-arrow-right"></i></a>
				<img class="welcome-image aos-item" data-aos="flip-left" src="<?php echo $image_mobile; ?>" alt="" title=""/>
				<div class="items">
					<?php if( have_rows('our_school') ): ?>
					    <?php while( have_rows('our_school') ): the_row(); 
					        $image = get_sub_field('image');
					        $title = get_sub_field('title');
					        $button_title = get_sub_field('button_title');
					        $button_link = get_sub_field('button_link');
		        	?>
					<div class="item aos-item custom_cursor_hover open_cursor" data-aos="fade-up" data-aos-duration="500">
						<div class="thumb">
							<a href="<?php echo $button_link; ?>" title=""> <img src="<?php echo $image; ?>" alt="" title=""/> </a>
						</div>
						<div class="content">
							<p class="title"><a href="<?php echo $button_link; ?>" title=""><?php echo $title; ?></a></p>
							<p class="read-more"><a href="<?php echo $button_link; ?>" title=""><?php echo $button_title; ?></a></p>
						</div>
					</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
				<?php endwhile; ?>
			<?php endif; ?>
	 </section>
	 <!-- welcome -->
	
    <!-- quick info -->
	<section id="quick-info" class="bg-blue">
		<?php if( have_rows('content_section_2') ): ?>
			    <?php while( have_rows('content_section_2') ): the_row(); 
			        $title = get_sub_field('title');
    	?>
		<div class="section-title text-center c-white aos-item" data-aos="fade-up" data-aos-duration="500"><?php echo $title; ?></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<ul class="list-quick-info">
						<?php if( have_rows('infomation') ): ?>
							    <?php while( have_rows('infomation') ): the_row(); 
							        $image = get_sub_field('image');
							        $title = get_sub_field('title');
							        $link = get_sub_field('link');
				    	?>
						<li class="aos-item" data-aos="flip-right" data-aos-duration="500">
							<a class="custom_cursor_hover white_cursor open_cursor" href="<?php echo $link;?>" title=""> <img src="<?php echo $image;?>" alt="" title=""/> <span><?php echo $title;?></span> </a>
						</li>
							<?php endwhile; ?>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</div>
			<?php endwhile; ?>
		<?php endif; ?>
	</section>
    <!-- quick info -->
	
    <!-- early years -->
	<div class="space-90 p-relative line after-right-50 space-50-mob"></div>
	<section id="early-years" class="p-relative timeline after-right-50">
		<div class="wrap">
			<div class="container-fuild">
				<div class="row">
					<?php if( have_rows('content_section_left') ): ?>
				    <?php while( have_rows('content_section_left') ): the_row(); 
				        $school_level = get_sub_field('school_level');
				        $age = get_sub_field('age');
				        $content = get_sub_field('content');
				        $button_title = get_sub_field('button_title');
				        $button_link = get_sub_field('button_link');
				        $image = get_sub_field('image');
				        $step = get_sub_field('step');
				        $content_2 = get_sub_field('content_2');
				        $text = get_sub_field('text');
	        		?>
					<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding center-vertical">
						<div class="content content-block route">
							<div class="section-title-first aos-item" data-aos="fade-up" data-aos-duration="500"><?php echo $school_level; ?></div>
							<div class="section-title aos-item" data-aos="fade-up" data-aos-duration="500"><?php echo $age; ?></div>
							<div class="summary aos-item" data-aos="fade-up" data-aos-duration="500"><?php echo $content; ?></div>
							<a href="<?php echo $button_link; ?>" class="e-btn aos-item open_cursor custom_cursor_hover" data-aos="fade-up" data-aos-duration="500"><?php echo $button_title; ?><i class="far fa-long-arrow-right"></i></a>
						</div>
					</div>
					<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding fix">
						<div class="p-relative bg hei-540 custom_cursor_hover no_text_cursor hover-bg" style="background-image: url('<?php echo $image; ?>');">
							<img class="wid-100 hidden" src="<?php echo $image; ?>" alt="" title=""/>
							<div class="text-on-image">
								<div class="title aos-item" data-aos="fade-left" data-aos-duration="500"><?php echo $step; ?></div>
								<div class="summary aos-item" data-aos="fade-left" data-aos-duration="750"><?php echo $content_2; ?></div>
								<div class="title-vandella aos-item" data-aos="fade-up" data-aos-duration="5000"><?php echo $text; ?></div>
							</div>
						</div>
					</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
    <!-- early years -->
	
    <!-- primary years -->
	<div class="space-50 p-relative line after-right-50"></div>
	<div class="space-4 p-relative line"></div>
	<div class="space-50 p-relative line after-left-50 space-50-mob"></div>
	<div class="bf-bg-gray"></div>
	<section id="primary-years" class="p-relative timeline after-left-50 pb-60">
		<div class="wrap">
			<div class="container-fuild">
				<div class="row flex-column-reverse flex-lg-row">
					<?php if( have_rows('content_section_right') ): ?>
				    <?php while( have_rows('content_section_right') ): the_row(); 
				        $school_level = get_sub_field('school_level');
				        $age = get_sub_field('age');
				        $content = get_sub_field('content');
				        $button_title = get_sub_field('button_title');
				        $button_link = get_sub_field('button_link');
				        $image = get_sub_field('image');
				        $step = get_sub_field('step');
	        		?>
					<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding fix">
						<div class="p-relative bg hei-540 right custom_cursor_hover no_text_cursor hover-bg" style="background-image: url('<?php echo $image; ?>');">
							<img class="wid-100 hidden" src="<?php $image; ?>" alt="" title=""/>
							<div class="text-on-image right">
								<div class="title text-right maxw-500 aos-item" data-aos="fade-right" data-aos-duration="500"><?php echo $step; ?></div>
							</div>
						</div>
					</div>
					<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding center-vertical start  align-end">
						<div class="content content-block route right">
							<div class="section-title-first aos-item" data-aos="fade-up" data-aos-duration="500"><?php echo $school_level; ?></div>
							<div class="section-title aos-item" data-aos="fade-up" data-aos-duration="500"><?php echo $age; ?></div>
							<div class="summary aos-item" data-aos="fade-up" data-aos-duration="500"><?php echo $content; ?></div>
							<a href="<?php echo $button_link; ?>" class="e-btn aos-item open_cursor custom_cursor_hover" data-aos="fade-up" data-aos-duration="500"><?php echo $button_title; ?><i class="far fa-long-arrow-right"></i></a>
						</div>
					</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
    <!-- primary years -->
	
	<!-- middle years -->
	<div class="space-20 p-relative line after-left-50"></div>
	<div class="space-4 p-relative line"></div>
	<div class="space-50 p-relative line after-right-50"></div>
	<section id="middle-years" class="p-relative timeline after-right-50">
		<div class="wrap">
			<div class="container-fuild">
				<div class="row">
					<?php if( have_rows('content_section_left_2') ): ?>
				    <?php while( have_rows('content_section_left_2') ): the_row(); 
				        $school_level = get_sub_field('school_level');
				        $age = get_sub_field('age');
				        $content = get_sub_field('content');
				        $button_title = get_sub_field('button_title');
				        $button_link = get_sub_field('button_link');
				        $image = get_sub_field('image');
				        $step = get_sub_field('step');
	        		?>
					<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding center-vertical">
						<div class="content content-block route">
							<div class="section-title-first aos-item" data-aos="fade-up" data-aos-duration="500"><?php echo $school_level; ?></div>
							<div class="section-title aos-item" data-aos="fade-up" data-aos-duration="500"><?php echo $age; ?></div>
							<div class="summary aos-item" data-aos="fade-up" data-aos-duration="500"><?php echo $content; ?></div>
							<a href="<?php echo $button_link; ?>" class="e-btn aos-item open_cursor custom_cursor_hover" data-aos="fade-up" data-aos-duration="500"><?php echo $button_title; ?><i class="far fa-long-arrow-right"></i></a>
						</div>
					</div>
					<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding fix">
						<div class="p-relative bg hei-540 custom_cursor_hover no_text_cursor hover-bg" style="background-image: url('<?php echo $image; ?>');">
							<img class="wid-100 hidden" src="<?php echo $image; ?>" alt="" title=""/>
							<div class="text-on-image">
								<div class="title aos-item" data-aos="fade-left" data-aos-duration="500"><?php echo $step; ?></div>
							</div>
						</div>
					</div>
					<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
    <!-- middle years -->
	
	<!-- diploma programme -->
	<div class="space-50 p-relative line after-right-50 "></div>
	<div class="space-4 p-relative line"></div>
	<div class="space-50 p-relative line after-left-50 space-50-mob "></div>
	<section id="diploma-programme" class="p-relative timeline after-left-50">
		<div class="wrap">
			<div class="container-fuild">
				<div class="row flex-column-reverse flex-lg-row">
					<?php if( have_rows('content_section_right_2') ): ?>
				    <?php while( have_rows('content_section_right_2') ): the_row(); 
				        $school_level = get_sub_field('school_level');
				        $age = get_sub_field('age');
				        $content = get_sub_field('content');
				        $button_title = get_sub_field('button_title');
				        $button_link = get_sub_field('button_link');
				        $image = get_sub_field('image');
				        $step = get_sub_field('step');
	        		?>
					<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding fix">
						<div class="p-relative bg hei-540 right custom_cursor_hover no_text_cursor hover-bg" style="background-image: url('<?php echo $image; ?>');">
							<img class="wid-100 hidden" src="<?php echo $image; ?>" alt="" title=""/>
							<div class="text-on-image right">
								<div class="title text-right maxw-500 aos-item" data-aos="fade-right" data-aos-duration="500"><?php echo $step; ?></div>
							</div>
						</div>
					</div>
					<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding center-vertical start">
						<div class="content content-block route right">
							<div class="section-title-first aos-item" data-aos="fade-up" data-aos-duration="500"><?php echo $school_level; ?></div>
							<div class="section-title aos-item" data-aos="fade-up" data-aos-duration="500"><?php echo $age; ?></div>
							<div class="summary aos-item" data-aos="fade-up" data-aos-duration="500"><?php echo $content; ?></div>
							<a href="<?php echo $button_link; ?>" class="e-btn aos-item open_cursor custom_cursor_hover" data-aos="fade-up" data-aos-duration="500"><?php echo $button_title; ?><i class="far fa-long-arrow-right"></i></a>
						</div>
					</div>
					<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
    <!-- primary years -->
	
	<!-- ib learner profile -->
	<div class="space-50 p-relative line after-left-50"></div>
	<div class="space-4 p-relative line"></div>
	<div class="space-50 p-relative line after-right-50 space-50-mob"></div>
	<section id="ib-learner-profile" class="p-relative timeline after-right-50">
		<div class="container-fuild">
			<div class="row">
				<?php if( have_rows('content_section_left_3') ): ?>
			    <?php while( have_rows('content_section_left_3') ): the_row(); 
			        $school_level = get_sub_field('school_level');
			        $age = get_sub_field('age');
			        $content = get_sub_field('content');
			        $button_title = get_sub_field('button_title');
			        $button_link = get_sub_field('button_link');
			        $image = get_sub_field('image');
			        $step = get_sub_field('step');
        		?>
				<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding center-vertical">
					<div class="content content-block route">
						<div class="section-title-first aos-item" data-aos="fade-up" data-aos-duration="500"><?php echo $school_level; ?></div>
						<div class="section-title aos-item" data-aos="fade-up" data-aos-duration="500"><?php echo $age; ?></div>
						<div class="summary aos-item" data-aos="fade-up" data-aos-duration="500"><?php echo $content; ?></div>
						<a href="<?php echo $button_link; ?>" class="e-btn aos-item open_cursor custom_cursor_hover" data-aos="fade-up" data-aos-duration="500"><?php echo $button_title; ?><i class="far fa-long-arrow-right"></i></a>
					</div>
				</div>
				<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding fix">
					<div class="p-relative bg hei-540 custom_cursor_hover no_text_cursor hover-bg" style="background-image: url('<?php echo $image; ?>');">
						<img class="wid-100 hidden" src="<?php echo $image; ?>" alt="" title=""/>
						<div class="text-on-image">
							<div class="title maxw-600 aos-item" data-aos="fade-left" data-aos-duration="500"><?php echo $step; ?></div>
						</div>
					</div>
				</div>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</section>
	<div class="space-90 p-relative line after-right-50 space-50-mob"></div>
    <!-- middle years -->
	
	<!-- our core values -->
	<section id="our-core-values" class="bg-gray pt-55 pb-30">
		<?php if( have_rows('content_section_3') ): ?>
			    <?php while( have_rows('content_section_3') ): the_row(); 
			        $title = get_sub_field('title');
    	?>
		<div class="section-title text-center aos-item" data-aos="fade-up" data-aos-duration="500"><?php echo $title; ?></div>
		<div class="container">
			<div class="row">
				<?php if( have_rows('infomation') ): ?>
					    <?php while( have_rows('infomation') ): the_row(); 
					        $image = get_sub_field('image');
					        $title = get_sub_field('title');
		    	?>
				<div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6">
					<div class="our-item mb-30 aos-item custom_cursor_hover view_txt_cursor" data-aos="fade-up" data-aos-duration="500">
						<div class="our-thumb w-img p-relative">
							<a href="#" title="Pioneering"> 
								<img src="<?php echo $image; ?>" alt=""> 
								<span class="yellow-bg yellow-bg-big"><?php echo $title; ?> <img src="<?php echo site_url(); ?>/wp-content/themes/tesla-education/assets/img/shape/yellow-bg.png" alt=""/></span>
							</a>
                        </div>
					</div>
				</div>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
		<?php endwhile; ?>
		<?php endif; ?>
	</section>
	<!-- our core values -->
	
	<!-- news -->
	<?php if( have_rows('news_events') ): ?>
			    <?php while( have_rows('news_events') ): the_row(); 
			        $title = get_sub_field('title');
	?>
	<section id="news" class="">
		<div class="container">
			<div class="section-title aos-item" data-aos="fade-up" data-aos-duration="500"><?php echo $title; ?></div>
			<div class="news__slider swiper-container aos-item" data-aos="fade-up" data-aos-duration="500">
				<div class="swiper-wrapper">
					<?php if( have_rows('details') ): ?>
					    <?php while( have_rows('details') ): the_row(); 
					        $title = get_sub_field('title');
					        $image = get_sub_field('image');
					        $description = get_sub_field('description');
					        $button_title = get_sub_field('button_title');
					        $button_link = get_sub_field('button_link');
					?>
                    <div class="swiper-slide">
						<div class="blog__item white-bg mb-30 transition-3 fix custom_cursor_hover scroll_view_more_txt">
							<div class="blog__thumb w-img fix">
							   <a href="<?php echo $button_link; ?>" title=""> <img src="<?php echo $image; ?>" alt="" title=""/> </a>
							</div>
							<div class="blog__content">
								<div class="blog__title"><a href="<?php echo $button_link; ?>" title=""><?php echo $title; ?></a></div>
								<div class="blog__excerpt"> <p><?php echo $description; ?></p> </div>
								<div class="blog__read-more"><a href="<?php echo $button_link; ?>" title=""><?php echo $button_title; ?></a></div>
							</div>
						</div>
					</div>
					<?php endwhile; ?>
						<?php endif; ?>
				</div>
				<!--div class="swiper-button-next swiper-nav"><i class="far fa-arrow-right"></i></div-->
                <!--div class="swiper-button-prev swiper-nav"><i class="far fa-arrow-left"></i></div-->
				<div class="swiper-pagination"></div>
			</div>
		</div>
	</section>
	<?php endwhile; ?>
		<?php endif; ?>
	<!-- news -->
	
	<!-- news -->
	<?php if( have_rows('list_news_events') ): ?>
			    <?php while( have_rows('list_news_events') ): the_row(); 
			        $title = get_sub_field('title');
	?>
	<section id="news" class="">
		<div class="container">
			<div class="section-title aos-item" data-aos="fade-up" data-aos-duration="500"><?php echo $title; ?></div>
			<div class="news__slider swiper-container aos-item" data-aos="fade-up" data-aos-duration="500">
				<div class="swiper-wrapper">
					<?php if( have_rows('list') ): ?>
					    <?php while( have_rows('list') ): the_row(); 
					        $featured_posts = get_sub_field('post');
					        $permalink = get_permalink( $featured_posts->ID );
					        $title = get_the_title( $featured_posts->ID );
					        $custom_excerpt = get_field( 'custom_excerpt', $featured_posts->ID );
					        $srcImage = get_the_post_thumbnail_url( $featured_posts->ID, 'home-page-size-600-350' );
					?>
                    <div class="swiper-slide">
						<div class="blog__item white-bg mb-30 transition-3 fix custom_cursor_hover scroll_view_more_txt">
							<div class="blog__thumb w-img fix">
							   <a href="<?php echo $permalink; ?>" title=""> <img src="<?php echo $srcImage; ?>" alt="" title=""/> </a>
							</div>
							<div class="blog__content">
								<div class="blog__title"><a href="<?php echo $permalink; ?>" title=""><?php echo $title; ?></a></div>
								<div class="blog__excerpt"> <p><?php echo $custom_excerpt; ?></p> </div>
								<?php if(get_locale() == 'vi') { ?>
								<div class="blog__read-more"><a href="<?php echo $permalink; ?>" title="">Xem Thêm</a></div>
								<?php } else if(get_locale() == 'en_US') { ?>
								<div class="blog__read-more"><a href="<?php echo $permalink; ?>" title="">Read More</a></div>
								<?php } ?>	
							</div>
						</div>
					</div>
					<?php endwhile; ?>
					<?php endif; ?>
				</div>
				
				<!--div class="swiper-button-next swiper-nav"><i class="far fa-arrow-right"></i></div-->
                <!--div class="swiper-button-prev swiper-nav"><i class="far fa-arrow-left"></i></div-->
				<div class="swiper-pagination"></div>
			</div>
		</div>
	</section>
	<?php endwhile; ?>
		<?php endif; ?>
	<!-- news -->

	<!-- our campuses -->
	<section id="our-campuses" class="">
		<div class="container-fuild">
			<div class="row">
				<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding">
					<div class="bg-gray mt-30 pt-55 pb-55">
						<?php if( have_rows('content_section_left_4') ): ?>
					    <?php while( have_rows('content_section_left_4') ): the_row(); 
					        $content = get_sub_field('content');
					        $title = get_sub_field('title');
					        $first_address_name = get_sub_field('first_address_name');
					        $first_address = get_sub_field('first_address');
					        $first_phone = get_sub_field('first_phone');
					        $first_email = get_sub_field('first_email');
					        $first_email_link = get_sub_field('first_email_link');
					        $second_address_name = get_sub_field('second_address_name');
					        $second_address = get_sub_field('second_address');
					        $second_phone = get_sub_field('second_phone');
					        $second_email = get_sub_field('second_email');
					        $second_email_link = get_sub_field('second_email_link');
					        $image = get_sub_field('image');
					        $image_2 = get_sub_field('image_2');
					        $sologan = get_sub_field('sologan');
		    			?>
						<div class="content route">
							<div class="section-title aos-item" data-aos="fade-up" data-aos-duration="500"><?php echo $title; ?></div>
							<div class="summary mb-40 maxw-550 aos-item" data-aos="fade-up" data-aos-duration="500"><?php echo $content; ?></div>
							<div class="our-campuses__tab-2 aos-item" data-aos="fade-up" data-aos-duration="500">
								<ul class="nav nav-tabs" id="our-campuses-tab" role="tablist">
									<li class="nav-item custom_cursor_hover no_text_cursor" role="presentation">
										<button class="nav-link active" id="tan-binh-campus-tab" data-bs-toggle="tab" data-bs-target="#tan-binh-campus" type="button" role="tab" aria-controls="tan-binh-campus" aria-selected="true"> <span><?php echo $first_address_name; ?></span> </button>
									</li>
									<li class="nav-item custom_cursor_hover no_text_cursor" role="presentation">
										<button class="nav-link " id="phu-nhuan-campus-tab" data-bs-toggle="tab" data-bs-target="#phu-nhuan-campus" type="button" role="tab" aria-controls="phu-nhuan-campus" aria-selected="false"> <span><?php echo $second_address_name; ?></span> </button>
									</li>
								</ul>
							</div>
							<div class="our-campuses__tab-content aos-item" data-aos="fade-up" data-aos-duration="500">
								<div class="tab-content" id="our-campusesTabContent">
									<div class="tab-pane fade show active" id="tan-binh-campus" role="tabpanel" aria-labelledby="tan-binh-campus-tab">
										<p class="c-blue-2"><i class="fal fa-map-marker-alt"></i> <?php echo $first_address; ?></p>
										<p class="c-blue-2"><i class="fal fa-phone-alt"></i> <?php echo $first_phone; ?></p>
										<p class="c-blue-2"><i class="fal fa-envelope"></i> <a class="custom_cursor_hover view_txt_cursor" href="mailto:<?php echo $first_email; ?>" title="<?php echo $first_email; ?>"><?php echo $first_email; ?></a></p>
									</div>
									<div class="tab-pane fade" id="phu-nhuan-campus" role="tabpanel" aria-labelledby="phu-nhuan-campus-tab">
										<p class="c-blue-2"><i class="fal fa-map-marker-alt"></i> <?php echo $second_address; ?></p>
										<p class="c-blue-2"><i class="fal fa-phone-alt"></i> <?php echo $second_phone; ?></p>
										<p class="c-blue-2"><i class="fal fa-envelope"></i> <a class="custom_cursor_hover view_txt_cursor" href="mailto:<?php echo $second_email; ?>" title="<?php echo $second_email; ?>"><?php echo $second_email; ?></a></p>
									</div>
								</div>
							</div>
						</div>
						<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
				<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding fix">
					<div class="bg-campus-1 p-relative bg custom_cursor_hover no_text_cursor hover-bg" style="background-image: url('<?php echo $image; ?>');">
						<img class="wid-100 hidden" src="<?php echo $image; ?>" alt="" title=""/>
						<div class="title-image aos-item" data-aos="fade-left" data-aos-duration="500"><?php echo $sologan; ?></div>
					</div>
					<div class="bg-campus-2 p-relative bg custom_cursor_hover no_text_cursor hover-bg" style="background-image: url('<?php echo $image_2; ?>');display: none;">
						<img class="wid-100 hidden" src="<?php echo $image; ?>" alt="" title=""/>
						<div class="title-image aos-item" data-aos="fade-left" data-aos-duration="500"><?php echo $sologan; ?></div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- our campuses -->
<style>
.narrative-line {
    transform: matrix(-1, 0, 0, -1, 0, 0);
    background: transparent linear-gradient( 
180deg, #FFFFFF 0%, #ffffff 62%, #ffffff00 100%) 0% 0% no-repeat padding-box;
    width: 80px;
}
</style>
	<!-- narrative line -->
	<div class="narrative-line" aria-hidden="false"></div>
	<!-- narrative line -->
</main>

<?php get_footer(); ?>