<?php $title_vision = get_field('title_vision');
    $sc_vision = get_field('section_vision');
    $sc_mission = get_field('section_mission');
?>
<section class="about__vision pt-100 pb-40">
    <div class="container container-1570">
        <div class="row">
            <div class="col-12">
                <?php if($title_vision){ echo '<div class="heading-group p-relative">'; }
                if($title_vision){
                    echo '<h2 class="heading-title text-center">'. $title_vision .'</h2>';
                }
                if($title_vision){
                    echo '<span class="blurred-text text-center">'. $title_vision .'</span>';
                }
                if($title_vision){ echo '</div>'; } ?>
            </div>
        </div>
        <?php if($sc_vision){ ?>
        <div class="row about__vision-main ml-20">
            <div class="col-xl-5 pl-70 pr-60 d-flex flex-direction-column justify-content-center">
                <?php if($sc_vision['title']){ echo '<div class="heading-group p-relative">'; }
                if($sc_vision['title']){
                    echo '<h2 class="heading-title p-relative pb-20">'. $sc_vision['title'] .'</h2>';
                }
                if($sc_vision['title']){
                    echo '<span class="blurred-text">'. $sc_vision['title'] .'</span>';
                }
                if($sc_vision['title']){ echo '</div>'; }
                if($sc_vision['content']){
                    echo '<div class="content text-justify">'. $sc_vision['content'] .'</div>';
                } ?>
            </div>
            <div class="col-xl-7 pl-50 pr-0 about__vision-img">
                <?php if($sc_vision['img_vision']){ ?>
                    <div class="img">
                        <img src="<?php echo esc_url($sc_vision['img_vision']['url']); ?>" alt="img">
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php }
        if($sc_mission){ ?>
        <div class="row about__vision-main about__mission-main">
            <div class="col-xl-7 pr-0">
                <?php if($sc_mission['img_mission']){ ?>
                    <div class="img">
                        <img src="<?php echo esc_url($sc_mission['img_mission']['url']); ?>" alt="img">
                    </div>
                <?php } ?>
            </div>
            <div class="col-xl-5 pl-120 pr-60 d-flex flex-direction-column justify-content-center">
                <?php if($sc_mission['title']){ echo '<div class="heading-group p-relative">'; }
                if($sc_mission['title']){
                    echo '<h2 class="heading-title p-relative pb-20">'. $sc_mission['title'] .'</h2>';
                }
                if($sc_mission['title']){
                    echo '<span class="blurred-text">'. $sc_mission['title'] .'</span>';
                }
                if($sc_mission['title']){ echo '</div>'; }
                if($sc_mission['content']){
                    echo '<div class="content text-justify">'. $sc_mission['content'] .'</div>';
                } ?>
            </div>
        </div>
        <?php } ?>
    </div>
</section>