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
            <a href="<?php site_url('active/ruler')?>"><button class="ruler-btn"></button></a>
        </div>

        <!-- 优惠券奖品 -->
        <div class="prizes">

            <div class="head_img">
                <img src="<?php if(!empty($userinfo['headimgurl'])) echo $userinfo['headimgurl'] ?>" alt="">
                <span><?php if(!empty($userinfo['username'])) echo $userinfo['username'] ?></span>
            </div>

            <div class="prizes-title">
                <?php if(!empty($prizes_info['content'])) echo $prizes_info['content'];?>
            </div>

            <div class="prizes-list">
                <?php if(!empty($list)): foreach($list as $k):?>
                <div class="list-line">
                    <input type="checkbox" name="cards" value="<?php echo $k['id']?>" id="card<?php echo $k['id']?>">
                    <label for="card<?php echo $k['id']?>"><?php echo $k['title']?></label>
                </div>
                <?php endforeach; endif;?>
            </div>

            <div class="note">
                <?php if(!empty($prizes_info['field1'])) echo $prizes_info['field1'];?>
            </div>

            <div class="border-submit">
                <button><?php if(!empty($prizes_info['field2'])) echo $prizes_info['field2']?></button>
            </div>
        </div>


    </div>
    <?php include_once VIEWS.'inc/footer.php'; ?>
</div>
<script>
    $(function(){
        $('.content p').find('img').each(function(){
            $(this).css('width','100%');
            $(this).css('height','auto');
        })

        // 跳转爱心排名页
        $('.border-submit').click(function(){
            // 判断是否分享成功
            setTimeout(function(){
                window.location.href= '<?php echo site_url('share')?>';
            },1000);

        });
    })
</script>
</body>
</html>