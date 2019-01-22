<!DOCTYPE html>
<html>
<head>
<?php include_once VIEWS.'inc/head.php'; ?>
</head>

<body>
    <div class="z-index">
    <?php include_once VIEWS.'inc/header.php'; ?>
		<div class="w92">
            <!--规则-->
            <div class="fr">
                <a href="<?php echo site_url('active/ruler')?>"><button class="ruler-btn"></button></a>
            </div>

            <!--报名表-->
            <div class="form-book">
                <?php echo form_open(site_url('welcome/user_form'),array("class"=>"layui-form form-horizontal","id"=>"frm-mother")); ?>
                    <input type="hidden" name="openid" id="openid" value="<?php if(!empty($openid)) echo $openid;?>" />
					<div class="border-line">
                        <input type="text" class="form-input layui-input" required lay-verify="required" name="username" id="username" placeholder="请输入您的姓名..." value="<?php if(!empty($nickname)) echo $nickname;?>"/>
                    </div>

                    <div class="border-line">
                        <input type="text" class="form-input layui-input" required lay-verify="required|phone" name="phone" id="phone" placeholder="请输入您的手机号码..."/>
                    </div>

                    <div class="border-line">
                        <input type="text" class="form-input layui-input" required lay-verify="required|number" maxlength="6" name="code" id="code" placeholder="请输入验证码..."/>
                        <div class="send_code">
                            <button type="button">发送验证码</button>
                        </div>
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
            var ajax_url = $('#frm-mother').attr('action');
            var datas = $("#frm-mother").serialize();

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
                            window.location.href= '<?php echo site_url('active/message')?>';
                        },1000);
                    }
                }
            });

            return false;
        });
    });

$(function () {

    // 发送验证码
    $(".send_code").click(function() {
        var ajax_url = "<?php echo site_url_ajax('welcome/send_code'); ?>";
        var phone = $('#phone').val();
        var openid = $('#openid').val();

        $.ajax({
            url: ajax_url,
            cache: false,
            type: 'POST',
            dataType: 'json',
            data: 'openid='+openid+'&phone='+phone,
            beforeSend: function(){
                if(phone == ''){ layer.msg('手机号码不能为空！'); return false; }
                if(openid == ''){ layer.msg('参数错误！'); return false; }
                if(!(/^1[34578]\d{9}$/.test(phone))){ layer.msg('手机号验证错误！'); return false; }
            },
            success: function (msg) {
                layer.msg(msg.message);

                if (msg.status == '1') {
                    time();
                } else if (msg.status == '2') {
					setTimeout(function(){
                            window.location.href= '<?php echo site_url('active/message')?>';
                        },1000);
				}
				
            }
        });

    });

    //验证码操作倒计时
    var wait = 60;
    function time() {
        if (wait == 0) {
            $(".send_code").find('button').removeAttr("disabled");
            $(".send_code").find('button').css("color", "#000");
            $(".send_code").find('button').text("获取验证码");
            wait = 60;
        } else {
            $(".send_code").find('button').attr("disabled", "disabled");
            $(".send_code").find('button').css("color", "#B8B8B8");
            $(".send_code").find('button').text("重新发送(" + wait + ")");
            wait--;
            setTimeout(function() {
                time();
            },1000);
        }
    }
})
</script>
</body>
</html>