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
        <div class="news-info1 w1400">
            <div class="tit-box">
                <h4><?php if(!empty($info['title'])) echo $info['title'] ?></h4>
            </div>
            <div class="info-cont">
                <div class="main-wrap">
                    <?php if(!empty($info['content'])) echo $info['content']; ?>
                </div>
            </div>
            <div class="paging">
                <div class="main-wrap f-cb">
                    <div class="fl">
                        <p>上一篇：<?php if (!empty($info['prev_id'])): ?><a href="<?php echo site_url('wechat/info/'.$info['prev_id']) ?>"><?php if (!empty($info['prev_title'])) echo $info['prev_title'] ?></a><?php else: echo "<a href=\"javascript:;\">无</a>"; endif; ?></p>
                        <p>下一篇：<?php if (!empty($info['next_id'])): ?><a href="<?php echo site_url('wechat/info/'.$info['next_id']) ?>"><?php if (!empty($info['next_title'])) echo $info['next_title'] ?></a><?php else: echo "<a href=\"javascript:;\">无</a>"; endif; ?></p>
                    </div>
                    <a href="<?php echo site_url('wechat/'.$func_name); ?>" class="fr return">返回</a>
                </div>
            </div>
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
        $('.hello-nav li').eq(<?php echo $cur_pos ?>).addClass("cur");
    })
</script>
</body>
</html>