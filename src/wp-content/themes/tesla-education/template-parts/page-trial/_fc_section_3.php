<?php

\defined( 'ABSPATH' ) || die;

$acf_fc_layout = $args['acf_fc_layout'] ?? '';
if ( $acf_fc_layout !== '_fc_section_3' ) {
	return;
}

$title       = $args['title'] ?? '';
$desc        = $args['desc'] ?? '';
$video_image = $args['video_image'] ?? '';
$video_link  = $args['video_link'] ?? '';

?>
<div class="section trial__section-3">
	<div class="container">
        <?php if ( $desc ) : ?>
        <div class="desc desc-top desc-border"><?=$desc ?></div>
        <?php endif; ?>
        <h2 class="heading-title text-center"><?=$title?></h2>

        <?php if ( $video_image ) : ?>
        <div class="video-thumb">
            <?php if ( $video_link ) { echo '<a title class="fcy-video icon-video" href="' . $video_link . '">'; } ?>

            <?php echo wp_get_attachment_image( $video_image, 'full' ) ?>

            <?php if ( $video_link ) { echo '</a>'; } ?>
        </div>
        <?php endif; ?>
    </div>
</div>
