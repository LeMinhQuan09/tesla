<?php

\defined( 'ABSPATH' ) || die;

$acf_fc_layout = $args['acf_fc_layout'] ?? '';
if ( $acf_fc_layout !== '_fc_section_4' ) {
	return;
}

$title       = $args['title'] ?? '';
$subtitle    = $args['subtitle'] ?? '';
$image       = $args['image'] ?? '';
$content     = $args['content'] ?? '';
$gallery     = $args['gallery'] ?? '';
$view_button = $args['view_button'] ?? [];

?>
<div class="section service__section-4 pt-50">
    <div class="container">
        <h2 class="heading-title text-center text-stroke" data-subtitle="<?= esc_attr( $subtitle ) ?>"><?= $title ?></h2>
        <div class="row pt-50 mpt-12">
            <div class="col-12 col-lg-6 thumbs">
			    <?php echo wp_get_attachment_image( $image, 'large' ) ?>
            </div>
            <div class="col-12 col-lg-6 content">
			    <?php if ( $content ) : ?>
                <div class="cnt"><?=$content?></div>
			    <?php endif; ?>
            </div>
        </div>

	    <?php if ( $gallery ) : ?>
        <ul class="gallery">
            <?php foreach ( $gallery as $gal ) : ?>
                <li>
                    <a class="fcy-gallery" data-fancybox="gallery-4" href="<?php echo wp_get_attachment_image_url( $gal, 'full', true ) ?>" title>
                        <?php echo wp_get_attachment_image( $gal, 'medium' ) ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
	    <?php endif; ?>

        <?php echo Helper::ACFLink( $view_button, 'mt-15 btn-light-orange btn-outline-blue ml-auto mr-auto d-flex align-items-center justify-content-center' ); ?>
    </div>
</div>
