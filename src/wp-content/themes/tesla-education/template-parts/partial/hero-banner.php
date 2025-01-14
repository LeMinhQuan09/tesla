<?php $bg_breadcrumbs = get_field('img_breadcrumbs','option'); ?>
<div class="hero-banner pt-110 pb-160 p-relative">
    <div class="hero-banner__bg p-absolute-full" style="background-image: url(<?php echo $bg_breadcrumbs; ?>);"></div>
    <div class="hero-banner__content container p-relative">
        <h1 class="hero-banner__title text-white">
            <?php 
                if (is_page()) {
                    the_title(); 
                } elseif (is_singular('post')) {
                    the_title();
                } elseif (is_archive()) {
                    the_archive_title();
                } elseif (is_search()) {
                    printf(__('Kết quả tìm kiếm cho: %s', 'tesla-education'), get_search_query());
                } elseif (is_404()) {
                    _e('Không tìm thấy trang', 'tesla-education');
                }
            ?>
        </h1>
        <?php echo do_shortcode('[rank_math_breadcrumb]'); ?>
    </div>
</div>
