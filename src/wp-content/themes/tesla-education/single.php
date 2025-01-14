<?php 
	get_header();

	if (get_field('background_feature_image')):
		$bg_img = get_field('background_feature_image')['url'];
setPostViews(get_the_ID());
	endif; 
?>

<main>
	<?php if(!empty($bg_img)) { ?>
	<section class="page__title-area page__title-height page__title-overlay d-flex align-items-end" data-background="<?php echo $bg_img; ?>">
	<?php } else { ?>
	<section class="page__title-area page__title-height page__title-overlay d-flex align-items-end" data-background="<?php echo site_url(); ?>/wp-content/uploads/2021/11/39.jpg">
	<?php } ?>	
		<div class="container">
			<div class="row">
				<div class="col-xxl-12">
					<div class="page__title-wrapper mb-70 mb-40-mob">
						<div class="page__title"><?php the_title(); ?></div> 
					</div>
				</div>
			</div>
		</div>
	</section>

    <section class="blog__area pt-80 pb-80 pt-30-mob pb-30-mob">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-xl-8 col-lg-8">
                    <div class="blog__wrapper">
                        <h1 class="blog__title mt-0"><?php the_title(); ?></h1>	
						<?php the_content(); ?>
					</div>
				</div>
                <div class="col-xxl-4 col-xl-4 col-lg-4">
                    <div class="blog__sidebar pl-70">
                        <div class="sidebar__widget mb-30">
							<div class="sidebar__widget-head mb-25">
								<div class="sidebar__widget-title">Recent posts</div>
							</div>
                           <div class="sidebar__widget-content">
								<div class="rc__post-wrapper">

								<?php $query = new WP_Query(array(
									'post_type' => 'post',
									'post_status' => 'publish',
									'posts_per_page' =>  5,
									'orderby' => 'date',
									'order'   => 'DESC',
									'post__not_in' 		=> array(get_the_ID()),
								)); 
									if($query->have_posts()):
								
									while ( $query->have_posts() ) : $query->the_post();
									
										$srcImage = get_the_post_thumbnail_url( get_the_ID(), 'full' );
								?>
									<div class="rc__post d-flex align-items-center">
										<div class="rc__thumb mr-20"> <a href="<?php the_permalink(); ?>"><img src="<?php echo $srcImage; ?>" alt=""></a> </div>
										<div class="rc__content">
											<div class="rc__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
										</div>
									</div>
								<?php endwhile; endif; wp_reset_postdata(); ?>

								</div>
							</div>
                        </div>
                        <div class="sidebar__widget mb-0">
							<div class="sidebar__widget-head mb-35">
								<div class="sidebar__widget-title">Tags</div>
							</div>
							<div class="sidebar__widget-content">
								<div class="sidebar__tag">
									<?php echo get_the_tag_list( sprintf( '<a>%s' ), '', '</a>' ); ?>
								</div>
							</div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
        </section>
	
</main>

<?php
	get_footer();
?>
