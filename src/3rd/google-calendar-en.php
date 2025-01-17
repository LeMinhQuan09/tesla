<?php
$time    = time();
$content = file_get_contents( 'https://calendar.google.com/calendar/u/0/embed?src=tesla.calendar@tesla.edu.vn&ctz=Asia/Ho_Chi_Minh&hl=en&pli=1' );
$content = str_replace( '</title>', '</title><base href="https://www.google.com/calendar/" />', $content );
$content = str_replace( '</head>', '<link rel="stylesheet" href="https://tesla.edu.vn/wp-content/themes/tesla-education/assets/css/google.css?ver=' . $time . '" /></head>', $content );
echo $content; 
