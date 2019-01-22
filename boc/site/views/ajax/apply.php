<?php $city_list=get_cities(); ?>
<div class="bg"></div>
<div class="visit-con">
    <span class="close"></span>
    <h2>课程报名</h2>
    <?php echo form_open(site_url('order/sendpost'),array("class"=>"form-horizontal","id"=>"frm-order")); ?>
        <div class="text fl">
            <span>姓名 / Name：</span>
            <input name="username" id="username" type="text">
        </div>
        <div class="text fr">
            <span>电话 / Telephone：</span>
            <input name="telphone" id="telphone" type="text">
        </div>
        <select name="city" id="city" class="fl">
            <option value="城市 / City：">城市 / City：</option>
            <?php
            if (!empty($city_list)):
                foreach ($city_list as $v):
            ?>
            <option value="<?php echo $v['id'] ?>"><?php if (!empty($v['title'])) echo $v['title'] ?></option>
            <?php
                endforeach;
            endif;
            ?>
        </select>
        <div class="text fr">
            <span>预产期 / Pre Period：</span>
            <input type="text" name="date" id="demo" class="date laydate-icon" readonly="true" value="请输入日期">
        </div>
        <div class="text fl on">
            <span>课程 / Class：</span>
            <input type="text" name="course" id="course" value="<?php echo $info['title'] ?>" readonly="readonly">
        </div>
        <input type="hidden" name="type_id" id="type_id" value="<?php echo $info['cid'] ?>">
        <input type="hidden" name="course_id" id="course_id" value="<?php echo $info['id'] ?>">
        <input type="submit" value="提交" class="fl submit">
    <?php echo form_close(); ?>
</div>

<script type="text/javascript">
    $(function(){
        $('#frm-order').on('submit',function(event) {
            url =  $(this).attr('action');
            data = $(this).serializeArray();
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: data,
            })
            .done(function(data) {
                var status;
                if (data.status == 0) {
                    $('.validate').remove();
                    $('#frm-feedback input').removeClass('error');
                    $('#frm-feedback textarea').removeClass('error');
                    var strlist='';
                    $.each(data.msg, function(putid, putv) {
                        if(putid!='city'){
                            $('#'+putid).val('');
                        }
                        strlist+=putv+'\n';
                    });
                    alert(strlist);
                }else if(data.status == 1){
                    alert(data.msg);
                    document.location.reload();
                    // window.location.href="";
                }else if(data.status == 2){
                    alert(data.msg);
                };
            })
            event.preventDefault();
        });

    });
</script>
<script type="text/javascript">

!function(){
    laydate.skin('molv');//切换皮肤，请查看skins下面皮肤库
    laydate({elem: '#demo'});//绑定元素
}();

//日期范围限制
var start = {
    elem: '#start',
    format: 'YYYY-MM-DD',
    min: laydate.now(), //设定最小日期为当前日期
    max: '2099-06-16', //最大日期
    istime: true,
    istoday: false,
    choose: function(datas){
         end.min = datas; //开始日选好后，重置结束日的最小日期
         end.start = datas //将结束日的初始值设定为开始日
    }
};
var end = {
    elem: '#end',
    format: 'YYYY-MM-DD',
    min: laydate.now(),
    max: '2099-06-16',
    istime: true,
    istoday: false,
    choose: function(datas){
        start.max = datas; //结束日选好后，充值开始日的最大日期
    }
};
laydate(start);
laydate(end);

//自定义日期格式
laydate({
    elem: '#test1',
    format: 'YYYY年MM月DD日',
    festival: true, //显示节日
    choose: function(datas){ //选择日期完毕的回调
        // alert('得到：'+datas);
    }
});

//日期范围限定在昨天到明天
laydate({
    elem: '#hello3',
    min: laydate.now(-1), //-1代表昨天，-2代表前天，以此类推
    max: laydate.now(+1) //+1代表明天，+2代表后天，以此类推
});
</script>