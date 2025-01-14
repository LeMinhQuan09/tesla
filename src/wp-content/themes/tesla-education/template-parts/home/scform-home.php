<?php $title_form = get_field('title_form');
    $sl_form = get_field('sl_form');
    $bg_form = get_field('bg_form'); ?>
<section class="home__form pt-60 pb-60">
    <div class="container">
       <div class="row">
            <div class="col-lg-7 col-sm-12 col-img pr-0">
                <?php if($bg_form){ ?>
                    <img src="<?php echo $bg_form; ?>" alt="img">
                <?php } ?>
            </div>
            <div class="col-lg-5 col-sm-12 home__form-content pt-100 pb-80 pl-40 pr-40">
                <?php if($title_form){ echo '<h2 class="heading-title text-center">'. $title_form .'</h2>'; } ?>
                <?php if($sl_form){
                    echo '<div class="form-contact">';
                    echo do_shortcode('[wpforms id="' . esc_attr($sl_form) . '"]');
                    echo '</div>';
                } ?>
            </div>
       </div>
    </div>
</section>