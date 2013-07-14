$(function(){
	//preload
	(function(imgs){
		var origin = location.origin;
		var img;
		for( var i = 0, len = imgs.length; i < len; i++ ){
			img = new Image();
			img.src = '/public/images/home/' + imgs[i];
		}
	})(['works.jpg', 'ons_hx.jpg', 'aboutus.jpg', 'fcwm.jpg', 'ons_jz.jpg', 'ons_ygp.jpg']);
	// slider
	$.fn.slider = function( opts ){
		var $c = $(this),
			$ul = $c.find('ul'),
			children = $ul.children(),
			width = children.outerWidth(true),
			len = children.length,
			max = opts.max || 4,
			counter = len,
			arrow_left = opts.arrow_left,
			arrow_right = opts.arrow_right;
		var $left = $c.find(arrow_left);
		var $right = $c.find(arrow_right);
		if( len > max ){
			//复制节点,无缝滚动
			var next = children.clone();
			var prev = children.clone();
			prev.prependTo($ul);
			next.appendTo($ul);
			var left = -len * width;
			$ul.css('left', -len * width);
			$left.on('click', function(){
				counter--;
				$ul.animate({
					left : -(counter * width) + 'px'
				}, 500, function(){
					if( counter === 0 ){
						$ul.css('left', left);
						counter = len;
					}
				});
			});
			$right.on('click', function(){
				counter++;
				$ul.animate({
					left : -(counter * width) + 'px'
				}, 500, function(){
					if( counter === len * 2 ){
						$ul.css('left', left);
						counter = len;
					}
				});
			});
		} else {
			$left.hide();
			$right.hide();
		}
	};
	
	var $slider = $('.slider_inner');
	$slider.each(function(){
		var max = $(this).attr('data-max');
		var opts = {
			arrow_left : '.arrow_left',
			arrow_right : '.arrow_right'
		};
		max && (opts.max = max);
		$(this).slider(opts);
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
			onEnter = opts.onEnter || $.noop,
			onLeave = opts.onLeave || $.noop,
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
		
		self.on('mouseenter', trigger, function(e){
			var self = $(this);
			onEnter.call(self, e);
			self.find(selector).animate( param_enter, speed );
		});
		self.on('mouseleave', trigger, function(e){
			var self = $(this);
			onLeave.call(self, e);
			$(this).find(selector).animate( param_leave, speed );
		});
	};
	
	var change_img = function(){
		var $img = this.find('img'),
			img = $img[0],
			src = img.src,
			data_src = img.getAttribute('data-src');
		img.src = data_src;
		img.setAttribute('data-src', src);
	}
	
	var my_works = $('.movie_list');
	my_works.eq(0).dir_move('li', {
		selector : '.bg-box',
		speed : 300,
		onEnter : change_img,
		onLeave : change_img
	});
	my_works.eq(1).dir_move('li', {
		selector : '.bg-box',
		dir : 't_b',
		speed : 300,
		onEnter : change_img,
		onLeave : change_img
	});
	my_works.parent().on('click', '.movie_list>li', function(){
		location.href = $(this).attr('data-href');
	});

});
