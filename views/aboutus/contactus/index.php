<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<title>萌影画</title>
	<meta name="description" content="Hi,欢迎来到萌影画工作室.我们是热爱电影的爱好者.这里有几个我们的作品,希望您喜欢.有什么感受希望您跟我们联系哈">
	<meta name="author" content="金依萌">
	<link rel="icon" type="image/ico" href="favicon.ico">
	<link rel="stylesheet" type="text/css" href="<?=$host?>/public/css/pages/common.css" />
	<style>
	.map{width:100%;background:url(/public/images/bg02.png) repeat #f7f7f7;position:relative}.map .wrap{width:878px;margin:0 auto;padding:50px 0}.map .wrap .geo{width:502px;float:left}.map .wrap .info{float:left;width:346px;margin-left:30px}.map .name{height:30px;vertical-align:middle;font-size:18px;font-weight:bold}.map .item{color:#666;width:50px;height:26px;text-align:left;vertical-align:middle}.map .detail{font-size:14px;font-weight:bold}
	</style>
	<script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
</head>
<body>
<div id="main">
	<?php include '../../common/header.php'; ?>
	
	<div class="map">
		<div class="wrap clearfix">
			<div class="geo">
			<!--百度地图容器-->
  <div style="width:500px;height:450px;border:#ccc solid 1px;" id="dituContent"></div>
			</div>
			<div class="info">
				<table>
					<tr>
						<td class="name" colspan="2">萌影画（北京）文化传播有限公司</td>
					</tr>
					<tr>
						<td class="item">地　址：</td>
						<td class="detail">北京市朝阳区酒仙桥路10号星城国际A座12G</td>
					</tr>
					<tr>
						<td class="item">电　话：</td>
						<td class="detail">+86 10 64821172</td>
					</tr>
					<tr>
						<td class="item">传　真：</td>
						<td class="detail">+86 10 64821172</td>
					</tr>
					</tr>
						<td class="item">要合作：</td>
						<td class="detail">bd@mengfilms.com</td>
					</tr>
					</tr>
						<td class="item">要工作：</td>
						<td class="detail">hr@mengfilms.com</td>
					</tr>
				</table>
			</div>
		</div>
	</div>

	<?php include '../../common/footer.php'; ?>
		
</div>
<script type="text/javascript">
    //创建和初始化地图函数：
    function initMap(){
        createMap();//创建地图
        setMapEvent();//设置地图事件
        addMapControl();//向地图添加控件
        addMarker();//向地图中添加marker
    }
    
    //创建地图函数：
    function createMap(){
        var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图
        var point = new BMap.Point(116.496881,39.98585);//定义一个中心点坐标
        map.centerAndZoom(point,18);//设定地图的中心点和坐标并将地图显示在地图容器中
        window.map = map;//将map变量存储在全局
    }
    
    //地图事件设置函数：
    function setMapEvent(){
        map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
        map.enableScrollWheelZoom();//启用地图滚轮放大缩小
        map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
        map.enableKeyboard();//启用键盘上下左右键移动地图
    }
    
    //地图控件添加函数：
    function addMapControl(){
        //向地图中添加缩放控件
	var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
	map.addControl(ctrl_nav);
        //向地图中添加缩略图控件
	var ctrl_ove = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:1});
	map.addControl(ctrl_ove);
        //向地图中添加比例尺控件
	var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
	map.addControl(ctrl_sca);
    }
    
    //标注点数组
    var markerArr = [{title:"萌影画（北京）文化传播有限公司",content:"我的备注",point:"116.497047|39.986029",isOpen:0,icon:{w:21,h:21,l:0,t:0,x:6,lb:5}}
		 ];
    //创建marker
    function addMarker(){
        for(var i=0;i<markerArr.length;i++){
            var json = markerArr[i];
            var p0 = json.point.split("|")[0];
            var p1 = json.point.split("|")[1];
            var point = new BMap.Point(p0,p1);
			var iconImg = createIcon(json.icon);
            var marker = new BMap.Marker(point,{icon:iconImg});
			var iw = createInfoWindow(i);
			var label = new BMap.Label(json.title,{"offset":new BMap.Size(json.icon.lb-json.icon.x+10,-20)});
			marker.setLabel(label);
            map.addOverlay(marker);
            label.setStyle({
                        borderColor:"#808080",
                        color:"#333",
                        cursor:"pointer"
            });
			
			(function(){
				var index = i;
				var _iw = createInfoWindow(i);
				var _marker = marker;
				_marker.addEventListener("click",function(){
				    this.openInfoWindow(_iw);
			    });
			    _iw.addEventListener("open",function(){
				    _marker.getLabel().hide();
			    })
			    _iw.addEventListener("close",function(){
				    _marker.getLabel().show();
			    })
				label.addEventListener("click",function(){
				    _marker.openInfoWindow(_iw);
			    })
				if(!!json.isOpen){
					label.hide();
					_marker.openInfoWindow(_iw);
				}
			})()
        }
    }
    //创建InfoWindow
    function createInfoWindow(i){
        var json = markerArr[i];
        var iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title + "</b><div class='iw_poi_content'>"+json.content+"</div>");
        return iw;
    }
    //创建一个Icon
    function createIcon(json){
        var icon = new BMap.Icon("http://app.baidu.com/map/images/us_mk_icon.png", new BMap.Size(json.w,json.h),{imageOffset: new BMap.Size(-json.l,-json.t),infoWindowOffset:new BMap.Size(json.lb+5,1),offset:new BMap.Size(json.x,json.h)})
        return icon;
    }
    
    initMap();//创建和初始化地图
</script>
</body>
</html>