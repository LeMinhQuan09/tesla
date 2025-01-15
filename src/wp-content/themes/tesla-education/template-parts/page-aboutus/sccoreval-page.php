<?php $title_core = get_field('title_core');
    $blurred_core = get_field('blurred_core');
    $short_core = get_field('short_core');
    $lists_core_value = get_field('lists_core_value');
?>
<section class="about__value pt-40 pb-40">
    <div class="container">
    <div class="about__value-top mb-40">
        <?php if($title_core && $blurred_core){ echo '<div class="heading-group p-relative mb-0">'; }
        if($title_core){
            echo '<h2 class="heading-title text-center p-relative">'. $title_core .'</h2>';
        }
        if($blurred_core){
            echo '<span class="blurred-text text-center">'. $blurred_core .'</span>';
        }
        if($title_core && $blurred_core){ echo '</div>'; }
        if($short_core){
            echo '<p class="desc mb-0 text-center">'. $short_core .'</p>';
        } ?>

    </div>
        
        <?php if($lists_core_value){
            echo '<ul class="d-grid about__value-list">';
            foreach($lists_core_value as $val){ ?>
                <li class="item p-relative">
                    <div class="icon">
                        <img src="<?php echo esc_url($val['icon']['url']); ?>" alt="icon">
                    </div>
                    <div class="content">
                        <h3 class="title"><?php echo $val['title']; ?></h3>
                        <p class="desc"><?php echo $val['content']; ?></p>
                    </div>
                    <div class="first_letter text-white">
                        <?php echo $val['first_letter']; ?>
                    </div>
                </li>
            <?php }
            echo '</ul>';
        } ?>
    </div>
</section>