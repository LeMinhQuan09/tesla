	<?php if( have_rows('link_previous_link_next') ): ?>
	    <?php while( have_rows('link_previous_link_next') ): the_row(); 
	        $background_image = get_sub_field('background_image');
	        $previous_page = get_sub_field('previous_page');
	        $previous = get_sub_field('previous');
	        $link_previous = get_sub_field('link_previous');
	        $next_page = get_sub_field('next_page');
	        $next = get_sub_field('next');
	        $link_next = get_sub_field('link_next');
    endwhile;  endif; ?>
	<?php
	
		$post_id=get_the_ID();
		$post_title=get_the_title();
		
		
		
		$_SESSION['link_pre_id']=@$_SESSION['link_new_id'];
		$_SESSION['link_pre']=@$_SESSION['link_new'];
		$_SESSION['link_pre_name']=@$_SESSION['link_new_name'];
		
		
		$_SESSION['link_new_id']=@$post_id;
		$_SESSION['link_new']=@$_SERVER['HTTP_HOST'].@$_SERVER['REQUEST_URI'];
		$_SESSION['link_new_name']=@$post_title;
		
		if($_SESSION['link_pre_id']==$_SESSION['link_new_id'])
		{
			$_SESSION['link_pre_id']=null;
		}

		if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
			$ip = $_SERVER['HTTP_CLIENT_IP'];  
		}  
		//whether ip is from the proxy  
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
		}  
		//whether ip is from the remote address  
		else{  
		 $ip = $_SERVER['REMOTE_ADDR'];  
		} 
		//create link follow
		$array_linkfollow=[
			'id_post'=>$post_id,
			'title_post'=>$post->post_title,
			'data_type'=>get_post_type(get_the_ID()),
			'id_post_pre'=>@$_SESSION['link_pre_id'],
			'title_post_pre'=>@$_SESSION['link_pre_name'],
			'data_type_pre'=>$_SESSION['get_post_type_pre'],
			'ip_adress'=>@$ip,
			'create_at'=>date("Y-m-d H:i:s"),
		];
		global  $wpdb;
		$table  = $wpdb->prefix . 'follow_link';
		$chheck_ip = $wpdb->get_results("SELECT * FROM $table WHERE ip_adress like '$ip' and id_post = $post_id and id_post_pre =".$_SESSION['link_pre_id']);
		
		if(count($chheck_ip)<1)
		{
			try
			{
				if(
					pll_current_language()==@$_SESSION['link_pre_type']
					&& !empty($_SESSION['link_pre_id'])
					&& get_post_type(get_the_ID())==@$_SESSION['get_post_type_pre']
				)
				{
					$create=$wpdb->insert($table, $array_linkfollow);
				}
				
			}catch (\Exception $th) {
				echo $th->getMessage();
			}
			
		}
		$_SESSION['get_post_type_pre']=get_post_type(get_the_ID());
		$_SESSION['link_pre_type']=pll_current_language();
		
		$page_next=$wpdb->get_results("SELECT COUNT(id_post) 'sumpost', id_post, title_post FROM $table WHERE id_post_pre = $post_id GROUP BY id_post ORDER BY COUNT(id_post) DESC LIMIT 1");
		$data_next=json_decode(json_encode($page_next), true);
		
		$page_pre=$wpdb->get_results("SELECT COUNT(id_post_pre) 'sumpost',id_post_pre,title_post_pre FROM $table WHERE id_post = $post_id GROUP BY id_post_pre ORDER BY COUNT(id_post_pre) DESC LIMIT 1");
		$data_pre=json_decode(json_encode(@$page_pre), true);
	?>
	
