<?php

$host = 'http://'.$_SERVER['HTTP_HOST'];

function create_item($link, $url)
{
    return "<item>
	    <title>萌影画《一夜惊喜》剧照</title>
	    <link>http://mengfilms.com</link>
		<pubDate>Thu, 15 Aug 2013 12:57:41 +0000</pubDate>
	    <description><![CDATA[ 萌影画《一夜惊喜》剧照 ]]></description>
		<category>
			<![CDATA[ 萌影画 ]]>
		</category>
		<category>
			<![CDATA[ 一夜惊喜 ]]>
		</category>
		<category>
			<![CDATA[ 剧照 ]]>
		</category>
		<category>
			<![CDATA[ 电影 ]]>
		</category>
	    <dc:creator>萌影画</dc:creator>
		<description>
			<![CDATA[ 《一夜惊喜》剧照 ]]>
		</description>
	    <content:encoded>
		<![CDATA[
			<p>金依萌导演新作-《一夜惊喜》剧照</p>
			<p><a href=\"http://mengfilms.com\"><img src=\"$url\"></a></p>
		]]>
		</content:encoded>
	</item>";
}

//用随机数生成大图文件夹,目前范围为0-11
$imgs = '';
for($i = 0; $i < 2; $i++){
	$folder = rand(0, 11);
	$f = '../public/images/l/'.$folder;
	//获取文件夹下的图片数
	$files = array_diff(scandir($f), array('..', '.'));
	if($files){
		//根据图片数量,获取图片id
		$id = rand(1, count($files));
		//拼装图片url
		$img_src = $host.'/public/images/l/'.$folder.'/img_'.$id.'.jpg';
		$link = "$host/views/large/?i=$id&amp;f=$folder";

		$imgs = $imgs.create_item($link, $img_src);
	}
}

$videos = 
'<item>
	<title>萌影画《一夜惊喜》视频</title>
	<link>http://mengfilms.com</link>
	<description><![CDATA[ 萌影画《一夜惊喜》视频 ]]></description>
	<pubDate>Thu, 15 Aug 2013 22:34:02 +0800</pubDate>
	<enclosure type="application/x-shockwave-flash" url="http://player.youku.com/player.php/sid/XNTg0Nzg2Njgw/v.swf"/>
</item>
<item>
	<title>萌影画《一夜惊喜》视频</title>
	<link>http://mengfilms.com</link>
	<description><![CDATA[ 萌影画《一夜惊喜》视频 ]]></description>
	<pubDate>Thu, 15 Aug 2013 22:34:02 +0800</pubDate>
	<enclosure type="application/x-shockwave-flash" url="http://player.youku.com/player.php/sid/XNTcwMDEzNjU2/v.swf"/>
</item>
<item>
	<title>萌影画《一夜惊喜》视频</title>
	<link>http://mengfilms.com</link>
	<description><![CDATA[ 萌影画《一夜惊喜》视频 ]]></description>
	<pubDate>Thu, 15 Aug 2013 22:34:02 +0800</pubDate>
	<enclosure type="application/x-shockwave-flash" url="http://player.youku.com/player.php/sid/XNTcwMDEzNjU2/v.swf"/>
</item>
<item>
	<title>《一夜惊喜》- 独家纪录片</title>
	<link>http://mengfilms.com</link>
	<description><![CDATA[ 《一夜惊喜》- 独家纪录片 ]]></description>
	<pubDate>Thu, 15 Aug 2013 22:34:02 +0800</pubDate>
	<enclosure type="application/x-shockwave-flash" url="http://share.vrs.sohu.com/1274484/v.swf"/>
</item>
<item>
	<title>《一夜惊喜》萌贱“找你爸”MV 趣说未婚孕事</title>
	<link>http://mengfilms.com</link>
	<description><![CDATA[ 《一夜惊喜》萌贱“找你爸”MV 趣说未婚孕事 ]]></description>
	<pubDate>Thu, 15 Aug 2013 22:34:02 +0800</pubDate>
	<enclosure type="application/x-shockwave-flash" url="http://player.youku.com/player.php/sid/XNTk0ODQ1NjMy/v.swf"/>
</item>
<item>
	<title>《一夜惊喜》导演金依萌特辑</title>
	<link>http://mengfilms.com</link>
	<description><![CDATA[ 《一夜惊喜》导演金依萌特辑 ]]></description>
	<pubDate>Thu, 15 Aug 2013 22:34:02 +0800</pubDate>
	<enclosure type="application/x-shockwave-flash" url="http://player.youku.com/player.php/sid/XNTc4OTk0Nzc2/v.swf"/>
