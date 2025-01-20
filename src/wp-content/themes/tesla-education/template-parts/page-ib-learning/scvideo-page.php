<?php $acf_fc_layout = $args['acf_fc_layout'] ?? '';
$title_video = $args['title_video'];
$blurred_video = $args['blurred_video'];
$link_youtube = $args['link_youtube'];
parse_str( parse_url( $link_youtube, PHP_URL_QUERY ), $video_id );
$video_id = $video_id['v'];
?>
<section class="learning__video pt-40 pb-30">
    <div class="container">
        <div class="learning__video-content">
            <?php 
                if($title_video && $blurred_video){ echo '<div class="heading-group p-relative mb-40">'; }
                if($title_video){
                    echo '<h2 class="heading-title text-center">'. $title_video .'</h2>';
                }
                if($blurred_video){
                    echo '<span class="blurred-text text-center">'. $blurred_video .'</span>';
                }
                if($title_video && $blurred_video){ echo '</div>'; }
            ?>
            <div class="play-vid" data-bs-toggle="modal" data-bs-target="#videoHome" data-src="<?php echo $video_id; ?>">
                <div class="thumb p-relative">
                    <div class="img p-relative">
                        <img src='https://i.ytimg.com/vi/<?php echo $video_id; ?>/maxresdefault.jpg' class="p-absolute-full" alt="image"/>
                    </div>
                    <div class="icon-play p-absolute d-flex align-items-center justify-content-center">
                        <img src="<?php echo get_template_directory_uri().'/assets/img/icon/ic-play.png' ?>" alt="play">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>