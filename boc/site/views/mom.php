<!DOCTYPE html>
<html>
<head>
<?php include_once VIEWS.'inc/head.php'; ?>
</head>
<body style="background:#f8f8f8;">
    <?php include_once VIEWS.'inc/header.php'; ?>
    <div class="z-index">
		<?php include_once VIEWS.'inc/mom_banner.php'; ?>
		<div class="w1400 mom-box">
			<div class="now f-cb">
    			<b>新妈圈</b>
    		</div>
            <?php
            if (empty($list)):
                echo "<div align='center'>暂无信息！</div>";
            else:
            ?>
    		<ul class="f-cb">
    			<?php foreach ($list as $v): ?>
    				<li>
    					<a href="<?php echo site_url('mom/info/'.$v['id']); ?> ">
    						<p class="pic">
    							<img src="<?php if (!empty($v['photo'])) echo UPLOAD_URL.tag_photo($v['photo']) ?>" alt="<?php echo get_pic_alt($v['photo']) ?>">
    						</p>
    						<span class="con">
    							<h2><?php if (!empty($v['title'])) echo $v['title'] ?></h2>
    							<p class="font"><?php if (!empty($v['content'])) echo strcut(strip_tags($v['content']),36) ?></p>
    							<p class="more"><span>Read More</span></p>
    						</span>
    					</a>
    				</li>
    			<?php endforeach; ?>
    		</ul>
            <?php
            endif;
            ?>
            <?php if(!empty($pages)): ?>
    		<div class="page">
    			<?php echo $pages ?>
    		</div>
            <?php endif; ?>
		</div>
	</div>
	<?php include_once VIEWS.'inc/footer.php'; ?>
<?php
	echo static_file('web/js/main.js');
	echo static_file('swiper/swiper.min.js');
    echo static_file('swiper/swiper.css');
?>
<script>
	$(function(){
		$('.mom-box li:odd').addClass('odd');
	})
</script>
</body>
</html>