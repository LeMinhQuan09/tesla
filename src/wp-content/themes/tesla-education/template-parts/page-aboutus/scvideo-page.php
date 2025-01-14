<?php $link_youtube = get_field('link_youtube_about');
parse_str( parse_url( $link_youtube, PHP_URL_QUERY ), $video_id );
$video_id = $video_id['v']; ?>
<section class="about__video bg-gray pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 p-relative">
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
    </div>
</section>