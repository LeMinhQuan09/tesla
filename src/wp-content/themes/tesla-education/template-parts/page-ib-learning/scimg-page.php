<?php $acf_fc_layout = $args['acf_fc_layout'] ?? '';
$title = $args['title'];
$blurred_text = $args['blurred_text'];
$image = $args['image'];
$file = $args['file'];
$btn_name = $args['btn_name'];
?>
<section class="learning__image pt-60 pb-60">
    <div class="container">
        <div class="learning__image-main">
            <?php if($title && $blurred_text){ echo '<div class="heading-group p-relative mb-40">'; }
                if($title){
                    echo '<h2 class="heading-title text-center">'. $title .'</h2>';
                }
                if($blurred_text){
                    echo '<span class="blurred-text text-center">'. $blurred_text .'</span>';
                }
                if($title && $blurred_text){ echo '</div>'; }
                if($image){ ?>
                    <a href="<?php echo esc_url($image['url']); ?>" data-fancybox="images">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="image"/>
                    </a>
                <?php }
                if($file){
                    echo '<div class="learning_upload-file mt-30">'; ?>
                    <a href="<?php echo $file; ?>" class="btn-light-orange btn-outline-blue ml-auto mr-auto" target="_blank">
                        <img src="<?php echo get_template_directory_uri() . '/assets/img/icon/icon-download-pdf.png'; ?>" alt="Download PDF">
                        <span><?php if($btn_name){ echo $btn_name; } else { echo 'Download PDF'; } ?></span>
                    </a>
                    <?php echo '</div>';
                }
            ?>
        </div>
    </div>
</section>