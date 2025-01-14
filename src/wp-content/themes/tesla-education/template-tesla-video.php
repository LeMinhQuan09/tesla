<?php
/**
 * Template Name: Tesla Video
 */

get_header(); ?>
<main>
	<?php if( have_rows('banner_section') ): ?>
	    <?php while( have_rows('banner_section') ): the_row(); 
	        $background_image = get_sub_field('background_image');
	        $title = get_sub_field('title');
    ?>
    <section class="page__title-area page__title-height page__title-overlay d-flex align-items-end" data-background="<?php echo $background_image; ?>">
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
	
	<?php $content_section = get_field('content_section'); ?>
	<div class="container mt-100 mb-100 mt-30-mob mb-0-mob">
		<?php if(!empty($content_section)) { ?>
		<div class="row">
			<div class="col-xxl-12">
				<div class="content term aos-item" data-aos="fade-up" data-max-width="1300px">
					<?php echo get_field('content_section'); ?>
				</div>
			</div>
	    </div>
	<?php } elseif(empty($content_section)) { ?>
		<script type="text/javascript">jQuery('.container').removeClass('mb-200');</script>
	<?php } ?>
	</div>

	<!--section>
		<div class="container">
			<div class="row mt-100 mb-70">
				<?php //if( have_rows('video_section') ): ?>
				    <?php //while( have_rows('video_section') ): the_row(); 
				        //$iframe = get_sub_field('iframe');
			    ?>
				<div class="col-xxl-12 col-xl-12 mb-50">
					<?php //echo $iframe; ?>
				</div>
					<?php //endwhile; ?>
				<?php //endif; ?>
			</div>
		</div>
	</section-->	
	<style type="text/css">
		.tesla-video .list-arts .thumb img
		{
		    width: 100%;
    		max-height: 300px;
    		object-fit: cover;
    		cursor: pointer;
		}
		.tesla-video .list-arts .thumb
		{
			position: relative;
		}
		.tesla-video .list-arts .thumb:after
		{
			content: "\f144";
			font-weight: 500;
			position: absolute;
			/* background-image: url(<?php //echo site_url(); ?>/wp-content/uploads/2021/12/playvideo.png);
			background-repeat: no-repeat;
			background-size: contain;
			background-position: center; */
		    height: 32px;
		    width: 32px;
		    top: 35%;
		    left: 45%;
		    cursor: pointer;
			font-family: 'Font Awesome 5 Pro';
			color: #F5F5F5;
			font-size: 32px;
			display: flex;
			align-items: center;
			justify-content: center;
		}
		.section-vid .content-video
		{
			position: relative;
		}
		.section-vid .content-video img
		{
			position: absolute;
		    height: 80px;
		    width: 80px;
		    top: 35%;
		    left: 45%;
		    cursor: pointer;
		}
		.section-vid .title-h3
		{
	        font-size: 20px;
			font-weight: 700;
		    line-height: 1em;
		    text-decoration: none;
		    padding: 5px 0;
		    margin: 10px 0 0;
	        overflow: hidden;
		    text-overflow: ellipsis;
		    white-space: nowrap;
		    word-wrap: break-word;
		    position: relative;
		    display: block;
		    -webkit-box-orient: vertical;
		    -webkit-line-clamp: 2;
		}
		.section-vid .description
		{
		    font-size: 18px;
		    line-height: 1.5em;
		    margin-bottom: 0;
		    margin-top: 6px;
	        overflow: hidden;
		    text-overflow: ellipsis;
		    white-space: normal;
		    word-wrap: break-word;
		    height: 4.5em;
		    position: relative;
		    display: -webkit-box;
		    -webkit-box-orient: vertical;
		}
		/*Iframe*/
		/* .content-video
		{
			text-align: center;
			padding-bottom: 56.25%;
		}
		.content-video iframe
		{
		    width: 100%;
		    height: 100%;
		    left: 0;
		    right: 0;
		    top: 0;
		    bottom: 0;
		    position: absolute;
		} */
		@media(max-width: 1440px)
		{
			.tesla-video .list-arts .thumb img
			{
	    		max-height: 218px;
			}
		}
		@media(max-width: 1320px)
		{
			.tesla-video .list-arts .thumb img
			{
				max-height: 200px;
			}
		}
		@media(max-width: 1280px)
		{
			.tesla-video .list-arts .thumb img
			{
				max-height: 190px;
			}
		}
		@media(max-width:1199px)
		{
			.tesla-video .list-arts .thumb img
			{
				max-height: 165px;
			}
			.section-vid .description
			{
				font-size: 16px;
			}
		}
		@media(max-width:991px)
		{
			.section-vid .title-h3
			{
				font-size: 18px;
			}
			.tesla-video .list-arts .thumb img
			{
				max-height: 120px;
			}
		}
		@media(max-width: 640px){
			.section-vid .description {
				font-size: 14px;
			}

		}
		@media(max-width: 414px)
		{
			.section-vid .content-video img {
			    height: 50px;
			    width: 50px;
			}
			.tesla-video .list-arts .thumb img {
			    max-height: 200px;
			}
			.tesla-video .list-arts .thumb:after
			{
				top: 30%;
			}
		}
		@media(max-width: 375px)
		{
			.tesla-video .list-arts .thumb img 
			{
				max-height: 195px;
			}
		}
		@media(max-width: 360px)
		{
			.tesla-video .list-arts .thumb img 
			{
			    max-height: 185px;
			}
		}
	</style>
	<section class="section-vid">
		<div class="container">
			<?php if( have_rows('gallery_section') ): ?>
			    	<?php while( have_rows('gallery_section') ): the_row(); 
			    ?>
			<!-- <div class="content-video mb-50 mb-30-mob"> -->
				<?php 
				// $rows = get_sub_field('gallery_image' );
				// if( $rows ): 
			    //     $first_row = $rows[0];
			    //     $first_source = $first_row['source']; ?>
				<!-- <iframe id="myFrame" src="<?php //echo $first_source; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
				<?php //endif; ?>
			<!-- </div> -->
			<div class="tesla-video mb-50 mb-30-mob">
				<div class="list-arts">
				    <?php if( have_rows('gallery_image') ): ?>
					    <?php while( have_rows('gallery_image') ): the_row(); 
					        $image = get_sub_field('image');
					        $source = get_sub_field('source');
					        $title = get_sub_field('title');
					        $description = get_sub_field('description');
				    ?>
					<!-- <div class="thumb play-vid" data-bs-target="#mySearch" data-src="<?php //echo $source.""."?autoplay=1"; ?>" > -->
					<div class="thumb play-vid" data-bs-toggle="modal" data-bs-target="#myVideo" data-src="<?php echo $source; ?>">
						<div class="img p-relative">
							<img src="<?php echo $image; ?>" alt="image" title />
						</div>
						<div class="content">
							<h3 class="title-h3"><?php echo $title; ?></h3>
							<div class="description"><?php echo $description; ?></div>
						</div>
					</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</section>
</main>

<script type="text/javascript">
	// jQuery('.play-vid').click(function () {
	// var link  = jQuery(this).data('src');
	//  document.getElementById("myFrame").src = link;
	// if (jQuery(window).width() >= 992)
	// {
	// 	jQuery(window).scrollTop(1000);
	// }
	// else if(jQuery(window).width() <= 991)
	// {
	// 	jQuery(window).scrollTop(630);
	// }
	// });

	// HD JS
	// jQuery('.play-vid').click(function () {
	// 	var link  = jQuery(this).data('src');
	// 	document.getElementById("myFrame").src = link;
	// });
</script>
<?php get_footer(); ?>