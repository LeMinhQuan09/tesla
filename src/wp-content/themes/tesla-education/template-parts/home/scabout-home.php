<?php $title_about = get_field('title_aboutus');
    $content_about = get_field('content_aboutus');
    $link_about = get_field('link_aboutus');
    $name_about = get_field('btn_aboutus');
    $gallery_about = get_field('gallery_aboutus');
    $bg_about = get_field('bg_about');  ?>
<section class="home__about pt-60 pb-40 pt-30-mob pb-30-mob">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-sm-12 d-flex justify-content-center home__about-content">
                <?php if($title_about){
                    echo '<h2 class="heading-title">'. $title_about .'</h2>';
                }
                if($content_about){
                    echo '<div class="content text-justify">'. $content_about .'</div>';
                }
                if($link_about){
                    echo '<a href="'. $link_about .'" class="btn-light-orange btn-outline-blue ml-auto mr-auto d-flex align-items-center justify-content-center">'. $name_about .'</a>';
                } ?>
            </div>
            <div class="col-xl-9 col-lg-9 col-sm-12 pl-20 p-relative home__about-gallery">
                <?php if($gallery_about){
                    echo '<ul class="wrapper">';
                    foreach($gallery_about as $gal){
                        echo '<li class="item">';
                        echo '<div class="p-relative">';
                        echo '<img src="'. $gal .'" class="p-absolute" alt="image">';
                        echo '</div>';
                        echo '</li>';
                    }
                    echo '</ul>';
                }
                if($bg_about){
                    // echo '<div class="bg-about p-absolute">';
                    // echo '<img src="'. esc_url($bg_about['url']) .'">';
                    // echo '</div>';
                } ?>
            </div>
        </div>
    </div>
</section>