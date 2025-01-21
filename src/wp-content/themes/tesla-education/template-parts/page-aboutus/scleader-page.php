<?php $title_leader = get_field('title_leader');
    $blurred_leader = get_field('blurred_leader');
    $list_of_leaders = get_field('list_of_leaders');
?>
<section id="leadership" class="about__leadership pt-80 pb-40">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if($title_leader && $blurred_leader){ echo '<div class="heading-group p-relative">'; }
                if($title_leader){
                    echo '<h2 class="heading-title text-center">'. $title_leader .'</h2>';
                }
                if($blurred_leader){
                    echo '<span class="blurred-text text-center">'. $blurred_leader .'</span>';
                }
                if($title_leader && $blurred_leader){ echo '</div>'; } ?>
            </div>
            <div class="col-12">
                <?php if($list_of_leaders){
                    foreach($list_of_leaders as $leader){
                        echo '<div class="about__leadership-wrapper d-flex p-relative">';
                        if($leader['avatar']){ ?>
                            <div class="about__leadership-avt">
                                <img src="<?php echo esc_url($leader['avatar']['url']); ?>" alt="img">
                            </div>
                        <?php }
                        if($leader['name'] || $leader['job'] || $leader['introduce']){
                            echo '<div class="about__leadership-content">';
                            if($leader['name'] || $leader['job']){
                                echo '<div class="profile pb-20 mb-25 p-relative">';
                                    echo '<h3 class="title">'. $leader['name'] .'</h3>';
                                    echo '<p class="job mb-0">'. $leader['job'] .'</p>';
                                echo '</div>';
                            }
                            if($leader['introduce']){
                                echo '<div class="introduce">';
                                echo $leader['introduce'];
                                echo '</div>';
                                if($leader['btn_link']){
                                    echo '<a href="'. $leader['btn_link'] .'" class="btn-light-orange btn-outline-blue">'. $leader['btn_name'] .'</a>';
                                }
                            }
                            echo '</div>';
                        } 
                        echo '</div>';
                    }
                } ?>
            </div>
        </div>
    </div>
</section>