<div class="container-fuild fix bg-gradient-f05a25 center-vertical height-240" data-background="<?php echo site_url(); ?>/wp-content/themes/tesla-education/assets/img/home/15.jpg">
	<div class="container next-prev-page">
		<?php
			if(count($page_pre)>0)
			{
				$prev_title = strip_tags(str_replace('"', '', $data_pre[0]['title_post_pre']));
				if(pll_current_language() == 'en'){
					echo "\t" . '<a rel="prev" href="' . get_permalink($data_pre[0]['id_post_pre']) . '" title="' . $prev_title. '" class="open_cursor custom_cursor_hover aos-item" data-aos="fade-up" data-aos-duration="500"><i class="fal fa-arrow-left mr-10"></i> PREVIOUS<strong>'. $prev_title . '</strong></a>' . "\n";
				} else{
					echo "\t" . '<a rel="prev" href="' . get_permalink($data_pre[0]['id_post_pre']) . '" title="' . $prev_title. '" class="open_cursor custom_cursor_hover aos-item" data-aos="fade-up" data-aos-duration="500"><i class="fal fa-arrow-left mr-10"></i> TRƯỚC<strong>'. $prev_title . '</strong></a>' . "\n";
				}
			}else
			{
				$prev_post = get_previous_post();

				if($prev_post) {
				   $prev_title = strip_tags(str_replace('"', '', $prev_post->post_title));
				   if(pll_current_language() == 'en'){
						echo "\t" . '<a rel="prev" href="' . get_permalink($prev_post->ID) . '" title="' . $prev_title. '" class="open_cursor custom_cursor_hover aos-item" data-aos="fade-up" data-aos-duration="500"><i class="fal fa-arrow-left mr-10"></i> PREVIOUS<strong>'. $prev_title . '</strong></a>' . "\n";
					} else{
						echo "\t" . '<a rel="prev" href="' . get_permalink($prev_post->ID) . '" title="' . $prev_title. '" class="open_cursor custom_cursor_hover aos-item" data-aos="fade-up" data-aos-duration="500"><i class="fal fa-arrow-left mr-10"></i> TRƯỚC<strong>'. $prev_title . '</strong></a>' . "\n";
					}
				}
			}
			if(count($page_next)>0 && @$data_next[0]['id_post']!= @$data_pre[0]['id_post_pre'])
			{
				
				$next_title = strip_tags(str_replace('"', '', $data_next[0]['title_post']));
				if(pll_current_language() == 'en'){
					echo "\t" . '<a rel="next" href="' . get_permalink($data_next[0]['id_post']) . '" title="' . $next_title. '" class="open_cursor custom_cursor_hover aos-item" data-aos="fade-up" data-aos-duration="750">NEXT <i class="fal fa-arrow-right ml-10"></i><strong>'. $next_title . '</strong></a>' . "\n";
				} else{
					echo "\t" . '<a rel="next" href="' . get_permalink($data_next[0]['id_post']) . '" title="' . $next_title. '" class="open_cursor custom_cursor_hover aos-item" data-aos="fade-up" data-aos-duration="750">SAU <i class="fal fa-arrow-right ml-10"></i><strong>'. $next_title . '</strong></a>' . "\n";
				}
			}
			else
			{
				$next_post = get_next_post();
				if($next_post) {
				   $next_title = strip_tags(str_replace('"', '', $next_post->post_title));
				   if(pll_current_language() == 'en'){
						echo "\t" . '<a rel="next" href="' . get_permalink($next_post->ID) . '" title="' . $next_title. '" class="open_cursor custom_cursor_hover aos-item" data-aos="fade-up" data-aos-duration="750">NEXT <i class="fal fa-arrow-right ml-10"></i><strong>'. $next_title . '</strong></a>' . "\n";
					} else{
						echo "\t" . '<a rel="next" href="' . get_permalink($next_post->ID) . '" title="' . $next_title. '" class="open_cursor custom_cursor_hover aos-item" data-aos="fade-up" data-aos-duration="750">SAU <i class="fal fa-arrow-right ml-10"></i><strong>'. $next_title . '</strong></a>' . "\n";
					}
				}
			}
			?>
	</div>	
</div>