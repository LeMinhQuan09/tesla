<?php if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
} ?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="nitro-verify" content="nitro-636dc38322276a36ad94617301130de050d4714e58638">
		<meta name="msvalidate.01" content="7F6563D44F227270ECB192B2654D37EA" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="zalo-platform-site-verification" content="R8AV4vw3FZfAiv0wgR0G1KwWWJAYtb1iD3K" />
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<link rel="stylesheet" href="<?php echo site_url(); ?>/wp-content/themes/tesla-education/assets/css/preloader.css">
		<link rel="stylesheet" href="<?php echo site_url(); ?>/wp-content/themes/tesla-education/assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo site_url(); ?>/wp-content/themes/tesla-education/assets/css/meanmenu.css">
		<link rel="stylesheet" href="<?php echo site_url(); ?>/wp-content/themes/tesla-education/assets/css/animate.min.css">
		<link rel="stylesheet" href="<?php echo site_url(); ?>/wp-content/themes/tesla-education/assets/slick/slick.css">
		<link rel="stylesheet" href="<?php echo site_url(); ?>/wp-content/themes/tesla-education/assets/slick/slick-theme.css">
		<link rel="stylesheet" href="<?php echo site_url(); ?>/wp-content/themes/tesla-education/assets/css/swiper-bundle.css">
		<!--link rel="stylesheet" href="<?php //echo site_url(); ?>/wp-content/themes/tesla-education/assets/css/swiper-bundle.min.css"-->
		<link rel="stylesheet" href="<?php echo site_url(); ?>/wp-content/themes/tesla-education/assets/css/backToTop.css?ver=1.0.1">
		<link rel="stylesheet" href="<?php echo site_url(); ?>/wp-content/themes/tesla-education/assets/css/jquery.fancybox.min.css">
		<link rel="stylesheet" href="<?php echo site_url(); ?>/wp-content/themes/tesla-education/assets/css/fontAwesome5Pro.css">
		<link rel="stylesheet" href="<?php echo site_url(); ?>/wp-content/themes/tesla-education/assets/css/elegantFont.css">
		<link rel="stylesheet" href="<?php echo site_url(); ?>/wp-content/themes/tesla-education/assets/dist/aos.css">
		<link rel="stylesheet" href="<?php echo site_url(); ?>/wp-content/themes/tesla-education/assets/css/default.css">
		<link rel="stylesheet" href="<?php echo site_url(); ?>/wp-content/themes/tesla-education/assets/css/style.css?ver=1.0.3">
		<link rel="stylesheet" href="<?php echo site_url().'/wp-content/themes/tesla-education/style.css?ver='.time(); ?>">
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-WDBT7NQ');
        </script>
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-MFSLMBNQ');
        </script>
        <!-- End Google Tag Manager -->
		<!-- Meta Pixel Code -->
		<script>
		!function(f,b,e,v,n,t,s)
		{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};
		if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
		n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];
		s.parentNode.insertBefore(t,s)}(window, document,'script',
		'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '1009613976866543');
		fbq('track', 'PageView');
		</script>
		<noscript><img height="1" width="1" style="display:none"
		src="https://www.facebook.com/tr?id=1009613976866543&ev=PageView&noscript=1"
		/></noscript>
		<!-- End Meta Pixel Code -->
		<?php wp_head(); ?> 
	</head>

	<body <?php body_class(); ?>>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WDBT7NQ"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MFSLMBNQ"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<!-- back to top start -->
	<div class="progress-wrap-box">
		<i class="icon-explore"></i>
	</div>
	<div class="progress-wrap">
		<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
			<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
		</svg>
	</div>
	<!-- back to top end --> 

	<!-- header area start -->
	<header>
		<div id="header-sticky" class="header__area bg-blue">
			<div class="header__top">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-xxl-2 col-xl-2 col-lg-3 col-md-2 col-sm-4 col-6">
							<div class="header__left d-flex align-items-center header-ib-logo">
								<?php if( have_rows('logo', 'option') ): ?>
									<a href="<?php echo esc_url(home_url('/')); ?>" title="Tesla" class="main-logo">
										<?php while( have_rows('logo', 'option') ): the_row();  ?>
											<img class="logo-white" src="<?php echo get_sub_field('white_logo', 'option'); ?>" alt="logo">
										<?php endwhile; wp_reset_postdata(); ?>
									</a>
									<a href="https://www.ibo.org/school/062090/" class="sub-logo" title="Tesla - The International Baccalaureate (IB)" target=_blank">
										<?php while( have_rows('logo', 'option') ): the_row();  ?>
											<img class="ib-logo-top" src="<?php echo get_sub_field('ib_white_logo', 'option'); ?>" alt="logo">
										<?php endwhile; wp_reset_postdata(); ?>
									</a>
								<?php endif; ?>
							</div>
						</div>
						<div class="col-xxl-10 col-xl-10 col-lg-9 col-md-10 col-sm-8 col-6 pl-0">
							<div class="header__right d-flex justify-content-end align-items-center">
								<div class="header__lang">
									<ul class="d-flex align-items-center"><?php echo do_shortcode('[language_switcher]'); ?></ul>
								</div>
								<?php if(!wp_is_mobile()){ ?>
								<div class="header__cta d-flex align-items-center ml-30">
									<?php $contact_inf = get_field('contact_inf','option');
									if($contact_inf){ ?>
										<a href="#" class="w-btn">Trial class</a>
										</a>
										<?php $contact_us = get_field('contact_us','option'); ?>
										<a href="<?php echo $contact_us['book_a_tour_link']; ?>" class="e-btn">Book a Tour</a>
										<a href="#" class="e-btn" data-bs-toggle="modal" data-bs-target="#popupContact">Enquire Now</a>
									<?php } ?>
								</div>
								<?php } ?>
								<div class="sidebar__menu d-xl-none">
								   <div class="sidebar-toggle-btn sidebar-toggle-btn-white ml-30" id="sidebar-toggle">
									   <span class="line"></span>
									   <span class="line"></span>
									   <span class="line"></span>
								   </div>
							   </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php if(!wp_is_mobile()){ ?>
			<div class="header__menu">
				<div class="container">
					<nav class="main-menu"> 
						<?php 
							wp_nav_menu( array(
								'theme_location' => 'primary-menu',
								'fallback_cb'    => false,
								'menu_id'        => 'primary-menu',
							) );
						?>
					</nav>
				</div>
			</div>
			<?php } ?>
			
		</div>
	</header>
	<!-- header area end --> 

<?php 
// $array_value = array("Tesla","Group");
//custom_logs($array_value);
?>
<!--?php echo file_get_contents('../custom_logs.log'); ?-->
<!-- sidebar area start -->
<div class="sidebar__area">
    <div class="sidebar__wrapper">
        <div class="sidebar__close">
            <button class="sidebar__close-btn" id="sidebar__close-btn"> <span><i class="fal fa-times"></i></span> <span>close</span> </button>
        </div>
        <div class="sidebar__content">
        	<?php if( have_rows('logo', 'option') ): ?>
            	<div class="logo">
            		<a href="<?php echo esc_url(home_url('/')); ?>">
            			<?php while( have_rows('logo', 'option') ): the_row();  ?>
							<img src="<?php echo get_sub_field('blue_logo', 'option'); ?>" alt="logo">
						<?php endwhile; wp_reset_postdata(); ?>	            		
	            	</a>
            	</div>
            <?php endif; ?>
            <div class="mb-menu fix">
            	<nav> 
                    <?php 
                        wp_nav_menu( array(
						    'theme_location' => 'primary-menu',
						    'fallback_cb'    => false,
						) );
					?>
                </nav>
            </div>
			<div class="mb-cta mt-10 d-flex flex-direction-column align-items-center">
				<?php $contact_inf = get_field('contact_inf','option');
				if($contact_inf){ ?>
					<a href="#" class="e-btn">Trial class</a>
					</a>
					<?php $contact_us = get_field('contact_us','option'); ?>
					<a href="<?php echo $contact_us['book_a_tour_link']; ?>" class="e-btn">Book a Tour</a>
					<a href="#" class="e-btn" data-bs-toggle="modal" data-bs-target="#popupContact">Enquire Now</a>
				<?php } ?>
			</div>
            <style type="text/css">
            	@media(max-width: 1199px)
				{
					.sidebar__search.form-search label:after
					{
					    content: "";
					    background: url(<?php echo site_url(); ?>/wp-content/uploads/2021/12/icon-search.png) no-repeat 0 0;
					    position: absolute;
					    right: 10px;
					    line-height: 0px;
					    top: 10px;
					    width: 30px;
					    height: 30px;
					    background-size: 100%;
					}
				}
            </style>
            <!-- <div class="header__btn header__btn-2 btn-home-mobile"> 
				<a href="#" class="e-btn open_cursor custom_cursor_hover" data-bs-toggle="modal" data-bs-target="#myModal"><span><?php if(pll_current_language() == 'vi'){ echo 'Đăng ký tư vấn'; }else{echo 'Make An Enquiry'; } ?> </span></a>
			</div> -->
        </div>
    </div>
</div>
<!-- sidebar area end -->
<div class="body-overlay"></div>
<!-- sidebar area end -->

<?php 
	// if( have_rows('menu_custom', 'option') ):
	// 	while( have_rows('menu_custom', 'option') ): the_row(); 
	// 		$who = get_sub_field('who_image', 'option');
	// 		$discover = get_sub_field('discover_image', 'option');
	// 		$learning = get_sub_field('learning_image', 'option');
	// 		$admissions = get_sub_field('admissions_image', 'option');
	// 		$knowledge = get_sub_field('knowledge_image', 'option');
	// 		$community = get_sub_field('community_image', 'option');

	// 		echo '<style> @media only screen and (min-width: 1200px){ body #mega-menu-wrap-primary-menu #mega-menu-primary-menu > li.explore-icon > ul > li > ul > li > ul > li > ul > li.who-bg{ background-image: url('.$who.'); }body #mega-menu-wrap-primary-menu #mega-menu-primary-menu > li.explore-icon > ul > li > ul > li > ul > li > ul > li.discover-bg{ background-image: url('.$discover.'); } body #mega-menu-wrap-primary-menu #mega-menu-primary-menu > li.explore-icon > ul > li > ul > li > ul > li > ul > li.learning-bg{ background-image: url('.$learning.'); } body #mega-menu-wrap-primary-menu #mega-menu-primary-menu > li.explore-icon > ul > li > ul > li > ul > li > ul > li.admissions-bg{ background-image: url('.$admissions.'); } body #mega-menu-wrap-primary-menu #mega-menu-primary-menu > li.explore-icon > ul > li > ul > li > ul > li > ul > li.knowledge-bg{ background-image: url('.$knowledge.'); } body #mega-menu-wrap-primary-menu #mega-menu-primary-menu > li.explore-icon > ul > li > ul > li > ul > li > ul > li.community-bg{ background-image: url('.$community.'); } } </style>';

	// endwhile; endif; 
 ?>
<?php
//  $post_id=get_the_ID();
//  if($post_id==37 || $post_id == 8) {
// 	$_SESSION['link_pre_id']=null;
// 	$_SESSION['link_pre']=null;
// 	$_SESSION['link_pre_name']=null;
		
// 	$_SESSION['link_new_id']=null;
// 	$_SESSION['link_new']=null;
// 	$_SESSION['link_new_name']=null;
// 	//$_SESSION['lg_vi']=null;
// }
 ?>