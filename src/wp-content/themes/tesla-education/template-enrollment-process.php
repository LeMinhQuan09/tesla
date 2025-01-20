<?php
/**
 * Template Name: Template Enrollment Process
 */
get_header(); ?>
<main>
	<?php 
        get_template_part('template-parts/partial/hero-banner', 'partial');
        get_template_part('template-parts/page-enrollment/scadmission-page');
        get_template_part('template-parts/page-enrollment/scprocess-page');
    ?>
</main>
<?php get_footer(); ?>