<?php

\defined( 'ABSPATH' ) || die;

$acf_fc_layout = $args['acf_fc_layout'] ?? '';
if ( $acf_fc_layout !== '_fc_section_6' ) {
	return;
}

$title    = $args['title'] ?? '';
$subtitle = $args['subtitle'] ?? '';
$desc     = $args['desc'] ?? '';
$gallery  = $args['gallery'] ?? [];

?>
<div class="section service__section-6">
    <div class="bg-title pt-50">
        <div class="container">
            <h2 class="heading-title text-center text-stroke" data-subtitle="<?= esc_attr( $subtitle ) ?>"><?= $title ?></h2>

		    <?php if ( $desc ) : ?>
                <div class="desc"><?=$desc?></div>
		    <?php endif; ?>
        </div>
    </div>

    <?php if ( $gallery ) : ?>
    <div class="container">
		<ul class="gallery">
			<?php foreach ( $gallery as $gal ) : ?>
				<li>
					<a class="fcy-gallery" data-fancybox="gallery-6" href="<?php echo wp_get_attachment_image_url( $gal, 'full', true ) ?>" title>
						<?php echo wp_get_attachment_image( $gal, 'medium' ) ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
    </div>
    <?php endif; ?>
</div>
