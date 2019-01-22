$(function(){
	winsize()
	$(window).resize(function(){
		winsize()
	})

	$('.statement').on('click',function(){
		$('.visit-box').fadeIn();
		$('body,html').height($(window).height())
	})

	$('.visit-box .visit-con .close').on('click',function(){
		$('.visit-box').fadeOut();
		$('body,html').height('auto')
	})

	$('.weixin').on('click',function(){
		$('.weixin-box').fadeIn();
	})

	$('.weixin-box .con .close').on('click',function(){
		$('.weixin-box').fadeOut();
	})

	$('.header').hover(function(){
		$("header ul.list .con").slideDown();
		$('header').addClass("on");
	},function(){
		$("header ul.list .con").slideUp(0);
		$('header').removeClass("on");
	})

	$('.telephone').on('click',function(){
		$('.telephone-box').fadeIn();
	})

	$('.telephone-box .con .close').on('click',function(){
		$('.telephone-box').fadeOut();
	})


	$("header .nav-btn").on('click', function() {
		var _this = $(this);
        if (!$(this).hasClass('hover')) {
            $(this).addClass('hover');
            $(this).children('.line1').stop().transition({rotate: 45}, 300);
            $(this).children('.line2').stop().fadeOut(300);
            $(this).children('.line3').stop().transition({rotate: -45}, 300,function(){
                _this.addClass('active');
            });
            $(this).next('.sub-menu').stop().fadeIn();
            $("body,html").addClass('ovh');
        }else{
            $(this).removeClass('hover');
            $(this).removeClass('active');
            $(this).children('.line1').stop().transition({rotate: 0}, 300);
            $(this).children('.line2').stop().fadeIn(300);
            $(this).children('.line3').stop().transition({rotate: 0}, 300);
            $(this).next('.sub-menu').stop().fadeOut();
            $("body,html").removeClass('ovh');
        }
    });
	
	$("header .sub-menu .sub-tit").on('click', function() {
		if ($(this).siblings('.sec-list').is(':hidden')){
			$(this).addClass('on');
			$(this).siblings('.sec-list').stop().slideDown();
			$(this).parent().siblings('li').children('.sec-list').stop().slideUp().siblings('.tit').removeClass('on');
		}else{
			$(this).removeClass('on');
			$(this).siblings('.sec-list').stop().slideUp();
		}
	});

	$('.flex-right li.top').on('click',function(){
		$('html,body').stop().animate({scrollTop:0},1000)
	})


	$(window).load(function(){
		// $('.load').fadeOut(300,function(){
		// });
		$('header, .z-index, footer').stop().animate({top:0,opacity:1},500);
		$('.flex-right').fadeIn();
	})

	// $(".mh_date").manhuaDate({					       
	// 	Event : "click",//可选				       
	// 	Left : 0,//弹出时间停靠的左边位置
	// 	fuhao : "-",//日期连接符默认为-
	// 	isTime : false,//是否开启时间值默认为false
	// });

	function winsize(){
		var winw = $(window).width();
		var winh = $(window).height();
		var heaw = $('header').width();
		var heah = $('header').height();
		$('.visit-box, .weixin-box, .telephone-box, .classroom-info, .team-font,.visit-box1').width(winw);
		$('.visit-box, .weixin-box, .telephone-box, .classroom-info, .team-font,.visit-box1').height(winh);
		$('header .sub-menu').height(winh -heah);

		$('header').css({
			'left':(winw-heaw)/2,
		})
	}
});