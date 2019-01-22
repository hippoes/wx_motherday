
<div class="btn-group"><a href="<?php echo site_url('feedback/index');?>" class="btn"> <i class="fa fa-arrow-left"></i> <?php echo lang('back_list')?> </a></div>

<?php include_once 'inc_form_errors.php'; ?>

<?php echo form_open(current_url(), array('class' => 'form-horizontal', 'id' => 'frm-edit')); ?>
<div class="boxed">
	<h3> <i class="fa fa-comments-o"></i> 参观表单<span class="badge badge-success pull-right"><?php echo $title; ?></span></h3>
	<div class="boxed-inner seamless">

		<div class="control-group">
			<label for="thename" class="control-label">用户名：</label>
			<div class="controls">
				<?php echo $it['username'] ?>
				<span class="help-inline"></span>
			</div>
		</div>

		<div class="control-group">
			<label for="thename" class="control-label">提交时间：</label>
			<div class="controls">
				<?php echo date("Y-m-d H:i:s",$it['timeline']) ?>
				<span class="help-inline"></span>
			</div>
		</div>

		<div class="control-group">
			<label for="telphone" class="control-label">手机：</label>
			<div class="controls">
				<?php echo $it['telphone'] ?>
				<span class="help-inline"></span>
			</div>
		</div>

		<div class="control-group">
			<label for="title" class="control-label">城市：</label>
			<div class="controls">
				<?php echo $it['city'] ?>
				<span class="help-inline"></span>
			</div>
		</div>

		<div class="control-group">
			<label for="thename" class="control-label">预产期：</label>
			<div class="controls">
				<?php echo date("Y-m-d",$it['date']) ?>
				<span class="help-inline"></span>
			</div>
		</div>

		<div class="control-group">
			<label for="fax" class="control-label">产检医院</label>
			<div class="controls">
				<?php echo $it['address'] ?>
				<span class="help-inline"></span>
			</div>
		</div>
	</div>
</div>
</form>
