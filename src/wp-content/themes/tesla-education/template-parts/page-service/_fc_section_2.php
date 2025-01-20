<?php

\defined( 'ABSPATH' ) || die;

$acf_fc_layout = $args['acf_fc_layout'] ?? '';
if ( $acf_fc_layout !== '_fc_section_2' ) {
	return;
}

$title    = $args['title'] ?? '';
$subtitle = $args['subtitle'] ?? '';
$infos    = $args['infos'] ?? '';

?>
<div class="section service__section-2">
	<div class="container">
        <h2 class="heading-title text-center text-stroke" data-subtitle="<?=esc_attr( $subtitle ) ?>"><?=$title?></h2>
        <?php if ( $infos ) : ?>
        <ul class="infos">
            <?php foreach ( $infos as $info ) :
                $_image = $info['image'] ?? '';
                $_title = $info['title'] ?? '';
                $_desc = $info['desc'] ?? '';
            ?>
            <li>
                <div class="thumb">
                    <?php echo wp_get_attachment_image( $_image, 'medium' ) ?>
                </div>
                <div class="thumb-info">
                    <p class="title"><?=$_title?></p>
                    <p class="desc"><?=$_desc?></p>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
    </div>
</div>
