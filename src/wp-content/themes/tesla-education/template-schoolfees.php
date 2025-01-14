<?php 
	/*
	** Template name: Template School Fees
	*/
	get_header();
?>
<style>	
	.fees-form form p > label:not(.space){
		margin-right: 15px;
	}
	.fees-form form input[type="text"] {
	    padding: 3px 0;
	}
	.fees-form form input:focus, .fees-form form p > select:focus{
		outline: none; 
	}
	.fees-form{
		max-width: 700px;
	}
	.fees-form form p select{
		padding: 5px 0;	    
	}
	.fees-form form p label.space {
	    min-width: 230px;
	    width: 35%;
	}
	.fees-form form input[type="text"], .fees-form form p > select{
	    width: 64%;
	    border: 0;
	    border-bottom: 1px solid #333;
	    border-radius: 0;
	}
	.read{
		cursor: not-allowed;
	}
	.fees-form form input[type="radio"], .fees-form form p > label:not(.space){
		cursor: pointer;
	}
</style>
<main>
    <section class="page__title-area page__title-height page__title-overlay d-flex align-items-end" data-background="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>">
		<div class="container">
			<div class="row">
				<div class="col-xxl-12">
					<div class="page__title-wrapper mb-30 mb-40-mob">
						<h1 class="page__title"><?php the_title(); ?></h1> 
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<div class="container overflow-inherit mt-100 mb-100 mt-30-mob">
		<div class="section-title fz-40 mb-100 mt-30-mob aos-item" data-aos="fade-up">Payment Fee</div>

		<div class="fees-form">
			<form action="" method="POST">
				<p>
					<label for="f_name" class="space">Họ tên:</label>
				  	<input type="text" id="f_name" name="f_name">
				</p>
			  	<p>
			  		<label for="f_class" class="space">Lớp:</label>
				  	<select name="f_class" id="f_class" required >
					  	<option value="" name="kimkim">Chọn lớp</option>
					  	<option value="Mầm non" name="mam-non">Nhà trẻ 1</option>
					  	<option value="Mầm non" name="mam-non">Nhà trẻ 2</option>
					  	<option value="Mầm non" name="mam-non">Mầm</option>
					  	<option value="Mầm non" name="mam-non">Chồi</option>
					  	<option value="Mầm non" name="mam-non">Lá</option>
					  	<option value="Tiểu học" name="tieu-hoc">lớp 1</option>
					  	<option value="Tiểu học" name="tieu-hoc">lớp 2</option>
					  	<option value="Tiểu học" name="tieu-hoc">lớp 3</option>
					  	<option value="Tiểu học" name="tieu-hoc">lớp 4</option>
					  	<option value="Tiểu học" name="tieu-hoc">lớp 5</option>
					  	<option value="Trung học" name="trung-hoc">lớp 6</option>
					  	<option value="Trung học" name="trung-hoc">lớp 7</option>
					  	<option value="Trung học" name="trung-hoc">lớp 8</option>
					  	<option value="Trung học" name="trung-hoc">lớp 9</option>
					</select>
				</p>
			  	<p>
			  		<label for="f_level" class="space">Cấp:</label>
				  	<input type="text" id="f_level" name="f_level" readonly class="read">
				  	<input type="hidden" id="f_level_hidden" value=''>
				</p>
			  	<p>
			  		<label for="f_shuttle" class="space">Đưa đón:</label>
			  		<input type="radio" id="f_notshuttle" name="f_shuttle" value="Không đưa đón" checked data-shuttle="no">
			  		<label for="f_notshuttle">Không đưa đón</label>
			  		<input type="radio" id="f_oneshuttle" name="f_shuttle" value="1 chiều" data-shuttle="yes">
			  		<label for="f_oneshuttle">1 chiều</label>
			  		<input type="radio" id="f_twoshuttle" name="f_shuttle" value="2 chiều" data-shuttle="yes">
			  		<label for="f_twoshuttle">2 chiều</label>
			  	</p>
			  	<div class="f_has_shuttle">
			  		<p>
						<label for="f_address" class="space">Địa chỉ đưa đón:</label>
					  	<!-- <input type="text" id="f_address" name="f_address"> -->				  	
					  	
					    <input type="text" name="address" id="address" class="form-control" placeholder="Address: Street, No, City">
						<input id="latitude" name="lat" class="form-control"   type="hidden" value=""/>
						<input id="longitude" name="long" class="form-control" type="hidden" value=""/>
						<input id="name_state" name="name_state" class="form-control" type="hidden" value=""/>
						<input id="name_city" name="name_city" class="form-control" type="hidden" value=""/>
						<input id="country-short" name="name_country_short" class="form-control" type="hidden" value=""/>
						<input id="country-long" name="name_country" class="form-control" type="hidden" value=""/>
						<input name="npi-number" id="npi-number" type="hidden" class="form-control">
						<a data-bs-toggle="modal" data-bs-target="#show-map" class="c-green" href="#">
						  		Show map
						</a>
					</p>
				  	<p>
				  		<label for="f_space" class="space">Khoảng cách đưa đón:</label>
				  		<input type="text" id="f_space" name="f_space" readonly class="read">
				  	</p>

				  	<div class="modal fade" id="show-map" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-scrollable">
						    <div class="modal-content">
						      	<div class="modal-header">
							        <h5 class="modal-title" id="staticBackdropLabel">Drag the marker to the position you want</h5>
							        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							    </div>
						      	<div class="modal-body">
						        	kim
						      	</div>
						      	<div class="modal-footer">
						        	<button type="button" class="btn btn-primary">Apply</button>
						      	</div>
						    </div>
						</div>
					</div>
			  	</div>
			  	<p>
			  		<label for="f_space" class="space">Hình thức đóng tiền: </label>
			  		<span>Đóng học phần, đóng nguyên năm</span>
			  	</p>

			  	<input type="submit" value="Xem chi tiết">
			</form>
		</div>	
	</div>
	
	<!-- tab -->
</main>

<?php get_footer(); ?>
<script>
	$(document).ready(function() {

		var choose_class = document.getElementById('f_class');
    	var show_level = document.getElementById('f_level');
    	var level_hidden = document.getElementById('f_level_hidden');
    	function getSelectedOption(choose_class) {
	        var opt;
	        for ( var i = 0, len = choose_class.options.length; i < len; i++ ) {
	            opt = choose_class.options[i];
	            if ( opt.selected === true ) {
	                break;
	            }
	        }
	        return opt;
	    }
        document.getElementById('f_class').onclick = function () {
	        var opt = getSelectedOption(choose_class);
        	show_level.value = opt.value;        	
        	level_hidden.value = $(this).find('option:selected').attr("name");
	    }	
	    $('.f_has_shuttle').slideUp();
	    $('input[type="radio"]').on("click", function() {
	    	var has_shuttle = $("input[name='f_shuttle']:checked").data('shuttle');
	    	if(has_shuttle == 'yes'){
	    		$('.f_has_shuttle').slideDown();
	    	}
	    	else{
	    		 $('.f_has_shuttle').slideUp();
	    	}
	    })

	});
	
</script>