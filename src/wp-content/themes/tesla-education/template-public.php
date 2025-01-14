<?php
/**
 * Template Name: Template Public
 */
get_header(); ?>
<main>
    <!-- BANNER SECTION -->
	<?php if( have_rows('banner_section') ): 
        while( have_rows('banner_section') ): the_row(); 
	        $background_image = get_sub_field('background_image');
	        $title = get_sub_field('title_page');
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
    <!-- END BANNER SECTION -->

    <!-- PUBLIC SECTION -->
    <?php $public_section = get_field('public_section');
    if($public_section){ ?>
	<div class="container mt-100 mb-100 mt-30-mob mb-0-mob section-public-template">
        <?php if(get_field('title_section')){
            echo '<h2 class="title">'. get_field('title_section') .'</h2>';
        } ?>
        <ul class="wrapper">
            <?php foreach($public_section as $val){
                echo '<li class="item d-flex justify-content-between">';
                if($val['title_section_pdf']){
                    echo '<h3 class="title">'. $val['title_section_pdf'] .'</h3>';
                }
                if($val['file_name']){
                    echo '<div class="title-file"><i class="far fa-file-alt"></i> <span>'. $val['file_name'] .'</span></div>';
                }
                echo '<a href="'. $val['file_url'] .'" class="file" target="_blank"><i class="fas fa-download"></i>'. __('View','tesla-education') .'</a>';
                echo '</li>';
            } ?>
        </ul>

    </div>
    <?php } ?>
    <!-- END PUBLIC SECTION -->

</main>
<?php get_footer(); ?>