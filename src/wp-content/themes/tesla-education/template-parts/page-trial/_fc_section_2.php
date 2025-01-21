<?php

\defined( 'ABSPATH' ) || die;

$acf_fc_layout = $args['acf_fc_layout'] ?? '';
if ( $acf_fc_layout !== '_fc_section_2' ) {
	return;
}

$title    = $args['title'] ?? '';
$subtitle = $args['subtitle'] ?? '';
$gallery  = $args['gallery'] ?? false;

?>
<div class="section trial__section-2">
	<div class="container">
        <h2 class="heading-title text-center text-stroke" data-subtitle="<?=esc_attr( $subtitle ) ?>">
            <span><?=$title?></span>
        </h2>
        <?php if ( $gallery ) : ?>
        <ul class="gallery">
            <?php foreach ( $gallery as $gal ) : ?>
            <li>
                <a class="fcy-gallery" href="<?php echo wp_get_attachment_image_url( $gal, 'full', true ) ?>" title>
                    <?php echo wp_get_attachment_image( $gal, 'medium' ) ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
	</div>
</div>
