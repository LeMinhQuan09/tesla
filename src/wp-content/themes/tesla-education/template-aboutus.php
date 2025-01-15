<?php
/**
 * Template Name: Template About Us
 */
get_header(); ?>
<main>
	<?php 
        get_template_part('template-parts/partial/hero-banner', 'partial');
        get_template_part('template-parts/page-aboutus/scabout-page');
        get_template_part('template-parts/page-aboutus/scvideo-page');
        get_template_part('template-parts/page-aboutus/scpartners-page');
        get_template_part('template-parts/page-aboutus/scmessage-page');
        get_template_part('template-parts/page-aboutus/scglance-page');
        get_template_part('template-parts/page-aboutus/scleader-page');
        get_template_part('template-parts/page-aboutus/scvision-page');
        get_template_part('template-parts/page-aboutus/sccoreval-page');
        get_template_part('template-parts/page-aboutus/scwhychoose-page');
    ?>
</main>
<?php get_footer(); ?>