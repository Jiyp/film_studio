<?php
$id = $_GET['i'];
$folder = $_GET['f'];
$img_src = '/public/images/l/'.$folder.'/img_'.$id.'.jpg';
$not_found = '/404.htm';

if( !file_exists( '../..'.$img_src ) ){
	header("Location: $not_found");
	exit;
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<title>萌影画</title>
	<meta name="description" content="Hi,欢迎来到萌影画工作室.我们是热爱电影的爱好者.这里有几个我们的作品,希望您喜欢.有什么感受希望您跟我们联系哈">
	<!-- <meta name="author" content="金依萌">-->
	<link rel="icon" type="image/ico" href="favicon.ico">
	<link rel="stylesheet" type="text/css" href="<?=$host?>/public/css/pages/common.css" />
	<link rel="stylesheet" type="text/css" href="<?=$host?>/public/css/pages/contactus.css"  />
</head>
<body>
<div>
	<?php include '../common/header.php'; ?>
	
	<div style="width:100%;border-top:1px solid #ccc;padding:20px 0;">
		<img src="<?= $img_src ?>" />
	</div>
	
	<?php include '../common/footer.php'; ?>	
</div>
</body>
</html>
