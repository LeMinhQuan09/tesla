<?php 
	get_header();

	if (get_field('background_feature_image')):
		$bg_img = get_field('background_feature_image')['url'];
setPostViews(get_the_ID()); //CODE CREATE COUNTER FOR ARTICLES
	endif; 

	$categories = get_the_terms(get_the_ID(),'category-news_events');
	$current_lang = get_locale();
?>
<style>
	@media only screen and (min-width: 1200px){
		.sidebar__tag a{
			white-space: nowrap;
		}
	}	
</style>

<main>
    <section class="page__title-area page__title-height page__title-overlay d-flex align-items-end" data-background="<?php echo $bg_img; ?>">
		<div class="container">
			<div class="row">
				<div class="col-xxl-12">
					<div class="page__title-wrapper mb-70 mb-40-mob">
						<div class="page__title"><?php echo $categories[0]->name; ?></div> 
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section class="blog__area pt-80 pt-30-mob pb-80 pb-30-mob single-content">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-xl-8 col-lg-8">
                    <div class="blog__wrapper">
                        <h1 class="blog__title mt-0"><?php the_title(); ?></h1>
						<div class="blog__meta">
							<span><i class="far fa-user-circle"></i> Tesla Education</span>
							<span><i class="far fa-calendar-alt"></i> <?php the_date(); ?></span>
							<span><i class="far fa-clock"></i> <?php the_time(); ?></span>
                        </div>						
						<?php the_content(); ?>
					</div>
				</div>
                <div class="col-xxl-4 col-xl-4 col-lg-4">
                    <div class="blog__sidebar pl-30">
						<div class="sidebar__widget sidebar__form">
							<?php $sidebar_post_vi = get_field('sidebar_post_vi','option');
							$sidebar_post_en = get_field('sidebar_post_en','option'); ?>
							<div class="sidebar__form-wrapper">
								<?php if($current_lang == 'vi'){
									if(have_rows('sidebar_post_vi','option')){ ?>
										<?php while(have_rows('sidebar_post_vi','option')){
											the_row();
											$title = get_sub_field('title_vi');
											$form = get_sub_field('shortcode_form_vi');
											echo '<div class="sidebar__form-header">';
											if($title){
												echo '<p class="title">'. $title .'</p>';
											}
											echo '</div>';
											if($form){
												echo '<div class="sidear__form-body">';
												echo do_shortcode($form);
												echo '</div>';
											}
										}
									}
								} elseif($current_lang == 'en_US'){
									if(have_rows('sidebar_post_en','option')){ ?>
										<?php while(have_rows('sidebar_post_en','option')){
											the_row();
											$title = get_sub_field('title');
											$form = get_sub_field('shortcode_form');
											echo '<div class="sidebar__form-header">';
											if($title){
												echo '<p class="title">'. $title .'</p>';
											}
											echo '</div>';
											echo '<div class="sidear__form-body">';
											echo do_shortcode($form);
											echo '</div>';
										}
									}
								} ?>
								
							</div>
						</div>
                        <!-- <div class="sidebar__widget mb-30">
							<div class="sidebar__widget-head mb-25">
								<div class="sidebar__widget-title">Recent posts</div>
							</div>
                            <div class="sidebar__widget-content">
								<div class="rc__post-wrapper"> -->
								<?php 
								// $query = new WP_Query(array(
								// 	'post_type' => 'news_events',
								// 	'post_status' => 'publish',
								// 	'posts_per_page' =>  5,
								// 	'orderby' => 'date',
								// 	'order'   => 'DESC',
								// 	'post__not_in' 		=> array(get_the_ID()),
								// )); 
								// 	if($query->have_posts()):
								// 	while ( $query->have_posts() ) : $query->the_post();
								// 		$srcImage = get_the_post_thumbnail_url( get_the_ID(), 'full' );
									?>
									<!-- <div class="rc__post d-flex align-items-center">
										<div class="rc__thumb mr-20"> <a href="<?php //the_permalink(); ?>"><img src="<?php //echo $srcImage; ?>" alt=""></a> </div>
										<div class="rc__content">
											<div class="rc__title"><a href="<?php //the_permalink(); ?>"><?php //the_title(); ?></a></div>
										</div>
									</div> -->
								<?php //endwhile;
								//endif;
								//wp_reset_postdata(); ?>
								<!-- </div>
							</div>
                        </div> -->
                    </div>
                </div>
            </div>

			<div class="related-posts mt-50">
				<p class="title mb-30"><?php echo __('Có thể bạn quan tâm','tesla-education') ?></p>
				<ul class="article-list d-flex align-items-center row">
					<?php 
						$query = new WP_Query(array(
							'post_type' => 'news_events',
							'post_status' => 'publish',
							'posts_per_page' =>  4,
							'orderby' => 'date',
							'order'   => 'DESC',
							'post__not_in' => array(get_the_ID()),
						)); 
						if($query->have_posts()):
						while ( $query->have_posts() ) : $query->the_post();
							$srcImage = get_the_post_thumbnail_url( get_the_ID(), 'full' );
						?>
						<li class="col-lg-6 col-sm-12">
							<div class="item d-flex align-items-center mb-30">
								<div class="thumbnail">
									<a href="<?php the_permalink(); ?>" class="d-block"><img src="<?php echo $srcImage; ?>" alt=""></a>
								</div>
								<div class="content pl-20 pr-20">
									<div class="info d-flex align-items-center mb-15">
										<div class="blog-cats">
										<?php
										$categories_related = get_the_terms(get_the_ID(),'category-news_events');
											if (!empty($categories_related)) {
												foreach ($categories_related as $category) {
													echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="cat-item">' . esc_html($category->name) . '</a> ';
												}
											}
										?>
										</div>
										<span class="post-day ml-15"><?php echo get_the_date(); ?></span>
									</div>
									<div class="rc__title">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</div>
								</div>
							</div>
						</li>
						<?php endwhile;
						endif;
						wp_reset_postdata();
					?>
				</ul>
			</div>
        </div>  
	</section>
	
</main>

<?php
	get_footer();
?>
