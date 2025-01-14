<?php 
$banner_or_video = get_field('banner_or_video');
$banner_home = get_field('slider_banner_home');
$video_banner = get_field('video_mp4'); ?>
<section class="home__slides">
    <div class="home__slides-wrapper">
        <?php if($banner_or_video == 'video'){ ?>
            <div class="banner__overlay p-relative">
                <video autoplay muted loop id="myVideo">
                    <source src="<?php echo $video_banner; ?>" type="video/mp4">
                </video>
            </div>
        <?php } elseif($banner_or_video == 'banner'){
            if($banner_home){
                echo '<div class="banner__wrapper">';
                foreach($banner_home as $banner){
                    $image = $banner['image'];
                    $url = $banner['link_if_any'];
                    if( $url ) { ?>
                        <a href="<?php echo $url; ?>" class="item d-block">
                            <img src="<?php echo esc_url($image['url']); ?>" alt="image">
                        </a>
                    <?php } else { ?>
                        <div class="item">
                            <img src="<?php echo esc_url($image['url']); ?>" alt="image">
                        </div>
                    <?php }
                }
                echo '</div>';
            } ?>
            
        <?php } ?>
        
    </div>
</section>