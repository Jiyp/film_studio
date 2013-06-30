<?php 
$ons = array('/','/views/ons/trailers/','/views/ons/videos/','/views/ons/photos/');
$other = array('/views/other/sailfish/','/views/other/17th/','/views/other/book/');
$about_us = array('/views/aboutus/','/views/aboutus/contactus/','/views/aboutus/news/');
$large = array('/views/large/');
$perfect = array('/views/perfect/');

$route = array_merge( $ons, $other, $about_us, $large, $perfect );
$_uri = $_SERVER['REQUEST_URI'];
if( in_array( $_uri, $route ) ){
	
}
?>