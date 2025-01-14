<?php 
	/*
	** Template name: Template News & Events
	*/
	get_header();
?>
<style>
	.nav-anchor.active ul li a.active{
		color: #F05A25;
    	text-decoration: underline;
	}
	.nav-anchor.active ul li a{
		border: 0;
		padding: 0;
	}
</style>
<main>
    <section class="page__title-area page__title-height page__title-overlay d-flex align-items-end" style="    background: linear-gradient(to bottom right, #1b1464f2, #20c4ebd4); ">
		<div class="container">
			<div class="row">
				<div class="col-xxl-12">
					<div class="page__title-wrapper mb-70 mb-40-mob">
						<h1 class="page__title">
							<?php if(is_tag()){
								echo single_tag_title( '', false );
							}
							else{
								echo single_cat_title( '', false );
							} ?>
							
						</h1> 
					</div>
				</div>
			</div>
		</div>
	</section>
	<section>
		<div class="container pt-4">
		  								
		</div>
	</section>

</main>

<?php
	get_footer();
?>