</item>
<item>
	<title>《一夜惊喜》天王驾到特辑 黎明猛追范爷惊喜十足</title>
	<link>http://mengfilms.com</link>
	<description><![CDATA[ 《一夜惊喜》天王驾到特辑 黎明猛追范爷惊喜十足 ]]></description>
	<pubDate>Thu, 15 Aug 2013 22:34:02 +0800</pubDate>
	<enclosure type="application/x-shockwave-flash" url="http://player.youku.com/player.php/sid/XNTgxOTk4OTQ0/v.swf"/>
</item>
<item>
	<title>范冰冰突破尺度大玩反转 卖萌犯二颠覆女神形象</title>
	<link>http://mengfilms.com</link>
	<description><![CDATA[ 范冰冰突破尺度大玩反转 卖萌犯二颠覆女神形象 ]]></description>
	<pubDate>Thu, 15 Aug 2013 22:34:02 +0800</pubDate>
	<enclosure type="application/x-shockwave-flash" url="http://player.youku.com/player.php/sid/XNTczMDQzNzQw/v.swf"/>
</item>
<item>
	<title>“性感篇”制作特辑 李治廷称导演是最性感的人</title>
	<link>http://mengfilms.com</link>
	<description><![CDATA[ “性感篇”制作特辑 李治廷称导演是最性感的人 ]]></description>
	<pubDate>Thu, 15 Aug 2013 22:34:02 +0800</pubDate>
	<enclosure type="application/x-shockwave-flash" url="http://player.youku.com/player.php/sid/XNTc1MTEzMzg4/v.swf"/>
</item>';

