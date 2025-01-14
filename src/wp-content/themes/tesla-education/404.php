<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Atilus_Template
 */

get_header();
?>  
<section class="page__title-area page__title-height page__title-overlay d-flex align-items-end" data-background="<?php the_field('background_image', 'option'); ?>">
	<div class="container">
		<div class="row">
			<div class="col-xxl-12">
				<div class="page__title-wrapper mb-70 mb-40-mob">
					<?php if(get_locale() == 'vi') { ?>
						<h1 class="page__title">404 Không Tìm Thấy Trang</h1> 
					<?php } else if(get_locale() == 'en_US') { ?>
						<h1 class="page__title">404 Page Not Found</h1> 
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
get_footer();
