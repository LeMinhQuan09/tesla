 <?php
/**
 * Template Name: School Test API
 */
get_header(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
<style type="text/css">
  .ui-autocomplete-row
  {
    padding:8px;
    background-color: #f4f4f4;
    border-bottom:1px solid #ccc;
    font-weight:bold;
  }
  .ui-autocomplete-row:hover
  {
  background-color: #ddd;
  }
</style>
<main>
	 
<div class="container overflow-inherit mt-100 mb-100 mt-30-mob mb-20-mob">
  <div class="section-title fz-40 mb-100 mt-30-mob aos-item aos-init aos-animate" data-aos="fade-up">Học Phí</div>
  <form action="">
    <div class="row">
      <div class="col-xxl-9 col-xl-9 col-lg-9 col-sm-12">
        <div class="form-group aos-item aos-init aos-animate" data-aos="fade-up">
          <label for="">Mã Học Sinh</label>
          <input type="text" name="id_student" id="id_student" hidden="true"   required>
          <input type="text" type="text" id="search_data" placeholder="Enter Student name..." autocomplete="off" class="form-control" required>
        </div>
      </div>
      <div class="col-xxl-3 col-xl-3 col-lg-3 col-sm-12">
        <div class="form-group aos-item aos-init aos-animate" data-aos="fade-up">
          <label class="no-mob" for="">&nbsp;</label>
          <button type="submit" id="btn_search" class="e-btn full-cta mb-20-mob aos-item aos-init aos-animate" data-aos="fade-up">Tìm Kiếm</button>
        </div>
      </div>
    </div>
  </form>
  <div id="infoStudent"></div>
</div>
 
</main>
<script>
function openFee(evt, tariffName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tab-tariff");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks-tariff");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tariffName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
<script>
function openFee2(evt, tuitionName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tab-tuition");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks-tuition");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tuitionName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>

<script>
  $(document).ready(function(){
    $('#search_data').autocomplete({
      source: "wordpress/?searchStudents",
      minLength: 1,
      select: function(event, ui)
      {
        $('#search_data').val(ui.item.value);
        $('#id_student').val(ui.item.id_student);
      }
    }).data('ui-autocomplete')._renderItem = function(ul, item){
      return $("<li class='ui-autocomplete-row'></li>")
        .data("item.autocomplete", item)
        .append(item.label)
        .appendTo(ul);
    };
    $("#btn_search").click(function(e) {
        e.preventDefault();//turn off sumbit form
        var id_student=$("#id_student").val();//get type
        var input_search=$("#search_data").val();//get type
        $.ajax({
        type: 'POST',
        url: '<?php echo get_site_url();?>/?jaxSearchStudent',
        data:{
            id_student: id_student,
            input_search: input_search
        },
        success: function (data) {  
          if(data==null)
          {
            alert("Student information not found");
          }else
          {
            $('#infoStudent').html(data);
          }
          
        },
        error: function (e) {
            console.log("There was an error with your request...");
            console.log("error: " + JSON.stringify(e));
        }
        });
    });
    $('#search_data').keyup(function(){
      document.getElementById("id_student").value = null;
    });

  });
</script>

<?php get_footer(); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />