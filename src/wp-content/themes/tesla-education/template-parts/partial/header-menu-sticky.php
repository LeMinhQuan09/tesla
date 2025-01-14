
  <style type="text/css">
    .menu-parent
    {
      background: #1b1464;
    }
  	.sticky-hed
  	{
  		display: flex;
  		justify-content: center;
  		position: relative;
  		z-index: 0;
  	}
  	.sticky-hed li
  	{
      color: #fff;
      font-size: 16px;
      padding: 7px 20px;
  	}
  	.sticky-hed li a:hover
  	{
  		color:#f05a25;
  	}
  	.sticky-hed li .driver-bottom
  	{
  		width:0;
      margin-bottom: 0px;
  	}
  </style>
  <nav>
    <?php  if( have_rows('menu_sticky', 'option') ): 
          while( have_rows('menu_sticky', 'option') ): the_row();
    ?>
    <ul class="mega-sub-menu sticky-hed">
    <?php if(pll_current_language() == 'en'){ ?>
      <?php if( have_rows('menu_english') ):
        while( have_rows('menu_english') ): the_row(); 
          $who_en = get_sub_field('who_we_are') ;
            $who_link = $who_en['url'];
            $who_title = $who_en['title'];
          $adm_en = get_sub_field('admissions') ;
            $adm_link = $adm_en['url'];
            $adm_title = $adm_en['title'];
          $learning_en = get_sub_field('learning') ;
            $learning_link = $learning_en['url'];
            $learning_title = $learning_en['title'];
          $school_en = get_sub_field('school_life') ;
            $school_link = $school_en['url'];
            $school_title = $school_en['title'];
          $community_en = get_sub_field('community') ;
            $community_link = $community_en['url'];
            $community_title = $community_en['title'];
          $discover_en = get_sub_field('discover') ;
            $discover_link = $discover_en['url'];
            $discover_title = $discover_en['title'];
      ?>
    		<li class="who-bg item-bg"><a class="mega-menu-link" href="<?php echo $who_link; ?>"><?php echo $who_title; ?></a></li>
          <li class="admissions-bg item-bg"><a class="mega-menu-link" href="<?php echo $adm_link; ?>"><?php echo $adm_title; ?></a></li>
          <li class="learning-bg item-bg"><a class="mega-menu-link" href="<?php echo $learning_link; ?>" ><?php echo $learning_title; ?></a></li>
          <li class="knowledge-bg item-bg"><a class="mega-menu-link" href="<?php echo $school_link; ?>"><?php echo $school_title; ?></a></li>
          <li class="community-bg item-bg"><a class="mega-menu-link" href="<?php echo $community_link; ?>"><?php echo $community_title; ?></a></li>
          <li class="discover-bg item-bg"><a class="mega-menu-link" href="<?php echo $discover_link; ?>"><?php echo $discover_title; ?></a></li>
    	 <?php endwhile; endif; ?>
      <?php } else{ ?>
        <?php if( have_rows('menu_tieng_viet') ):
          while( have_rows('menu_tieng_viet') ): the_row(); 
              $who_vi = get_sub_field('chung_toi_la_ai') ;
                $who_link = $who_vi['url'];
                $who_title = $who_vi['title'];
              $adm_vi = get_sub_field('tuyen_sinh') ;
                $adm_link = $adm_vi['url'];
                $adm_title = $adm_vi['title'];
              $learning_vi = get_sub_field('chuong_trinh') ;
                $learning_link = $learning_vi['url'];
                $learning_title = $learning_vi['title'];
              $school_vi = get_sub_field('doi_song_hoc_duong') ;
                $school_link = $school_vi['url'];
                $school_title = $school_vi['title'];
              $community_vi = get_sub_field('cong_dong') ;
                $community_link = $community_vi['url'];
                $community_title = $community_vi['title'];
              $discover_vi = get_sub_field('thong_tin_giao_duc') ;
                $discover_link = $discover_vi['url'];
                $discover_title = $discover_vi['title'];
          ?>
    		<li class="who-bg item-bg"><a class="mega-menu-link" href="<?php echo $who_link; ?>"><?php echo $who_title; ?></a></li>
        <li class="admissions-bg item-bg"><a class="mega-menu-link" href="<?php echo $adm_link; ?>" ><?php echo $adm_title; ?></a></li>
        <li class="learning-bg item-bg"><a class="mega-menu-link" href="<?php echo $learning_link; ?>"><?php echo $learning_title; ?></a></li>
        <li class="knowledge-bg item-bg"><a class="mega-menu-link" href="<?php echo $school_link; ?>"><?php echo $school_title; ?></a></li>
        <li class="community-bg item-bg"><a class="mega-menu-link" href="<?php echo $community_link; ?>"><?php echo $community_title; ?></a></li>
        <li class="discover-bg item-bg"><a class="mega-menu-link" href="<?php echo $discover_link; ?>"><?php echo $discover_title; ?></a></li>
        <?php endwhile; endif; ?>
    	<?php } ?>
    	</ul>
    <?php endwhile; endif; ?>
  </nav>
<script type="text/javascript">
  jQuery('#mega-menu-primary-menu').on('mouseover', function() {
      jQuery('.sticky-hed').addClass('d-none');
  });
  window.onscroll = function(){
  if(jQuery('.mega-who-bg').hasClass('mega-current_page_parent') || jQuery('.mega-who-bg').hasClass('mega-current_page_item')) {
    jQuery('.sticky-hed .who-bg a').addClass('orange');
  }
  else if(jQuery('.mega-admissions-bg').hasClass('mega-current_page_parent') || jQuery('.mega-admissions-bg').hasClass('mega-current_page_item')) {
    jQuery('.sticky-hed .admissions-bg a').addClass('orange');
  }
  else if(jQuery('.mega-learning-bg').hasClass('mega-current_page_parent') || jQuery('.mega-learning-bg').hasClass('mega-current_page_item')) {
    jQuery('.sticky-hed .learning-bg a').addClass('orange');
  }  
  else if(jQuery('.mega-knowledge-bg').hasClass('mega-current_page_parent') || jQuery('.mega-knowledge-bg').hasClass('mega-current_page_item')) {
    jQuery('.sticky-hed .knowledge-bg a').addClass('orange');
  }
  else if(jQuery('.mega-community-bg').hasClass('mega-current_page_parent') || jQuery('.mega-community-bg').hasClass('mega-current_page_item')) {
    jQuery('.sticky-hed .community-bg a').addClass('orange');
  }  
  else if(jQuery('.mega-discover-bg').hasClass('mega-current_page_parent') || jQuery('.mega-discover-bg').hasClass('mega-current_page_item')) {
    jQuery('.sticky-hed .discover-bg a').addClass('orange');
  }  
  else{
    jQuery('sticky-hed li a').removeClass('orange');
  }
  if(jQuery('.sticky-hed').hasClass('d-none')) {
      jQuery('.sticky-hed').removeClass('d-none');
  }
  };
</script>