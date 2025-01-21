<?php

\defined( 'ABSPATH' ) || die;

$acf_fc_layout = $args['acf_fc_layout'] ?? '';
if ( $acf_fc_layout !== '_fc_section_3' ) {
	return;
}

$title    = $args['title'] ?? '';
$subtitle = $args['subtitle'] ?? '';
$title_2  = $args['title_2'] ?? '';
$content  = $args['content'] ?? '';
$image    = $args['image'] ?? '';

?>
<div class="section service__section-3 pt-50">
	<div class="container">
        <div class="wrapper">
            <h2 class="heading-title text-center text-stroke" data-subtitle="<?=esc_attr( $subtitle ) ?>"><?=$title?></h2>

            <div class="wrapper-desc">
                <h3 class="title"><?=$title_2?></h3>
                <div class="cnt"><?=$content?></div>
            </div>

	        <?php echo wp_get_attachment_image( $image, 'full' ) ?>
        </div>
    </div>
</div>
