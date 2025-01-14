<?php $title_testimonials = get_field('title_testimonials');
    $lists_testimonials = get_field('lists_testimonials'); ?>
<section class="home__testimonials pt-40 pb-60">
    <div class="container">
        <?php if($title_testimonials){
            echo '<div class="row">';
            echo '<div class="col-12">';
            echo '<h2 class="heading-title text-center mb-0">'. $title_testimonials .'</h2>';
            echo '</div>';
            echo '</div>';
        } ?>
        <?php if($lists_testimonials){
            echo '<div class="home__testimonials-wrapper row">';
            foreach($lists_testimonials as $val){ ?>
                <div class="item">
                    <div class="box bg-blue text-center pt-0">
                        <div class="home__testimonials-inf p-relative">
                            <div class="img">
                                <?php if($val['avatar']){ ?>
                                    <img src="<?php echo esc_url($val['avatar']['url']) ?>" alt="avatar">
                                <?php } ?>
                            </div>
                            <div class="inf mt-20 mb-20 pb-20 p-reative">
                                <?php if($val['name']){ echo '<h4 class="name">'. $val['name'] .'</h4>'; } ?>
                            </div>
                        </div>
                        <div class="home__testimonials-content">
                            <?php if($val['comment']){ echo $val['comment']; } ?>
                        </div>
                    </div>
                </div>
            <?php }
            echo '</div>';
        } ?>
    </div>
</section>