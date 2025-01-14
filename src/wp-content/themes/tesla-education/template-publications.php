<?php
/**
 * Template Name: Publications
 */
get_header(); ?>
<main>
	<style type="text/css">
		.tabs-pub ul li
		{
		    display: inline-block;
			list-style: none;
			margin-right: 8px;
		    margin-bottom: 16px;
		}
		.tabs-pub ul li a
		{
		    font-size: 18px;
	        line-height: 50px;
	        padding: 13px 20px;
    		border-radius: 4px;
    	    border: 1px solid #1B1464;
    	    color: #1B1464;
	        cursor: pointer;
		}
		.tabs-pub ul li.active a
		{
		    background: #1B1464;
    		color: #fff;
		}
	</style>
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
								        $title = get_sub_field('title');
								        $link = get_sub_field('link');
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
	
	<?php if(get_field('description')){ ?>
	<div class="container mt-100 mb-100 mt-30-mob mb-30-mob">
		<div class="row">
			<div class="col-xxl-12">
				<div class="content term aos-item" data-aos="fade-up" data-max-width="1200px">
					<?php echo get_field('description'); ?>
				</div>
			</div>
	    </div>
	</div>
	<?php } ?>
	
	<section class="container">

		<?php if( have_rows('content_section_year') ): ?>
		    <?php while( have_rows('content_section_year') ): the_row(); 
		        $title = get_sub_field('title');
		        $id = get_sub_field('id');
	    ?>
		<div id="<?php echo $id; ?>" class="pub-title col-xxl-12">
			<div class="section-title fz-40 aos-item" data-aos="fade-up"><?php echo $title; ?></div>
		</div>
		<?php endwhile; ?>
		<?php endif; ?>

		<?php if( have_rows('year_option') ): 
			$i = 0; ?>
			<div class="tabs-pub mb-70 mb-30-mob">
				<ul id="filterOptions">
					<?php while( have_rows('year_option') ): the_row(); 
						$year = get_sub_field('year');
					?>
					<li class="<?php if( $i == 0  ){ echo 'active'; } ?>"> 
						<a class="<?php if( $i == 0  ){ echo 'all'; } else{ echo $year; } ?>"  title="<?php echo $year; ?>"><?php echo $year; ?></a> 
					</li>
					<?php $i++; endwhile; ?>
				</ul>
			</div>
		<?php endif; ?>
			
		<div id="ourPub">
			<?php if( have_rows('content_section_year') ): ?>
			    <?php while( have_rows('content_section_year') ): the_row(); 
			        $title = get_sub_field('title');
			        $id = get_sub_field('id');
		    ?>
			<div id="<?php echo $id; ?>" class="parent-pub mb-70 mb-0-mob">
				<div class="row">
					<?php if( have_rows('content') ): ?>
					    <?php while( have_rows('content') ): the_row(); 
					        $image = get_sub_field('image');
					        $link = get_sub_field('link');
							$file_pdf = get_sub_field('upload_file_pdf');
					        $years = get_sub_field('years');
					        $year = explode("-",$years);
				    ?>
					<div class="item col-xxl-3 col-xl-3 col-lg-4 col-sm-6 <?php echo $year[0]; ?>">
						<div class="teacher__item text-center mb-30 aos-item" data-aos="fade-up">
							<div class="teacher__thumb w-img fix">
								<a href="<?php echo $file_pdf; ?>" class="p-relative" target="_blank">
									<img src="<?php echo $image; ?>" class="p-absolute" alt="img">
								</a>
							</div>
							<div class="teacher__content">
								<div class="teacher__title">
									<a href="<?php echo $file_pdf; ?>" target="_blank"><?php echo $years; ?></a>
								</div> 
							</div>
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
<script>
jQuery(document).ready(function() {
  jQuery('#filterOptions li a').click(function() {
    // fetch the class of the clicked item
    var ourClass = jQuery(this).attr('class');

    // reset the active class on all the buttons
    jQuery('#filterOptions li').removeClass('active');
    // update the active state on our clicked button
    jQuery(this).parent().addClass('active');

    if(ourClass == 'all') {
      // show all our items
      jQuery('#ourPub .parent-pub .row').children('div.item').show();
      jQuery('#ourPub .mb-100 .row .pub-title').show();
    }
    else {
      // hide all elements that don't share ourClass
      jQuery('#ourPub .parent-pub .row').children('div:not(.' + ourClass + ')').hide();
      // show all elements that do share ourClass
      jQuery('#ourPub .parent-pub .row').children('div.' + ourClass).show();
      jQuery('#ourPub .mb-100 .row .pub-title').show();
       AOS.refresh();
    }
    return false;
  });
});
</script>
<?php get_footer(); ?>