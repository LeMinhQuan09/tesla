<?php $title_news = get_field('title_news');
    $id_categories = get_field('sl_categories'); ?>
<section class="home__news pt-40 pb-40">
    <div class="container">
        <?php if($title_news){
            echo '<h2 class="heading-title text-center">'. $title_news .'</h2>';
        } ?>
        <?php if($id_categories){ ?>
        <div class="row mb-30">
            <?php $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 5,
                'cat' => $id_categories,
            );
            $the_query = new WP_Query( $args );
            if ( $the_query->have_posts() ) :
                $i = 0;
                echo '<div class="col-xl-6 col-lg-6 col-sm-12 home__news-first">';
                while ( $the_query->have_posts() ) : $the_query->the_post();
                $i++;
                if($i <= 4) : ?>
                    <div class="post-item">
                        <a href="<?php the_permalink(); ?>" class="post-thumb p-relative">
                            <?php the_post_thumbnail(); ?>
                        </a>
                        <div class="post-content pt-20 pb-20 pl-10 pr-10">
                            <h3 class="title text-center mb-20"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <a href="<?php the_permalink(); ?>" class="btn-light-orange btn-outline-white d-flex align-items-center justify-content-center">
                                <?php echo __('View more','tesla-education') ?>
                            </a>
                        </div>
                    </div>
                <?php endif; 
                endwhile;
                echo '</div>';
                echo '<div class="col-xl-6 col-lg-6 col-sm-12 home__news-second">';
                $i = 0;
                while ( $the_query->have_posts() ) : $the_query->the_post();
                    $i++;
                    if($i === 5) : ?>
                    <div class="post-item d-flex flex-direction-column">
                        <a href="<?php the_permalink(); ?>" class="post-thumb p-relative">
                            <?php the_post_thumbnail(); ?>
                        </a>
                        <div class="post-content d-flex flex-direction-column pt-30 pb-20 pl-10 pr-10">
                            <h3 class="title mb-20"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <div class="excerpt text-justify mb-20"><?php the_excerpt(); ?></div>
                            <a href="<?php the_permalink(); ?>" class="btn-light-orange btn-outline-white d-flex align-items-center justify-content-center">
                                <?php echo __('View more','tesla-education') ?>
                            </a>
                        </div>
                    </div>
                    <?php endif;
                endwhile;
                echo '</div>';
            endif;
            wp_reset_postdata(); ?>
        </div>

        <a href="<?php echo get_category_link( $id_categories ); ?>" class="btn-view d-flex align-items-center justify-content-center"><?php echo __('Xem tất cả','tesla-education'); ?></a>
        <?php } ?>
    </div>
</section>