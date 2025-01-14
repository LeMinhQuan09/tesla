<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Tesla
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
	.page__title-height 
	{
    	min-height: 340px;
	}
</style>
<?php 
	if(get_locale() == 'vi') { 
		$title = get_field('title_vn', 'option');
	}
	else if(get_locale() == 'en_US') { 
		$title = get_field('title_en', 'option');
	}
?>
<main>
    <section class="page__title-area page__title-height page__title-overlay d-flex align-items-end" data-background="<?php the_field('background_image_search', 'option'); ?>">
		<div class="container">
			<div class="row">
				<div class="col-xxl-12">
					<div class="page__title-wrapper mb-70 mb-40-mob">
						<h1 class="page__title">
							<?php echo !empty($title)?$title:get_field("title_en"); ?>
						</h1> 
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="mb-30 mt-50">
			<div class="container page-search">
				<?php if(get_locale() == 'vi') { ?>
					<?php if ( have_posts() ) : ?>
						<h1 class="page-title">
						<?php
						/* translators: Search query. */
						printf( __( 'Kết Quả Tìm Kiếm Cho : %s', 'Tesla' ), '<span>' . get_search_query() . '</span>' );
						?>
						</h1>
						<?php get_search_form(); ?>
					<?php else : ?>
						<h1 class="page-title"><?php _e( 'Không Tìm Thấy', 'Tesla' ); ?></h1>
						<?php get_search_form(); ?>
					<?php endif; ?>	
				<?php } elseif(get_locale() == 'en_US') { ?>
					<?php if ( have_posts() ) : ?>
						<h1 class="page-title">
						<?php
						/* translators: Search query. */
						printf( __( 'Search Results for: %s', 'Tesla' ), '<span>' . get_search_query() . '</span>' );
						?>
						</h1>
						<?php get_search_form(); ?>
						<?php else : ?>
						<h1 class="page-title"><?php _e( 'Nothing Found', 'Tesla' ); ?></h1>
						<?php get_search_form(); ?>
					<?php endif; ?>	
				<?php } ?>
			</div>
		</section>
	<section>
		<div class="container pt-4">
		  	<div class="row py-4">
		  	<?php
		  		$paged = get_query_var('paged') ? get_query_var('paged') : 1; 
		  		$query = new WP_Query(array(
							'post_type' => array('news_events', 'tesla_talk', 'cafeteria', 'parent_learning', 'page'),
							'post_status' => 'publish',
							'paged' 			=> $paged,
							'number_post'		=> -1,
							's' => !empty($_GET['s'])? $_GET['s']:'',
						)); 

				if($query->have_posts()):
			
				while ( $query->have_posts() ) : $query->the_post();
				
					$srcImage = get_the_post_thumbnail_url( get_the_ID(), 'full' );
					$categories = get_the_terms(get_the_ID(),'category-news_events');
				?>
					<div class="col-xxl-12">
						<div class="content content-block aos-item aos-init aos-animate" data-aos="fade-up" data-max-width="1200px" style="max-width: 1200px;">
							<div class="section-title mb-22 aos-item aos-init aos-animate" data-aos="fade-up">
								<a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a>
							</div>
							<div class="summary"><p><?php echo get_post_meta(get_the_ID(), 'custom_excerpt', true); ?></p></div>
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
	</section>

	<?php
		get_template_part('template-parts/partial/further-reading-suggestions', 'partial');
		get_template_part('template-parts/partial/next-prev-page', 'partial');
	?>
	
</main>
<?php get_footer(); ?>