<?php

\defined( 'ABSPATH' ) || die;

$acf_fc_layout = $args['acf_fc_layout'] ?? '';
if ( $acf_fc_layout !== '_fc_section_4' ) {
	return;
}

$title      = $args['title'] ?? '';
$subtitle   = $args['subtitle'] ?? '';
$desc       = $args['desc'] ?? '';
$subjects   = $args['subjects'] ?? '';
$form_title = $args['form_title'] ?? '';
$form_id    = $args['form_id'] ?? '';

?>
<div class="section trial__section-4">
	<div class="container">
        <h2 class="heading-title text-center text-stroke" data-subtitle="<?=esc_attr( $subtitle ) ?>"><?=$title?></h2>

        <?php if ( $subjects ) : ?>
        <ul class="subject">
            <?php
            foreach ( $subjects as $subject ) :
                $_icon = $subject['icon'] ?? '';
                $_title_1 = $subject['title_1'] ?? '';
                $_title_2 = $subject['title_2'] ?? '';
            ?>
            <li>
                <div class="wrapper">
                    <div class="thumb">
		                <?php echo wp_get_attachment_image( $_icon, 'thumbnail', true ) ?>
                    </div>
                    <h3 class="title"><?=$_title_1?></h3>
                    <div class="subtitle"><?=$_title_2?></div>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>

        <?php if ( $desc ) : ?>
        <div class="desc desc-border"><?=$desc?></div>
        <?php endif; ?>

		<?php if ( $form_id ) : ?>
        <div class="trial-form">
            <p class="heading-title text-center"><?=$form_title?></p>
            <?php

            echo '<div class="form-contact">';
            echo do_shortcode( '[wpforms id="' . esc_attr( $form_id ) . '"]' );
            echo '</div>';

            ?>
        </div>
		<?php endif; ?>
	</div>
</div>
