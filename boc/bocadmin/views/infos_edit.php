<?php
$cid=$this->cid;
$need_photo=array(24,26,39,44,45,47,52);
$need_photo1=array(45);
$need_content=array(24,26,28,34,44,45,47,49,52,57);
$need_outline=array(26,31,39,44,47,49,53,57);
$need_icon=array(31);
$need_icon_no_thumb=array(39,45);
$need_field1=array(3,9);
$need_field2=array();
$need_field3=array();
$need_field4=array();
$need_field5=array(49,57);
$need_field6=array(49,57);
$need_icon1=array();
$need_icon2=array();
$need_pics=array(24);
$need_title1=array(49,57);

$photo_px=array(
    24 => '459x378',
    26 => '426x233',
    39 => '438x276',
    44 => '282x234',
    45 => '470x281',
    47 => '490x600',
    52 => '350x350'
);

$photo1_px=array(
    45 => '469x346'
);

$icon_px=array(
    31 => '52x52',
    39 => '60x35',
    45 => '21x21'
);

$icon1_px=array(
    45 => '30x30'
);

$icon2_px=array(
    45 => '30x30'
);

$pics_px=array(
    24 => '459x378'
);

$outline_name='简介';
$outline_placeholder='';
$field1_name='字段1';
$field2_name='字段2';
$field3_name='字段3';
$field4_name='字段4';
$field5_name='字段5';
$field6_name='字段6';
$photo1_name='图片1';
$icon_name='图标';
$icon1_name='图标1';
$icon2_name='图标2';
$pics_name='图集';
$title1_name='标题1';
if ($cid==26 || $cid==31){
    $outline_name='文本(列表)';
    $outline_placeholder='若要以列表形式展现，请用“##”隔离字符，如：##你好##大家好';
}elseif($cid==44){
    $outline_name='职称';
}elseif($cid==45){
    $photo1_name='首页图片';
    $field1_name='加载信息标题';
    $icon_name='图标';
    $icon1_name='首页图标1';
    $icon2_name='首页图标2';
}elseif($cid==24){
    $field1_name='副标题';
}elseif($cid==47){
    $field1_name='副标题';
    $outline_name='文本(列表)';
    $outline_placeholder='若要以列表形式展现，请用“##”隔离字符，如：##你好##大家好';
}elseif($cid==49){
    $outline_name='内容介绍';
    $field1_name='主讲人';
    $field2_name='星期';
    $field3_name='地点';
    $field4_name='适用人群';
    $field5_name='人数限制';
    $field6_name='课程时间';
    $title1_name='加载标题';
}elseif($cid==57){
    $outline_name='内容介绍';
    $field1_name='主讲人';
    $field2_name='星期';
    $field3_name='地点';
    $field4_name='适用人群';
    $field5_name='人数限制';
    $field6_name='课程时间';
    $title1_name='加载标题';
}elseif($cid==53){
    $outline_name='文本(列表)';
    $outline_placeholder='若要以列表形式展现，请用“##”隔离字符，如：##你好##大家好';
}elseif ($cid==3) {
    $field1_name="内容";
}elseif ($cid==9) {
    $field1_name="卡券id";
}

?>
<div class="btn-group"><a href="<?php echo site_urlc('infos/index');?>" class="btn"> <i class="fa fa-arrow-left"></i> <?php echo lang('back_list')?> </a></div>

<?php include_once 'inc_form_errors.php'; ?>

<div class="boxed">
	<h3> <i class="fa fa-pencil"></i> 编辑消息 <span class="badge badge-success pull-right"><?php echo $title; ?></span></h3>
	<?php echo form_open(current_urlc(), array('class' => 'form-horizontal', 'id' => 'frm-edit')); ?>

	<div class="boxed-inner seamless">
        <?php if ($cid!=47): ?>
		<div class="control-group">
			<label for="title" class="control-label">标题 </label>
			<div class="controls">
				<input type="text" class='span7' name="title" id="title" value="<?php echo set_value('title',$it['title']); ?>">
