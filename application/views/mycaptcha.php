<?php
//session_start();
$captcha_num = rand(10000, 99999);
$session_index = !empty($session_index) ? $session_index : '';
$_SESSION[ENC_LOGIN][$session_index] = "$captcha_num";

$font_size = 30;
$img_width = 100;
$img_height = 50;


header("Content-Type: image/png");
$image = @imagecreate($img_width, $img_height); // create background image with dimensions
$background_color = imagecolorallocate($image, 255, 255, 255); // set background color
$text_color = imagecolorallocate($image, 0, 0, 0); // set captcha text color
//imagettftext($image, $font_size, 0, 15, 30, $text_color, 'font.ttf', $captcha_num);
imagestring($image, $font_size, 28, 17, $captcha_num, $text_color);
imagepng($image);
imagedestroy($image);


?>