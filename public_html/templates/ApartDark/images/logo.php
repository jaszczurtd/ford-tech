<?php
$images = array(
'0' => 'templates/ApartDark/images/top/logo1.jpg',
'1' => 'templates/ApartDark/images/top/logo2.jpg',
'2' => 'templates/ApartDark/images/top/logo3.jpg',
'3' => 'templates/ApartDark/images/top/logo4.jpg',
'4' => 'templates/ApartDark/images/top/logo5.jpg',
'5' => 'templates/ApartDark/images/top/logo6.jpg',
'6' => 'templates/ApartDark/images/top/logo7.jpg',
'7' => 'templates/ApartDark/images/top/logo8.jpg',
);

$number = rand(1, count($images));
$img = imagecreatefromjpeg($images[$number]);
header('Content-type: image/jpeg');
imagejpeg($img);
?>
