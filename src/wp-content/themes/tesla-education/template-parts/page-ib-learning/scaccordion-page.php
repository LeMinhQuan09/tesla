<?php $acf_fc_layout = $args['acf_fc_layout'] ?? '';
$title_acc = $args['title_acc'];
$blurred_acc = $args['blurred_acc'];
$lists_acc = $args['lists_acc'];
?>
<section class="learning__accordion pt-60 pb-60">
    <div class="container">
        <div class="learning__accordion-main">
            <?php 
                if($title_acc && $blurred_acc){ echo '<div class="heading-group p-relative mb-40">'; }
                if($title_acc){
                    echo '<h2 class="heading-title text-center">'. $title_acc .'</h2>';
                }
                if($blurred_acc){
                    echo '<span class="blurred-text text-center">'. $blurred_acc .'</span>';
                }
                if($title_acc && $blurred_acc){ echo '</div>'; }
                if($lists_acc){
                    $show_acc = 1;
                    $j = 0; ?>
                    <div class="accordion" id="accordion-skills">
                    <?php foreach($lists_acc as $acc){
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
</section>