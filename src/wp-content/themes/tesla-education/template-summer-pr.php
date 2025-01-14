 <?php
/**
 * Template Name: Programme SM
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
	<style type="text/css">
		.container-1200
		{
			max-width: 1200px;
			margin-right: auto;
			margin-left: auto;
		}
		.bg-orange
		{
		    background-color: #FCB55F;
		}
		.bg-blue
		{
		    background-color: #25215E;
		}
		.mr-0
		{
			margin:0;
		}
		.content-block.white *
		{
			color:#fff;
		}
		.img-80 .modal-dialog {
		    max-width: 70%;
		}
		@media(max-width: 1440px)
		{
			.sm-program .content-block p, .sm-program .content-block ul li
			{
				font-size: 16px;
			}
		}
		@media(max-width: 1200px)
		{
			.container-1200
			{
				max-width: 100%;
		        padding-right: var(--bs-gutter-x,.75rem);
    			padding-left: var(--bs-gutter-x,.75rem);
			}
		}
		@media(max-width: 767px)
		{
			.content .content-block .img-c
			{
				text-align: center;
			}
		}
	</style>
	<section class="container-1200 mt-100 mb-50 mt-30-mob mb-0-mob" >
		<?php the_content(); ?>
	</section>
	<section class="overflow-inherit mt-50 mb-50 mt-30-mob mb-0-mob sm-program">
		<div class="container-1200">
			<?php if( have_rows('content_section') ): ?>
			    <?php while( have_rows('content_section') ): the_row(); ?>
		    	<?php if( get_row_layout() == 'layout' ): 
		    		$background = get_sub_field('background');
		    	?>
				<div class="content-layout mb-50">
					<img class="w-100" src="<?php echo $background; ?>" >
					<div class="content pt-50 bg-orange">
						<?php if( have_rows('content') ): ?>
						    <?php while( have_rows('content') ): the_row(); 
					    		$content_left = get_sub_field('content_left');
				    	?>
						<div class="row mr-0">
							<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 content-block white mb-20-mob">
								<?php echo $content_left; ?>
							</div>
							<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 content-block white">
								<?php if( have_rows('content_right') ): 
									$i = 1;
								?>
								    <?php while( have_rows('content_right') ): the_row(); 
							    		$image = get_sub_field('image');
							    		$description = get_sub_field('description');
						    	?>
						    	<?php if(( $i%2 ) != 0) : ?>
								<div class="row mb-20">
									<div class="col-md-4 col-sm-12 img-c mb-20-mob">
										<img src="<?php echo $image; ?>" alt="" width="207" height="262" />
									</div>
									<div class="col-md-8 col-sm-12">
										<?php echo $description; ?>
									</div>
								</div>
								<?php else : ?>
								<div class="row mb-20 flex-column-reverse flex-lg-row">
									<div class="col-md-8 col-sm-12">
										<?php echo $description; ?>
									</div>
									<div class="col-md-4 col-sm-12 img-c mb-20-mob">
										<img src="<?php echo $image; ?>" alt="" width="207" height="262" />
									</div>
								</div>
								<?php endif; ?>
								<?php $i++; endwhile; ?>
								<?php endif; ?>
							</div>
						</div>
					<?php endwhile; ?>
					<?php endif; ?>
					</div>
				</div>
				<?php elseif( get_row_layout() == 'layout_right' ): 
	            	$background = get_sub_field('background');
	            ?>
				<div class="content-layout mb-50">
					<img class="w-100" src="<?php echo $background; ?>" >
					<div class="content pt-50 bg-blue">
						<?php if( have_rows('content') ): ?>
						    <?php while( have_rows('content') ): the_row(); 
					    		$content_left = get_sub_field('content_left');
				    	?>
						<div class="row mr-0">
							<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 content-block white mb-20-mob">
								<?php if( have_rows('content_right') ): 
									$i = 1;
								?>
								    <?php while( have_rows('content_right') ): the_row(); 
							    		$image = get_sub_field('image');
							    		$description = get_sub_field('description');
						    	?>
						    	<?php if(( $i%2 ) != 0) : ?>
								<div class="row mb-20">
									<div class="col-md-4 col-sm-12 img-c mb-20-mob">
										<img src="<?php echo $image; ?>" alt="" width="207" height="262" />
									</div>
									<div class="col-md-8 col-sm-12">
										<?php echo $description; ?>
									</div>
								</div>
								<?php else : ?>
								<div class="row mb-20 flex-column-reverse flex-lg-row">
									<div class="col-md-8 col-sm-12">
										<?php echo $description; ?>
									</div>
									<div class="col-md-4 col-sm-12 img-c mb-20-mob">
										<img src="<?php echo $image; ?>" alt="" width="207" height="262" />
									</div>
								</div>
								<?php endif; ?>
								<?php $i++; endwhile; ?>
								<?php endif; ?>
							</div>
							<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 content-block white mb-20-mob">
								<?php echo $content_left; ?>
							</div>
						</div>
						<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
				<?php endif; ?>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</section>

    <div class="container mb-50 mb-30-mob">
		<div class="list-gallery">
	    	<?php if( have_rows('gallery_section') ): ?>
			    <?php while( have_rows('gallery_section') ): the_row(); 
			        $image = get_sub_field('image');
			        $title = get_sub_field('link');
		    ?>
			<div class="thumb">
				<div class="blog__item transition-3 fix"> 
					<div class="gall-relative blog__thumb w-img" >
						<a href="<?php echo $image; ?>" data-fancybox="images">
							<img class="mh-image" src="<?php echo $image; ?>" alt title />
						</a>
						<div class="content">
							<div class="cont-wrap">
								<div class="cont-relative">
									<p><?php echo $title; ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
	
</main>
<script type="text/javascript">
	window.onscroll = function()
    {
        AOS.refresh();
    };
</script>
<?php get_footer(); ?>
<?php if( have_rows('image_popup') ): ?>
    <?php while( have_rows('image_popup') ): the_row(); 
        $image_explore = get_sub_field('image_explore');
?>
<div id="sm-img-1" class="modal popup-advise img-80">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
			<?php if(get_locale() == 'vi') { ?>
				<div class="row"><img src="<?php echo $image_explore; ?>" /></div>
			<?php } else if(get_locale() == 'en_US') { ?>
				<div class="row"><img src="<?php echo $image_explore; ?>" /></div>
			<?php } ?>
			</div>
		</div>
	</div>
</div>
	<?php endwhile; ?>
<?php endif; ?>

<?php if( have_rows('image_popup') ): ?>
    <?php while( have_rows('image_popup') ): the_row(); 
        $image_adventure = get_sub_field('image_adventure');
?>
<div id="sm-img-2" class="modal popup-advise img-80">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-body">
<?php if(get_locale() == 'vi') { ?>
	<div class="row"><img src="<?php echo $image_adventure; ?>" /></div>
<?php } else if(get_locale() == 'en_US') { ?>
	<div class="row"><img src="<?php echo $image_adventure; ?>" /></div>
<?php } ?>
</div>
</div>
</div>
</div>
<?php endwhile; ?>
<?php endif; ?>