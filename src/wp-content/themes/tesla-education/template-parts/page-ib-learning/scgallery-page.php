<?php $acf_fc_layout = $args['acf_fc_layout'] ?? '';
$title_gallery = $args['title_gallery'];
$blurred_gallery = $args['blurred_gallery'];
$desc = $args['desc'];
$gallery = $args['gallery'];
$bg_image = $args['bg_image'];
?>
<section class="learning__gallery p-relative pt-60 pb-50">
    <?php if($bg_image){ ?>
        <img src="<?php echo esc_url($bg_image['url']); ?>" class="p-absolute-full bg" alt="bg">
    <?php } ?>
    <div class="container">
        <div class="learning__gallery-top">
            <?php 
                if($title_gallery && $blurred_gallery){ echo '<div class="heading-group p-relative mb-40">'; }
                if($title_gallery){
                    echo '<h2 class="heading-title text-center">'. $title_gallery .'</h2>';
                }
                if($blurred_gallery){
                    echo '<span class="blurred-text text-center">'. $blurred_gallery .'</span>';
                }
                if($title_gallery && $blurred_gallery){ echo '</div>'; }
                if($desc){
                    echo '<div class="desc text-center ml-auto mr-auto mb-40">'. $desc .'</div>';
                } 
            ?>
        </div>
        <?php if($gallery){ 
        echo '<div class="learning__gallery-main">';
            foreach($gallery as $image){ ?>
            <a href="<?php echo $image; ?>" class="item" data-fancybox="images">
                <img src="<?php echo $image; ?>" alt="" />
            </a>
            <?php } 
        echo '</div>';
        } ?>
        
    </div>
</section>