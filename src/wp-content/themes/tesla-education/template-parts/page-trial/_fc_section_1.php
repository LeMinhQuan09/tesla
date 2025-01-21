<?php

\defined( 'ABSPATH' ) || die;

$acf_fc_layout = $args['acf_fc_layout'] ?? '';
if ( $acf_fc_layout !== '_fc_section_1' ) {
	return;
}

$title   = $args['title'] ?? '';
$subtitle   = $args['subtitle'] ?? '';
$desc    = $args['desc'] ?? '';
$image_1 = $args['image_1'] ?? '';
$image_2 = $args['image_2'] ?? '';
$title_2 = $args['title_2'] ?? '';
$content = $args['content'] ?? '';

?>
<div class="section trial__section-1 pt-50">
    <div class="container">
        <h2 class="heading-title text-center text-stroke" data-subtitle="<?=esc_attr( $subtitle ) ?>"><?=$title?></h2>
        <?php if ( $desc ) : ?>
        <div class="desc"><?=$desc?></div>
        <?php endif; ?>

        <div class="row">
            <div class="col-12 col-md-6 thumbs">
                <?php echo wp_get_attachment_image( $image_1, 'large' ) ?>
                <?php echo wp_get_attachment_image( $image_2, 'large' ) ?>
            </div>
            <div class="col-12 col-md-6 content">
                <div class="wrapper">
	                <?php if ( $title_2 ) : ?>
                    <h3 class="title"><?=$title_2?></h3>
	                <?php endif; ?>
	                <?php if ( $content ) : ?>
                    <div class="cnt"><?=$content?></div>
	                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
