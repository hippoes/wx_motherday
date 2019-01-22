<!DOCTYPE html>
<html>
<head>
<?php include_once VIEWS.'inc/head.php'; ?>
</head>
<body class="ovh">
    <?php include_once VIEWS.'inc/header.php'; ?>
    <div class="z-index">
    	<?php include_once VIEWS.'inc/da_banner.php'; ?>
	    <div class="w1400 dalshbet">
	    	<div class="now f-cb">
	            <b>美妍中心</b>
	        </div>
	        <div class="wel-title">
		    	<h2>Beauty Management</h2>
		    	<i></i>
		    	<p>美妍中心</p>
		    </div>
		    <div class="dalshbet-font">
		    	<?php if (!empty($intro['content'])) echo $intro['content'] ?>
		    </div>
		    <ul class="f-cb dalshbet-list">

                <?php
                if (!empty($list)):
                    foreach ($list as $v):
                ?>
		    	<li class="ab">
		    		<div class="pic">
		    			<img src="<?php if (!empty($v['photo'])) echo UPLOAD_URL.tag_photo($v['photo']) ?>" alt="<?php echo get_pic_alt($v['photo']) ?>">
		    		</div>
		    		<div class="con">
		    			<h2><?php if (!empty($v['title'])) echo $v['title'] ?><?php if (!empty($v['title1'])) echo "(".$v['title1'].")" ?></h2>
		    			<i></i>
		    			<h3><?php if (!empty($v['field1'])) echo $v['field1'] ?></h3>
		    			<div class="font">
		    				<?php if (!empty($v['content'])) echo $v['content'] ?>
		    			</div>
		    			<span class="box f-cb">
                            <?php
                            if (!empty($v['outline_list'])):
                                foreach ($v['outline_list'] as $vv):
                            ?>
		    				<p class="link">· <?php  echo $vv ?></p>
                            <?php
                                endforeach;
                            endif;
                            ?>
		    			</span>
		    			<a href="<?php if (!empty($sidebar_info['field1'])) echo $sidebar_info['field1']; else echo 'javascript:void(0);' ?>" class="consult-link" target="_blank"><span>更多详情请点击咨询</span></a>
		    		</div>
		    	</li>
                <?php
                    endforeach;
                endif;
                ?>

		    </ul>
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
		
		$('.dalshbet-list li:odd').addClass("odd");
	})
</script>
</body>
</html>