<?php
$images = array(
'0' => 'templates/VipLight/images/top/logo1.jpg',
'1' => 'templates/VipLight/images/top/logo2.jpg',
'2' => 'templates/VipLight/images/top/logo3.jpg',
'3' => 'templates/VipLight/images/top/logo4.jpg',
'4' => 'templates/VipLight/images/top/logo5.jpg',
'5' => 'templates/VipLight/images/top/logo6.jpg',
'6' => 'templates/VipLight/images/top/logo7.jpg',
'7' => 'templates/VipLight/images/top/logo8.jpg',
'8' => 'templates/VipLight/images/top/logon.jpg',
);

$number = rand(1, count($images));
$img = imagecreatefromjpeg($images[$number]);
header('Content-type: image/jpeg');
imagejpeg($img);
?>
