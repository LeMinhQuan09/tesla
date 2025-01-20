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
<div class="section service__section-1">
	<div class="container">
        <h2 class="heading-title text-center text-stroke" data-subtitle="<?=esc_attr( $subtitle ) ?>"><?=$title?></h2>
        <?php if ( $desc ) : ?>
        <div class="desc"><?=$desc?></div>
        <?php endif; ?>
        <div class="row thumbs">
            <div class="col-6">
				<?php echo wp_get_attachment_image( $image_1, 'large' ) ?>
            </div>
            <div class="col-6">
	            <?php echo wp_get_attachment_image( $image_2, 'large' ) ?>
            </div>
        </div>
	</div>
</div>
