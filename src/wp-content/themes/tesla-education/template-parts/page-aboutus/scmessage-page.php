<?php $title_message = get_field('title_message');
$blurred_message = get_field('blurred_message');
$content_mess = get_field('content_mess');
$img_mess = get_field('img_mess');
?>
<section class="about__message bg-blue pt-70 pb-40">
    <div class="container container-1570">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-sm-12 pl-30 pr-40 about__message-text">
                <?php if($title_message && $blurred_message){ echo '<div class="heading-group p-relative">'; }
                if($title_message){
                    echo '<h2 class="heading-title text-white p-relative pb-20">'. $title_message .'</h2>';
                }
                if($blurred_message){
                    echo '<span class="blurred-text">'. $blurred_message .'</span>';
                }
                if($title_message && $blurred_message){ echo '</div>'; }
                if($content_mess){
                    echo '<div class="content text-justify text-white">'. $content_mess .'</div>';
                } ?>
            </div>
            <div class="col-xl-4 col-lg-4 col-sm-12 pr-30 p-relative about__message-img">
                <?php if($img_mess){ ?>
                    <div class="img">
                        <img src="<?php echo esc_url($img_mess['url']); ?>" alt="image">
                    </div>
                <?php } ?>
            </div>
            
        </div>
    </div>
</section>