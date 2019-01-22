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

        <!-- 详细规则 -->
        <div class="detail_ruler">
            <div class="content">
                <?php if(!empty($detail_ruler)) echo $detail_ruler;?>
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
    })
</script>
</body>
</html>