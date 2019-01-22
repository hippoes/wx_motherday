<!DOCTYPE html>
<html>
<head>
<?php include_once VIEWS.'inc/head.php'; ?>
</head>
<body class="ovh">
	<?php include_once VIEWS.'inc/header.php'; ?>
	<div class="z-index">
		<?php include_once VIEWS.'inc/ser_banner.php'; ?>
		<div class="prenatal-care ab">
			<div class="w1400">
				<div class="now f-cb">
	                <a href="<?php echo site_url('delicate_service'); ?> ">Hibaby服务</a>
	                <b>精致服务</b>
	            </div>
	            <div class="wel-title">
			    	<h2>Prenatal Service</h2>
			    	<i></i>
			    	<p>产前服务</p>
			    </div>
			    <div class="service-font">
			    	<?php if (!empty($prenatal_intro['content'])) echo $prenatal_intro['content'] ?>
			    </div>
			    <div class="prenatal-list">
			    	<ul class="f-cb">
                        <?php
                        if (!empty($prenatal_list)):
                            foreach ($prenatal_list as $k=>$v):
                        ?>
			    		<li>
			    			<p class="pic">
			    				<img src="<?php if (!empty($v['photo'])) echo UPLOAD_URL.tag_photo($v['photo']) ?>" alt="<?php echo get_pic_alt($v['photo']) ?>">
			    			</p>
			    			<span class="con f-cb">
			    				<h2><?php if (!empty($v['title'])) echo $v['title'] ?></h2>
			    				<i></i>
                                <div class="font"><a href="javascript:void(0);"><?php if (!empty($v['content'])) echo $v['content'] ?></a></div>
                                <?php
                                if (!empty($v['list'])):
                                    foreach ($v['list'] as $vv):
                                ?>
			    				<div class="link"><?php if (!empty($vv)) echo $vv ?></div>
                                <?php
                                    endforeach;
                                endif;
                                ?>
			    			</span>
			    		</li>
                        <?php
                            endforeach;
                        endif;
                        ?>
			    	</ul>
			    </div>
			    <!-- <a href="<?php // if (!empty($sidebar_info['field1'])) echo $sidebar_info['field1']; else echo 'javascript:void(0);' ?>" class="consult-link on" target="_blank"><span>更多详情请点击咨询</span></a> -->
			</div>
		</div>
		<div class="mum_service ab">
			<div class="w1400">
				<div class="wel-title">
			    	<h2>Postpartum Service</h2>
			    	<i></i>
			    	<p>妈妈服务</p>
			    </div>
			    <div class="service-font">
			    	<?php if ($postpartum_intro['content']) echo $postpartum_intro['content'] ?>
			    </div>
			    <div class="mum_service-list">
			    	<ul class="f-cb">
                        <?php
                        if (!empty($postpartum_list)):
                            foreach ($postpartum_list as $v):
                        ?>
			    		<li>
			    			<h2><?php if (!empty($v['title'])) echo $v['title'] ?></h2>
			    			<i></i>
                            <?php if (!empty($v['content'])) echo $v['content'] ?>
			    		</li>
                        <?php
                            endforeach;
                        endif;
                        ?>
			    		<li>
			    			<p class="pic">
			    				<img src="<?php if (!empty($postpartum_pt['photo'])) echo UPLOAD_URL.tag_photo($postpartum_pt['photo']) ?>" alt="<?php echo get_pic_alt($postpartum_pt['photo']) ?>">
			    			</p>
			    			<span class="con">
			    				<h2><?php if (!empty($postpartum_pt['title'])) echo $postpartum_pt['title'] ?></h2>
				    			<i></i>
                                <?php
                                if (!empty($postpartum_pt['list']) && is_array($postpartum_pt['list'])):
                                    foreach ($postpartum_pt['list'] as $v):
                                ?>
				    			<p><?php echo $v ?></p>
                                <?php
                                    endforeach;
                                endif;
                                ?>
			    			</span>
			    		</li>
			    	</ul>
			    </div>
				<!-- <a href="<?php // if (!empty($sidebar_info['field1'])) echo $sidebar_info['field1']; else echo 'javascript:void(0);' ?>" class="consult-link on" target="_blank"><span>更多详情请点击咨询</span></a> -->
			</div>
		</div>
		<div class="baby-service w1400 ab">
			<div class="wel-title">
		    	<h2>Baby Service</h2>
		    	<i></i>
		    	<p>宝宝服务</p>
		    </div>
		    <div class="service-font">
                <?php if ($baby_intro['content']) echo $baby_intro['content'] ?>
		    </div>
		    <div class="baby-service-list">
		    	<ul class="f-cb">
                    <?php
                    if (!empty($baby_list)):
                        foreach ($baby_list as $v):
                    ?>
		    		<li>
		    			<h2 style="background: url(<?php if (!empty($v['icon'])) echo UPLOAD_URL.tag_photo($v['icon']) ?>) no-repeat left center"><?php if (!empty($v['title'])) echo $v['title'] ?></h2>
                        <?php
                        if (!empty($v['list']) && is_array($v['list'])):
                            foreach ($v['list'] as $vv):
                        ?>
		    			<p><?php echo $vv ?></p>
                        <?php
                            endforeach;
                        endif;
                        ?>
		    		</li>
                    <?php
                        endforeach;
                    endif;
                    ?>
		    	</ul>
		    </div>
		    <!-- <a href="<?php  //if (!empty($sidebar_info['field1'])) echo $sidebar_info['field1']; else echo 'javascript:void(0);' ?>" class="consult-link on" target="_blank"><span>更多详情请点击咨询</span></a> -->
		</div>
		<div class="month-service ab">
			<div class="w1400">
				<div class="wel-title">
			    	<h2>Post-natal Meal</h2>
			    	<i></i>
			    	<p>月子膳食</p>
			    </div>
			    <div class="service-font">
                    <?php if ($meal_intro['content']) echo $meal_intro['content'] ?>
			    </div>
			    <div class="month-service-top f-cb">
			    	<div class="pic">
			    		<img src="<?php if (!empty($meal_pt['photo'])) echo UPLOAD_URL.tag_photo($meal_pt['photo']) ?>" alt="<?php echo get_pic_alt($meal_pt['photo']) ?>">
			    	</div>	
			    	<div class="con">
			    		<h2><?php if (!empty($meal_pt['title'])) echo $meal_pt['title'] ?></h2>
			    		<i></i>
                        <?php
                        if (!empty($meal_pt['pt_list']) && is_array($meal_pt['pt_list'])):
                            foreach ($meal_pt['pt_list'] as $v):
                                foreach ($v as $k=>$vv):
                                    if ($k==0):
                        ?>
			    		<p><?php echo $vv ?></p>
                        <?php
                                    else:
                        ?>
			    		<h3><?php echo $vv ?></h3>
                        <?php
                                    endif;
                                endforeach;
                            endforeach;
                        endif;
                        ?>
			    	</div>
			    </div>
			    <ul class="f-cb month-service-list">
                    <?php
                    if (!empty($meal_list)):
                        foreach ($meal_list as $v):
                    ?>
		    		<li>
		    			<i></i>
		    			<h2><?php if (!empty($v['title'])) echo $v['title'] ?></h2>
		    			<?php if (!empty($v['content'])) echo $v['content'] ?>
		    		</li>
                    <?php
                        endforeach;
                    endif;
                    ?>
		    	</ul>
			    <!-- <a href="<?php //if (!empty($sidebar_info['field1'])) echo $sidebar_info['field1']; else echo 'javascript:void(0);' ?>" class="consult-link on" target="_blank"><span>更多详情请点击咨询</span></a> -->
			</div>
		</div>
		<div class="out-service w1400 ab">
			<div class="wel-title">
		    	<h2>Outpatient  Service</h2>
		    	<i></i>
		    	<p>门诊服务</p>
		    </div>
		    <div class="out-service-intro f-cb">
		    	<p class="pic">
		    		<img src="<?php if (!empty($outpatient['photo'])) echo UPLOAD_URL.tag_photo($outpatient['photo']) ?>" alt="<?php echo get_pic_alt($outpatient['photo']) ?>">
		    	</p>
		    	<span class="con">
		    		<h2><?php if (!empty($outpatient['title'])) echo $outpatient['title'] ?></h2>
		    		<i></i>
		    		<p><?php if (!empty($outpatient['content'])) echo $outpatient['content'] ?></p>
		    	</span>
		    </div>
		    <!-- <a href="<?php // if (!empty($sidebar_info['field1'])) echo $sidebar_info['field1']; else echo 'javascript:void(0);' ?>" class="consult-link on" target="_blank"><span>更多详情请点击咨询</span></a> -->
		</div>
	</div>
	<?php include_once VIEWS.'inc/footer.php'; ?>
<?php
	echo static_file('web/js/main.js');
	echo static_file('swiper/swiper.min.js');
    echo static_file('swiper/swiper.css');
    echo static_file('flexslider/flexslider.js');
    echo static_file('flexslider/flexslider.css');
?>
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
		$(window).load(function(){
			winsize();
		})
		$(window).resize(function(){
			winsize();	
		})
		function winsize(){
			var win = $(window).width();
			if (win > 768) {
				var hei = $('.prenatal-care .prenatal-list li').eq(0).height();
				var boh = $('.baby-service-list li').eq(1).height();
				$('.prenatal-care .prenatal-list li').eq(1).height(hei);
				$('.prenatal-care .prenatal-list li').eq(2).height(hei);
				$('.baby-service-list li').eq(0).height(boh);
				$('.baby-service-list li').eq(2).height(boh);
			}
			if(win > 480){
				var bh = $('.mum_service-list li').eq(1).height();
				$('.mum_service-list li').eq(0).height(bh);
				$('.mum_service-list li').eq(2).height(bh);
			}
			
		}
	})
</script>
</body>
</html>