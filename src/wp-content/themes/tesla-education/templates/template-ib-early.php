<?php
/**
 * Template Name: Template IB Learning
 */
get_header(); ?>
<main>
    <?php get_template_part('template-parts/partial/hero-banner', 'partial');
        $layout_learning = get_field('layout_learning');
        foreach ($layout_learning as  $section) {
            $acf_fc_layout = $section['acf_fc_layout'] ?? '';
            if($acf_fc_layout) {
                get_template_part('template-parts/page-ib-learning/'.$acf_fc_layout, null, $section);
            }
        } ?>
</main>
<?php get_footer(); ?>