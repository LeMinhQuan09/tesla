<?php

/**
 * The template for displaying `School Services`
 * Template Name: Services
 * Template Post Type: page
 */

\defined( 'ABSPATH' ) || die;

// header
get_header( 'service' );

if ( have_posts() ) {
	the_post();
}

if ( post_password_required() ) :
	echo get_the_password_form();

	return;
endif;

$ID = get_the_ID();
$top_bg_image = Helper::getField( 'top_bg_image', $ID );

?>
<!-- <div class="section service__section-0">
	<div class="bg">
		<?php //echo wp_get_attachment_image( $top_bg_image, 'post-thumbnail' )?>
	</div>
    <div class="breadcrumb-wrapper">
        <div class="container">
            <?php //echo the_title( '<h1 class="title heading-title">', '</h1>', false ); ?>
            <?php //Helper::breadCrumbs(); ?>
        </div>
    </div>
</div> -->

<?php
get_template_part('template-parts/partial/hero-banner', 'partial');
// custom page
$ACF = get_fields( get_the_ID() );

$services_flexible_content = ! empty( $ACF['services_flexible_content'] ) ? (array) $ACF['services_flexible_content'] : false;
if ( $services_flexible_content ) {

	foreach ( $services_flexible_content as $section ) {
		$acf_fc_layout = $section['acf_fc_layout'] ?? '';

		if ( $acf_fc_layout ) {
			get_template_part( 'template-parts/page-service/' . $acf_fc_layout, null, $section );
		}
	}
}

// footer
get_footer( 'service' );
