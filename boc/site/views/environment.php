<!DOCTYPE html>
<html>
<head>
<?php include_once VIEWS.'inc/head.php'; ?>
</head>
<body class="ovh">
    <?php include_once VIEWS.'inc/header.php'; ?>
    <div class="z-index">
    	<div class="inline-banner" style="background:url(<?php if (!empty($banner['photo'])) echo UPLOAD_URL.tag_photo($banner['photo']) ?>) no-repeat center;"></div>
    	<div class="environment">
    		<div class="w1400">
    			<div class="now f-cb">
	                <a href="<?php echo site_url('delicate_service'); ?> ">Hibaby服务</a>
	                <b>环境介绍</b>
	            </div>
	            <ul class="environment-list f-cb">
                    <?php
                    if (!empty($list)):
                        foreach ($list as $v):
                            $pics=list_upload($v['pics']);
                    ?>
	            	<li class="ab">
	            		<div class="intro f-cb">
	            			<p class="pic" style="background:url(<?php if (!empty($v['photo'])) echo UPLOAD_URL.tag_photo($v['photo']) ?>) no-repeat center"></p>
	            			<span class="con">
	            				<h2><?php if (!empty($v['title'])) echo $v['title'] ?></h2>
	            				<h3><?php if (!empty($v['field1'])) echo $v['field1'] ?></h3>
	            				<i></i>
	            				<div class="font">
	            					<?php if (!empty($v['content'])) echo $v['content'] ?>
	            				</div>
	            			</span>
	            		</div>
                        <?php if (!empty($pics)): ?>
	            		<dl class="f-cb">
                            <?php
                            foreach ($pics as $k=>$v):
                            	if($k < 3 ):
                            ?>
	            			<dd>
	            				<img src="<?php echo UPLOAD_URL.$v['url'] ?>" alt="<?php echo $v['alt'] ?>">
	            			</dd>
                            <?php
                            	endif;
                            endforeach;
                            ?>
	            		</dl>
                        <?php endif; ?>
	            	</li>
                    <?php
                        endforeach;
                    endif;
                    ?>
	            </ul>
    		</div>
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
		
		$('footer').css('margin-top','-133px');

		$('.environment-list li:even').addClass("even");

		$('.environment-list li').each(function(){
			var hei = $(this).find(".con").innerHeight();
			$(this).find('.pic').height(hei);
		})

		$(window).resize(function(){
			$('.environment-list li').each(function(){
				var hei = $(this).find(".con").innerHeight();
				$(this).find('.pic').height(hei);
			})
		})
	})
</script>
</body>
</html>