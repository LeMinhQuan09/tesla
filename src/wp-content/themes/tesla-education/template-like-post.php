<?php
/**
 * Template Name: Template Like a post
 */

get_header(); ?>
<main>
    <?php if( have_rows('banner_section') ):
        while( have_rows('banner_section') ): the_row(); 
            $background_image = get_sub_field('background_image');
            $title = get_sub_field('title');
        ?>
        <section class="page__title-area page__title-height page__title-overlay d-flex align-items-end" style="background-image:url(<?php echo $background_image; ?>);">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="page__title-wrapper mb-30 mb-40-mob">
                            <h1 class="page__title"><?php echo $title; ?></h1> 
                            <nav class="nav-anchor mt-30">
                                <ul>
                                    <?php if( have_rows('sub_menu') ): ?>
                                        <?php while( have_rows('sub_menu') ): the_row(); 
                                            $link = get_sub_field('link');
                                            $title = get_sub_field('title');
                                    ?>
                                    <li> <a class="view_txt_cursor custom_cursor_hover" href="<?php echo $link; ?>" title=""><?php echo $title; ?></a> </li>
                                    <?php endwhile; ?>
                                    <?php endif; ?>
                                </ul>
                            </nav>	
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php endwhile; ?>
    <?php endif; ?>
    <div class="container pl-0 pr-0">
        <div class="container-wrapper d-flex">
            <div class="col-toc">
                <?php echo do_shortcode('[toc]'); ?>
            </div>
            <div class="content-post mt-50">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>