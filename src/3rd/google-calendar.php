<?php
$time    = time();
$content = file_get_contents( 'https://calendar.google.com/calendar/u/0/embed?height=600&wkst=1&bgcolor=%23ffffff&ctz=Asia/Ho_Chi_Minh&hl=vi&src=dGVzbGEuY2FsZW5kYXJAdGVzbGEuZWR1LnZu&color=%23039BE5' );
$content = str_replace( '</title>', '</title><base href="https://www.google.com/calendar/" />', $content );
$content = str_replace( '</head>', '<link rel="stylesheet" href="https://tesla.edu.vn/wp-content/themes/tesla-education/assets/css/google.css?ver=' . $time . '" /></head>', $content );
echo $content; 
