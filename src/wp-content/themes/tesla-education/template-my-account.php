 <?php
/**
 * Template Name: template my account
 */
 get_header();?>
<?php 



if(!empty($_SESSION['log_out_en']))
{
	$_SESSION['log_out_en']=null;
	wp_redirect( "/en/login/", 301 );
}
if($_SERVER['REQUEST_URI']=="/en/log-out/")
{
	$_SESSION['log_out_en']=1;
	wp_redirect( "/dang-xuat/", 301 );
}

if ( is_user_logged_in() &&($_SERVER['REQUEST_URI']=="/dang-ky/"||$_SERVER['REQUEST_URI']=="/en/registration/")) {
    if(pll_current_language() == 'en'){
		
		wp_redirect( "/en/profile", 301 );
	}
	else
	{
		wp_redirect( "/thong-tin-ca-nhan", 301 );
	}
} 
$array_link=explode("/",$_SERVER['REQUEST_URI']);
if(in_array("thong-tin-ca-nhan", $array_link) &&$_SESSION['ss_profile']==1)
{
	$_SESSION['ss_profile']=null;
	wp_redirect( "/en/profile/", 301 );
}
if(in_array("profile", $array_link)&&in_array("?um_action=edit", $array_link)&&!$_SESSION['ss_profile'])
{
	$_SESSION['ss_profile']=1;
}
?>
<style type="text/css">
	.page__title-height {
		min-height: 200px !important;
	}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<main>
	<?php if( have_rows('banner_section') ): ?>
	    <?php while( have_rows('banner_section') ): the_row(); 
	        $background_image = get_sub_field('background_image');
	        $title = get_sub_field('title');
    ?>
    <section class="page__title-area page__title-height page__title-overlay d-flex align-items-end" style="background-image:url(<?php echo $background_image; ?>);">
		<div class="container">
			<div class="row">
				<div class="col-xxl-12">
					<div class="page__title-wrapper mb-30 mb-40-mob">
					</div>
				</div>
			</div>
		</div>
	</section>
		<?php endwhile; ?>
	<?php endif; ?>
	<style type="text/css">
		.wrap-address .map iframe
		{
			width: 100%;
			height: 300px;
		}
		.sec-contact .sub-ct
		{
		    color: #fff;
			background: #1b1464;
    		padding: 10px 15px;
		}
		.sec-contact .section-title:after
		{
		    content: "";
		    position: absolute;
		    width: 120px;
		    border-bottom: 3px solid #f05a25;
		    bottom: -10px;
		    left: 0;
		}
		.sec-contact .content.term > *
		{
		    color: #1B1464;	
		}
		.title-my-account{
			text-align: center;
			padding-bottom: 50px;
		}

	</style>
	<section class="sec-contact mt-100 mt-30-mod mb-100 mb-30-mob">
		<div class="container">
			<div class="title-my-account">
				<h1 ><?php echo $title; ?></h1>
			</div>
			<?php the_content();?>
		</div>
	</section>
<script>
  $(document).ready(function(){
    //alert("xin chào");
  });
</script>	
</main>
<?php  get_footer();?>
