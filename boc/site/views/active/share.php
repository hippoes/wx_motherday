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

            <div class="userinfo">
                <div class="fl infos">
                    <div class="u-title"><span><?php if(!empty($user)) { echo $user;} else { echo '小明';}?></span> 已收获</div>
                    <div class="number"><h2><?php if(!empty($number)) { echo $number;} else { echo '000';}?></h2></div>
                    <div class="u-title">颗小心心</div>
                </div>
                <div class="fl ranking">
                    <div class="u-title">ta的排名</div>
                    <div class="number"><h2><?php if(!empty($rank)) { echo $rank;} else { echo '000';}?></h2></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="content" style="background:url(<?php if (!empty($bg_photo)) echo UPLOAD_URL.tag_photo($bg_photo) ?>) no-repeat center;background-size: 100%;background-color: #fff;background-position: bottom;">
                <div class="message-letter">
                    <a><?php if(!empty($userinfo['message'])) { echo $userinfo['message'];} else { echo '第一次看到验孕试纸2道杠，第一次听到宝宝咚咚的心跳，第一次与宝宝面对面，我想说~~~~第一次看到验孕试纸2道杠，第一次听到宝宝咚咚的心跳，第一次与宝宝面对面，我想说~~~~第一次看到验孕试纸2道杠，第一次听到宝宝咚咚的心跳，第一次与宝宝面对面，我想说~~~~第一次看到验孕试纸2道杠，第一次听到宝宝咚咚的心跳，第一次与宝宝面对面，我想说~~~~';}?></a>
                </div>
                <a class="timeline"><?php if($userinfo['message_time']) echo date('Y-m-d H:i:s', $userinfo['message_time'])?></a>
            </div>
            <div class="border-submit">
                <button class="love-heart">送ta一颗心心</button>
            </div>
            <div class="border-submit">
                <button>我也要参加</button>
            </div>
        </div>


    </div>
    <?php include_once VIEWS.'inc/footer.php'; ?>
    <?php echo static_file('web/js/mother/love-heart.js')?>
</div>
<script>
    $(function(){
        // 留言内容间隙调整
        var height = $('.message-letter').css('height');
        if (parseInt(height) > 120) {
            $('.message-letter').css('padding','20px 0 40px 0');
        }


    })
</script>
</body>
</html>