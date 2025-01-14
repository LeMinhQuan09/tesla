 <?php
/**
 * Template Name: School Fees
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
	
	<div class="container overflow-inherit mt-100 mb-100 mt-30-mob mb-20-mob">
		<?php if( have_rows('search_section') ): ?>
			    <?php while( have_rows('search_section') ): the_row(); 
			        $title = get_sub_field('title');
			        $input = get_sub_field('input');
			        $search_button = get_sub_field('search_button');
	    ?>
		<div class="section-title fz-40 mb-100 mt-30-mob aos-item" data-aos="fade-up"><?php echo $title; ?></div>
		<div class="row d-none">
			<div class="col-xxl-9 col-xl-9 col-lg-9 col-sm-12">
				<div class="form-group aos-item" data-aos="fade-up">
					<label for=""><?php echo $input; ?></label>
					<input type="text" class="form-control"/>
				</div>
			</div>
			<div class="col-xxl-3 col-xl-3 col-lg-3 col-sm-12">
				<div class="form-group aos-item" data-aos="fade-up">
					<label class="no-mob" for="">&nbsp;</label>
					<button type="submit" class="e-btn full-cta mb-20-mob aos-item" data-aos="fade-up"><?php echo $search_button; ?></button>
				</div>
			</div>
		</div>
		<?php endwhile; ?>
		<?php endif; ?>
	</div>
	<section class="tariff-fees">
		<div class="container">
			<?php if( have_rows('school_fee_section') ): ?>
			    <?php while( have_rows('school_fee_section') ): the_row(); 
			        $school_year_left = get_sub_field('school_year_left');
			        $school_year_right = get_sub_field('school_year_right');
		    ?>
			<div class="tab mb-60 mb-20-mob">
				<span class="tablinks-tariff active" onclick="openFee(event, 'tariff-1')" ><?php echo $school_year_left ?></span>
				<span class="tablinks-tariff" onclick="openFee(event, 'tariff-2')" ><?php echo $school_year_right ?></span>
			</div>
			<div id="tariff-1" class="tabcontent tab-tariff" style="display: block;">
				<div class="row">
					<?php if( have_rows('details_left') ): ?>
					    <?php while( have_rows('details_left') ): the_row(); 
					        $image = get_sub_field('image');
					        $link = get_sub_field('link');
				    ?>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-60 mb-20-mob">
						<a href="<?php echo $link; ?>" target="_blank">
							<img src="<?php echo $image; ?>">
						</a>
					</div>
					<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
			<div id="tariff-2" class="tabcontent tab-tariff">
				<div class="row">
					<?php if( have_rows('details_right') ): ?>
					    <?php while( have_rows('details_right') ): the_row(); 
					        $image = get_sub_field('image');
					        $link = get_sub_field('link');
				    ?>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-60 mb-20-mob">
						<a href="<?php echo $link; ?>" target="_blank">
							<img src="<?php echo $image; ?>">
						</a>
					</div>
					<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</section>
	<section class="tariff-fees">
		<div class="container">
			<?php if( have_rows('tuition_section') ): ?>
			    <?php while( have_rows('tuition_section') ): the_row(); 
			        $school_year_left = get_sub_field('school_year_left');
			        $school_year_right = get_sub_field('school_year_right');
		    ?>
			<div class="tab mb-60 mb-20-mob">
				<span class="tablinks-tuition active" onclick="openFee2(event, 'tuition-1')" ><?php echo $school_year_left ?></span>
				<span class="tablinks-tuition" onclick="openFee2(event, 'tuition-2')" ><?php echo $school_year_right ?></span>
			</div>
			<div id="tuition-1" class="tabcontent tab-tuition" style="display: block;">
				<div class="row">
					<?php if( have_rows('details_left') ): ?>
					    <?php while( have_rows('details_left') ): the_row(); 
					        $image = get_sub_field('image');
					        $link = get_sub_field('link');
				    ?>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-60 mb-20-mob">
						<a href="<?php echo $link; ?>" target="_blank">
							<img src="<?php echo $image; ?>">
						</a>
					</div>
					<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
			<div id="tuition-2" class="tabcontent tab-tuition">
				<div class="row">
					<?php if( have_rows('details_right') ): ?>
					    <?php while( have_rows('details_right') ): the_row(); 
					        $image = get_sub_field('image');
					        $link = get_sub_field('link');
				    ?>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-60 mb-20-mob">
						<a href="<?php echo $link; ?>" target="_blank">
							<img src="<?php echo $image; ?>">
						</a>
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
function openFee(evt, tariffName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tab-tariff");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks-tariff");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tariffName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
<script>
function openFee2(evt, tuitionName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tab-tuition");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks-tuition");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tuitionName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
<?php get_footer(); ?>