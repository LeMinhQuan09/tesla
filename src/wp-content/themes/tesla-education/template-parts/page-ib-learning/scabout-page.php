<?php $acf_fc_layout = $args['acf_fc_layout'] ?? '';
$enable_about_header = $args['enable_about_header'];
$about_header = $args['about_header'];
$main_about = $args['main_about'];
?>
<section class="learning__about <?php if($enable_about_header == 1){ echo 'pt-80'; } else { echo 'pt-40'; } ?> pb-30">
    <div class="container">
        <?php if($enable_about_header == 1){ ?>
            <div class="learning__about-header mb-40">
                <?php 
                    if($about_header['title'] && $about_header['blurred_text']){ echo '<div class="heading-group p-relative">'; }
                    if($about_header['title']){
                        echo '<h2 class="heading-title text-center">'. $about_header['title'] .'</h2>';
                    }
                    if($about_header['blurred_text']){
                        echo '<span class="blurred-text text-center">'. $about_header['blurred_text'] .'</span>';
                    }
                    if($about_header['title'] && $about_header['blurred_text']){ echo '</div>'; }
                    if($about_header['short_description']){
                        echo '<div class="desc text-justify">'. $about_header['short_description'] .'</div>';
                    } 
                ?>
            </div>
        <?php } ?>
        <div class="row learning__about-header">
            <div class="col-xl-6 col-lg-6 col-sm-12 learning__about-content d-flex flex-direction-column justify-content-center p-relative pr-50">
                <?php 
                    if($main_about['title'] && $main_about['blurred_text']){ echo '<div class="heading-group p-relative mb-40">'; }
                    if($main_about['title']){
                        echo '<h2 class="heading-title">'. $main_about['title'] .'</h2>';
                    }
                    if($main_about['blurred_text']){
                        echo '<span class="blurred-text">'. $main_about['blurred_text'] .'</span>';
                    }
                    if($main_about['title'] && $main_about['blurred_text']){ echo '</div>'; }
                    if($main_about['content']){
                        echo '<div class="desc text-justify">'. $main_about['content'] .'</div>';
                    } 
                ?>
            </div>
            <div class="col-xl-6 col-lg-6 col-sm-12 learning__about-img p-relative">
                <?php if($main_about['img']){ ?>
                    <img src="<?php echo esc_url($main_about['img']['url']); ?>" alt="img">
                <?php } ?>
            </div>
        </div>
    </div>
</section>