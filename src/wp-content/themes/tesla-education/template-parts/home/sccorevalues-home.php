<?php $title_core = get_field('title_core');
    $lists_core = get_field('lists_core'); ?>
<section class="home__core pt-60 pb-60">
    <div class="container">
        <?php if($title_core){
            echo '<h2 class="heading-title text-center">'. $title_core .'</h2>';
        } ?>
        <?php if($lists_core){
        echo '<div class="row home__core-content mt-50">';
        foreach($lists_core as $core){ ?>
            <div class="col-xl-3 col-lg-3 col-sm-6 d-flex home__core-col">
                <div class="item">
                    <?php if($core['icon']){ ?>
                    <div class="icon">
                        <img src="<?php echo esc_url($core['icon']['url']); ?>" alt="image">
                    </div>
                    <?php } ?>
                    <?php if($core['title']){ echo '<h3 class="title text-center mt-30">'. $core['title'] .'</h3>'; } ?>
                </div>
            </div>
        <?php }
        echo '</div>';
        } ?>
    </div>
</section>