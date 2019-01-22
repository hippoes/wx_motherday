<!DOCTYPE html>
<html>
<head>
<?php include_once VIEWS.'inc/head.php'; ?>
</head>
<body>
    <?php include_once VIEWS.'inc/header.php'; ?>
    <div class="z-index">
    	<?php include_once VIEWS.'inc/ab_banner.php'; ?>
    	<div class="news-info w1400">
    		<div class="now f-cb">
    			<a href="<?php echo site_url('news'); ?> ">活动资讯</a>
    			<b><?php if(!empty($type_name)) echo $type_name ?></b>
    		</div>
    		<div class="news-info-box">
    			<h2><?php if (!empty($info['title'])) echo $info['title'] ?><span class="time fr">Date : <?php echo date("Y-m-d",$info['timeline']) ?></span></h2>
                <?php if (!empty($info['content'])) echo $info['content'] ?>
				<div class="bdsharebuttonbox f-cb">
					<span class="fl">分享到：</span>
					<a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
					<a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a>
					<a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
					<a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
					<a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
				</div>
				<div class="info-bot f-cb">
					<span class="con fl">
						<p>上一篇：<?php if (!empty($info['prev_id'])): ?><a href="<?php echo site_url('news/info/'.$info['prev_id']) ?>"><?php if (!empty($info['prev_title'])) echo $info['prev_title'] ?></a><?php else: echo "<a href=\"javascript:;\">无</a>"; endif; ?></p>
						<p>下一篇：<?php if (!empty($info['next_id'])): ?><a href="<?php echo site_url('news/info/'.$info['next_id']) ?>"><?php if (!empty($info['next_title'])) echo $info['next_title'] ?></a><?php else: echo "<a href=\"javascript:;\">无</a>"; endif; ?></p>
					</span>
					<a href="<?php echo site_url('news/index/'.$info['ctype']); ?>" class="fr return">返回列表</a>
				</div>
    		</div>
    	</div>
     </div>
    <?php include_once VIEWS.'inc/footer.php'; ?>
<?php
	echo static_file('share.js');
	echo static_file('web/js/main.js');
	echo static_file('swiper/swiper.min.js');
    echo static_file('swiper/swiper.css');
?>
<script>
	$(function(){

	})
</script>
</body>
</html>