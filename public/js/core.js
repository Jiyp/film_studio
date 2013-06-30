$(function(){
	//weibo icon
	var wb_icon = $('#wb_icon');
	var base_url = $CONFIG.base_url;
	wb_icon.on('mouseenter', function(){
		wb_icon.find('img').attr('src', base_url + '/public/images/weibo_hover_63.png');
	});
	wb_icon.on('mouseleave', function(){
		wb_icon.find('img').attr('src', base_url + '/public/images/weibo_63.png');
	});
	
	// slider
	var width = 213;
	
	$.fn.slider = function( opts ){
		var $c = $(this),
			$ul = $c.find('ul'),
			len = $ul.children().length,
			counter = 0,
			arrow_left = opts.arrow_left,
			arrow_right = opts.arrow_right;
		var $left = $c.find(arrow_left);
		var $right = $c.find(arrow_right);
		if( len > 4 ){
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
			$right.on('click', function(){
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
		} else {
			$left.hide();
			$right.hide();
		}
		
	};
	
	var $slider = $('.slider_inner');
	$slider.each(function(){
		$(this).slider({
			arrow_left : '.arrow_left',
			arrow_right : '.arrow_right'
		});
	});

	$slider.on('mouseenter', 'li', function(){
		$(this).css('border-color', '#3399cc');
	});
	$slider.on('mouseleave', 'li', function(){
		$(this).css('border-color', '#cccccc');
	});
	
	//nav
	$('.nav').on('mouseenter', 'li', function(){
		var self = $(this);
		var sub_nav = self.find('> div');
		if( self.hasClass('current') || !sub_nav.length ){
			return;
		}
		sub_nav.show();
	});
	$('.nav').on('mouseleave', 'li', function(){
		var self = $(this);
		var sub_nav = self.find('> div');
		if( self.hasClass('current') || !sub_nav.length ){
			return;
		}
		sub_nav.hide();
	});

    //我的作品-->动画效果
	$.fn.dir_move = function(trigger, opts){
		if( !trigger ){
			return;
		}
		var direction = {
			b_t : 'bottom-to-top',
			t_b : 'top-to-bottom'
		};
		
		var self = $(this),
			selector = opts.selector,
			masks = self.find(selector),
			speed = opts.speed || 500,
			dir = direction[opts.dir] || 'bottom-to-top';
		
		var parent = masks.parent(),
			width = parent.outerWidth(),
			height = parent.outerHeight();
			
		var css = {
			position : 'absolute',
			top : 0,
			left : parseInt( (width - masks.width()) / 2, 10 )
		};
		
		var param_enter = {};
		var param_leave = {};
		
		if( dir === 'bottom-to-top' ){
			css.top = height;
		} else if ( 'top-to-bottom' === dir ) {
			css.top = -height;
		}
		param_enter.top = parseInt( (height - masks.height()) / 2, 10 );
		param_leave.top = css.top;
		
		masks.css(css);
		
		self.on('mouseenter', trigger, function(){
			$(this).find(selector).animate( param_enter, speed );
		});
		self.on('mouseleave', trigger, function(){
			$(this).find(selector).animate( param_leave, speed );
		});
	};
	
	$('.movie_list').eq(0).dir_move('li', {
		selector : '.mask',
		speed : 300
	});
	
	$('.movie_list').eq(1).dir_move('li', {
		selector : '.mask',
		dir : 't_b',
		speed : 300
	});

});

