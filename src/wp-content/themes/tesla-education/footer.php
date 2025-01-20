<footer id="site-footer" role="contentinfo" class="header-footer-group">
    <div class="footer__area pt-40 pb-50 bg-blue">
        <div class="container">
            <div class="row">
                <div class="col-12 footer__logo d-flex align-items-center mb-30">
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
            <div class="row">
                <div class="col-lg-4 footer__widget-des mb-30-mob">
                    <?php dynamic_sidebar( 'footer_des' ); ?> 
                    <ul class="social-list mt-35">
                        <li>
                            <a href="https://www.facebook.com/Teslaedugroup/" target="_blank" title="">
                                <img src="https://tesla.hdweb24h.com/wp-content/uploads/2025/01/icon-fb.png" alt="" />
                            </a>
                        </li>
                        <li>
                            <a href="https://www.tiktok.com/@truongibquoctetesla" target="_blank" title="">
                                <img src="https://tesla.hdweb24h.com/wp-content/uploads/2025/01/icon-tiktok.png" alt="" />
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/teslaeduvn/" target="_blank" title="">
                                <img src="https://tesla.hdweb24h.com/wp-content/uploads/2025/01/icon-ins.png" alt="" />
                            </a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/channel/UCvmKGGnpdW_fQv0Bv-C5How" target="_blank" title="">
                                <img src="https://tesla.hdweb24h.com/wp-content/uploads/2025/01/icon-youtube.png" alt="" />
                            </a>
                        </li>
                        <li>
                            <a href="https://zalo.me/0984948080" target="_blank" title="zalo">
                                <img src="https://tesla.hdweb24h.com/wp-content/uploads/2025/01/icon-zalo.png" alt="" />
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 footer__widget-menu mb-30-mob">
                    <?php dynamic_sidebar( 'footer_menu_1' ); ?> 
                </div>
                <div class="col-lg-2 footer__widget-menu mb-30-mob">
                    <?php dynamic_sidebar( 'footer_menu_2' ); ?>
                </div>
                <div class="col-lg-4 footer__widget-contact">
                    <?php dynamic_sidebar( 'footer_contact' ); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__copyright pt-20 pb-20">
        <p class="text-center mb-0">Copyright © 2025 - Tesla Education.</p>
    </div>
    <!--popup-->
