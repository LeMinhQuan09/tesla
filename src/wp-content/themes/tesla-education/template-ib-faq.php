<?php
/**
 * Template Name: IB FAQ
 */
get_header(); ?>
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
	
	<div class="container overflow-inherit mt-100 mb-50 mt-30-mob mb-0-mob">
		<div class="row">
			<div class="col-xxl-12 col-xl-12 col-lg-12 col-sm-12">
				<div class="content content-block">
					<div class="summary aos-item" data-aos="fade-up">
						<?php if( have_rows('faq_section') ): ?>
						    <?php while( have_rows('faq_section') ): the_row(); ?>
						<div class="accordion" id="accordion-faq">
							<?php
							$show = 1;
							$i = 0;
							 if( have_rows('faq_content') ): ?>
						    <?php while( have_rows('faq_content') ): the_row(); 
						        $question = get_sub_field('question');
						        $answer = get_sub_field('answer');
								$i++;
						        
				        	?>
							<div class="accordion-item mb-20">
								<div class="accordion-header" id="heading-0<?php echo $show; ?>">
									<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-0<?php echo $show; ?>" aria-expanded="<?php if($i == 1){ echo 'true'; } else { echo 'false'; } ?>" aria-controls="collapse-0<?php echo $show; ?>">
									<?php echo $question; ?>
									</button>
								</div>
								<div id="collapse-0<?php echo $show; ?>" class="accordion-collapse collapse <?php if( $show == 1  ){ echo 'show'; } ?>" aria-labelledby="heading-0<?php echo $show; ?>" data-bs-parent="#accordion-faq">
									<div class="accordion-body">
										<?php echo $answer; ?>
									</div>
								</div>
							</div>
							<?php  $show++; endwhile;  ?>
							<?php endif; ?>
							
						</div>
						<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
	    </div>
	</div>

</main>

<?php get_footer(); ?>