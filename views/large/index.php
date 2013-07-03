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
			background:#f7f7f7;
			border-top:1px solid #ccc;
			overflow-x:hidden;
		}
		#stage_inner{
			min-height:200px;
			_height:200px;
			margin:0 auto;
			margin-bottom:20px;
			width:600px;
			background:url(/public/images/loading.gif) 50% 50% no-repeat;
		}
		#big_img{
			vertical-align:bottom;
			display:none;
		}
		#btn_bar{
			margin: 10px 0 6px 0;
			display:none;
		}
	</style>
	<script>
    (function(){
		var get_size = function( img_w, img_h, max_w, max_h ){
			var h = 0, w = 0;
			if( img_w > 0 && img_h > 0 ){
				if( img_w/img_h >= max_w/max_h){
					img_w > max_w ? (w = max_w,h = ( img_h * max_w )/img_w) : (w = img_w,h = img_h);
				} else {
					img_h > max_h ? (h = max_h,w = ( img_w * max_h )/img_h) : (w = img_w,h = img_h);
				}
			}
			return { w : parseInt(w,10), h : parseInt(h,10) };
		};
        var img = new Image();
        img.onload = function(){
            img.onload = null;
            var size = get_size( img.width, img.height, 960, 640 );
            var _img = document.getElementById('big_img');
            _img.src = img.src;
            _img.width = size.w;
            _img.height = size.h;
            var stage = document.getElementById('stage_inner');
            stage.style.width = size.w + 'px';
            _img.style.display = 'block';
            document.getElementById('btn_bar').style.display = 'block';
        };
        img.src = "<?= $img_src ?>";
    })();
	</script>
</head>
<body>
<div>
	<?php include '../common/header.php'; ?>
	
	<div id="stage">
		<div id="stage_inner">
			<div id="btn_bar"><a href="<?=$link_back ?>"><img src="/public/images/btn_back.png" /></a>
			<a href="javascript:location.href='/views/download?f=<?=$folder?>&id=<?=$id?>'" style="margin-left:15px;"><img src="/public/images/btn_dld.png" /></a></div>
			<img id="big_img" />
		</div>
	</div>
	
	<?php include '../common/footer.php'; ?>	
</div>
</body>
</html>
