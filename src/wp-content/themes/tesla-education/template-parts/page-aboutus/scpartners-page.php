<?php $title_partners = get_field('title_partners_about');
$blurred_partners = get_field('blurred_partners_about');
$lists_partners = get_field('lists_partners');
?>
<section class="about__partners bg-gray pt-30 pb-40">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 p-relative">
                <?php if($title_partners && $blurred_partners){ echo '<div class="heading-group p-relative">'; }
                if($title_partners){
                    echo '<h2 class="heading-title text-center">'. $title_partners .'</h2>';
                }
                if($blurred_partners){
                    echo '<span class="blurred-text text-center">'. $blurred_partners .'</span>';
                }
                if($title_partners && $blurred_partners){ echo '</div>'; }
                if($lists_partners){
                echo '<ul class="about__partners-wrapper custom-slider">';
                foreach($lists_partners as $image){ ?>
                    <li class="item ml-10 mr-10">
                        <?php if($image['link']){
                            echo '<a href="'. $image['link'] .'" class="p-relative ">';
                        } else {
                            echo '<div class="p-relative">';
                        } ?>
                        <img src="<?php echo $image['img']['url']; ?>" class="p-absolute" alt="image">
                        <?php if($image['link']){
                            echo '</a>';
                        } else {
                            echo '</div>';
                        } ?>
                    </li>
                <?php }
                echo '</ul>';
                } ?>
            </div>
        </div>
    </div>
</section>