<?php $loca = '_en'; if(get_locale() == 'vi') { $loca = '_vn'; } ?>
<?php if( have_rows('popup'.$loca, 'option') ): ?>
	<?php while( have_rows('popup'.$loca, 'option') ): the_row(); $link = get_sub_field('link'); if(get_sub_field('active_popup')){ ?>
    <div class="modal popup-advise" id="myModal-onload">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
		
          <div class="modal-body">
            <div class="row">
                <div class="col-sm-12 p-0" style="background: #F05A25;">
					 <div class="modal-header p-0" style="height:0;">
						<button style="margin: 30px 0 0 auto;filter: brightness(0) invert(1);" type="button" class="btn-close btn-close-onload" data-bs-dismiss="modal"></button>
					</div>
					<a <?php echo (!empty($link['target']) && $link['target'] == '_blank')?'target="_blank"':'';?> title="<?php echo !empty($link['title'])?$link['title']:'';?>" href="<?php echo !empty($link['url'])?$link['url']:'#';?>"> 
						<img alt="" src="<?php echo get_sub_field('image');?>"/>
					</a> 
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	<?php } endwhile; ?>
<?php endif; ?>	
    <div class="modal popup-advise" id="myModal">
      <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-body">
            <?php if(get_locale() == 'vi') { ?>
            <?php if( have_rows('make_an_enquiry_vn', 'option') ): ?>
                <?php while( have_rows('make_an_enquiry_vn', 'option') ): the_row(); 
                    $text = get_sub_field('text');
                    $form_content = get_sub_field('form_content');
                    $news = get_sub_field('news');
            ?>
            <div class="row">
                <div class="col-sm-6" style="background: #F05A25;">
                    <div class="form-advise">
                        <p class="title-fr"><?php echo $text; ?></p>
                        <?php echo do_shortcode($form_content); ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="news-advise">
                        <div class="modal-header" >
                            <p class="n-title"><?php echo $news; ?></p>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="n-body">
                            <?php if( have_rows('details', 'option') ): ?>
                                <?php while( have_rows('details', 'option') ): the_row(); 
                                    $title = get_sub_field('title');
                                    $description = get_sub_field('description');
                                    $link = get_sub_field('link');
                                    $button_title = get_sub_field('button_title');
                            ?>
                            <div class="description">
                                <a href="<?php echo $link; ?>">
                                    <p><strong><?php echo $title; ?></strong></p>
                                    <p><?php echo $description; ?></p>
                                    <p class="read-more"><?php echo $button_title; ?> ></p>
                                </a>
                            </div>
                            <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
            <?php } else if(get_locale() == 'en_US') { ?>
            <?php if( have_rows('make_an_enquiry', 'option') ): ?>
            <?php while( have_rows('make_an_enquiry', 'option') ): the_row(); 
                $text = get_sub_field('text');
                $form_content = get_sub_field('form_content');
                $news = get_sub_field('news');
            ?>
            <div class="row">
                <div class="col-sm-6" style="background: #F05A25;">
                    <div class="form-advise">
                        <p class="title-fr"><?php echo $text; ?></p>
                        <?php echo do_shortcode($form_content); ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="news-advise">
                        <div class="modal-header">
                            <p class="n-title"><?php echo $news; ?></p>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="n-body">
                            <?php if( have_rows('details', 'option') ): ?>
                                <?php while( have_rows('details', 'option') ): the_row(); 
                                    $title = get_sub_field('title');
                                    $description = get_sub_field('description');
                                    $link = get_sub_field('link');
                                    $button_title = get_sub_field('button_title');
                            ?>
                            <div class="description">
                                <a href="<?php echo $link; ?>">
                                    <p><strong><?php echo $title; ?></strong></p>
                                    <p><?php echo $description; ?></p>
                                    <p class="read-more"><?php echo $button_title; ?> ></p>
                                </a>
                            </div>
                            <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <!--popup send email menu -->
    <div class="modal popup-advise" id="send-en-email">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-body">
            <?php if(get_locale() == 'vi') { ?>
            <div class="row">
                <div class="col-sm-12" style="background: #F05A25;">
                    <div class="form-advise">
                        <?php $form_vn = get_field('form_email_vn', 'option'); ?>
                        <?php echo do_shortcode($form_vn); ?>
                    </div>
                </div>
            </div>
            <?php } else if(get_locale() == 'en_US') { ?>
            <div class="row">
                <div class="col-sm-12" style="background: #F05A25;">
                    <div class="form-advise">
                        <?php $form_en = get_field('form_email_en', 'option'); ?>
                        <?php echo do_shortcode($form_en); ?>
                    </div>
                </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <!--popup it support -->
    <div class="modal popup-advise" id="it-support-form">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <?php if(get_locale() == 'vi') { ?>
                    <div class="row">
                        <div class="col-sm-12" style="background: #F05A25;">
                            <div class="form-advise">
                                <?php $form_vn = get_field('form_it_support_vn', 'option'); ?>
                                <?php echo do_shortcode($form_vn); ?>
                            </div>
                        </div>
                    </div>
                    <?php } else if(get_locale() == 'en_US') { ?>
                    <div class="row">
                        <div class="col-sm-12" style="background: #F05A25;">
                            <div class="form-advise">
                                <?php $form_en = get_field('form_it_support_en', 'option'); ?>
                                <?php echo do_shortcode($form_en); ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!--search-->
    <!-- The Modal -->
    <div class="modal form-search" id="mySearch">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">
                    <?php if(get_locale() == 'vi') { ?>
                        <?php get_search_form(); ?>
                    <?php } else if(get_locale() == 'en_US') { ?>
                        <?php get_search_form(); ?>
                    <?php } ?>  
                </div>
            </div>
        </div>
    </div>
    <!--popup-->
    <!-- Popup Video - Template Tesla Video -->
    <div class="modal popup-video" id="myVideo">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">
                    <iframe id="myFrame" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="modal-button">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
            </div>

        </div>
    </div>
    <!-- Popup Video HOME - Template Tesla Video -->
    <div class="modal popup-video" id="videoHome">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">
                    <iframe id="frameHome" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="modal-button">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
            </div>

        </div>
    </div>
    <!-- Popup Contact us -->
    <div class="modal popup-contact" id="popupContact">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <?php get_template_part('template-parts/partial/popup-contact', 'partial'); ?>
                </div>
                <div class="modal-button">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
            </div>

        </div>
    </div>
</footer><!-- #site-footer -->
<!-- footer area end --> 
<!-- fixed contact -->
<div class="fixed-contact">
    <ul>
        <li>
            <div class="fixed-contact-search item"  data-bs-toggle="modal" data-bs-target="#mySearch">
                <img src="<?php echo site_url(); ?>/wp-content/themes/tesla-education/assets/img/icon/ic-search.png" alt="" />
            </div>
        </li>
        <li>
            <a href="#" class="item" data-bs-toggle="modal" data-bs-target="#popupContact">
                <img src="https://tesla.hdweb24h.com/wp-content/uploads/2025/01/icon-ques.png" alt="">
            </a>
        </li>
        <li>
            <a href="tel:0984948080" class="item">
                <img src="https://tesla.hdweb24h.com/wp-content/uploads/2025/01/cta-phone.png" alt="">
            </a>
        </li>
        <li>
            <a href="https://zalo.me/0984948080" target="_blank" class="item">
                <img src="https://tesla.hdweb24h.com/wp-content/uploads/2025/01/zalo-white.png" alt="">
            </a>
        </li>
    </ul>
</div>
<!-- contact fixed --> 
<!-- JS here -->            
<script src="<?php echo site_url(); ?>/wp-content/themes/tesla-education/assets/js/vendor/jquery-3.5.1.min.js"></script>
<script src="<?php echo site_url(); ?>/wp-content/themes/tesla-education/assets/js/vendor/waypoints.min.js"></script> 
<script src="<?php echo site_url(); ?>/wp-content/themes/tesla-education/assets/js/bootstrap.bundle.min.js"></script> 
<script src="<?php echo site_url(); ?>/wp-content/themes/tesla-education/assets/js/jquery.meanmenu.js"></script> 
<script src="<?php echo site_url(); ?>/wp-content/themes/tesla-education/assets/js/swiper-bundle.min.js"></script> 
<script src="<?php echo site_url(); ?>/wp-content/themes/tesla-education/assets/slick/slick.min.js"></script> 
<script src="<?php echo site_url(); ?>/wp-content/themes/tesla-education/assets/js/jquery.fancybox.min.js"></script> 
<script src="<?php echo site_url(); ?>/wp-content/themes/tesla-education/assets/js/isotope.pkgd.min.js"></script> 
<script src="<?php echo site_url(); ?>/wp-content/themes/tesla-education/assets/js/parallax.min.js"></script> 
<script src="<?php echo site_url(); ?>/wp-content/themes/tesla-education/assets/js/backToTop.js"></script> 
<script src="<?php echo site_url(); ?>/wp-content/themes/tesla-education/assets/js/ajax-form.js"></script> 
<script src="<?php echo site_url(); ?>/wp-content/themes/tesla-education/assets/js/wow.min.js"></script> 
<script src="<?php echo site_url(); ?>/wp-content/themes/tesla-education/assets/js/imagesloaded.pkgd.min.js"></script> 
<script src="<?php echo site_url(); ?>/wp-content/themes/tesla-education/assets/dist/aos.js"></script>
<!-- <script src="<?php //echo site_url(); ?>/wp-content/themes/tesla-education/assets/js/js-cursor.js"></script>   -->
<script src="<?php echo site_url(); ?>/wp-content/themes/tesla-education/assets/js/main.js"></script>  
<script> 
    if($(window).width() > 1199){
         $('#mobile-menu #mega-menu-primary-menu > li > a').each(function(){
             var item = jQuery(this);
             item.addClass('open_cursor custom_cursor_hover');
             item.append('<i class="icon-cs"></i>');
         });
    }
    if($(window).width() < 1200){
        $('.mb-menu #mega-menu-primary-menu > li > a').each(function(){
             var item = jQuery(this);
             item.addClass('open_cursor custom_cursor_hover');
             item.append('<i class="icon-cs"></i>');
        });
    }  
    
    $(document).ready(function() {
        $('#mega-menu-3724-0').append('<div class="item-tam"></div>');
        $('#mega-menu-3725-0').append('<div class="item-tam"></div>');
        $('.item-bg > a').append('<div class="driver-bottom driver-bottom-40"></div>');
        $('#mega-menu-item-3216 > a').append('<div class="driver-bottom"></div>');
        $('#mega-menu-item-3217 > a').append('<div class="driver-bottom"></div>');
        $('#mega-menu-item-3226 > a').append('<div class="driver-bottom"></div>');

        $('#mega-menu-item-3252 > a').append('<div class="driver-bottom"></div>');
        $('#mega-menu-item-3265 > a').append('<div class="driver-bottom"></div>');
        $('#mega-menu-item-3274 > a').append('<div class="driver-bottom"></div>');

        $('body #mega-menu-wrap-primary-menu #mega-menu-primary-menu > li.mega-menu-megamenu').append('<div class="item-black-bg"></div>');

    });
</script>
<script >
jQuery(document).ready(function(e) {

    var screenWidth = jQuery(window).width();
	
	setTimeout(function(){
		jQuery('.narrative-line1').fadeIn(200);
	}, 200);
	
	jQuery(window).scroll(function(e) {
		
		var myHeight = jQuery(this).height();
        var myScrollTop = jQuery(this).scrollTop();
		
		var narrativeLineHeight = myHeight+myScrollTop-(myHeight/2.5);
		jQuery('.narrative-line1').height(narrativeLineHeight);
    });
	});
	
</script>
<script type="text/javascript">
    jQuery(window).on("scroll", function () {
    jQuery(this).scrollTop() > 50 ? jQuery(".progress-wrap-box").addClass("active-progress-ic") : jQuery(".progress-wrap-box").removeClass("active-progress-ic");
    })

    jQuery(".progress-wrap-box").on("click", function () {
        jQuery(".mega-explore-icon").toggleClass("mega-scroll-on");
        
    });
	
    jQuery(window).on("scroll", function () {
        if (jQuery(".mega-explore-icon").hasClass("mega-scroll-on"))
        { 
            jQuery(".mega-explore-icon").removeClass("mega-scroll-on");
        }
    })
	
	setTimeout(function(){
		jQuery('.list-phone').addClass('active');
		jQuery('.list-phone').fadeIn(200);
  }, 3500);
 
		 jQuery(window).on('load', function(){ 
			// Cookies
			function createCookie(name, value, days) {
				if (days) {
					var date = new Date();
					date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
					var expires = "; expires=" + date.toGMTString();
				}
				else var expires = "";               

				document.cookie = name + "=" + value + expires + "; path=/";
			}

			function readCookie(name) {
				var nameEQ = name + "=";
				var ca = document.cookie.split(';');
				for (var i = 0; i < ca.length; i++) {
					var c = ca[i];
					while (c.charAt(0) == ' ') c = c.substring(1, c.length);
					if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
				}
				return null;
			}

			function eraseCookie(name) {
				createCookie(name, "", -1);
			}
			
			jQuery(".btn-close-onload").on("click", function () {
				createCookie("glink<?php echo get_locale();?>",'ok',1);
			});

			 setTimeout(function(){
					var getglink = readCookie("glink<?php echo get_locale();?>"); 
					if(!getglink){
						jQuery('#myModal-onload').modal('show');
					}
				}, 3500);
		 });
 
</script>
<?php wp_footer(); ?>

    </body>
</html>