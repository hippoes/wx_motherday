<!DOCTYPE html>
<html>
<head>
    <?php include_once VIEWS.'inc/head.php'; ?>
</head>

<body>
<div class="z-index">
    <?php include_once VIEWS.'inc/header.php'; ?>
    <div class="w92">
        <!-- 规则btn -->
        <div class="fr">
            <a href="<?php echo site_url('active/ruler')?>"><button class="ruler-btn"></button></a>
        </div>

        <!-- 信纸部分 -->
        <div class="letter">

            <div class="head_img">
                <img src="<?php if(!empty($userinfo['headimgurl'])) echo $userinfo['headimgurl'] ?>" alt="">
                <span><?php if(!empty($userinfo['username'])) echo $userinfo['username'] ?></span>
            </div>

            <div class="letter-title">
                <h3>您的留言标签已生成：</h3>
            </div>
            <div class="content" style="background:url(<?php if (!empty($bg_photo)) echo UPLOAD_URL.tag_photo($bg_photo) ?>) no-repeat center;background-size: 100%;background-color: #fff;background-position: bottom;">
                <div class="message-letter">
                    <a><?php if(!empty($userinfo['message'])) { echo $userinfo['message'];} else { echo '第一次看到验孕试纸2道杠，第一次听到宝宝咚咚的心跳，第一次与宝宝面对面，我想说~~~~第一次看到验孕试纸2道杠，第一次听到宝宝咚咚的心跳，第一次与宝宝面对面，我想说~~~~第一次看到验孕试纸2道杠，第一次听到宝宝咚咚的心跳，第一次与宝宝面对面，我想说~~~~第一次看到验孕试纸2道杠，第一次听到宝宝咚咚的心跳，第一次与宝宝面对面，我想说~~~~';}?></a>
                </div>
                <a class="timeline"><?php if($userinfo['message_time']) echo date('Y-m-d H:i:s', $userinfo['message_time'])?></a>
            </div>
            <div class="guide">
                <?php if(!empty($guide)) echo $guide;?>
            </div>
            <div class="border-submit">
                <button><?php if(!empty($btn)) echo $btn?></button>
            </div>
        </div>


    </div>
    <?php include_once VIEWS.'inc/footer.php'; ?>
</div>
<script>
    $(function(){
        // 留言内容间隙调整
        var height = $('.message-letter').css('height');
        if (parseInt(height) > 120) {
            $('.message-letter').css('padding','20px 0 40px 0');
        }

        // 分享领取卡券
        $('.border-submit').click(function(){
            // 判断是否分享成功
            setTimeout(function(){
                window.location.href= '<?php echo site_url('prizes')?>';
            },1000);

        });

    })
</script>
</body>
</html>