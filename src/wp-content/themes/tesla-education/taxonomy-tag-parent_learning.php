<?php 

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

    <section class="page__title-area page__title-height page__title-overlay d-flex align-items-end" style="    background: linear-gradient(to bottom right, #1b1464f2, #20c4ebd4); ">

		<div class="container">

			<div class="row">

				<div class="col-xxl-12">

					<div class="page__title-wrapper mb-70 mb-40-mob">

						<h1 class="page__title">

							<?php echo single_tag_title( '', false ); ?>

						</h1> 

					</div>

				</div>

			</div>

		</div>

	</section>

	<section>

		<div class="container pt-4 mb-50 mb-30-mob">

		  	<div class="row py-4">

		  	<?php 

		  		$paged = get_query_var('paged') ? get_query_var('paged') : 1;

		  		$id = get_queried_object();

		  		$query = new WP_Query(array(

					'post_type' => 'parent_learning',

					'post_status' => 'publish',

					'posts_per_page' =>  6,

					'orderby' => 'date',

					'order'   => 'DESC',

					'tax_query' => [

				        [

				            'taxonomy' => $id->taxonomy,

				            'terms' => $id->term_id,

				        ],			        

				    ],		

				    'paged' 			=> $paged,

					'number_post'		=> -1,  

				)); 



				if($query->have_posts()):

			

				while ( $query->have_posts() ) : $query->the_post();

				

					$srcImage = get_the_post_thumbnail_url( get_the_ID(), 'full' );

				?>

					<div class="col-xxl-4 col-xl-4 col-lg-4 col-sm-6 col-12">

						<div class="blog__item white-bg mb-30 transition-3 fix custom_cursor_hover scroll_view_more_txt">

							<div class="blog__thumb w-img fix p-relative">

								<a href="<?php the_permalink(); ?>" title="">

									<div class="bg-img" style="background-image: url(<?php echo $srcImage; ?>);background-size: 100%; ">

										<img src="<?php echo site_url(); ?>/wp-content/uploads/2021/11/news-events-tam-300x300-1.jpg" alt="" title="" class="fade"/>

									</div>								

								</a>

								<div class="conten-hover">

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

	</section>

</main>



<?php

	get_footer();

?>

