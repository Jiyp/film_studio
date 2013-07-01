<?php
$id = $_GET['i'];
$folder = $_GET['f'];
$img_src = '/public/images/l/'.$folder.'/img_'.$id.'.jpg';
$not_found = '/HttpErrors/404.htm';
$arr = array('0','1','2','3','4','5', '6');
$link_back = null;
if( !file_exists( '../..'.$img_src ) ){
	header("Location: $not_found");
	exit;
}
if( array_search($folder, $arr) < 6 ){
	$link_back = $host.'/views/ons/photos';
} else {
	$link_back = $host.'/views/perfect';
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
	<style>
		#stage{
			width:100%;
			border-top:1px solid #ccc;
		}
		#stage_inner{
			margin:15px 0 10px 0;
		}
	</style>
</head>
<body>
<div>
	<?php include '../common/header.php'; ?>
	
	<div id="stage">
		<div id="stage_inner"><a href="<?=$link_back ?>"><img src="/public/images/back_btn.png" /></a><a href="javascript:location.href='/views/download?f=<?=$folder?>&id=<?=$id?>'" style="margin-left:15px;"><img src="/public/images/download_btn.png" /></a></div>
		<img src="<?= $img_src ?>" />
	</div>
	
	<?php include '../common/footer.php'; ?>	
</div>
</body>
</html>