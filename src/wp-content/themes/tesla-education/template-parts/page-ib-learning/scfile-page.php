<?php $acf_fc_layout = $args['acf_fc_layout'] ?? '';
$title = $args['title'];
$blurred_text = $args['blurred_text'];
$content = $args['content'];
$file = $args['file'];
$btn_name = $args['btn_name'];
$css_class = $args['css_class'];
?>
<section class="learning__upload pt-60 pb-60 <?php if($css_class){ echo $css_class; } ?>">
    <div class="container">
        <div class="learning_upload-main">
            <?php if($title && $blurred_text){ echo '<div class="heading-group p-relative mb-40">'; }
                if($title){
                    echo '<h2 class="heading-title text-center">'. $title .'</h2>';
                }
                if($blurred_text){
                    echo '<span class="blurred-text text-center">'. $blurred_text .'</span>';
                }
                if($title && $blurred_text){ echo '</div>'; }
                if($content) {
                    echo '<div class="content">'. $content .'</div>';
                }
            ?>
        </div>
        <?php if($file){
            echo '<div class="learning_upload-file mt-30">'; ?>
            <a href="<?php echo $file; ?>" class="btn-light-orange btn-outline-white ml-auto mr-auto" target="_blank">
                <img src="<?php echo get_template_directory_uri() . '/assets/img/icon/icon-download-pdf.png'; ?>" alt="Download PDF">
                <span><?php if($btn_name){ echo $btn_name; } else { echo 'Download PDF'; } ?></span>
            </a>
            <?php echo '</div>';
        } ?>
    </div>
</section>