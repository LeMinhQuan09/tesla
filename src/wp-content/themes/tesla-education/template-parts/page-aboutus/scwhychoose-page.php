<?php $title_whychoose = get_field('title_whychoose');
    $desc_whychoose = get_field('desc_whychoose');
    $lists_why_choose = get_field('lists_why_choose');
?>
<section id="why-ib" class="about__whychoose pt-60 pb-60 pt-30-mob pb-30-mob">
    <div class="container">
        <div class="about__whychoose-top mb-40">
            <?php if($title_whychoose){ echo '<div class="heading-group p-relative mb-40">'; }
            if($title_whychoose){
                echo '<h2 class="heading-title text-center p-relative">'. $title_whychoose .'</h2>';
            }
            if($title_whychoose){
                echo '<span class="blurred-text text-center">'. $title_whychoose .'</span>';
            }
            if($title_whychoose){ echo '</div>'; }
            if($desc_whychoose){
                echo '<p class="desc ml-auto mr-auto mb-0 text-center">'. $desc_whychoose .'</p>';
            } ?>
        </div>
        <?php if($lists_why_choose){
            echo '<ul class="d-grid about__whychoose-list">';
            foreach($lists_why_choose as $val){ ?>
                <li class="item p-relative">
                    <div class="icon">
                        <img src="<?php echo esc_url($val['icon']['url']); ?>" alt="icon">
                    </div>
                    <div class="content">
                        <h3 class="title mt-15 mb-15"><?php echo $val['title']; ?></h3>
                        <p class="desc"><?php echo $val['content']; ?></p>
                    </div>
                </li>
            <?php }
            echo '</ul>';
        } ?>
    </div>
</section>