<?php $title_admission = get_field('title_admission');
    $blurred_admission = get_field('blurred_admission');
    $content_admission = get_field('content_admission');
?>
<section class="enroll__admission pt-80 pb-30">
    <div class="container">
        <div class="row">
            <div class="col-12 enroll__admission-content p-relative">
                <?php 
                    if($title_admission && $blurred_admission){ echo '<div class="heading-group p-relative mb-40">'; }
                    if($title_admission){
                        echo '<h2 class="heading-title text-center p-relative">'. $title_admission .'</h2>';
                    }
                    if($blurred_admission){
                        echo '<span class="blurred-text text-center">'. $blurred_admission .'</span>';
                    }
                    if($title_admission && $blurred_admission){ echo '</div>'; }
                    if($content_admission){
                        echo '<div class="desc text-justify">'. $content_admission .'</div>';
                    } 
                ?>
            </div>
        </div>
    </div>
</section>