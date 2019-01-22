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

        <!-- 留言板 -->
        <div class="message">
            <div class="head_img">
                <img src="<?php if(!empty($userinfo['headimgurl'])) echo $userinfo['headimgurl'] ?>" alt="">
                <span><?php if(!empty($userinfo['username'])) echo $userinfo['username'] ?></span>
            </div>
            <div class="guide">
                <?php if(!empty($guide)) echo $guide;?>
            </div>

            <?php echo form_open(site_url('welcome/message_form'),array("class"=>"layui-form")); ?>

            <input type="hidden" name="openid" value="<?php if(!empty($openid)) echo $openid;?>">
            <div class="textarea">
                <textarea name="message" id="message" class="layui-textarea" lay-verify="required" lay-filter="*" rows="5" placeholder="请输入您想说的话~"></textarea>
            </div>
            <div class="border-submit">
                <button class="layui-btn" lay-submit lay-filter="mother_form">提 交</button>
            </div>

            <?php echo form_close(); ?>
        </div>


    </div>
    <?php include_once VIEWS.'inc/footer.php'; ?>
</div>
<script>
    layui.use('form', function(){
        var form = layui.form;
        //监听提交
        form.on('submit(mother_form)', function(data){
            // layer.msg();
            var ajax_url = $('.layui-form').attr('action');
            var datas = $(".layui-form").serialize();

            $.ajax({
                url: ajax_url,
                type: 'POST',
                dataType: 'json',
                data: datas,
                beforeSend: function(){

                },
                success: function (msg) {
                    layer.msg(msg.message);

                    if (msg.status == '1') {
                        setTimeout(function(){
                            window.location.href= '<?php echo site_url('active/letter')?>';
                        },1000)
                    }
                }
            });

            return false;


        });
    });


    $(function(){
        $('.content p').find('img').each(function(){
            $(this).css('width','100%');
            $(this).css('height','auto');

        })
    })
</script>
</body>
</html>