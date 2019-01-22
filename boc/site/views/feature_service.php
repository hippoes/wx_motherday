<!DOCTYPE html>
<html>
<head>
<?php include_once VIEWS.'inc/head.php'; ?>
</head>
<body class="ovh">
	<?php include_once VIEWS.'inc/header.php'; ?>
	<div class="z-index">
		<?php include_once VIEWS.'inc/ser_banner.php'; ?>
		<div class="professional w1400">
			<div class="now f-cb">
                <a href="<?php echo site_url('delicate_service'); ?> ">Hibaby服务</a>
                <b>服务特色</b>
            </div>
            <div class="wel-title">
		    	<h2>Professional Service</h2>
		    	<i></i>
		    	<p>专业领航 中医调养</p>
		    </div>
		    <div class="service-font">
		    	<?php if (!empty($professional_intro['content'])) echo $professional_intro['content'] ?>
		    </div>
		    <ul class="professional-list f-cb">
                <?php
                if (!empty($professional_list)):
                    foreach ($professional_list as $v):
                ?>
		    	<li>
		    		<a href="javascript:;">
		    			<p class="pic">
		    				<img src="<?php if (!empty($v['photo'])) echo UPLOAD_URL.tag_photo($v['photo']) ?>" alt="<?php echo get_pic_alt($v['photo']) ?>">
		    			</p>
		    			<span class="bg"></span>
		    			<h2><?php if (!empty($v['title'])) echo $v['title'] ?></h2>
		    		</a>
		    	</li>
                <?php
                    endforeach;
                endif;
                ?>
		    </ul>
		</div>
		<div class="green-smart">
			<div class="w1400">
				<div class="wel-title">
			    	<h2>Green Smart</h2>
			    	<i></i>
			    	<p>智能环保 舒适便捷</p>
			    </div>
			    <div class="service-font">
                    <?php if (!empty($smart_intro['content'])) echo $smart_intro['content'] ?>
			    </div>
			</div>
		    <ul class="green-smart-list f-cb">
                <?php
                if (!empty($smart_list)):
                    foreach ($smart_list as $v):
                ?>
                        <li>
                            <a href="javascript:;">
                                <img src="<?php if (!empty($v['icon'])) echo UPLOAD_URL.tag_photo($v['icon']) ?>" alt="<?php echo get_pic_alt($v['icon']) ?>" class="tit">
                                <h2><?php if (!empty($v['title'])) echo $v['title'] ?></h2>
                                <p><?php if (!empty($v['outline'])) echo $v['outline'] ?></p>
                                <img src="<?php if (!empty($v['photo'])) echo UPLOAD_URL.tag_photo($v['photo']) ?>" alt="<?php echo get_pic_alt($v['photo']) ?>" class="pic">
                            </a>
                        </li>
                <?php
                    endforeach;
                endif;
                ?>
		    </ul>
		</div>
		<div class="trends w1400">
			<div class="wel-title">
		    	<h2>Trends -Health</h2>
		    	<i></i>
		    	<p>引领潮流 时尚辣妈</p>
		    </div>
		    <div class="service-font">
                <?php if (!empty($trends_intro['content'])) echo $trends_intro['content'] ?>
		    </div>
		    <ul class="trends-list f-cb">
                <?php
                if (!empty($trends_list)):
                    foreach ($trends_list as $v):
                ?>
		    	<li>
		    		<img src="<?php if (!empty($v['photo'])) echo UPLOAD_URL.tag_photo($v['photo']) ?>" alt="<?php echo get_pic_alt($v['photo']) ?>">
		    		<p><?php if (!empty($v['title'])) echo $v['title'] ?></p>
		    	</li>
		    	<?php
                    endforeach;
                endif;
                ?>
		    </ul>
		</div>
		<div class="international">
			<div class="w1400">
				<div class="wel-title">
			    	<h2>International Quality</h2>
			    	<i></i>
			    	<p>接轨国际 品质保障</p>
			    </div>
			    <div class="service-font">
                    <?php if (!empty($international['content'])) echo $international['content'] ?>
			    </div>
			    <div class="pic">
			    	<img src="<?php if (!empty($international['photo'])) echo UPLOAD_URL.tag_photo($international['photo']) ?>" alt="<?php echo get_pic_alt($international['photo']) ?>">
			    </div>
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
		$('footer').css('margin-top','-133px');
	})
</script>
</body>
</html>