<!--				<a href="#seo-modal" role="button" class="btn btn-info" data-toggle="modal">SEO</a>-->
				<span class="help-inline"></span>
			</div>
		</div>
        <?php endif; ?>

        <?php if ($cid==47): ?>
            <div class="control-group">
                <label class="control-label" for="title"> <?php echo lang('title') ?> </label>
                <div class="controls">
                    <input type="text" class='span4' id="title" name="title" value="<?php echo set_value("title",$it['title']) ?>">
                    (<input type="text" class='span3' id="title1" name="title1" value="<?php echo set_value("title1",$it['title1']) ?>">)
                </div>
            </div>
        <?php endif; ?>

        <?php if (in_array($cid,$need_title1)): ?>
            <div class="control-group">
                <label class="control-label" for="title"> <?php echo $title1_name ?> </label>
                <div class="controls">
                    <input type="text" class='span7' id="title1" name="title1" value="<?php echo set_value("title1",$it['title1']) ?>">
                </div>
            </div>
        <?php endif; ?>

        <?php if (in_array($cid,$need_field1)): ?>
            <div class="control-group">
                <label class="control-label" for="field1"> <?php echo $field1_name ?> </label>
                <div class="controls">
                    <input type="text" <?php if($cid==52) echo "placeholder='类似 http://... 或 https://...'" ?> class='span7' id="field1" name="field1" value="<?php echo set_value("field1",$it['field1']) ?>">
                </div>
            </div>
        <?php endif; ?>

        <?php if (in_array($cid,$need_field2)): ?>
            <div class="control-group">
                <label class="control-label" for="field2"> <?php echo $field2_name ?> </label>
                <div class="controls">
                    <input type="text" class='span7' id="field2" name="field2" value="<?php echo set_value("field2",$it['field2']) ?>">
                </div>
            </div>
        <?php endif; ?>

        <?php if (in_array($cid,$need_field3)): ?>
            <div class="control-group">
                <label class="control-label" for="field3"> <?php echo $field3_name ?> </label>
                <div class="controls">
                    <input type="text" class='span7' id="field3" name="field3" value="<?php echo set_value("field3",$it['field3']) ?>">
                </div>
            </div>
        <?php endif; ?>

        <?php if (in_array($cid,$need_field4)): ?>
            <div class="control-group">
                <label class="control-label" for="field4"> <?php echo $field4_name ?> </label>
                <div class="controls">
                    <input type="text" class='span7' id="field4" name="field4" value="<?php echo set_value("field4",$it['field4']) ?>">
                </div>
            </div>
        <?php endif; ?>

        <?php if (in_array($cid,$need_field5)): ?>
            <div class="control-group">
                <label class="control-label" for="field5"> <?php echo $field5_name ?> </label>
                <div class="controls">
                    <input type="text" class='span7' id="field5" name="field5" value="<?php echo set_value("field5",$it['field5']) ?>">
                </div>
            </div>
        <?php endif; ?>

        <?php if (in_array($cid,$need_field6)): ?>
            <div class="control-group">
                <label class="control-label" for="field6"> <?php echo $field6_name ?> </label>
                <div class="controls">
                    <input type="text" class='span7' id="field6" name="field6" value="<?php echo set_value("field6",$it['field6']) ?>">
                </div>
            </div>
        <?php endif; ?>

        <?php if (in_array($cid,$need_outline)): ?>
            <div class="control-group">
                <label for="outline"  class="control-label"><?php echo $outline_name ?></label>
                <div class="controls">
                    <textarea placeholder="<?php echo $outline_placeholder ?>" name="outline" rows='8' class='span6'><?php echo set_value('outline',$it['outline']) ?></textarea>
                    <span class="help-inline"></span>
                </div>
            </div>
        <?php endif; ?>

		<!-- 弹出 -->
		<div id="seo-modal" class="modal hide fade">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h3> <i class="fa fa-info-circle"></i> SEO优化</h3>
			</div>
			<div class="modal-body seamless">

				<div class="control-group">
					<label for="title_seo" class="control-label"><?php echo lang('title_seo') ?></label>
					<div class="controls">
						<input type="text" id="title_seo" name="title_seo" value="<?php echo set_value('title_seo',$it['title_seo']) ?>" x-webkit-speech>
						<span class="help-inline"></span>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="tag"><?php echo lang('tag') ?></label>
					<div class="controls">
						<input type="text" id="tags" name="tags" value="<?php echo set_value('tags',$it['tags']) ?>" placeholder="tag1,tag2">
						<span class="help-inline">使用英文标点`,`隔开</span>
					</div>
				</div>

				<div class="control-group">
					<label for="intro"  class="control-label"><?php echo lang('intro') ?></label>
					<div class="controls">
						<textarea name="intro" rows='8' class='span4'><?php echo set_value('intro',$it['intro']) ?></textarea>
						<span class="help-inline"></span>
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<a href="#"  data-dismiss="modal" aria-hidden="true" class="btn">Close</a>
			</div>
		</div>

		<div class="control-group">
			<label for="timeline" class="control-label">时间 </label>
			<div class="controls">
				<div class="input-append date timepicker">
					<input type="text" value="<?php echo date("Y/m/d H:i:s",set_value('timeline',$it['timeline'])); ?>" id="timeline" name="timeline">
					<span class="add-on"><i class="icon-th"></i></span>
				</div>
			</div>
		</div>

		<!-- ctype -->
		<?php if ($ctype = list_coltypes($this->cid)) { ?>
		<div class="control-group">
			<label class="control-label" for="status"> 所属分类 </label>
			<div class="controls">
				<?php
				echo ui_btn_select('ctype',set_value("ctype",$it['ctype']),$ctype);
				?>
				<span class="help-inline"></span>
			</div>
		</div>
		<?php } ?>

        <?php if (in_array($cid,$need_content)): ?>
		<div class="control-group uefull">
			<textarea id="content" name="content"> <?php echo set_value('content',$it['content']); ?></textarea>
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
						<input class="fileupload" data-smallsize="100x80" data-size="<?php echo $photo_px[$cid] ?>" type="file" accept="">
					</span>
					<input type="hidden" name="photo" class="form-upload" data-more="0" value="<?php echo set_value('photo',$it['photo']) ?>">
					<input type="hidden" name="thumb" class="form-upload-thumb" value="<?php echo set_value('thumb',$it['thumb']) ?>">
				</div>
			</div>
		</div>
		<div id="js-photo-show" class="js-img-list-f">
		</div>
		<div class="clear"></div>
		<!-- 图片上传 -->
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
						<input class="fileupload" data-smallsize="100x80" data-size="<?php echo $photo1_px[$cid] ?>" type="file" accept="">
					</span>
                        <input type="hidden" name="photo1" class="form-upload" data-more="0" value="<?php echo set_value("photo1",$it['photo1']) ?>">
                    </div>
                </div>
            </div>
            <div id="js-photo1-show" class="js-img-list-f">
            </div>
            <div class="clear"></div>
            <!-- 图片上传 -->
        <?php endif; ?>


        <?php if (in_array($cid,$need_icon_no_thumb)): ?>
            <!-- 图片上传 -->
            <div class="control-group">
                <label for="img" class="control-label">图标 </label>
                <div class="controls">
                    <div class="btn-group">
					<span class="btn btn-success">
						<i class="fa fa-upload"></i>
						<span> <?php echo lang('upload_file') ?> </span>[<?php echo $icon_px[$cid] ?>]
						<input class="fileupload" data-smallsize="20x20" data-size="<?php echo $icon_px[$cid] ?>" type="file" accept="">
					</span>
                        <input type="hidden" name="icon" class="form-upload" data-more="0" value="<?php echo set_value("icon",$it['icon']) ?>">
                    </div>
                </div>
            </div>
            <div id="js-icon-show" class="js-img-list-f">
            </div>
            <div class="clear"></div>
            <!-- 图片上传 -->
        <?php endif; ?>

        <?php if (in_array($cid,$need_icon)): ?>
            <!-- 图片上传 -->
            <div class="control-group">
                <label for="img" class="control-label">图标 </label>
                <div class="controls">
                    <div class="btn-group">
					<span class="btn btn-success">
						<i class="fa fa-upload"></i>
						<span> <?php echo lang('upload_file') ?> </span>[<?php echo $icon_px[$cid] ?>]
						<input class="fileupload" data-smallsize="100x80" data-size="<?php echo $icon_px[$cid] ?>" type="file" accept="">
					</span>
                        <input type="hidden" name="icon" class="form-upload" data-more="0" value="<?php echo set_value('icon',$it['icon']) ?>">
                        <input type="hidden" name="thumb" class="form-upload-thumb" value="<?php echo set_value('thumb',$it['thumb']) ?>">
                    </div>
                </div>
            </div>
            <div id="js-icon-show" class="js-img-list-f">
            </div>
            <div class="clear"></div>
            <!-- 图片上传 -->
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
						<input class="fileupload" data-smallsize="20x20" data-size="<?php echo $icon1_px[$cid] ?>" type="file" accept="">
					</span>
                        <input type="hidden" name="icon1" class="form-upload" data-more="0" value="<?php echo set_value("icon1",$it['icon1']) ?>">
                    </div>
                </div>
            </div>
            <div id="js-icon1-show" class="js-img-list-f">
            </div>
            <div class="clear"></div>
            <!-- 图片上传 -->
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
						<input class="fileupload" data-smallsize="20x20" data-size="<?php echo $icon2_px[$cid] ?>" type="file" accept="">
					</span>
                        <input type="hidden" name="icon2" class="form-upload" data-more="0" value="<?php echo set_value("icon2",$it['icon2']) ?>">
                    </div>
                </div>
            </div>
            <div id="js-icon2-show" class="js-img-list-f">
            </div>
            <div class="clear"></div>
            <!-- 图片上传 -->
        <?php endif; ?>

        <?php if (in_array($cid,$need_pics)): ?>
            <!-- 图片上传 -->
            <div class="control-group">
                <label for="img" class="control-label"><?php echo $pics_name ?> </label>
                <div class="controls">
                    <div class="btn-group">
					<span class="btn btn-success">
						<i class="fa fa-upload"></i>
						<span> <?php echo lang('upload_file') ?> </span>[<?php echo $pics_px[$cid] ?>]<?php if($cid==24) echo "前台取前3张"; ?>
						<input class="fileupload" data-smallsize="100x80" data-size="<?php echo $pics_px[$cid] ?>" type="file" multiple="multiple" accept="">
					</span>
                        <input type="hidden" name="pics" class="form-upload" data-more="1" value="<?php echo set_value("pics",$it['pics']) ?>">
                        <input type="hidden" name="thumb" class="form-upload-thumb" value="<?php echo set_value('thumb',$it['thumb']) ?>">
                    </div>
                </div>
            </div>
            <div id="js-pics-show" class="js-img-list-f">
            </div>
            <div class="clear"></div>
            <!-- 图片上传 -->
        <?php endif; ?>

	</div>
	<div class="boxed-footer">
		<?php if ($this->ccid): ?>
			<input type="hidden" name="ccid" value="<?php echo $this->ccid ?>">
		<?php endif ?>
		<input type="hidden" name="cid" value="<?php echo $this->cid ?>">
		<input type="hidden" name="id" value="<?php echo $it['id']?>">
		<input type="submit" value="<?php echo lang('submit') ?>" class="btn btn-primary">
		<input type="reset" value="<?php echo lang('reset') ?>" class="btn btn-danger">
	</div>
