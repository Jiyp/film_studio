<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<title>萌影画</title>
	<meta name="description" content="Hi,欢迎来到萌影画工作室.我们是热爱电影的爱好者.这里有几个我们的作品,希望您喜欢.有什么感受希望您跟我们联系哈">
    <meta name="keywords" content="萌影画,工作室,电影,一夜惊喜,非常完美,花絮,剧照,预告片" >
	<meta name="author" content="金依萌">
	<link rel="icon" type="image/ico" href="favicon.ico">
	<link rel="stylesheet" type="text/css" href="/public/css/pages/common.css" />
	<link rel="stylesheet" type="text/css" href="/public/css/pages/home.css"  />
</head>
<body>
<div id="main">
		<?php include './views/common/header.php'; ?>
		<div class="brief">
			<div class="bg"><img src="/public/images/quotation_bg_2.png" style="width:100%;height:404px;" /></div>
			<div class="content">
				<!-- <h1 class="png_fix">logo</h1>-->
				<p style="margin-top:50px;">Hi,欢迎来到萌影画工作室。我们是热爱电影的爱好者。这里有几个我们的作品，</p>
				<p>希望您喜欢。有什么感受希望您跟我们联系咯哈 :-)</p>
				<p>-- 金依萌导演 --</p>
			</div>
		</div>
		
		<div class="my_works">
			<div class="wrap">
				<h2 class="title png_fix">我们的作品</h2>
				<ul class="movie_list clearfix">
					<li>
						<img src="/public/images/pic_1_gray_293.png" />
                        <div class="mask"><h1>一夜惊喜预告片</h1></div>
					</li>
                    <li>
                        <img src="/public/images/pic_1_gray_293.png" />
                        <div class="mask"><h1>一夜惊喜花絮</h1></div>
                    </li>
                    <li style="margin-right:0;">
                        <img src="/public/images/pic_1_gray_293.png" />
                        <div class="mask"><h1>一夜惊喜媒体资源</h1></div>
                    </li>
				</ul>
                <ul class="movie_list clearfix">
                    <li>
                        <img src="/public/images/pic_1_gray_293.png" />
                        <div class="mask"><h1>非常完美</h1></div>
                    </li>
                    <li>
                        <img src="/public/images/pic_1_gray_293.png" />
                        <div class="mask"><h1>其他作品</h1></div>
                    </li>
                    <li style="margin-right:0;">
                        <img src="/public/images/pic_1_gray_293.png" />
                        <div class="mask"><h1>关于我们</h1></div>
                    </li>
                </ul>
			</div>
		</div>
		
		<div class="preview">
			<h2 class="title png_fix">预告片</h2>
			<div style="width:930px;margin: 0 auto;padding:72px 0 100px 0;_padding-top:50px;">
				<embed src="http://player.youku.com/player.php/sid/XNTcwMDEzNjU2/v.swf" allowFullScreen="true" quality="high" width="930" height="498" align="middle" allowScriptAccess="always" type="application/x-shockwave-flash"></embed>
				<!-- JiaThis Button BEGIN -->
				<div style="float:right;padding-top:24px;_width:284px;">
				<div class="jiathis_style_32x32" style="height:32px;">
					<a class="jiathis_button_qzone"></a>
					<a class="jiathis_button_tsina"></a>
					<a class="jiathis_button_tqq"></a>
					<a class="jiathis_button_weixin"></a>
					<a class="jiathis_button_renren"></a>
					<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
					<a class="jiathis_counter_style"></a>
				</div>
				</div>
				<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1368857247128408" charset="utf-8"></script>
				<!-- JiaThis Button END -->
			</div>
		</div>
		
		<div class="weibo">
			<h2 class="title png_fix">微博动态</h2>
			<div>
			<iframe width="100%" height="550" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=0&height=550&fansRow=1&ptype=1&speed=300&skin=9&isTitle=1&noborder=1&isWeibo=1&isFans=1&uid=3462839572&verifier=4bd8594e&dpc=1"></iframe>

			</div>
		</div>
		
		<?php include './views/common/footer.php'; ?>
</div>
</body>
</html>
