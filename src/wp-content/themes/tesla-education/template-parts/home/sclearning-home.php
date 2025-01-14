<?php $title_learning = get_field('title_learning');
    $desc_learning = get_field('desc_learning');
    $lists_learning = get_field('lists_learning'); ?>
<section class="home__learning pt-60 pb-30">
    <div class="container">
        <?php if($title_learning){
            echo '<h2 class="heading-title text-center">'. $title_learning .'</h2>';
        }
        if($desc_learning){
            echo '<div class="desc text-center">'. $desc_learning .'</div>';
        } ?>
    </div>
    <?php if($lists_learning){
        echo '<div class="home__learning-content mt-50">';
        foreach($lists_learning as $learning){
            $btn_name = $learning['btn_name'] ?? __('Xem thêm','tesla-education'); ?>
            <div class="home__learning-box p-relative">
                <div class="img">
                    <img src="<?php echo esc_url($learning['img']['url']); ?>" alt="img">
                </div>
                <div class="box-content p-absolute d-flex">
                    <?php if($learning['title']){
                        echo '<h3 class="title mb-0"><a href="'. $learning['link'] .'">'. $learning['title'] .'</a></h3>';
                    }
                    if($learning['content'] || $learning['link']){
                        echo '<div class="content">';
                        echo '<div class="box-des mt-15">'. $learning['content'] .'</div>';
                        if($learning['link']){
                            echo '<a href="'. $learning['link'] .'" class="btn-view d-flex align-items-center justify-content-center mt-15">'. $btn_name .'</a>';
                        }
                        echo '</div>';
                    } ?>
                </div>
            </div>
        <?php }
        echo '</div>';
    } ?>
</section>