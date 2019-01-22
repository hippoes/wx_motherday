<!DOCTYPE html>
<html>
<head>
<?php include_once VIEWS.'inc/head.php'; ?>
</head>
<body class="ovh">
    <div class="hello">
        <div class="hello-banner">
            <img src="<?php if(!empty($banner['photo'])) echo UPLOAD_URL.tag_photo($banner['photo']); ?>" alt="<?php  echo get_pic_alt($banner['photo']) ?>">
            <span class="con">
                <h2>嗨·学院</h2>
                <i></i>
                <h3>Hi College</h3>
            </span>
        </div>
        <div class="hello-nav">
            <ul class="f-cb">
                <li>
                    <a href="<?php echo site_url('wechat/mom_conservation'); ?> ">
                        妈妈养护
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('wechat/baby_care'); ?> ">
                        宝宝护理
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('wechat/comics_area'); ?> ">
                        漫画专区
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('wechat/video_area'); ?> ">
                        视频专区
                    </a>
                </li>
            </ul>
        </div>
        <div class="hello-list">
        	<?php
        	if(empty($list)):
        		echo "<div align='center'>暂无相关信息！</div>";
        	else:
        	?>
            <ul class="w1400 f-cb">
                <?php foreach ($list as $v): ?>
                    <li>
                        <a href="<?php echo site_url('wechat/info/'.$v['id']); ?> ">
                            <p class="pic">
                                <img src="<?php if(!empty($v['photo'])) echo UPLOAD_URL.tag_photo($v['photo']) ?>" alt="<?php echo get_pic_alt($v['photo']) ?>">
                            </p>
                            <span class="con">
                                <h2><?php if(!empty($v['title'])) echo $v['title'] ?></h2>
                                <p class="font">
                                    <?php if(!empty($v['content'])) echo strcut(strip_tags($v['content']),30) ?>
                                </p>
                            </span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <?php
        	endif;
            ?>
            <?php if($page_nums >=1 ): ?>
            <a href="javascript:;" class="ajax-more">Read More</a>
        	<?php endif; ?>
        </div>
    </div>
<?php
    echo static_file('web/js/main.js');
    echo static_file('swiper/swiper.min.js');
    echo static_file('swiper/swiper.css');
    echo static_file('flexslider/flexslider.js');
    echo static_file('flexslider/flexslider.css');
?>
<script>
    $(function(){
        $('.hello-nav li').eq(2).addClass("cur");

        var NewUrl = "<?php echo site_url('wechat/wechat_ajax'); ?>";
        var p = 0; //记录第几页
        var sum = <?php echo $page_nums ?>; //记录第几页
        var cid = 62;
        $(".ajax-more").on('click', function(event) {
            p += 1; //下一页
            //加载下一页
            if(p <= sum){ 
                $.ajax({
                    url: NewUrl,  
                    cache: false,
                    data:{page:p,cid:cid},
                    dataType: 'html',
                    beforeSend: function(){
                        $(".hello-list ul").html();
                    },
                    success: function (html) {
                        $(".hello-list ul").append(html);
                    }
                });
            }
            if (p >= sum ){
                $(".ajax-more").hide();
            }
            return false;
        });
    })
</script>
</body>
</html>