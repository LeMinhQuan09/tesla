<?php $gallery_whychoose = get_field('gallery_whychoose');
    $title_whychoose = get_field('title_whychoose');
    $des_whychoose = get_field('des_whychoose');
    $lists_whychoose = get_field('lists_whychoose');
    $link_whychoose = get_field('link_whychoose');
    $btn_whychoose = get_field('btn_whychoose');  ?>
<section class="home__whychoose pt-40 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-sm-12 pr-30 p-relative home__whychoose-gallery">
                <?php if($gallery_whychoose){
                    echo '<ul class="wrapper d-flex">';
                    foreach($gallery_whychoose as $gal){
                        echo '<li class="item">';
                        echo '<img src="'. $gal .'" alt="image">';
                        echo '</li>';
                    }
                    echo '</ul>';
                } ?>
            </div>
            <div class="col-xl-4 col-lg-4 col-sm-12 d-flex justify-content-center pt-10 home__whychoose-content">
                <?php if($title_whychoose){
                    echo '<h2 class="heading-title">'. $title_whychoose .'</h2>';
                }
                if($des_whychoose){
                    echo '<div class="desc text-justify">'. $des_whychoose .'</div>';
                }
                if($lists_whychoose){
                    echo '<ul class="wrapper mt-30">';
                    foreach($lists_whychoose as $lists){ ?>
                        <li class="item d-flex mb-5">
                            <?php if($lists['icon']){ ?>
                            <div class="icon"><img src="<?php echo esc_url($lists['icon']['url']); ?>" alt="icon"></div>
                            <?php }
                            if($lists['title'] || $lists['content']){ ?>
                            <div class="content">
                                <?php if($lists['title']){
                                    echo '<h3 class="title">'. $lists['title'] .'</h3>';
                                }
                                if($lists['content']){
                                    echo '<div class="desc">'. $lists['content'] .'</div>';
                                } ?>
                            </div>
                            <?php } ?>
                        </li>
                    <?php }
                    echo '</ul>';
                }
                if($link_whychoose){
                    echo '<a href="'. $link_whychoose .'" class="btn-light-orange btn-outline-blue ml-55 d-flex align-items-center justify-content-center">'. $btn_whychoose .'</a>';
                } ?>
            </div>
        </div>
    </div>
</section>