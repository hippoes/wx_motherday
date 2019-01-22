<!DOCTYPE html>
<html>
<head>
<?php include_once VIEWS.'inc/head.php'; ?>
</head>

<body>
    <?php include_once VIEWS.'inc/header.php'; ?>
    <div class="z-index">
		<?php include_once VIEWS.'inc/ab_banner.php'; ?>

		<!-- 企业介绍 -->
    	<div class="ab-intro ab">
    		<div class="w1400">
    			<div class="now f-cb">
	    			<b>关于Hibaby</b>
	    		</div>
    		</div>
    		<div class="w1195">
    			<div class="wel-title">
			    	<h2>Introduction</h2>
			    	<i></i>
			    	<p>企业介绍</p>
			    </div>
			    <div class="ab-intro-font">
			    	<?php if (!empty($introduction['content'])) echo $introduction['content'] ?>
			    </div>
			    <!-- <div class="ab-intro-list">
			    	<ul class="f-cb">
			    		<li>
			    			<img src="<?php echo static_file('web/img/ab02.jpg'); ?> " alt="">
			    		</li>
			    		<li>
			    			<img src="<?php echo static_file('web/img/ab03.jpg'); ?> " alt="">
			    		</li>
			    		<li>
			    			<img src="<?php echo static_file('web/img/ab04.jpg'); ?> " alt="">
			    		</li>
			    		<li>
			    			<img src="<?php echo static_file('web/img/ab05.jpg'); ?> " alt="">
			    		</li>
			    	</ul>
			    </div> -->
    		</div>
    	</div>

    	<!-- 城市布局 -->
    	<div class="ab-city ab">
    		<div class="w1400">
    			<div class="wel-title">
			    	<h2>Hibaby Plan</h2>
			    	<i></i>
			    	<p>城市布局</p>
			    </div>
			    <div class="city-box">
			    	<ul class="f-cb">
                        <?php
                        if (!empty($plan_list)):
                            foreach ($plan_list as $v):
                        ?>
			    		<li>
			    			<a href="<?php if(!empty($v['field1'])) echo $v['field1']; else echo "javascript:void(0);"; ?>" target="_blank">
				    			<p class="pic">
				    				<img src="<?php if (!empty($v['photo'])) echo UPLOAD_URL.tag_photo($v['photo']) ?>" alt="<?php echo get_pic_alt($v['photo']) ?>">
				    				<span class="bg"></span>
				    			</p>
				    			<span class="con">
				    				<h2><?php if (!empty($v['title'])) echo $v['title'] ?></h2>
				    				<i></i>
				    				<div class="font"><?php if (!empty($v['content'])) echo $v['content'] ?></div>
				    			</span>
			    			</a>
			    		</li>
                        <?php
                            endforeach;
                        endif;
                        ?>
                        <?php if ($plan_count>6): ?>
			    		<li class="read-ajax">
			    			<p class="pic">
			    				<img src="<?php echo static_file('web/img/wel52.jpg'); ?> " alt="">
			    				<span class="bg"></span>
			    			</p>
			    			<span class="con">
			    				<p class="add"></p>
			    				<p class="more">Read MORE</p>
			    			</span>
			    		</li>
                        <?php endif; ?>
			    	</ul>
			    </div>
    		</div>
    	</div>

    	<!-- 企业文化 -->
    	<div class="ab-culture w1195 ab">
    		<div class="wel-title">
		    	<h2>Culture</h2>
		    	<i></i>
		    	<p>品牌文化</p>
		    </div>
		    <div class="w1125 ab-culture-top f-cb">
		    	<div class="fl box">
		    		<h2><?php if (!empty($culture[0]['title'])) echo $culture[0]['title']  ?></h2>
		    		<i></i>
                    <?php
                    if (count($culture[0]['arr'])<=1):
                    ?>
		    		<p><?php if (isset($culture[0]['arr'][0])) echo $culture[0]['arr'][0] ?></p>
                    <?php else: ?>
                        <div class="box-h">
                            <div class="culturn-center-list">
                                <ul class="swiper-wrapper">
                                    <?php foreach ($culture[0]['arr'] as $v): ?>
                                    <li class="swiper-slide"><?php if (!empty($v)) echo $v ?></li>
                                    <?php endforeach; ?>
                                </ul>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    <?php endif; ?>
		    	</div>
		    	<div class="fr box">
		    		<h2><?php if (!empty($culture[2]['title'])) echo $culture[2]['title']  ?></h2>
		    		<i></i>
                    <?php
                    if (count($culture[2]['arr'])<=1):
                    ?>
                    <p><?php if (isset($culture[2]['arr'][0])) echo $culture[2]['arr'][0] ?></p>
                    <?php else: ?>
                        <div class="box-h">
                            <div class="culturn-center-list">
                                <ul class="swiper-wrapper">
                                    <?php foreach ($culture[2]['arr'] as $v): ?>
                                        <li class="swiper-slide"><?php if (!empty($v)) echo $v ?></li>
                                    <?php endforeach; ?>
                                </ul>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    <?php endif; ?>
		    	</div>
		    	<div class="fl culturn-center">
		    		<h2><?php if (!empty($culture[1]['title'])) echo $culture[1]['title']  ?></h2>
		    		<i></i>
                    <?php
                    if (count($culture[1]['arr'])<=1):
                    ?>
                    <p><?php if (isset($culture[1]['arr'][0])) echo $culture[1]['arr'][0] ?></p>
                    <?php else: ?>
                        <div class="box-h">
                            <div class="culturn-center-list">
                                <ul class="swiper-wrapper">
                                    <?php foreach ($culture[1]['arr'] as $v): ?>
                                        <li class="swiper-slide"><?php if (!empty($v)) echo $v ?></li>
                                    <?php endforeach; ?>
                                </ul>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    <?php endif; ?>
		    	</div>
		    </div>
    	</div>

    	<!-- 新闻动态 -->
    	<div class="ab-news ab" id="0">
    		<div class="w1400">
    			<div class="wel-title">
			    	<h2>News</h2>
			    	<i></i>
			    	<p>新闻动态</p>
			    </div>
                <?php
                if (empty($news_list)):
                    echo "<div align='center'>暂无相关信息！</div>";
                else:
                ?>
			    <ul class="list f-cb">
			    	<?php foreach ($news_list as $v): ?>
				    	<li>
				    		<a href="<?php echo site_url('about/newsinfo/'.$v['id']); ?>">
				    			<p class="pic">
				    				<img src="<?php if(!empty($v['photo'])) echo UPLOAD_URL.tag_photo($v['photo']) ?>" alt="<?php echo get_pic_alt($v['photo']) ?>">
				    			</p>
				    			<span class="con">
				    				<h2><?php if(!empty($v['title'])) echo $v['title'] ?></h2>
				    				<p class="font"><?php if(!empty($v['content'])) echo strcut(strip_tags($v['content']),110) ?></p>
				    				<p class="more"><span>Read More</span></p>
				    			</span>
				    		</a>
				    	</li>
				    <?php endforeach; ?>
			    </ul>
                <?php endif; ?>
                <?php if($news_page_num>=1): ?>
			    <a href="javascript:;" class="more-ajax"><span>Read More</span></a>
                <?php endif; ?>
    		</div>
    	</div>
		
		<!-- 加入我们 -->
		<div class="ab-join w1400 ab">
			<div class="wel-title">
		    	<h2>Join Us</h2>
		    	<i></i>
		    	<p>加入我们</p>
		    </div>
		    <div class="ab-join-box">
                <?php
                if (empty($recruit_list)):
                    echo "<div align='center'>暂无相关信息！</div>";
                else:
                ?>
		    	<ul class="f-cb">
		    		<?php foreach ($recruit_list as $v): ?>
			    		<li>
			    			<div class="title f-cb">
			    				<span>招聘职位：<?php if(!empty($v['title'])) echo $v['title'] ?></span>
			    				<span>招聘人数：<?php if($v['amount']==0) echo "不限"; elseif(!empty($v['amount'])) echo $v['amount']."人" ?></span>
			    				<span>招聘地点：<?php if(!empty($v['place'])) echo $v['place'] ?></span>
			    				<span>发布时间：<?php echo date("Y.m.d",$v['timeline']) ?></span>
			    				<a href="javascript:;" class="add"></a>
			    			</div>
			    			<div class="con">
			    				<h2>岗位要求：</h2>
			    				<?php if (!empty($v['content'])) echo $v['content'] ?>
			    				<h2>任职资格：</h2>
                                <?php if (!empty($v['requirement'])) echo $v['requirement'] ?>
			    				<a href="javascript:;" target="_blank">发送简历至：<?php if (!empty($recruit_email['title'])) echo $recruit_email['title'] ?></a>
			    			</div>
			    		</li>
			    	<?php endforeach; ?>
		    	</ul>
                <?php endif; ?>
		    </div>
		</div>

		<!-- 地图 -->
		<!-- <div class="ab-map ab">
			<div class="w1400 ab-map-con">
				<div class="box">
					<h2>凯贝姆健康管理有限公司</h2>
					<i></i>
					<p class="ff">地址：北京市朝阳区安定路35号安华发展大厦10层01-08内1009房间</p>
					<p class="ff">电话：010-80699785</p>
					<p class="ff">邮箱：hibaby@hbbcare.com</p>
					<ul class="f-cb">
						<li>
							<p class="pic">
								<img src="<?php echo static_file('web/img/fot01.jpg'); ?> " alt="">
							</p>
							<p class="font">微信服务号</p>
						</li>
						<li>
							<p class="pic">
								<img src="<?php echo static_file('web/img/fot01.jpg'); ?> " alt="">
							</p>
							<p class="font">微信订阅号</p>
						</li>
						<li>
							<p class="pic">
								<img src="<?php echo static_file('web/img/fot01.jpg'); ?> " alt="">
							</p>
							<p class="font">微博</p>
						</li>
					</ul>
				</div>
			</div>
			<div id="allmap"></div>
		</div> -->
    </div>
    <?php include_once VIEWS.'inc/footer.php'; ?>
