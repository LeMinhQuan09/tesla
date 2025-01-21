<?php

\defined( 'ABSPATH' ) || die;

$acf_fc_layout = $args['acf_fc_layout'] ?? '';
if ( $acf_fc_layout !== '_fc_section_1' ) {
	return;
}

$title    = $args['title'] ?? '';
$subtitle = $args['subtitle'] ?? '';
$desc     = $args['desc'] ?? '';
$image_1  = $args['image_1'] ?? '';
$image_2  = $args['image_2'] ?? '';

?>
<div class="section service__section-1 pt-50">
	<div class="container">
        <h2 class="heading-title text-center text-stroke" data-subtitle="<?=esc_attr( $subtitle ) ?>"><?=$title?></h2>
        <?php if ( $desc ) : ?>
        <div class="desc"><?=$desc?></div>
        <?php endif; ?>
        <div class="row thumbs">
            <div class="col-6">
                <a class="fcy-gallery" href="<?php echo wp_get_attachment_image_url( $image_1, 'full', true ) ?>" title>
				    <?php echo wp_get_attachment_image( $image_1, 'large' ) ?>
                </a>
            </div>
            <div class="col-6">
                <a class="fcy-gallery" href="<?php echo wp_get_attachment_image_url( $image_2, 'full', true ) ?>" title>
	                <?php echo wp_get_attachment_image( $image_2, 'large' ) ?>
                </a>
            </div>
        </div>
	</div>
</div>
