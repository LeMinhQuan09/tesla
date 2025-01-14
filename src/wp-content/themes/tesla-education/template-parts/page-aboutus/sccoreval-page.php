<?php $title_core = get_field('title_core');
    $blurred_core = get_field('blurred_core');
    $short_core = get_field('short_core');
    $lists_core_value = get_field('lists_core_value');
?>
<section class="about__value pt-40 pb-40">
    <div class="container">
        
        <?php if($lists_core_value){
            echo '<ul class="d-flex about__value-list">';
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