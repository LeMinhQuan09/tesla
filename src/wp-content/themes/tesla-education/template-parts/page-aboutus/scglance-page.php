<?php $title_glance = get_field('title_glance');
    $blurred_glance = get_field('blurred_glance');
    $box_glance = get_field('box_glance');
    $lists_glance = get_field('lists_glance');
?>
<section class="about__glance pt-60 pb-80">
    <div class="container container-1570">
        <div class="row">
            <div class="col-xl-7 col-lg-6 col-sm-12 pl-30 p-relative about__glance-img">
                <?php if($box_glance){ ?>
                    <div class="box p-relative">
                        <?php if($box_glance['img']){ ?>
                            <div class="img">
                                <img src="<?php echo esc_url($box_glance['img']['url']); ?>" alt="image">
                            </div>
                        <?php }
                        if($box_glance['short_desc']){
                            echo '<div class="short pt-20 pb-20 pl-40 pr-40 bg-blue text-white text-justify">'. $box_glance['short_desc'] .'</div>';
                        } ?>
                    </div>
                <?php } ?>
                
            </div>
            <div class="col-xl-5 col-lg-6 col-sm-12 pl-50 pr-30 about__glance-text">
                <?php if($title_glance && $blurred_glance){ echo '<div class="heading-group p-relative">'; }
                if($title_glance){
                    echo '<h2 class="heading-title">'. $title_glance .'</h2>';
                }
                if($blurred_glance){
                    echo '<span class="blurred-text">'. $blurred_glance .'</span>';
                }
                if($title_glance && $blurred_glance){ echo '</div>'; }
                if($lists_glance){
                    echo '<ul>';
                    foreach($lists_glance as $val){
                        echo '<li class="item d-flex">';
                        echo '<div class="icon mr-30">'; ?>
                        <img src="<?php echo esc_url($val['icon']['url']) ?>" alt="icon">
                        <?php echo '</div>';
                        echo '<div class="content">';
                        echo '<h4 class="title mb-0">'. $val['title'] .'</h4>';
                        echo '<p>'. $val['content'] .'</p>';
                        echo '</div>';
                        echo '</li>';
                    }
                    echo '</ul>';
                }
                ?>
            </div>
        </div>
    </div>
</section>