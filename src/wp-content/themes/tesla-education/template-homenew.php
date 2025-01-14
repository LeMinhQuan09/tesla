<?php
/**
 * Template Name: Home Page - New
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Tesla
 * @since Tesla 1.0
 */

get_header(); ?>
<main>
    <!-- hero area start -->
    <?php 
        get_template_part('template-parts/home/scbanner-home');
        get_template_part('template-parts/home/scabout-home');
        get_template_part('template-parts/home/scwhychoose-home');
        get_template_part('template-parts/home/sccorevalues-home');
        get_template_part('template-parts/home/sclearning-home');
        get_template_part('template-parts/home/scnews-home');
        get_template_part('template-parts/home/scvideo-home');
        get_template_part('template-parts/home/sctestimonials-home');
        get_template_part('template-parts/home/sccampus-home');
        get_template_part('template-parts/home/scform-home');
    ?>
</main>

<?php get_footer(); ?>