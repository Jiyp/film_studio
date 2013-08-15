<?php

$host = 'http://'.$_SERVER['HTTP_HOST'];
$url = 'http://news.baidu.com/ns?word=%D2%BB%D2%B9%BE%AA%CF%B2&tn=newsrss&sr=0&cl=2&rn=10&ct=0';
$data = file_get_contents($url);
$data = str_replace('gb2312', 'utf-8', $data);
$data = iconv("gb2312", "utf-8//IGNORE", $data);

$xml = new SimpleXMLElement($data);
$channel = $xml -> channel;
$channel -> title = '一夜惊喜';
$channel -> link = 'http://mengfilms.com/';
$channel -> generator = 'http://mengfilms.com/';
$channel -> description = '用胶片记录过往 用镜头捕捉人生 我们不仅是故事的缔造者 我们更是生活的亲历人 我们用国际视角演绎中国故事 我们让中国电影吸引世界目光 在这里我们用快乐讲电影';

//移除默认的image节点
unset($channel -> image);

//用随机数生成大图文件夹,目前范围为0-11
for($i = 0; $i < 2; $i++){
	$folder = rand(0, 11);
	$f = '../../public/images/l/'.$folder;
	//获取文件夹下的图片数
	$files = array_diff(scandir($f), array('..', '.'));
	if($files){
		//根据图片数量,获取图片id
		$id = rand(1, count($files));
		//拼装图片url
		$img_src = $host.'/public/images/l/'.$folder.'/img_'.$id.'.jpg';
		$link = $host.'/views/large/?i='.$id.'&f='.$folder;

		$image = $channel -> addChild('image');
		$image -> addChild('title', '一夜惊喜_剧照');
		//reference:
		//http://sixpoint.me/844/php_simplexml_addchild_escaped_ampersand_warning/
		$image -> addChild('link', '');
		$image -> link = $link;
		$image -> addChild('url', $img_src);
	}
}

header('Content-type: text/xml;charset=utf-8');
echo $xml->asXML();

?>