$rss = 
'<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0"
     xmlns:content="http://purl.org/rss/1.0/modules/content/"
     xmlns:dc="http://purl.org/dc/elements/1.1/"
     xmlns:media="http://search.yahoo.com/mrss/"
     xmlns:atom="http://www.w3.org/2005/Atom">
  	<channel>
	    <title>萌影画《一夜惊喜》</title>
	    <image>
			<title>萌影画</title>
			<link>http://mengfilms.com</link>
			<url>http://mengfilms.com/public/images/logo.png</url>
		</image>
		<description>用胶片记录过往 用镜头捕捉人生 我们不仅是故事的缔造者 我们更是生活的亲历人 我们用国际视角演绎中国故事 我们让中国电影吸引世界目光 在这里我们用快乐讲电影</description>
	    <link>http://mengfilms.com</link>
	    <language>zh-cn</language>
	    <generator>http://mengfilms.com</generator>
	    <ttl>1440</ttl>
	    <item>
		    <title>专访《一夜惊喜》金依萌：没风格导演无法生存</title>
		    <link>http://ent.163.com/13/0809/21/95SA1SU2000300B1.html</link>
		    <description><![CDATA[ 四年前《非常完美》上映的时候，所有人关心的都是章子怡怎么一边搞笑一边做制片人，顺带八卦她和范冰冰戏内的勾心斗角在戏外有几分成真，作为导演的金依萌显然过份安静，即使抱着一大堆苦心积攒好几年的设计概念笔记去宣传时还有点怯生生。 ]]></description>
		    <pubDate>Fri, 9 Aug 2013 21:53:46 +0000</pubDate>
		    <dc:creator>网易娱乐专稿</dc:creator>
		    <content:encoded><![CDATA[<p><a href="http://ent.163.com/13/0809/21/95SA1SU2000300B1.html"><img src="http://img4.cache.netease.com/photo/0003/2013-08-09/600x450_95S8PGBG00B50003.jpg"></a></p><p>四年前《非常完美》上映的时候，所有人关心的都是章子怡怎么一边搞笑一边做制片人，顺带八卦她和范冰冰戏内的勾心斗角在戏外有几分成真，作为导演的金依萌显然过份安静，即使抱着一大堆苦心积攒好几年的设计概念笔记去宣传时还有点怯生生。</p><p>《非常完美》意外地大卖，她成了当时所谓“亿元俱乐部”里唯一的女导演，那还只是她的第一部长片。很奇怪的是，她没有变成第二个宁浩，乘势大张旗鼓投入新片的创作，她几乎消失了四年，原因是“我恋爱了、结婚了。”</p>]]></content:encoded>
		</item>
		<item>
		    <title>《一夜惊喜》口碑零差评 排片上升但仍一票难求</title>
		    <link>http://www.hunantv.com/c/20130813/1723342693.html</link>
		    <description><![CDATA[ 由金依萌执导，范冰冰主演的性感爱情喜剧《一夜惊喜》8月9日全国开画。在《小时代》的强压下，《一夜惊喜》上映首日便以第三的排厅规模斩获票房1200万，与同类型影片《北京遇上西雅图》相当。 ]]></description>
		    <pubDate>Tue, 13 Aug 2013 2013 14:44:22 +0000</pubDate>
		    <dc:creator>雅虎娱乐</dc:creator>
		    <content:encoded><![CDATA[<p><a href="http://www.hunantv.com/c/20130813/1723342693.html"><img src="http://attach.hunantv.com/uploads/images/cms_img/201308/13/21/15673661458515744381.jpg"></a></p><p>由金依萌执导，范冰冰主演的性感爱情喜剧《一夜惊喜》8月9日全国开画。在《小时代》的强压下，《一夜惊喜》上映首日便以第三的排厅规模斩获票房1200万，与同类型影片《北京遇上西雅图》相当。</p><p>凭借零差评的超强口碑和精准定位的营销，《一夜惊喜》在首映之后，排片一举超过好莱坞大片《环太平洋》，以将近两成的排片排在第二。在排片上升的同时，《一夜惊喜》仍一票难求，很多场次爆满，首周末累积票房近4500万。相比之下，《一场风花雪月的事》只得1000余万，提前退出这一史上最为惨烈的七夕档。</p><p>爱情喜剧电影《一夜惊喜》由曾执导过《非常完美》的金依萌导演，范冰冰、李治廷、蒋劲夫等明星共同主演，“票房之王”徐峥还在片中客串了“妇科医生”的角色。影片中，范冰冰扮演的职场女强人米雪在生日聚会上喝断了片后发现自己怀孕了，于是开始了笑话百出的“找他爸”的过程。</p>]]></content:encoded>
		</item>
		<item>
		    <title>《一夜惊喜》七夕创上座率新纪录 口碑累积爆发</title>
		    <link>http://ent.cn.yahoo.com/k/ypen/20130814/1811725.html</link>
		    <description><![CDATA[ 由寰亚电影、华夏视听、萌影画联合出品，导演金依萌原创剧本并执导的首部性感喜剧《一夜惊喜》自上映以来，凭范冰冰领衔众美男献上大胆颠覆的性感演出、轻松幽默的时尚风格、笑点讨喜泪点真实的观影效果成为观众力推的今夏七夕必看影片。 ]]></description>
		    <pubDate>Wed, 14 Aug 2013 08:55:46 +0000</pubDate>
		    <dc:creator>雅虎娱乐</dc:creator>
		    <content:encoded><![CDATA[<p><a href="http://ent.cn.yahoo.com/k/ypen/20130814/1811725.html"><img src="http://x.limgs.cn/f2/c1/up201308/3f54af7ad426c0f7088af6244f3b5fab.jpg" width="532"></a></p><p>由寰亚电影、华夏视听、萌影画联合出品，导演金依萌原创剧本并执导的首部性感喜剧《一夜惊喜》自上映以来，凭范冰冰领衔众美男献上大胆颠覆的性感演出、轻松幽默的时尚风格、笑点讨喜泪点真实的观影效果成为观众力推的今夏七夕必看影片。</p><p>今年影片竞争愈演愈烈，在七夕档竞争已趋白热化的八月影市，《一夜惊喜》上映当天就挣得1300万不俗票房，凭借着扎实的电影品质和众多观众热议不断的良好口碑，一直保持持续稳步增长的排片和票房成绩，在竞争相当激烈的七夕档期突出重围，在8月13日以52%的超高上座率创下七夕当天上座率神话，并以2560万的好成绩稳坐七夕定制影片的头阵，截止8月13日，影片票房成绩累计近8500万。而通过七夕当天的市场考验，众多影城经理纷纷对《一夜惊喜》更加信心十足，将在接下来的排映中，将加大力度增强对《一夜惊喜》的排片占比。</p>]]></content:encoded>
		</item>
		<item>
		    <title>海归导演金依萌:爱做类型片 中国市场还需乐5年</title>
		    <link>http://ent.huanqiu.com/yuleyaowen/2013-08/4231309.html</link>
		    <description><![CDATA[ 由金依萌执导，范冰冰、李治廷主演的《一夜惊喜》于8月9日上映了。定位“性感喜剧”，它给观众确实带来了不小的惊喜。电影让少女做梦，让少男欢心。故事里每个人都有缺点，但是每个人都很讨喜。范冰冰把一夜情做到极致成了真爱，李治廷把死缠烂打做到极致成了痴情，影片以热闹温情收尾，给恋爱中的男女散发出一股正能量。影片上映当天，导演金依萌在深圳接受了《深圳晚报》记者的专访。 ]]></description>
		    <pubDate>Sat, 10 Aug 2013 18:18:16 +0000</pubDate>
		    <dc:creator>深圳晚报</dc:creator>
		    <content:encoded><![CDATA[<p><a href="http://ent.huanqiu.com/yuleyaowen/2013-08/4231309.html"><img src="http://himg2.huanqiu.com/attachment2010/2013/0810/20130810061904191.jpg"></a></p><p>由金依萌执导，范冰冰、李治廷主演的《一夜惊喜》于8月9日上映了。定位“性感喜剧”，它给观众确实带来了不小的惊喜。电影让少女做梦，让少男欢心。故事里每个人都有缺点，但是每个人都很讨喜。范冰冰把一夜情做到极致成了真爱，李治廷把死缠烂打做到极致成了痴情，影片以热闹温情收尾，给恋爱中的男女散发出一股正能量。影片上映当天，导演金依萌在深圳接受了《深圳晚报》记者的专访。</p><p>深圳晚报：为什么《一夜惊喜》定位“性感喜剧”，我倒觉得影片时尚，画面漂亮，为什么不是时尚爱情喜剧？
金依萌：时尚也是有的，但你不觉得范冰冰和李治廷都有性感的一面吗？不过我表达的性感，不是那种粗糙的性感，不是sex(性爱)，也不是kiss(接吻)，而是那种闷骚的东西，所以就归类于“性感喜剧”。</p>]]></content:encoded>
		</item>
		<item>
		    <title>金依萌：范冰冰是女演员中“最不要脸”一个</title>
		    <link>http://www.hunantv.com/c/20130808/1610407375.html</link>
		    <description><![CDATA[ 在《一夜惊喜》北京首映发布会上，范冰冰激吻导演金依萌胸部，并称其丰满程度超过她的预期。一时间，这条消息成为各大新闻媒体和娱乐门户网站头条，三天之内，消息转发超过千万次。范冰冰和金依萌导演的闺蜜关系再次成为大众热议的话题 ]]></description>
		    <pubDate>Thu, 8 Aug 2013 16:05 +0000</pubDate>
		    <dc:creator>雅虎娱乐</dc:creator>
		    <content:encoded><![CDATA[<p><a href="http://www.hunantv.com/c/20130808/1610407375.html"><img src="http://attach.hunantv.com/uploads/images/cms_img/201308/08/21/1558102548493875445.jpg"></a></p><p>在《一夜惊喜》北京首映发布会上，范冰冰激吻导演金依萌胸部，并称其丰满程度超过她的预期。一时间，这条消息成为各大新闻媒体和娱乐门户网站头条，三天之内，消息转发超过千万次。范冰冰和金依萌导演的闺蜜关系再次成为大众热议的话题。</p><p>在8月7日《一夜惊喜》上海宣传会上，导演金依萌第一次回应了袭胸事件。在被问到为什么会选范冰冰饰演影片女主角米雪这个角色时，金导演说：“因为我认为范冰冰是中国女演员中最不要脸的一个。”导演解释说，在演喜剧的时候，冰冰可以本着不要脸的精神，完全忘记自己美丽的面孔，并放下自己女神的身段，为了角色不惜付出一切。冰冰是一个非常专业，非常敬业的女演员。导演认为，一个优秀的演员只有拥有了这种“不要脸”的精神，才能演好喜剧，塑造好角色。她认为范冰冰做到了。</p>]]></content:encoded>
		</item>
		<item>
		    <title>女汉子是票房毒药</title>
		    <link>http://epaper.jinghua.cn/html/2013-08/12/content_17608.htm</link>
		    <description><![CDATA[ 四年前的《非常完美》让金依萌成为内地首个票房过亿的女导演。四年之后金依萌执导的《一夜惊喜》，恰如当年的《非常完美》，是类型化充分的爱情喜剧。它不讲人生道理，也不反思社会问题，就讲一个充满小欢乐小感动的爱情故事。故事结构也如出一辙：成熟的都市小白领，情感上遭遇重大变故，对身边男人进行“真金不怕火炼”式的选择，最终得到所谓的幸福。 ]]></description>
		    <pubDate>Mon, 12 Aug 2013</pubDate>
		    <dc:creator>京华时报</dc:creator>
		    <content:encoded><![CDATA[<p>四年前的《非常完美》让金依萌成为内地首个票房过亿的女导演。四年之后金依萌执导的《一夜惊喜》，恰如当年的《非常完美》，是类型化充分的爱情喜剧。它不讲人生道理，也不反思社会问题，就讲一个充满小欢乐小感动的爱情故事。故事结构也如出一辙：成熟的都市小白领，情感上遭遇重大变故，对身边男人进行“真金不怕火炼”式的选择，最终得到所谓的幸福。</p><p>相比较《非常完美》，《一夜惊喜》的话题更加麻辣。一夜情、有娃不知爹是谁、未婚生子、婚姻实用论；出场男人也包罗万象，嫩肉小正太、痴情备胎男、土鳖暴发户，以及完美高富帅；再加上不断爆出的所谓金句、毫不避讳的黄段子，怎么看怎么有高票房的卖相。</p><p>《非常完美》中，章子怡是个迷糊的都市单身女，满脑子的奇思怪想，即便不算“失败者”也属于女性中的多数派。《一夜惊喜》开篇范冰冰就展示了其女王范儿——广告公司高管，经济独立的都市白领，有着成熟的价值观与人生理想，以及事业优先的人生规划，用媒体的说法来形容，即便不算是女性中的“胜利者”，也是当代女性中的少数派、佼佼者，是顶天立地的“女汉子”。再加上这么美丽无双的容貌，理所应当颠倒众生，视男人为掌上玩物。偏偏，这个顶天立地的“女汉子”，身边可选的男人除了丑陋的土大款，就是毫无安全感的下属、没什么可显摆的小正太，以及花心且坏的完美男人——女王范儿的女汉子，居然在婚恋市场上处处碰壁！这，对广大女性观众而言，是个噩梦，也是《一夜惊喜》的噩梦。</p>]]></content:encoded>
		</item>
		<item>
		    <title>《一夜惊喜》首周末票房近5000万 洛杉矶时报盛赞</title>
		    <link>http://life.qinbei.com/20130813/1580784.shtml</link>
		    <description><![CDATA[ 由寰亚电影、华夏视听、萌影画联合出品，导演金依萌原创剧本并执导的首部性感喜剧《一夜惊喜》自上映以来，凭范冰冰领衔众美男献上大胆颠覆的性感演出、轻松幽默的时尚风格、笑点讨喜泪点真实的观影效果成为观众力推的七夕必看影片。大量零差评的观影感受获得外媒关注，8月10日的洛杉矶时报以罕见的大篇幅报道向全球读者盛赞《一夜惊喜》，并对导演金依萌给予高度认可。 ]]></description>
		    <pubDate>Tue, 13 Aug 2013 18:16</pubDate>
		    <dc:creator>新华网</dc:creator>
		    <content:encoded><![CDATA[<p>由寰亚电影、华夏视听、萌影画联合出品，导演金依萌原创剧本并执导的首部性感喜剧《一夜惊喜》自上映以来，凭范冰冰领衔众美男献上大胆颠覆的性感演出、轻松幽默的时尚风格、笑点讨喜泪点真实的观影效果成为观众力推的七夕必看影片。大量零差评的观影感受获得外媒关注，8月10日的洛杉矶时报以罕见的大篇幅报道向全球读者盛赞《一夜惊喜》，并对导演金依萌给予高度认可。</p><p>今年七夕档影片众多，在暑期档竞争已趋白热化的八月影市，《一夜惊喜》上映当天就挣得1300万不俗票房，更凭借自身过硬品质赢得影迷好评。在《惊天危机》、《速度与激情6》、《环太平洋》等好莱坞大片势头不减的情况下，《一夜惊喜》接下来每天总票房都涨势迅猛，迅速从同期上映的众多国产片中突围而出，最终首周末上映三天票房狂揽近5000万。全国场次占比一路上扬，周一已达20.25%，成功超越《环太平洋》位居第二，如此势头必将成为今夏七夕节最值得走进影院的佳片。</p><p>洛杉矶时报盛赞《一夜惊喜》 导演金依萌成功获国外好评</p>
<p>8月10日，美国三大报纸之一的洛杉矶时报以罕见的大面积篇幅报道电影《一夜惊喜》是适合全球观众口味的浪漫喜剧，这是华语片首次在西方获得如此高的评价。洛杉矶时报称，《一夜惊喜》有一种跨越国界的特质，曾经留美多年学习电影的导演金依萌致力于创作出让中国观众信服的角色，同时坚持采用好莱坞风格的三段式方法写作。最终她成功跨越中西方文化的鸿沟，变得更国际化的新作《一夜惊喜》被西方评论员撰文推荐为既符合本土观众的口味，也非常适宜在海外上映喜剧电影。</p>]]></content:encoded>
		</item>'.
		$imgs.
		$videos.
		'
  	</channel>
</rss>';

header('Content-type: text/xml;charset=utf-8');

echo $rss;
?>