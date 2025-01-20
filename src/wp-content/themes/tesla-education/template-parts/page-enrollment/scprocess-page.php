<?php $list_the_process = get_field('list_the_process');
    $bg_odd = get_field('bg_odd');
    $bg_even = get_field('bg_even');
?>
<section class="enroll__process">
    <?php if($list_the_process){
        $q = 0;
        foreach($list_the_process as $val){
            $q++;
            $title_process = $val['title_process'];
            $blurred_text = $val['blurred_text'];
            $short_desc = $val['short_desc'];
            $main_process = $val['main_process'];
            $more_info = $val['more_info'];
            $title_add = $val['title_add'];
            $blurred_add = $val['blurred_text_add'];
            $lists_accordion = $val['lists_accordion']; ?>
            <div class="enroll__process-wrapper p-relative pt-100 pb-100">
                <div class="bg">
                    <img src="<?php echo ($q % 2 == 0) ? esc_url($bg_even['url']) : esc_url($bg_odd['url']); ?>" alt="image">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-5 col-sm-12 d-flex flex-direction-column justify-content-center enroll__process-step pr-40">
                            <?php 
                                if($title_process && $blurred_text){ echo '<div class="heading-group p-relative">'; }
                                if($title_process){
                                    echo '<h2 class="heading-title p-relative">'. $title_process .'</h2>';
                                }
                                if($blurred_text){
                                    echo '<span class="blurred-text">'. $blurred_text .'</span>';
                                }
                                if($title_process && $blurred_text){ echo '</div>'; }
                                if($short_desc){
                                    echo '<div class="desc text-justify">'. $short_desc .'</div>';
                                } 
                            ?>
                        </div>
                        <div class="col-xl-7 col-lg-7 col-sm-12 enroll__process-accordion">
                            <?php if($main_process){
                                $show = 1; ?>
                                <div class="accordion" id="accordion-<?php echo $q; ?>">
                                <?php foreach($main_process as $process){ ?>
                                    <div class="accordion-item mb-10">
                                        <div class="accordion-header" id="heading-<?php echo $q . '-' . $show; ?>">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $q . '-' . $show; ?>" aria-expanded="<?php echo ($show == 1) ? 'true' : 'false'; ?>" aria-controls="collapse-<?php echo $q . '-' . $show; ?>">
                                                <?php echo $process['title']; ?>
                                            </button>
                                        </div>
                                        <div id="collapse-<?php echo $q . '-' . $show; ?>" class="accordion-collapse collapse <?php echo ($show == 1) ? 'show' : ''; ?>" aria-labelledby="heading-<?php echo $q . '-' . $show; ?>" data-bs-parent="#accordion-<?php echo $q; ?>">
                                            <div class="accordion-body">
                                                <?php echo $process['content']; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php $show++;
                                }
                                echo '</div>';
                            } ?>
                        </div>
                        
                    </div>
                    <?php if($more_info == 1){ ?>
                    <div class="row">
                        <div class="col-12 mt-50 pb-30 enroll__admission-additional p-relative">
                            <?php 
                                if($title_add && $blurred_add){ echo '<div class="heading-group p-relative mb-40">'; }
                                if($title_add){
                                    echo '<h2 class="heading-title text-center p-relative">'. $title_add .'</h2>';
                                }
                                if($blurred_add){
                                    echo '<span class="blurred-text text-center">'. $blurred_add .'</span>';
                                }
                                if($title_add && $blurred_add){ echo '</div>'; }
                                if($lists_accordion){
                                    $show_acc = 1;
                                    $j = 0; ?>
                                    <div class="accordion" id="accordion-additional">
                                    <?php foreach($lists_accordion as $acc){
                                        $j++; ?>
                                        <div class="accordion-item mb-20">
                                            <div class="accordion-header" id="heading-0<?php echo $show_acc; ?>">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-0<?php echo $show_acc; ?>" aria-expanded="true" aria-controls="collapse-0<?php echo $show_acc; ?>">
                                                <?php echo $acc['title']; ?>
                                                </button>
                                            </div>
                                            <div id="collapse-0<?php echo $show_acc; ?>" class="accordion-collapse collapse show" aria-labelledby="heading-0<?php echo $show_acc; ?>">
                                                <div class="accordion-body">
                                                    <?php echo $acc['content']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php $show_acc++; }
                                    echo '</div>';
                                }
                            ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        <?php }
    } ?>
</section>