<?php
$cid=$this->cid;
$need_title=array(29,33,35,55,56);
$need_photo=array(7);
$need_outline=array();
$need_photo1=array(43);
$need_icon1=array(43);
$need_icon2=array();
$need_icon3=array();
$need_field1=array(7,10,11,12);
$need_field2=array(7,10,11,12);
$need_field3=array(12);
$need_field4=array(12);
$no_content=array(7,11,12);

$photo_px=array(
    7 => '960x450',
);

$photo1_px=array(
    43 => '469x346'
);

$icon1_px=array(
    43 => '19x21'
);

$icon2_px=array(
    43 => '30x30'
);

$icon3_px=array(
    43 => '30x30'
);

$outline_name='简介';
$outline_placeholder='';
$photo1_name='图片1';
$icon1_name='图标1';
$icon2_name='图标2';
$icon3_name='图标3';
$title_name='标题';
$field1_name='字段1';
$field2_name='字段2';
$field3_name='字段3';
$field4_name='字段4';
if ($cid==29){
    $outline_name='文本列表';
    $outline_placeholder='若要以列表形式展现，请用“##”隔离字符，如：##你好##大家好';
}elseif($cid==33){
    $outline_name='文本列表';
    $outline_placeholder='若要以列表形式展现，请用“##”隔离字符，列表标题与列表内容之间用$$隔离，如：##标题$$内容 ##大家好$$今天天气真好';
}elseif($cid==43){
    $photo1_name='首页图片';
    $icon1_name='图标';
    $icon2_name='首页图标1';
    $icon3_name='首页图标2';
}elseif($cid==56){
    $outline_name='职称';
}elseif($cid==55){
    $title_name='简历投递邮箱';
}elseif($cid==7){
    $field1_name='分享引导语';
    $field2_name='按钮名称';
}elseif($cid==9){
    $field1_name='在线咨询网址';
    $field2_name='电话';
}elseif($cid==69){
	$field1_name='所在城市';
	$field2_name='域名';
}elseif($cid==10){
    $field1_name='注解信息';
    $field2_name='按钮名称';
}elseif($cid==11){
    $field1_name='WX_Appid';
    $field2_name='WX_Secret';
}elseif($cid==12){
    $field1_name='AccessKeyId';
    $field2_name='AccessKeySecret';
    $field3_name='SignName';
    $field4_name='TemplateCode';
}



?>
<?php include_once 'inc_modules_path.php'; ?>

<h3>  <i class="fa fa-pencil"></i>  <?php echo $title; ?></h3>

<?php include_once 'inc_form_errors.php'; ?>

