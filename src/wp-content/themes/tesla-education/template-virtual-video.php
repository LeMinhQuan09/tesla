<?php
/**
 * Template Name: Template Virtual Video
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
	<div class="container mt-100 mb-100 mt-30-mob mb-30-mob">
		<?php if(!empty($content_section)) { ?>
		<div class="row">
			<div class="col-xxl-12">
				<div class="content term aos-item" data-aos="fade-up">
					<?php echo get_field('content_section'); ?>
				</div>
			</div>
	    </div>
	<?php } elseif(empty($content_section)) { ?>
		<script type="text/javascript">jQuery('.container').removeClass('mb-200');</script>
	<?php } ?>
	</div>
	
	<div class="container mb-70 mt-30-mob mb-30-mob">
		<div class="row">
			<div class="col-xxl-12">
				<div class="content aos-item" data-aos="fade-up">
					<?php the_content(); ?>
				</div>
			</div>
	    </div>
	</div>
	</div>

	<style type="text/css">
		.virtual-video .list-arts .thumb img
		{
		    width: 100%;
    		max-height: 300px;
    		object-fit: cover;
    		cursor: pointer;
		}
		.virtual-video .list-arts .thumb
		{
			position: relative;
		}
		.virtual-video .list-arts .thumb:after
		{
			content: "";
			position: absolute;
			background-image: url(<?php echo site_url(); ?>/wp-content/uploads/2021/12/playvideo.png);
			background-repeat: no-repeat;
			background-size: contain;
			background-position: center;
		    height: 32px;
		    width: 32px;
		    top: 35%;
		    left: 45%;
		    cursor: pointer;
		}
		/* Style the tab */
		.tab {
		      display: inline-block;
		}
		/* Style the buttons inside the tab */
		.tab button {
		    margin-right: 40px;
		    background-color: inherit;
		    outline: none;
		    cursor: pointer;
		    font-weight: 600;
		}
		/* Change background color of buttons on hover */
		.tab button:hover {
		  color:#f05a25;
		}
		/* Create an active/current tablink class */
		.tab button.active {
			color: #f05a25;
		  
		}
		/* Style the tab content */
		.tabcontent {
		  margin-top:50px;
		    visibility: hidden;
		    padding: 0;
		    border-top: none;
		    margin-top: 0px;
		    height: 0px;
		    opacity: 0;
		  
		}
		.tabcontent.curr {
		  margin-top:50px;
		    visibility: visible;
		    height: auto;
		    opacity: 1;
		}
		.virtual-video .content-video
		{
			position: relative;
		}
		.virtual-video .content-video img
		{
			position: absolute;
		    height: 80px;
		    width: 80px;
		    top: 35%;
		    left: 45%;
		    cursor: pointer;
		}
		/*Iframe*/
		.content-video
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
		}
		@media(max-width: 1440px)
		{
			.virtual-video .list-arts .thumb img
			{
	    		max-height: 250px;
			}
		}
		@media(max-width: 1280px)
		{
			.virtual-video .list-arts .thumb img
			{
				max-height: 240px;
			}
		}
		@media(max-width:1240px)
		{
			.virtual-video .list-arts .thumb img
			{
				max-height: 228px;
			}
			.content-video iframe
			{
				height: 528px;
			}
		}
		@media(max-width: 1199px)
		{
			.virtual-video .list-arts .thumb img 
			{
			    max-height: 195px;
			}
		}
		@media(max-width:991px)
		{
			.content-video iframe
			{
				height: 392px;
			}
			.virtual-video .list-arts .thumb img
			{
				max-height: 140px;
			}
		}
		@media(max-width: 767px)
		{
			.content-video iframe 
			{
			    height: 285px;
			}
			.virtual-video .list-arts .thumb img
			{
				max-height: 165px;
			}
		}
		@media(max-width: 667px)
		{
			.content-video iframe 
			{
			    height: 295px;
			}
		}
		@media(max-width: 575px)
		{
			.content-video iframe 
			{
			    height: 310px;
			}
		}
		@media(max-width: 540px)
		{
			.content-video iframe 
			{
			    height: 290px;
			}
		}
		@media(max-width: 414px)
		{
			.virtual-video .content-video img {
			    height: 50px;
			    width: 50px;
			}
			.virtual-video .list-arts .thumb img {
			    max-height: 230px;
			}
			.section-vid .content-video img {
			    height: 50px;
			    width: 50px;
			}
			.virtual-video .list-arts .thumb:after
			{
				top: 30%;
			}
			.content-video iframe 
			{
			    height: 219px;
			}
		}
		@media(max-width: 393px)
		{
			.content-video iframe 
			{
			    height: 210px;
			}
		}
		@media(max-width: 375px)
		{
			.content-video iframe 
			{
			    height: 195px;
			}
		}
		@media(max-width: 360px)
		{
			.content-video iframe 
			{
			    height: 188px;
			}
			.virtual-video .list-arts .thumb img 
			{
			    max-height: 220px;
			}
		}
	</style>
	<!-- gallery -->
	<section class="virtual-video mb-70 mb-30-mob">
		<div class="container">
			<div class="tabset">
				<div class="content-video mb-70 mb-30-mob">
					<?php 
						$rows = get_field('gallery_section' );
						if( $rows ): 
					        $first_row = $rows[0];
					        $first_source = $first_row['gallery_image'];
					        if( $first_source ):
					        	$first_source_row = $first_source[0];
					        	$first_source_content = $first_source_row['source'];
				    ?>
						<iframe id="myFrame" src="<?php echo $first_source_content; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					<?php endif; endif; ?>
				</div>
				<!-- Tab 1 -->
				<div class="tab">
		            <button class="tablinks active" onclick="openCity(event, 'eys')">EYs</button>
		            <button class="tablinks" onclick="openCity(event, 'pyp')">PYP</button>
		            <button class="tablinks" onclick="openCity(event, 'myp')">MYP</button> 
	          	</div>
			  	<div class="tab-panels">
			  		<?php if( have_rows('gallery_section') ): 
			  			$i = 0; ?>
					    <?php while( have_rows('gallery_section') ): the_row(); 
					        $title = get_sub_field('title');
					        $id = get_sub_field('id');
				    ?>
				    <section id="<?php echo $id; ?>" class="tabcontent <?php echo ($i==0)?'curr':'';?>">
				      	<div class="list-arts">
							<?php if( have_rows('gallery_image') ): ?>
							    <?php while( have_rows('gallery_image') ): the_row(); 
							        $image = get_sub_field('image');
							        $source = get_sub_field('source');
						    ?>
							<div class="thumb play-vid" data-src="<?php echo $source.""."?autoplay=1"; ?>">
								<img src="<?php echo $image; ?>" alt title />
							</div>
							<?php endwhile; ?>
							<?php endif; ?>
						</div>
				  	</section>
				  	<?php $i++; endwhile; ?>
					<?php endif; ?>
			  	</div>
			  	<?php if( have_rows('thank_you_section') ): ?>
					    <?php while( have_rows('thank_you_section') ): the_row(); 
					        $text = get_sub_field('text');
					        $link_button = get_sub_field('link_button');
				         	$link_url = $link_button['url'];
				         	$link_title = $link_button['title'];
			    ?>
			  	<div class="text-center mt-50 mt-30-mob">
			  		<p><?php echo $text; ?></p>
			  		<a class="e-btn full-mob mb-20-mob open_cursor custom_cursor_hover aos-item aos-init aos-animate" data-aos="fade-up" href="<?php echo $link_url; ?>" title=""><?php echo $link_title; ?></a>
			  	</div>
			  	<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</section>


</main>
<script>
  function openCity(evt, tabName) {
  // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      //tabcontent[i].style.display = "none";
      tabcontent[i].classList.remove("curr");
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    //document.getElementById(tabName).style.display = "block";
    document.getElementById(tabName).classList.add("curr");
    evt.currentTarget.className += " active";
    //$(".regular").slick("refresh");
	} 

//play video
jQuery('.play-vid').click(function () {
	var link  = jQuery(this).data('src');
	 document.getElementById("myFrame").src = link;
	if (jQuery(window).width() >= 992)
	{
		jQuery(window).scrollTop(1000);
	}
	else if(jQuery(window).width() <= 991)
	{
		jQuery(window).scrollTop(630);
	}
	});
</script>
<?php get_footer(); ?>