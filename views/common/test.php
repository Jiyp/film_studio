<?php
$id = $_GET['i'];
$folder = $_GET['f'];
$img_src = '/public/images/l/'.$folder.'/img_'.$id.'.jpg';
$not_found = '/HttpErrors/404.htm';

$arr_ons = array('0','1','2','3','4','5', '7', '11');
$arr_perfect = array('10', '6');
$arr_book = array('9');
$arr_aboutus = array('8');

$link_back = null;
if( !file_exists( '../..'.$img_src ) ){
	header("Location: $not_found");
	exit;
}
if( in_array($folder, $arr_ons) ){
	$link_back = $host.'/views/ons/photos/';
} else if( in_array($folder, $arr_perfect) ){
	$link_back = $host.'/views/perfect/';
} else if( in_array($folder, $arr_book) ){
	$link_back = $host.'/views/other/book/';
} else if( in_array($folder, $arr_aboutus) ){
	$link_back = $host.'/views/aboutus/';
}

$imgs;
$next;
$prev;
if( 5 == $folder ){
	$imgs = array("16","10","1","2","3","4","7","8","9","11","12","15","17");
} else if( 1 == $folder ){
	$imgs = array("8","7","6","5","4","3","2","1");
} else if( 4 == $folder ){
	$imgs = array("1","2","3","4","5","6","8","9","10","7");
} else if( 0 == $folder ){
	$imgs = array("3","2","1","4","5");
} else if( 3 == $folder ){
	$imgs = array("4","2","3","5","1");
} else if( 2 == $folder ){
	$imgs = array("3","1","2","4","5");
} else if( 11 == $folder ){
	$imgs = array("1","2","3","4","5");
} else if( 7 == $folder ){
	$imgs = array("1","2","3","4","5","6");
} else if( 10 == $folder ){ //非常完美
	$imgs = array("1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18");
} else if( 6 == $folder ){ //非常完美
	$imgs = array("1","11","3","2","5","6","7","8","9");
} else if( 9 == $folder ){ //漫画书
	$imgs = array("1","2","3","4","5","6","7","8","9","10","11");
} else if( 8 == $folder ){ //关于我们
	$imgs = array("5","1","2","3","4");
}

$key = array_search($id, $imgs);
$len = count($imgs);

$next = '/views/large/?i='.($imgs[$key+1]).'&f='.$folder;
$prev = '/views/large/?i='.($imgs[$key-1]).'&f='.$folder;
if( $len - 1 == $key){ //最后一张图片
	$next = '';
} else if( 0 == $key ){ //第一张
	$prev = '';
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<title>萌影画</title>
	<meta name="description" content="Hi,欢迎来到萌影画工作室.我们是热爱电影的爱好者.这里有几个我们的作品,希望您喜欢.有什么感受希望您跟我们联系哈">
	<link rel="stylesheet" type="text/css" href="<?=$host?>/public/css/pages/common.css" />
	<style>
		#stage{width:100%;background:#f7f7f7;border-top:1px solid #ccc;overflow-x:hidden;}
		#stage_inner{min-height:200px;_height:200px;margin:0 auto;margin-bottom:20px;width:600px;background:url(/public/images/loading.gif) 50% 50% no-repeat;}
		#big_img{vertical-align:bottom;display:none;}
		#btn_bar{margin: 10px 0 6px 0;display:none;}
	</style>
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
<script>
$(function(){
	var slider = function(){
		var next = '<?= $next ?>';
		var prev = '<?= $prev ?>';
		var url;
		var stage = $('#stage_inner');
		stage.on('mousemove', function(e){
			var self = $(this);
			var width = self.width();
			var offsetX = e.offsetX;
			if(offsetX >= width / 2 ){
				self.removeClass('act_prev');
				if( next ){
					self.addClass('act_next');
				}
				url = next;
			} else {
				self.removeClass('act_next');
				if(prev){
					self.addClass('act_prev');
				}
				url = prev;
			}
		});
		stage.on('click', function(){
			url && (location.href = url);
		});
	};

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
		//bind event
		slider();
	};
	img.src = "<?= $img_src ?>";
});
</script>
</body>
</html>