</form>
</div>

<!-- 注意加载顺序 -->
<?php include_once 'inc_ui_media.php'; ?>
<script type="text/javascript">
	require(['adminer/js/ui','adminer/js/media','bootstrap-datetimepicker.zh'],function(ui,media){

        // timepick
        $('.timepicker').datetimepicker({'language':'zh-CN','format':'yyyy/mm/dd hh:ii:ss','todayHighlight':true});


        <?php if (in_array($cid,$need_content)): ?>
		console.log(ui);
		ui.editor_create('content');
		<?php endif; ?>

		var articles_photos = <?php echo json_encode(one_upload($it['photo'])) ?>;
		var articles_photo1 = <?php echo json_encode(one_upload($it['photo1'])) ?>;
		var articles_icon = <?php echo json_encode(one_upload($it['icon'])) ?>;
		var articles_icon1 = <?php echo json_encode(one_upload($it['icon1'])) ?>;
		var articles_icon2 = <?php echo json_encode(one_upload($it['icon2'])) ?>;
		var articles_pics = <?php echo json_encode(list_upload($it['pics'])) ?>;
		media.init();
		media.show(articles_photos,"photo");
		media.show(articles_photo1,"photo1");
		media.show(articles_icon,"icon");
		media.show(articles_icon1,"icon1");
		media.show(articles_icon2,"icon2");
		media.show(articles_pics,"pics");
        media.sort('pics');
	});
</script>