<?php
	echo static_file('web/js/main.js');
	echo static_file('swiper/swiper.min.js');
    echo static_file('swiper/swiper.css');
?>
<script type="text/javascript">
	// var map = new BMap.Map("allmap"); 
	// var point = new BMap.Point(116.41315, 39.980693);
	// var marker = new BMap.Marker(point);  
	// map.addOverlay(marker); 
	// map.centerAndZoom(point, 20);

</script>
<script>
	$(function(){

		$(window).load(function() {
			var location = window.location.href;
			var href= location+"";
			var href_part=href.split('?');	 
		    var num1=href_part[1];
		    $(".ab").each(function(i) {
		    	var _now=$(this);
		        var _shuzi=$(this).index();
			  	var tiao=_now.offset().top;
			  	var shu=$(".ab").index(_now);
			  	if(num1==_shuzi){
		            tiao=_now.offset().top-$('header').height();
		            $("html,body").stop().animate({"scrollTop":tiao}, 1000);
		        }
		    });
		})
		winsize()
		$(window).resize(function(){
			winsize()
		})

		// $('footer').addClass("cur");

		 var swiper = new Swiper('.culturn-center-list', {
	        pagination: '.swiper-pagination',
	        paginationClickable: true,
	        direction: 'vertical',
	        slidesPerView:4,
	        speed:800,
	        autoplay:3000,
	        loop:true,
	        slidesPerGroup:4,
	        autoplayDisableOnInteraction:false,
	    });

		var NewUrl = "<?php echo site_url('about/city'); ?>";
	        var p = 0; //记录第几页
	        var sum = <?php echo $plan_page_num ?>; //记录第几页
	        $(".read-ajax").on('click', function(event) {
	            p += 1; //下一页
	            //加载下一页
	            if(p <= sum){
	                $.ajax({
	                    url: NewUrl,
	                    cache: false,
	                    data: {page:p},
	                    dataType: 'html',
	                    success: function (html) {
	                        $(".append").after(html);
	                        var len = $('.city-box li').size();
							$('.city-box li').each(function(){
								var index = $(this).index();
								if (index % 4 == 2) {
									$(this).addClass("on");
								}
								if (index % 4 == 3) {
									$(this).addClass("cur");
								}

								if (index % 2 == 1){
									$(this).addClass("int");
								}
								
								if (len - index == 2) {
									$(this).addClass("append");
								}else{
									$(this).removeClass("append");
								}
							})
	                    }
	                });
	            }
	            if (p >= sum){
	                $(".read-ajax").hide();
	            }
	            return false;
	        }); 

		
		var ajax_url = "<?php echo site_url_ajax('about/ab_news'); ?>";
	    var b = 0; //记录第几页
	    var sub = <?php echo $news_page_num ?>; //记录第几页
	    $(".more-ajax").on('click', function(event) {
	        b += 1; //下一页
	        if(b <= sub){
	            $.ajax({
	                url: ajax_url,
	                cache: false,
	                data: {page:b},
	                dataType: 'html',
	                beforeSend: function(){
	                    $(".ab-news .list").html();
	                },
	                success: function (html) {
	                    $(".ab-news .list").append(html);
	                }
	            });
	        }
	        if (b >= sub){
	            $(".more-ajax").hide();
	        }
	        return false;
	    });

	    //$('.ab-join-box li').eq(0).addClass("cur").find('.con').slideDown();

	    $('.ab-join-box li .title').on('click',function(){
	    	var par = $(this).parent("li")
	    	if (par.hasClass("cur")) {
				par.removeClass("cur");
				par.find('.con').slideUp();
	    	}else{
				par.addClass("cur").find('.con').slideDown();
				par.siblings("li").removeClass("cur").find('.con').slideUp();
	    	}
	    })

		function winsize(){
			var win = $(window).width();
			var iw = $('.ab-map-con').width();
			var len = $('.city-box li').size();
			$('.ab-map-con').css({
				'left':(win - iw)/2
			})
			$('.city-box li').each(function(){
				var index = $(this).index();
				if (index % 4 == 2) {
					$(this).addClass("on");
				}
				if (index % 4 == 3) {
					$(this).addClass("cur");
				}

				if (index % 2 == 1){
					$(this).addClass("int");
				}
				
				if (len - index == 2) {
					$(this).addClass("append");
				}else{
					$(this).removeClass("append");
				}
			})
		}
	})
</script>
</body>
</html>