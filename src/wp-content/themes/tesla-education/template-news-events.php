<?php 
	/*
	** Template name: Template News & Events
	*/
	get_header();
?>
<style>
	.nav-anchor.active ul li a.active{
		color: #F05A25;
    	text-decoration: underline;
	}
	.nav-anchor.active ul li a{
		border: 0;
		padding: 0;
	}
</style>
<main>
    <section class="page__title-area page__title-height page__title-overlay d-flex align-items-end" style="background-image: url(<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>);">
		<div class="container">
			<div class="row">
				<div class="col-xxl-12">
					<div class="page__title-wrapper mb-30 mb-40-mob">
						<h1 class="page__title"><?php the_title(); ?></h1> 
					</div>
				</div>
			</div>
		</div>
	</section>	
	<section>
		<div class="container mb-30">
			<div class="row">
				<div class="col-xxl-12">
					<nav class="nav-anchor active mt-60 mb-60 mt-30-mob mb-30-mob">
						<ul class="nav nav-tabs border-0" role="tablist">
							<li class="nav-item" role="presentation">
								<a id="news-events-tab" class="nav-link active view_txt_cursor custom_cursor_hover" href="#all-list" title="" data-bs-toggle="tab" role="tab" aria-controls="all-list"><?php if(pll_current_language() == 'vi'){ echo 'Tất cả'; }else{echo 'All'; } ?></a>
							</li>
							<?php if(pll_current_language() == 'vi'): ?>
								<li class="nav-item" role="presentation">
									<a id="news-tabs" class="nav-link view_txt_cursor custom_cursor_hover" href="<?php echo get_term_link(21, 'category-news_events') ?>" title="" >Tin tức</a>
								</li>
								<li class="nav-item" role="presentation">
									<a id="events-tabs" class="nav-link view_txt_cursor custom_cursor_hover" href="<?php echo get_term_link(22, 'category-news_events') ?>" title="">Sự kiện</a>
								</li>
							<?php elseif(pll_current_language() == 'en'): ?>
								<li class="nav-item" role="presentation">
									<a id="news-tabs" class="nav-link view_txt_cursor custom_cursor_hover" href="<?php echo get_term_link(28, 'category-news_events') ?>" title="" >News</a>
								</li>
								<li class="nav-item" role="presentation">
									<a id="events-tabs" class="nav-link view_txt_cursor custom_cursor_hover" href="<?php echo get_term_link(25, 'category-news_events') ?>" title="">Events</a>
								</li>
							<?php endif; ?>
							
						</ul>
					</nav>
				</div>
			</div>
			
			<div class="tab-content">
				<div class="tab-pane fade show active" id="all-list" role="tabpanel" aria-labelledby="news-events-tabs">
				  	<div class="row">
				  		<?php 
				  		$paged = get_query_var('paged') ? get_query_var('paged') : 1;
				  		$query = new WP_Query(array(
							'post_type' => 'news_events',
							'post_status' => 'publish',
							'posts_per_page' =>  12,
							'orderby' => 'date',
							'order'   => 'DESC',
							'paged' 			=> $paged,
							'number_post'		=> -1,
						)); 

						if($query->have_posts()):
					
						while ( $query->have_posts() ) : $query->the_post();
						
							$srcImage = get_the_post_thumbnail_url( get_the_ID(), 'custom-image-size-600-600' );
							$categories = get_the_terms(get_the_ID(),'category-news_events');
						?>
							<div class="col-xxl-4 col-xl-4 col-lg-4 col-sm-6 col-12">
								<div class="blog__item white-bg mb-30 transition-3 fix custom_cursor_hover scroll_view_more_txt">
									<div class="blog__thumb w-img fix p-relative">
										<a href="<?php the_permalink(); ?>" title="">
											<img src="<?php echo $srcImage; ?>" alt="" title=""/>	
										</a>
										<div class="conten-hover">
											<label><?php echo $categories[0]->name; ?></label>
											<div class="bg-blue">
												<div class="blog__meta"><?php the_date(); ?></div>
												<div class="blog__title"><a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a></div>
												<div class="blog__excerpt"><?php echo get_post_meta(get_the_ID(), 'custom_excerpt', true); ?></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php endwhile; endif; wp_reset_postdata(); ?>
					</div>	
					<?php 
					$big = 999999999;
						$pages = paginate_links(array(
						    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
						    'format' => '?page=%#%',
						    'current' => max(1, get_query_var('paged')),
						    'total' => $query->max_num_pages,
						    'type' => 'array',
						    'prev_next' => TRUE,
						    'prev_text' => '<<',
						    'next_text' => '>>',
						        ));
						if (is_array($pages)) {
						    $current_page = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
						    echo '<div class="paging-box mb-70 mb-30-mob mt-20 mt-0-mob"><ul class="wp-pagenavi">';
						    foreach ($pages as $i => $page) {
						        if ($current_page == 1 && $i == 0) {
						            echo "<li class='active'>$page</li>";
						        } else {
						            if ($current_page != 1 && $current_page == $i) {
						                echo "<li class='active'>$page</li>";
						            } else {
						                echo "<li>$page</li>";
						            }
						        }
						    }
						    echo '</ul></div>';
						} ?>
				</div>
			</div>			
							
		</div>
	</section>

</main>

<?php get_footer(); ?>
