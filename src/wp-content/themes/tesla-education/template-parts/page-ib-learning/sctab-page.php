<?php
$acf_fc_layout = $args['acf_fc_layout'] ?? '';
$learning = $args['learning_tab'];
if($learning): 
?>
<section class="early__tab pt-40 pb-30">
    <div class="container">
        <div class="early__tab-main">
            <ul class="nav nav-tabs" id="learningTab" role="tablist">
                <?php 
                $i = 0; 
                foreach($learning as $key => $item): 
                    $i++;
                ?>
                <li class="nav-item" role="presentation">
                    <button class="nav-link <?php echo ($i === 1) ? 'active' : ''; ?>" 
                            id="tab-<?php echo $i; ?>" data-bs-toggle="tab" data-bs-target="#content-<?php echo $i; ?>" 
                            type="button" role="tab" aria-controls="content-<?php echo $i; ?>" 
                            aria-selected="<?php echo ($i === 1) ? 'true' : 'false'; ?>">
                        <?php echo $item['title']; ?>
                    </button>
                </li>
                <?php endforeach; ?>
            </ul>

            <div class="tab-content" id="learningTabContent">
                <?php 
                $j = 0; 
                foreach($learning as $key => $items): 
                    $j++;
                ?>
                <div class="tab-pane fade <?php echo ($j === 1) ? 'show active' : ''; ?>" 
                    id="content-<?php echo $j; ?>" role="tabpanel" aria-labelledby="tab-<?php echo $j; ?>">
                    <div class="early__tab-content d-flex">
                        <?php if($items['img']){
                            echo '<div class="img">
                                <img src="'. esc_url($items['img']['url']) .'">
                            </div>';
                        }
                        if($items['group_content']){
                            echo '<div class="content">';
                            if($items['group_content']['title']){
                                echo '<h2 class="title">'. $items['group_content']['title'] .'</h2>';
                            }
                            if($items['group_content']['content']){
                                echo '<div class="desc text-justify">'. $items['group_content']['content'] .'</div>';
                            }
                            echo '</div>';
                        } ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
