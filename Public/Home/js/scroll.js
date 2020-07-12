// JavaScript Document
(function ($) {

	$.fn.Scroll = function (options) {
		var root = this;

		var settings = {
			speed: 40, 
			direction: "x" 
		};

		if (options)
			$.extend(settings, options);


		var timer = [];  
		var marquee1;  
		var isRoll;  

		var _ul = $("> ul", root);   //ul标签
		var _li = $("> ul > li", root);  //li标签(集合)

		var li_num = _li.length; //li标签个数
		var li_first = _li.first(); //获取单个li标签


		//判断为纵向还是横向，并进行相应操作
		if (settings.direction == "x") {

			var li_w = li_first.outerWidth(true); //单个li标签的宽度
			var ul_w = li_w * li_num; 　　　　　　 //ul标签的宽度

			_ul.css({ width: ul_w }); //设置ul宽度

			marquee1 = function () {
				_ul.animate({ marginLeft: "-=1" }, 0, function () {
					var _mleft = Math.abs(parseInt($(this).css("margin-left")));
					if (_mleft > li_w) { //滚动长度一旦大于单个li的长度
						$("> li:first", $(this)).appendTo($(this)); //就把第一个li移到最后
						$(this).css("margin-left", 0); //滚动长度归0
					}
				});
			};
			//ul长度小于box长度时则不滚动，反之滚动
			isRoll = function (t) {
				if (ul_w <= root.width())
					clearInterval(t);
				else
					marquee1();
			}
		}
		else {
			var li_h = li_first.outerHeight(true); 
			var ul_h = li_h * li_num; 

			_ul.css({ height: ul_h });

			marquee1 = function () {
				_ul.animate({ marginTop: "-=1" }, 0, function () {
					var _mtop = Math.abs(parseInt($(this).css("margin-top"))); //取绝对值
					if (_mtop > li_h) {
						$("> li:first", $(this)).appendTo($(this));
						$(this).css("margin-top", 0);
					}
				});
			};
			isRoll = function (t) {
				if (ul_h <= root.height())
					clearInterval(t);
				else
					marquee1();
			}
		}
		return root.each(function (i) {
			$(this).css({ overflow: "hidden" });

			timer[i] = setInterval(function () {
				isRoll(timer[i]);
			}, settings.speed);

			$(this).hover(function () {
				clearInterval(timer[i]);
			}, function () {
				timer[i] = setInterval(function () {
					isRoll(timer[i]);
				}, settings.speed);
			});

		});

	};

})(jQuery);