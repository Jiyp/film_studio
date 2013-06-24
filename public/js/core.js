$(function(){
	var wb_icon = $('#wb_icon');
	var base_url = $CONFIG.base_url;
	wb_icon.on('mouseenter', function(){
		wb_icon.find('img').attr('src', base_url + '/public/images/weibo_hover.png');
	});
	wb_icon.on('mouseleave', function(){
		wb_icon.find('img').attr('src', base_url + '/public/images/weibo.png');
	});
	
	var width = 213;
	
	$.fn.slider = function( opts ){
		$(this).each(function(){
			var $c = $(this),
				$ul = $c.find('ul'),
				len = $ul.children().length,
				counter = 0,
				arrow_left = opts.arrow_left,
				arrow_right = opts.arrow_right;
            var $left = $c.find(arrow_left);
            var $right = $c.find(arrow_right);
	        $c.on('mouseenter', function(){
                $left.show();
                $right.show();
            });	
	        $c.on('mouseleave', function(){
                $left.hide();
                $right.hide();
            });	
			$left.on('click', function(){
				if( counter === 0 ){
					//$(this).attr('title', '没有上一张了');
					return;
				}
				//$(this).attr('title', '点击浏览上一张');
				counter++;
				$ul.animate({
					left : (counter * width) + 'px'
				}, 500);
			});
			$right.find(arrow_right).on('click', function(){
				if( counter === 4 - len ){
					//$(this).attr('title', '没有下一张了');
					return;
				}
				//$(this).attr('title', '点击浏览下一张');
				counter--;
				$ul.animate({
					left : (counter * width) + 'px'
				}, 500);
			});
		});
	};
	
	var $slider = $('.slider');
	$slider.slider({
		arrow_left : '.arrow_left',
		arrow_right : '.arrow_right'
	});
	$slider.on('mouseenter', 'li', function(){
		$(this).css('border-color', '#3399cc');
	});
	$slider.on('mouseleave', 'li', function(){
		$(this).css('border-color', '#cccccc');
	});
});
