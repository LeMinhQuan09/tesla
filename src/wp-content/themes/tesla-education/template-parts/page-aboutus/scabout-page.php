<?php $title_about = get_field('title_about');
    $blurred_about = get_field('blurred_about');
    $content_about = get_field('content_about');
    $img_about = get_field('img_about');
    $short_about = get_field('short_description_about');
?>
<section class="about__content pt-80 pt-30-mob pb-40 pb-30-mob">
    <div class="container container-1570">
        <div class="row">
            <div class="col-xl-5 col-lg-5 col-sm-12 pl-30 p-relative about__content-img">
                <div class="box">
                    <?php if($img_about){ ?>
                        <div class="img">
                            <img src="<?php echo esc_url($img_about['url']); ?>" alt="image">
                        </div>
                    <?php }
                    if($short_about){
                        echo '<div class="short pt-20 pb-20 pl-30 pr-50 bg-blue text-white text-justify">'. $short_about .'</div>';
                    } ?>
                </div>
            </div>
            <div class="col-xl-7 col-lg-7 col-sm-12 pl-50 pr-30 about__content-text">
                <?php if($title_about && $blurred_about){ echo '<div class="heading-group p-relative">'; }
                if($title_about){
                    echo '<h2 class="heading-title">'. $title_about .'</h2>';
                }
                if($blurred_about){
                    echo '<span class="blurred-text">'. $blurred_about .'</span>';
                }
                if($title_about && $blurred_about){ echo '</div>'; }
                if($content_about){
                    echo '<div class="content text-justify">'. $content_about .'</div>';
                } ?>
            </div>
        </div>
    </div>
</section>