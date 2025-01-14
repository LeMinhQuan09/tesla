<?php $title_video = get_field('title_video');
    $lists_video = get_field('lists_video'); ?>
<section class="home__video pt-40 pb-40">
    <div class="container">
        <?php if($title_video){ ?>
        <div class="row">
            <div class="col-lg-12">
                <h2 class="heading-title text-center"><?php echo $title_video; ?></h2>
            </div>
        </div>
        <?php } ?>
        <?php if($lists_video){
            $j = 0; ?>
            <div class="row mt-20">
                <div class="col-xl-7 col-lg-7 col-sm-12 home__video-first">
                    <?php foreach($lists_video as $val){
                        $j++;
                        parse_str( parse_url( $val['link_youtube'], PHP_URL_QUERY ), $video_id );
                        $video_id = $video_id['v'];
                        if($j === 1){ ?>
                        <div class="play-vid" data-bs-toggle="modal" data-bs-target="#videoHome" data-src="<?php echo $video_id; ?>">
                            <div class="thumb p-relative">
                                <div class="img p-relative">
                                    <!-- <img src="<?php //echo $val['img']['url']; ?>" class="p-absolute-full" alt="image"/> -->
                                    <img src='https://i.ytimg.com/vi/<?php echo $video_id; ?>/maxresdefault.jpg' class="p-absolute-full" alt="image"/>
                                </div>
                                <div class="icon-play p-absolute d-flex align-items-center justify-content-center">
                                    <!-- <div class="phone-vr-circle-fill"></div> -->
                                    <img src="<?php echo get_template_directory_uri().'/assets/img/icon/ic-play.png' ?>" alt="play">
                                </div>
                            </div>
                        </div>
                    <?php } } ?>
                </div>
                <div class="col-xl-5 col-lg-5 col-sm-12 pl-0 home__video-second d-flex flex-direction-column">
                    <?php $g = 0;
                        foreach($lists_video as $video){
                        $g++;
                        parse_str( parse_url( $video['link_youtube'], PHP_URL_QUERY ), $video_id );
                        $video_id = $video_id['v'];
                        if($g > 1){ ?>
                        <div class="play-vid d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#videoHome" data-src="<?php echo $video_id; ?>">
                            <div class="thumb p-relative">
                                <div class="img p-relative">
                                    <!-- <img src="<?php //echo $video['img']['url']; ?>" class="p-absolute-full" alt="image"/> -->
                                    <img src='https://i.ytimg.com/vi/<?php echo $video_id; ?>/hqdefault.jpg' class="p-absolute-full" alt="image"/>
                                </div>
                                <div class="icon-play p-absolute d-flex align-items-center justify-content-center">
                                    <!-- <div class="phone-vr-circle-fill"></div> -->
                                    <img src="<?php echo get_template_directory_uri().'/assets/img/icon/ic-play.png' ?>" alt="play">
                                </div>
                            </div>
                            <div class="content">
                                <h3 class="title line-clamp-2"><?php echo $video['title']; ?></h3>
                                <div class="desc line-clamp-2"><?php echo $video['desc']; ?></div>
                            </div>
                        </div>
                    <?php } } ?>
                </div>
            </div>
        <?php } ?>
    </div>
</section>