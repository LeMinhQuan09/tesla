<?php
/**
 * Template Name: Template Uniforms
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
						<nav class="nav-anchor mt-30">
							<ul>
								<?php if( have_rows('sub_menu') ): ?>
								    <?php while( have_rows('sub_menu') ): the_row(); 
								        $link = get_sub_field('link');
								        $title = get_sub_field('title');
							    ?>
								<li> <a class="view_txt_cursor custom_cursor_hover" href="<?php echo $link; ?>" title=""><?php echo $title; ?></a> </li>
								<?php endwhile; ?>
								<?php endif; ?>
							</ul>
						</nav>	
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

	<?php if( have_rows('content_section_2') ): ?>
	    <?php while( have_rows('content_section_2') ): the_row(); 
	        $image = get_sub_field('image');
	        $select = get_sub_field('select');
	        $title = get_sub_field('title');
	        $id = get_sub_field('id');
	        $select_space = get_sub_field('select_space');
	        $description = get_sub_field('description');
	        $button_title = get_sub_field('button_title');
	        $button_link = get_sub_field('button_link');
    ?>
	<div id="<?php echo $id; ?>" class=" <?php echo implode( ' ', $select_space ); ?>">
		<?php 
		if( $select == 'right' ) { ?>
			<div class="row flex-column-reverse flex-lg-row">
				<div class="col-xxl-7 col-xl-7 col-lg-7 col-sm-12 clear-padding center-vertical">
					<div class="content content-block route paddr-140">
						<?php if(!empty($title)) { ?>
						<div class="section-title aos-item" data-aos="fade-up"><?php echo $title; ?></div>
						<?php } else echo '';?>
						<div class="summary aos-item" data-aos="fade-up">
							<?php echo $description; ?>
						</div>
						<?php if(!empty($button_title)) { ?>
						<a href="<?php echo $button_link; ?>" class="e-btn open_cursor custom_cursor_hover aos-item" data-aos="fade-up"><?php echo $button_title; ?> <i class="far fa-long-arrow-right"></i></a>
						<?php } else echo '';?>
					</div>
				</div>
				<div class="col-xxl-5 col-xl-5 col-lg-5 col-sm-12 clear-padding mb-50-mob fix custom_cursor_hover no_text_cursor">
					<div class="p-relative bg hei-540 right hover-bg" style="background-image: url('<?php echo $image; ?>');">
						<img class="wid-100 hidden" src="<?php echo $image; ?>" alt="" title="">
					</div>
				</div>
			</div>
		<?php } elseif( $select  == 'left' ) { ?>
			<div class="row flex-lg-row">
				<div class="col-xxl-5 col-xl-5 col-lg-5 col-sm-12 clear-padding mb-50-mob fix custom_cursor_hover no_text_cursor">
					<div class="p-relative bg hei-540 right hover-bg" style="background-image: url('<?php echo $image; ?>');">
						<img class="wid-100 hidden" src="<?php echo $image; ?>" alt="" title="">
					</div>
				</div>
				<div class="col-xxl-7 col-xl-7 col-lg-7 col-sm-12 clear-padding center-vertical start">
					<div class="content content-block route right">
						<?php if(!empty($title)) { ?>
						<div class="section-title aos-item" data-aos="fade-up"><?php echo $title; ?></div>
						<?php } else echo '';?>
						<div class="summary aos-item" data-aos="fade-up">
							<?php echo $description; ?>
						</div>
						<?php if(!empty($button_title)) { ?>
						<a href="<?php echo $button_link; ?>" class="e-btn open_cursor custom_cursor_hover aos-item" data-aos="fade-up"><?php echo $button_title; ?> <i class="far fa-long-arrow-right"></i></a>
						<?php } else echo '';?>
					</div>
				</div>
			</div>
		<?php } elseif( $select  == 'none' ) { ?>
			<div class="col-12 content content-block">
				<div class="section-title fz-40 mb-40 aos-item aos-init aos-animate" data-aos="fade-up"><?php echo $title; ?></div>
				<div class="summary aos-item aos-init aos-animate" data-aos="fade-up">
					<?php echo $description; ?>
				</div>
			</div>
		<?php } ?>	
	</div>
	<?php endwhile; ?>
	<?php endif; ?>

	<?php if( have_rows('content_section_3') ): ?>
	    <?php while( have_rows('content_section_3') ): the_row(); 
	        $image = get_sub_field('image');
	        $select = get_sub_field('select');
	        $title = get_sub_field('title');
	        $id = get_sub_field('id');
	        $select_space = get_sub_field('select_space');
	        $description = get_sub_field('description');
	        $button_title = get_sub_field('button_title');
	        $button_link = get_sub_field('button_link');
    ?>
	<div id="<?php echo $id; ?>" class=" <?php echo implode( ' ', $select_space ); ?>">
		<?php 
		if( $select == 'right' ) { ?>
			<div class="row flex-column-reverse flex-lg-row">
				<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 mt-240 mt-0-mob clear-padding ">
					<div class="content content-block route pr-0">
						<div class="section-title aos-item" data-aos="fade-up"><?php echo $title; ?></div>
						<div class="summary aos-item" data-aos="fade-up">
							<?php echo $description; ?>
						</div>
					</div>
				</div>
				<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 pr-0 pt-0 pb-0 padd-left-140 mb-50-mob fix custom_cursor_hover no_text_cursor">
					<div class="p-relative bg hei-1000 right hover-bg" style="background-image: url('<?php echo $image; ?>');">
						<img class="wid-100 hidden" src="<?php echo $image; ?>" alt="" title="">
					</div>
				</div>
		    </div>
		<?php } elseif( $select  == 'left' ) { ?>
			<div class="row flex-lg-row">
			<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 padd-right-140 pl-0 pt-0 pb-0 mb-50-mob fix custom_cursor_hover no_text_cursor">
				<div class="p-relative bg hei-1000 right hover-bg" style="background-image: url('<?php echo $image; ?>');">
					<img class="wid-100 hidden" src="<?php echo $image; ?>" alt="" title="">
				</div>
			</div>
			<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 mt-200 mt-0-mob clear-padding center-vertical start">
				<div class="content content-block route ">
					<div class="section-title mt-0-mob aos-item" data-aos="fade-up"><?php echo $title; ?></div>
					<div class="summary aos-item" data-aos="fade-up">
						<?php echo $description; ?>
					</div>
				</div>
			</div>
	    </div>
		<?php } elseif( $select  == 'none' ) { ?>
			<div class="col-12 content content-block">
				<div class="section-title fz-40 mb-40 aos-item aos-init aos-animate" data-aos="fade-up"><?php echo $title; ?></div>
				<div class="summary aos-item aos-init aos-animate" data-aos="fade-up">
					<?php echo $description; ?>
				</div>
			</div>
		<?php } ?>	
	</div>
	<?php endwhile; ?>
	<?php endif; ?>

	<?php if( have_rows('content_section_4') ): ?>
	    <?php while( have_rows('content_section_4') ): the_row(); 
	        $image = get_sub_field('image');
	        $select = get_sub_field('select');
	        $title = get_sub_field('title');
	        $id = get_sub_field('id');
	        $select_space = get_sub_field('select_space');
	        $description = get_sub_field('description');
	        $button_title = get_sub_field('button_title');
	        $button_link = get_sub_field('button_link');
    ?>
	<div id="<?php echo $id; ?>" class=" <?php echo implode( ' ', $select_space ); ?>">
		<?php 
		if( $select == 'right' ) { ?>
			<div class="row flex-column-reverse flex-lg-row">
				<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding center-vertical">
					<div class="content content-block route pr-0">
						<?php if(!empty($title)) { ?>
						<div class="section-title aos-item" data-aos="fade-up"><?php echo $title; ?></div>
						<?php } else echo '';?>
						<div class="summary aos-item" data-aos="fade-up">
							<?php echo $description; ?>
						</div>
						<?php if(!empty($button_title)) { ?>
						<a href="<?php echo $button_link; ?>" class="e-btn open_cursor custom_cursor_hover aos-item" data-aos="fade-up"><?php echo $button_title; ?> <i class="far fa-long-arrow-right"></i></a>
						<?php } else echo '';?>
					</div>
				</div>
				<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 pr-0 padd-left-140 mb-50-mob fix custom_cursor_hover no_text_cursor">
					<div class="p-relative bg hei-540 right hover-bg" style="background-image: url('<?php echo $image; ?>');">
						<img class="wid-100 hidden" src="<?php echo $image; ?>" alt="" title="">
					</div>
				</div>
			</div>
		<?php } elseif( $select  == 'left' ) { ?>
			<div class="row flex-lg-row">
				<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 pl-0 padd-right-140 mb-50-mob fix custom_cursor_hover no_text_cursor">
					<div class="p-relative bg hei-540 right hover-bg" style="background-image: url('<?php echo $image; ?>');">
						<img class="wid-100 hidden" src="<?php echo $image; ?>" alt="" title="">
					</div>
				</div>
				<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding center-vertical start">
					<div class="content content-block route pr-0">
						<?php if(!empty($title)) { ?>
						<div class="section-title aos-item" data-aos="fade-up"><?php echo $title; ?></div>
						<?php } else echo '';?>
						<div class="summary aos-item" data-aos="fade-up">
							<?php echo $description; ?>
						</div>
						<?php if(!empty($button_title)) { ?>
						<a href="<?php echo $button_link; ?>" class="e-btn open_cursor custom_cursor_hover aos-item" data-aos="fade-up"><?php echo $button_title; ?> <i class="far fa-long-arrow-right"></i></a>
						<?php } else echo '';?>
					</div>
				</div>
			</div>
		<?php } elseif( $select  == 'none' ) { ?>
			<div class="col-12 content content-block">
				<div class="section-title fz-40 mb-40 aos-item aos-init aos-animate" data-aos="fade-up"><?php echo $title; ?></div>
				<div class="summary aos-item aos-init aos-animate" data-aos="fade-up">
					<?php echo $description; ?>
				</div>
			</div>
		<?php } ?>	
	</div>
	<?php endwhile; ?>
	<?php endif; ?>
	<style type="text/css">
		.cards-box {
			position: relative;
			transform: translateX(0px);
		}
		.cards-box.right {
			position: relative;
			transform: translateX(-15px);
		}
		.cards-box .card {
			width: calc(28rem + 25vh);
			max-width: 80vw;
			cursor: pointer;
		}
		.cards-box .card img
		{
			object-fit: cover;
		}
		.cards-box .card.hide {
			visibility: hidden;
		}
		.cards-box .card:not(.hide) {
			position: absolute;
			top: 0;
			left: 0;
			transition: all 0.8s cubic-bezier(0.18, 0.98, 0.45, 1);
			box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.07);
		}
		.cards-box.right .card:not(.hide) {
			right: 0;
			left:unset;
		}
		.cards-box .card:not(.hide)[data-slide='0'] {
			transform: translate(0px, 0px) scale(1);
			z-index: 6;
			opacity: 1;
		}
		.cards-box .card:not(.hide)[data-slide='1'] {
			transform: translate(20px, 20px) scale(0.975);
			z-index: 5;
			opacity: 0.9;
		}
		.cards-box .card:not(.hide)[data-slide='2'] {
			transform: translate(40px, 40px) scale(0.95);
			z-index: 4;
			opacity: 0.8;
		}
		.cards-box .card:not(.hide)[data-slide='3'] {
			transform: translate(60px, 60px) scale(0.925);
			z-index: 3;
			opacity: 0.7;
		}
		.cards-box .card:not(.hide)[data-slide='4'] {
			transform: translate(80px, 80px) scale(0.9);
			z-index: 2;
			opacity: 0.6;
		}
		.cards-box .card:not(.hide)[data-slide='5'] {
			transform: translate(100px, 100px) scale(0.875);
			z-index: 1;
			opacity: 0.5;
		}
		.cards-box .card:not(.hide)[data-slide='0'] {
			transition: all 0.32s cubic-bezier(0.18, 0.98, 0.45, 1);
		}
		/**/
		.cards-box .card.right:not(.hide)[data-slide='0'] {
			transform: translate(0px, 0px) scale(1);
			z-index: 6;
			opacity: 1;
		}
		.cards-box .card.right:not(.hide)[data-slide='1'] {
			transform: translate(-20px, 20px) scale(0.975);
			z-index: 5;
			opacity: 0.9;
		}
		.cards-box .card.right:not(.hide)[data-slide='2'] {
			transform: translate(-40px, 40px) scale(0.95);
			z-index: 4;
			opacity: 0.8;
		}
		.cards-box .card.right:not(.hide)[data-slide='3'] {
			transform: translate(-60px, 60px) scale(0.925);
			z-index: 3;
			opacity: 0.7;
		}
		.cards-box .card.right:not(.hide)[data-slide='4'] {
			transform: translate(-80px, 80px) scale(0.9);
			z-index: 2;
			opacity: 0.6;
		}
		.cards-box .card.right:not(.hide)[data-slide='5'] {
			transform: translate(-100px, 100px) scale(0.875);
			z-index: 1;
			opacity: 0.5;
		}
		.content-placeholder .row {
			display: flex;
			flex-flow: row nowrap;
			align-items: center;
		}
		.content-placeholder .row .img {
			flex-shrink: 0;
			position: relative;
			margin-right: 20px;
			background: #5eebc6;
			width: calc(56px + 2vw);
			height: calc(56px + 2vw);
			border-radius: 50%;
		}

		.content-placeholder .row .img::after {
			content: attr(data-letter);
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			font-size: calc(30px + 1vw);
			font-weight: bold;
			color: white;
		}
		.fix-x
		{
		    overflow-x: clip;
		}
		.h-100
		{
			height: 100%;
		}
		.hei-auto
		{
			height: auto;
		}
		@media(min-width: 1920px)
		{
			.cards-box .card {
			width: 90%;
			}
		}
		@media screen and (max-width: 1600px) and (min-width: 1440px)
		{
			.cards-box .card {
			width: calc(30rem + 30vh);
			}
		}
		@media(min-width: 992px)
		{
			.hei-auto
			{
				height: 540px;
			}
		}
		@media(max-width: 1000px)
		{
			.cards-box .card 
			{
				width: calc(20rem + 25vh);
			}
		}
		@media(max-width: 991px)
		{
			.cards-box .card 
			{
				width: 90%;
				max-width: 100%;
			}
			.cards-box .card:not(.hide) 
			{
				box-shadow: none;
			}
			.hei-400
			{
				height: 400px;
				object-fit: cover;
			}
			.card
			{
			    border: none;
			    justify-content: center;
		        flex-direction: inherit;	
	            background-color: #ffffff00;
			}
			.cards-box {
			    transform: translateX(0px);
			}
		}
		@media(max-width: 768px)
		{
			.cards-box .card {
    		width: 90%;}
			.cards-box .card.right {
    		width: 85%;
    		}
		}
		@media(max-width: 676px)
		{
			.cards-box .card:not(.hide)
			{
			    left: 15px;
			}
			.cards-box.right .card:not(.hide) {
			    right: 15px;
			}
			.cards-box.right
			{
				transform: translateX(0px);
			}
			.cards-box {
			    transform: translateX(0px);
			}
			.cards-box .card {
    		width: 80%;}
			.cards-box .card.right {
    		width: 80%;
    		}
		}
	</style>
	<?php if( have_rows('content_section_5') ): ?>
		<?php while( have_rows('content_section_5') ): the_row(); ?>
			<?php
			if( get_row_layout() == 'layer_image_left' ):
			 	$title = get_sub_field('title');
			 	$content = get_sub_field('content');
			?>
    			<div class="hei-auto container-fuild overflow-inherit bg-top-100 mb-100 mb-20-mob layer">
	    			<div class="row flex-lg-row h-100">
						<div class="hei-400 col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding mb-50-mob custom_cursor_hover no_text_cursor left-layer">
							<div class="cards-box">
								<?php while( have_rows('layer') ): the_row(); 
									$image = get_sub_field('image');
								?> 
							    <div class="card">
							        <div class="content-placeholder">
							            <div class="row">
							                <img class="wid-100 hei-540" src="<?php echo $image; ?>" alt="" title="">
							            </div>
							        </div>
							    </div>
							    <?php endwhile; ?>
							</div>
						</div>
						<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding center-vertical start right-layer">
							<div class="content content-block route right">
								<div class="section-title mt-0-mob aos-item pt-30-mob" data-aos="fade-up"><?php echo $title; ?></div>
								<div class="summary aos-item" data-aos="fade-up">
									<?php echo $content; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php elseif( get_row_layout() == 'layer_image_right' ): 
						$title = get_sub_field('title');
    					$content = get_sub_field('content');
				?>
				<div class="hei-auto container-fuild overflow-inherit bg-top-100 mb-100 mb-20-mob layer">
					<div class="row flex-column-reverse flex-lg-row h-100">
						<div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 clear-padding center-vertical right-layer">
							<div class="content content-block route">
								<div class="section-title mt-0-mob aos-item pt-30-mob" data-aos="fade-up"><?php echo $title; ?></div>
								<div class="summary aos-item" data-aos="fade-up">
									<?php echo $content; ?>
								</div>
							</div>
						</div>
						<div class="hei-400 col-xxl-6 col-xl-6 col-lg-6 col-sm-12 pb-50 pr-0 mb-50-mob custom_cursor_hover no_text_cursor">
							<div class="cards-box right">
								<?php while( have_rows('layer') ): the_row(); 
									$image = get_sub_field('image');
								?>
							    <div class="card right">
							        <div class="content-placeholder">
							            <div class="row">
							                <img class="wid-100 hei-540" src="<?php echo $image; ?>" alt="" title="">
							            </div>
							        </div>
							    </div>
							    <?php endwhile; ?>
							</div>
						</div>
					</div>
				</div>
				<?php endif; ?>
		<?php endwhile; ?>
	<?php endif; ?>
	
</main>
<?php get_footer(); ?>
<script>
window.onload = () => {
	let sliderImagesBox = document.querySelectorAll('.cards-box');
	sliderImagesBox.forEach(el => {
		let imageNodes = el.querySelectorAll('.card:not(.hide)')
		let arrIndexes = []; // Index array
		(() => {
			// The loop that added values to the arrIndexes array for the first time
			let start = 0;
			while (imageNodes.length > start) {
				arrIndexes.push(start++);
			}
		})();

		let setIndex = (arr) => {
			for(let i = 0; i < imageNodes.length; i++) {
				imageNodes[i].dataset.slide = arr[i] // Set indexes
			}
		}
		el.addEventListener('click', () => {
			arrIndexes.unshift(arrIndexes.pop());
			setIndex(arrIndexes)
		})
		setIndex(arrIndexes) // The first indexes addition
	});
};

</script>