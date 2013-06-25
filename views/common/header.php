<?php include 'config.php';?>
<?php
$uri = $_SERVER['REQUEST_URI'];
$sub_current = ' style="color:#3399cc;"';
$nav_current = ' class="current"';
$navs = array(0 => '/', 1 => '/views/perfect/', 2 => '/views/other/', 3 => '/views/aboutus/');
$key = array_search($uri, $navs);
$ons = array('/','/views/ons/trailers/','/views/ons/videos/','/views/ons/photos/');
$other = array('/views/other/sailfish/','/views/other/17th/','/views/other/book/');
$about_us = array('/views/aboutus/','/views/aboutus/contactus/','/views/aboutus/news/');
if( in_array($uri, $ons) ){
	$key = 0;
} else if( in_array($uri, $other) ){
	$key = 2;
} else if( in_array($uri, $about_us) ){
	$key = 3;
}
?>
<div class="m_nav_home png_fix">
	<div class="nav_home clearfix">
		<h1 class="logo png_fix"><a href="/">萌影画</a></h1>
		<ul class="nav">
			<li <?php if($key == 0){echo $nav_current;}; ?>"><a href="/" class="link"><span class="valign">一夜惊喜</span><p>F***,I'm Pregnant</p></a>
			<div class="sub_nav" <?php if($key > 0){echo ' style="display:none;"';}; ?>>
				<a href="/views/ons/trailers" <?php if($uri == "/views/ons/trailers/"){echo $sub_current;}; ?> ><p>预告片</p><span>Trailers</span></a>
				<a href="/views/ons/videos" <?php if($uri == "/views/ons/videos/"){echo $sub_current;}; ?>><p>花　絮</p><span>Bts Videos</span></a>
				<a href="/views/ons/photos" <?php if($uri == "/views/ons/photos/"){echo $sub_current;}; ?>><p>剧　照</p><span>BTS Photos</span></a>
			</div>
			</li>
			<li <?php if($key == 1){echo $nav_current;}; ?>><a href="/views/perfect" class="link"><span class="valign">非常完美</span><p>Sophie's Revenge</p></a></li>
			<li <?php if($key == 2){echo $nav_current;}; ?>><a href="/views/other/sailfish/" class="link"><span class="valign">其它作品</span><p>Other work</p></a>
			<div class="sub_nav" <?php if($key != 2){echo ' style="display:none;"';}; ?>>
				<a href="/views/other/sailfish/" <?php if($uri == "/views/other/sailfish/"){echo $sub_current;}; ?> ><p>旗鱼</p><span>Sailfish</span></a>
				<a href="/views/other/17th/" <?php if($uri == "/views/other/17th/"){echo $sub_current;}; ?>><p>第十七个人</p><span>The 17th Man</span></a>
				<a href="/views/other/book/" <?php if($uri == "/views/other/book/"){echo $sub_current;}; ?>><p>漫画书</p><span>Graphic Novels</span></a>
			</div>
			</li>
			<li <?php if($key == 3){echo $nav_current;}; ?>><a href="/views/aboutus"  class="link"><span class="valign">关于我们</span><p>About us</p></a>
			<div class="sub_nav" style="width:181px;right:-10px;<?php if($key != 3){echo 'display:none;';}; ?>">
				<a href="/views/aboutus/news/" <?php if($uri == "/views/aboutus/news/"){echo $sub_current;}; ?> ><p>新闻</p><span>News</span></a>
				<a href="/views/aboutus/contactus/" <?php if($uri == "/views/aboutus/contactus/"){echo $sub_current;}; ?>><p>联系我们</p><span>Contact Us</span></a>
				<a href="/views/aboutus/" <?php if($uri == "/views/aboutus/"){echo $sub_current;}; ?>><p>关于我们</p><span>About Us</span></a>
			</div>
			</li>
		</ul>
	</div>
</div>