<div class="boxed">
	<?php echo form_open(site_urlc($this->class.'/edit'), array('class' => 'form-horizontal', 'id' => 'frm-edit')); ?>

	<input class="hide" type="text" id="p-title" name="title" value="<?php echo set_value('title',$seo['title']) ?>">
	<input class="hide" type="text" id="p-title_seo" name="title_seo" value="<?php echo set_value('title_seo',$seo['title_seo']) ?>">
	<input class="hide" type="text" id="p-tags" name="tags" value="<?php echo set_value('tags',$seo['tags']) ?>">
	<textarea class="hide" id='p-intro' name="intro" rows='8' class='span4'><?php echo set_value('intro',$seo['intro']) ?></textarea>

	<div class="boxed-inner seamless">

        <?php if (in_array($cid,$need_title)): ?>
		<div class="control-group">
			<label class="control-label" for="title"> <?php echo $title_name ?> </label>
			<div class="controls">
				<input type="text" id="title" name="title" class='span7' value="<?php echo set_value('title',$it['title']); ?>">
			</div>
		</div>
        <?php endif; ?>

        <?php if (in_array($cid,$need_field1)): ?>
            <div class="control-group">
                <label class="control-label" for="field1"> <?php echo $field1_name ?> </label>
                <div class="controls">
                    <input type="text" <?php if($cid==69) echo "required"; ?> id="field1" name="field1" class='span7' value="<?php echo set_value('field1',$it['field1']); ?>">
                </div>
            </div>
        <?php endif; ?>

        <?php if (in_array($cid,$need_field2)): ?>
            <div class="control-group">
                <label class="control-label" for="field2"> <?php echo $field2_name ?> </label>
                <div class="controls">
                    <input type="text" <?php if($cid==69) echo "";  ?> id="field2" name="field2" class='span7' value="<?php echo set_value('field2',$it['field2']); ?>">
                </div>
            </div>
        <?php endif; ?>

        <?php if (in_array($cid,$need_field3)): ?>
            <div class="control-group">
                <label class="control-label" for="field3"> <?php echo $field3_name ?> </label>
                <div class="controls">
                    <input type="text" id="field3" name="field3" class='span7' value="<?php echo set_value('field3',$it['field3']); ?>">
                </div>
            </div>
        <?php endif; ?>
		
		<?php if (in_array($cid,$need_field4)): ?>
            <div class="control-group">
                <label class="control-label" for="field4"> <?php echo $field4_name ?> </label>
                <div class="controls">
                    <input type="text" id="field4" name="field4" class='span7' value="<?php echo set_value('field4',$it['field4']); ?>">
                </div>
            </div>
        <?php endif; ?>

        <?php if (in_array($cid,$need_outline)): ?>
            <div class="control-group">
                <label for="outline"  class="control-label"><?php echo $outline_name ?></label>
                <div class="controls">
                    <textarea placeholder="<?php echo $outline_placeholder ?>" name="outline" rows='8' class='span7'><?php echo set_value('outline',$it['outline']) ?></textarea>
                    <span class="help-inline"></span>
                </div>
            </div>
        <?php endif; ?>

        <?php if (!in_array($cid,$no_content)): ?>
		<div class="control-group uefull">
			<textarea id="content" name="content" > <?php echo set_value('content',$it['content']); ?></textarea>
		</div>
        <?php endif; ?>

        <?php if (false): ?>
		<div class="control-group">
			<label class="control-label" for="status"> 下载远程图片 </label>
			<div class="controls">
				<input type='radio' name="isremote" value="1" >是
				<input type='radio' name="isremote" value="0" checked='checked'>否
				<span class="help-inline"></span> <span style="color:#F00">内容中的图片可以选择是否要下载到本网站中！</span>
			</div>
		</div>
        <?php endif; ?>

        <?php if (in_array($cid,$need_photo)): ?>
		<!-- 图片上传 -->
		<div class="control-group">
			<label for="img" class="control-label">图片 </label>
			<div class="controls">
				<div class="btn-group">
					<span class="btn btn-success">
						<i class="fa fa-upload"></i>
						<span> <?php echo lang('upload_file') ?> </span>[<?php echo $photo_px[$cid] ?>]
						<input class="fileupload" type="file" data-smallsize="100x80" data-size="<?php echo $photo_px[$cid] ?>" accept="" data-for="photo">
					</span>
					<input type="hidden" name="photo" class="form-upload" data-more="0" value="<?php echo $it['photo'] ?>">
					<input type="hidden" name="thumb" class="form-upload-thumb" value="<?php echo $it['thumb'] ?>">
				</div>
			</div>
		</div>
		<div id="js-photo-show" class="js-img-list-f">
		</div>

		<div class="clear"></div>
        <?php endif; ?>

        <?php if (in_array($cid,$need_photo1)): ?>
            <!-- 图片上传 -->
            <div class="control-group">
                <label for="img" class="control-label"><?php echo $photo1_name ?> </label>
                <div class="controls">
                    <div class="btn-group">
					<span class="btn btn-success">
						<i class="fa fa-upload"></i>
						<span> <?php echo lang('upload_file') ?> </span>[<?php echo $photo1_px[$cid] ?>]
						<input class="fileupload" type="file" data-smallsize="100x80" data-size="<?php echo $photo1_px[$cid] ?>" accept="" data-for="photo1">
					</span>
                        <input type="hidden" name="photo1" class="form-upload" data-more="0" value="<?php echo $it['photo1'] ?>">
                    </div>
                </div>
            </div>
            <div id="js-photo1-show" class="js-img-list-f">
            </div>

            <div class="clear"></div>
        <?php endif; ?>

        <?php if (in_array($cid,$need_icon1)): ?>
            <!-- 图片上传 -->
            <div class="control-group">
                <label for="img" class="control-label"><?php echo $icon1_name ?> </label>
                <div class="controls">
                    <div class="btn-group">
					<span class="btn btn-success">
						<i class="fa fa-upload"></i>
						<span> <?php echo lang('upload_file') ?> </span>[<?php echo $icon1_px[$cid] ?>]
						<input class="fileupload" type="file" data-smallsize="20x20" data-size="<?php echo $icon1_px[$cid] ?>" accept="" data-for="icon1">
					</span>
                        <input type="hidden" name="icon1" class="form-upload" data-more="0" value="<?php echo $it['icon1'] ?>">
                    </div>
                </div>
            </div>
            <div id="js-icon1-show" class="js-img-list-f">
            </div>

            <div class="clear"></div>
        <?php endif; ?>

        <?php if (in_array($cid,$need_icon2)): ?>
            <!-- 图片上传 -->
            <div class="control-group">
                <label for="img" class="control-label"><?php echo $icon2_name ?> </label>
                <div class="controls">
                    <div class="btn-group">
					<span class="btn btn-success">
						<i class="fa fa-upload"></i>
						<span> <?php echo lang('upload_file') ?> </span>[<?php echo $icon2_px[$cid] ?>]
						<input class="fileupload" type="file" data-smallsize="20x20" data-size="<?php echo $icon2_px[$cid] ?>" accept="" data-for="icon2">
					</span>
                        <input type="hidden" name="icon2" class="form-upload" data-more="0" value="<?php echo $it['icon2'] ?>">
                    </div>
                </div>
            </div>
            <div id="js-icon2-show" class="js-img-list-f">
            </div>

            <div class="clear"></div>
        <?php endif; ?>

        <?php if (in_array($cid,$need_icon3)): ?>
            <!-- 图片上传 -->
            <div class="control-group">
                <label for="img" class="control-label"><?php echo $icon3_name ?> </label>
                <div class="controls">
                    <div class="btn-group">
					<span class="btn btn-success">
						<i class="fa fa-upload"></i>
						<span> <?php echo lang('upload_file') ?> </span>[<?php echo $icon3_px[$cid] ?>]
						<input class="fileupload" type="file" data-smallsize="20x20" data-size="<?php echo $icon3_px[$cid] ?>" accept="" data-for="icon3">
					</span>
                        <input type="hidden" name="icon3" class="form-upload" data-more="0" value="<?php echo $it['icon3'] ?>">
                    </div>
                </div>
            </div>
            <div id="js-icon3-show" class="js-img-list-f">
            </div>

            <div class="clear"></div>
        <?php endif; ?>

	</div>

	<div class="boxed-footer">
		<input type="hidden" name="cid" value="<?php echo $this->cid ?>">
		<input type="hidden" name="id" value="<?php echo $it['id']?>">
		<input type="submit" value="<?php echo lang('submit') ?>" class="btn btn-primary">
		<input type="reset" value="<?php echo lang('reset') ?>" class="btn btn-danger">
	</div>
</form>
</div>

<?php include_once 'inc_ui_media.php'; ?>

<script type="text/javascript">
	require(['jquery','adminer/js/ui','adminer/js/media'],function($,ui,media){
        <?php if (!in_array($cid,$no_content)): ?>
	    ui.editor_create('content');
        <?php endif; ?>

		var page_photos = <?php echo json_encode(one_upload($it['photo'])) ?>;
		var page_photo1 = <?php echo json_encode(one_upload($it['photo1'])) ?>;
		var page_icon1 = <?php echo json_encode(one_upload($it['icon1'])) ?>;
		var page_icon2 = <?php echo json_encode(one_upload($it['icon2'])) ?>;
		var page_icon3 = <?php echo json_encode(one_upload($it['icon3'])) ?>;

		media.init();
		media.show(page_photos,'photo');
		media.show(page_photo1,'photo1');
		media.show(page_icon1,'icon1');
		media.show(page_icon2,'icon2');
		media.show(page_icon3,'icon3');

//		media.sort('photo');
//		$("#js-photo-show" ).sortable().disableSelection();
		
	});
</script>

