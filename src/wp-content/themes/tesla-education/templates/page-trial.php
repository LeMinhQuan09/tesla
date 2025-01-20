<?php

/**
 * The template for displaying `Trial Class`
 * Template Name: Trial
 * Template Post Type: page
 */

\defined( 'ABSPATH' ) || die;

// header
get_header( 'trial' );

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
<div class="section trial__section-0">
	<div class="bg">
		<?php echo wp_get_attachment_image( $top_bg_image, 'post-thumbnail' )?>
	</div>
    <div class="container">
        <div class="row">
            <?php echo the_title( '<h1 class="title">', '</h1>', false ); ?>
            <?php Helper::breadCrumbs(); ?>
        </div>
    </div>
</div>
<?php

// custom page
$ACF = get_fields( get_the_ID() );

$trial_flexible_content = ! empty( $ACF['trial_flexible_content'] ) ? (array) $ACF['trial_flexible_content'] : false;
if ( $trial_flexible_content ) {

	foreach ( $trial_flexible_content as $section ) {
		$acf_fc_layout = $section['acf_fc_layout'] ?? '';

		if ( $acf_fc_layout ) {
			get_template_part( 'template-parts/page-trial/' . $acf_fc_layout, null, $section );
		}
	}
}

// footer
get_footer( 'trial' );
