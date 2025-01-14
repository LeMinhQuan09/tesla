<?php 
	/*
	** Template name: Template Parent Learning
	*/
	get_header();
?>

<main class="cl-parent-learning">
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
	
	<div class="container mt-100 mb-100 mt-30-mob mb-30-mob">
		<div class="row">
			<div class="col-xxl-12">
				<div class="content term aos-item" data-aos="fade-up" data-max-width="1300px">	
					<?php the_content(); ?>
				</div>
			</div>
	    </div>
	</div>
	
	<div class="container overflow-inherit mt-100 mb-50 mt-30-mob mb-30-mob">
		<div class="row mb-4">
			<?php 
			$paged = get_query_var('paged') ? get_query_var('paged') : 1;
			$query = new WP_Query(array(
				'post_type' => 'parent_learning',
				'post_status' => 'publish',
				'posts_per_page' =>  6,
				'orderby' => 'date',
				'order'   => 'DESC',
				'paged' 			=> $paged,
				'number_post'		=> -1,
			)); 

			if($query->have_posts()):
		
			while ( $query->have_posts() ) : $query->the_post();
			
			$srcImage = get_the_post_thumbnail_url( get_the_ID(), 'custom-image-size-600-600' ); ?>
			
				<div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
					<div class="blog__item white-bg mb-30 transition-3 fix custom_cursor_hover scroll_view_more_txt">
						<div class="blog__thumb w-img fix">
						   <a href="<?php the_permalink(); ?>" title=""> <img src="<?php echo $srcImage; ?>" alt="" title=""/> </a>
						</div>
						<div class="blog__content">
							<div class="blog__title"><a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a></div>
							<div class="blog__excerpt"><p><?php echo get_post_meta(get_the_ID(), 'custom_excerpt', true); ?></p></div>
							<div class="blog__read-more v2"><a href="<?php the_permalink(); ?>" title=""><?php if(pll_current_language() == 'en'){echo 'Read more '; }else{echo 'Xem Thêm '; } ?><i class="fal fa-angle-right"></i></a></div>
						</div>
					</div>
				</div>
			<?php endwhile; endif; wp_reset_postdata(); ?>
	    </div>
	    <?php $big = 999999999;
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
			    echo '<div class="paging-box"><ul class="wp-pagenavi">';
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
			}
		?>
	</div>
	
	
</main>

<?php get_footer(); ?>
