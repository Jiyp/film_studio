<?php
$f = $_GET['f'];
$id = $_GET['id'];
$file;
if( isset($f) && isset($id) ){
	$name = md5($f.'_img_'.$id.'jpg');
	$file = 'http://'.$_SERVER['HTTP_HOST'].'/public/images/l/'.$f.'/img_'.$id.'.jpg';
	header('Content-type: image/jpeg');
	header("Content-Disposition: attachment; filename='$name'");
	readfile($file);
	exit();
}
?>