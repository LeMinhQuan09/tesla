<?php

\defined( 'ABSPATH' ) || die;

$acf_fc_layout = $args['acf_fc_layout'] ?? '';
if ( $acf_fc_layout !== '_fc_section_7' ) {
	return;
}

$title    = $args['title'] ?? '';
$subtitle = $args['subtitle'] ?? '';
$desc     = $args['desc'] ?? '';
$repeater_content     = $args['repeater_content'] ?? [];

?>
<div class="section service__section-7 pt-50">
	<div class="container">
		<h2 class="heading-title text-center text-stroke" data-subtitle="<?= esc_attr( $subtitle ) ?>"><?= $title ?></h2>

		<?php if ( $desc ) : ?>
		<div class="desc text-center"><?=$desc?></div>
		<?php endif; ?>

		<?php if ( $repeater_content ) :

		?>
		<ul class="items">
			<?php
			foreach ( $repeater_content as $item ) :
				$_image = $item['image'] ?? '';
				$_title = $item['title'] ?? '';
				$_desc = $item['desc'] ?? '';
			?>
			<li>
				<div class="thumb">
					<?php echo wp_get_attachment_image( $_image, 'medium' ) ?>
				</div>
				<div class="content">
					<h3><?=$_title?></h3>
					<?php if ( $_desc  ) : ?>
					<p class="excerpt"><?=$_desc?></p>
					<?php endif; ?>
				</div>
			</li>
			<?php endforeach; ?>
		</ul>
		<?php endif; ?>
	</div>
</div>
