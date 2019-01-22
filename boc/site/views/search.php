<!DOCTYPE html>
<html>
<head>
<?php include_once VIEWS.'inc/head.php'; ?>
<style>
    .mom-box li .con{
        width: 100%;
        padding: 10px;
    }
    .mom-box li .more{
        width: 38%;
    }
</style>
</head>
<body class="ovh" style="background:#f8f8f8;">
    <?php include_once VIEWS.'inc/header.php'; ?>
    <div class="z-index">
		<div class="inline-banner" style="background:url(<?php if (!empty($banner['photo'])) echo UPLOAD_URL.tag_photo($banner['photo']) ?>) no-repeat center;"></div>
		<div class="w1400 mom-box">
			<div class="now f-cb">
                <b>搜索“<?php echo $keyword ?>”</b>
            </div>
            <?php
            if (empty($news_list)):
                echo "<div align='center'>暂无".$keyword."的相关信息！</div>";
            else:
            ?>
            <ul class="f-cb">
                <?php
                foreach ($news_list as $v):
                    if($v['cid']==48){
                        $site_url="news/info/".$v['id'];
                    }elseif($v['cid']==50){
                        $site_url="mom/info/".$v['id'];
                    }elseif($v['cid']==58){
                        $site_url="about/newsinfo/".$v['id'];
                    }
                ?>
                    <li>
                        <a href="<?php echo site_url($site_url); ?> " target="_blank">
                            <span class="con">
                                <h2>
                                    <?php if (!empty($v['title'])) echo $v['title'] ?>
                                </h2>
                                <p style="color:#999">
                                    <?php echo date("Y-m-d",$v['timeline']) ?>
                                </p>
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
    		<div class="page on">
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

        var kw = "<?php echo $keyword;?>"
        $('.pagination>a ').each(function(index, el) {
            if ($(el).attr('href') != "#") {
                el.href += "?kw="+kw;
            }
        });        
    })
</script>
</body>
</html>
