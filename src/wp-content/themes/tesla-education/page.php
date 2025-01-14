<?php get_header(); ?>
<main>
	<?php if( have_rows('banner_section') ): ?>
	    <?php while( have_rows('banner_section') ): the_row(); 
	        $background_image = get_sub_field('background_image');
	        $title = get_sub_field('title');
	setPostViews(get_the_ID()); //CODE CREATE COUNTER FOR ARTICLES
    ?>
    <section class="page__title-area page__title-height page__title-overlay d-flex align-items-end" data-background="<?php echo $background_image; ?>">
		<div class="container">
			<div class="row">
				<div class="col-xxl-12">
					<div class="page__title-wrapper mb-70 mb-40-mob">
						<h1 class="page__title"><?php echo $title; ?></h1> 
					</div>
				</div>
			</div>
		</div>
	</section>
		<?php endwhile; ?>
	<?php endif; ?>
	<section class="mt-100 mb-100 mt-30-mob mb-30-mob">
		<div class="container">
			<?php the_content() ;?>
		</div>
	</section>
</main>
<?php get_footer(); ?>