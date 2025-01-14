<?php $title_campus = get_field('title_campus');
    $desc_campus = get_field('desc_campus');
    $gallery_campus = get_field('gallery_campus'); ?>
<section class="home__campus pt-60 pb-60">
    <div class="container">
        <?php if($title_campus){
            echo '<div class="row">';
            echo '<div class="col-12">';
            echo '<h2 class="heading-title text-center">'. $title_campus .'</h2>';
            if($desc_campus){
                echo '<div class="desc ml-auto mr-auto text-center">'. $desc_campus .'</div>';
            }
            echo '</div>';
            echo '</div>';
        } ?>
        <?php if($gallery_campus){
            echo '<ul class="home__campus-wrapper custom-slider row mt-20">';
            foreach($gallery_campus as $image){ ?>
                <li class="item ml-10 mr-10">
                    <a href="<?php echo $image ?>" class="p-relative img d-block" data-fancybox="images">
                        <img src="<?php echo $image; ?>" class="p-absolute-full" alt="image">
                    </a>
                </li>
            <?php }
            echo '</ul>';
        } ?>
    </div>
</section>