<?php
$time=time();
$content = file_get_contents('https://calendar.google.com/calendar/embed?src=c_c2lhh4qt9o30j02l0ekdnba2lk%40group.calendar.google.com&amp;ctz=Asia%2FHo_Chi_Minh');
$content = str_replace('</title>','</title><base href="https://www.google.com/calendar/" />', $content);
$content = str_replace('</head>','<link rel="stylesheet" href="/wp-content/themes/tesla-education/assets/css/google.css?ver='.$time.'" /></head>', $content);
echo $content; 
?>  