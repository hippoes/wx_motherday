<?php
$cid=$this->cid;
$need_flag=array();
$need_col=array(45);
$no_sort=array(3);

$no_add=array(3);
$no_thumb=array(28,34,49,53,57);

?>
<?php if (!in_array($cid,$no_add)): ?>
<div class="btn-group">
	<a href="<?php echo site_urlc('infos/create')?>" class='btn btn-primary'> <i class="fa fa-plus"></i> <?php echo $title; ?> </a>
</div>
<?php endif; ?>

<?php include_once 'inc_modules_path.php'; ?>
<?php include_once 'inc_ctype_index.php'; ?>

<div class="clearfix"><p></p></div>

<div class="boxed">
	<div class="boxed-inner seamless">

		<table class="table table-striped table-hover select-list">
			<thead>
				<tr>
					<th class="width-small"><input id='selectbox-all' type="checkbox" > </th>
					<?php if (!in_array($cid,$no_thumb)): ?><th>图</th><?php endif; ?>
					<?php if (!in_array($cid,$no_sort)): ?><th>排序</th><?php endif; ?>
					<th>标题</th>
                    <?php if (in_array($cid,$need_col)): ?><th>加载信息</th><?php endif; ?>
					<th>时间</th>
					<th class="span1">操作</th>
				</tr>
			</thead>
			<tbody class="sort-list">
				<?php foreach ($list as $v):?>
					<tr data-id="<?php echo $v['id'] ?>" data-sort="<?php echo $v['sort_id'] ?>">
						<td><input class="select-it" type="checkbox" value="<?php echo $v['id']; ?>" ></td>
                        <?php if (!in_array($cid,$no_thumb)): ?>
						<td>
							<?php if ($v['thumb']): ?>
								<a class="fancybox-img" href="<?php echo UPLOAD_URL. str_replace('thumbnail/', '', $v['thumb']); ?>" title="<?php echo $v['title'] ?>">
									<img src="<?php echo UPLOAD_URL.$v['thumb'] ?>" alt="<?php echo $v['title'];?>">
								</a>
							<?php endif ?>
						</td>
                        <?php endif; ?>
                        <?php if (!in_array($cid,$no_sort)): ?><td> <a title='越大越前'><input type="text" class="sortid" value="<?php echo $v['sort_id']?>" data-id="<?php echo $v['id'] ?>"></a></td><?php endif; ?>
						<td> <?php echo $v['title'] ?></td>
                        <?php if (in_array($cid,$need_col)): ?>
                            <td>
                                <a href="<?php echo site_url('product/index?c='.$cid.'&cc='.$v['id']) ?>"> 加载信息 </a>
                            </td>
                        <?php endif; ?>
						<td> <?php echo date("Y/m/d H:i:s",$v['timeline']); ?> </td>
						<td>
							<div class="btn-group">
								<?php if (in_array($cid,$need_flag)): ?><?php include 'inc_ui_flag.php'; ?><?php endif; ?>
								<?php if(ENVIRONMENT=="development"){ ?>
								<a class='btn  btn-small btn-ajax-copy' data-id="<?php echo $v['id'] ?>" href="#"  title="复制"> 复制</a>
								<?php } ?>
								<?php include 'inc_ui_audit.php'; ?>
								<a class='btn btn-small' href=" <?php echo site_urlc( $this->router->class.'/edit/'.$v['id']) ?> " title="<?php echo lang('edit') ?>"> <i class="fa fa-pencil"></i> <?php // echo lang('edit') ?></a>
                                <?php if (!in_array($cid,$no_add)): ?><a class='btn btn-danger btn-small btn-del' data-id="<?php echo $v['id'] ?>" href="#"  title="<?php echo lang('del') ?>"> <i class="fa fa-times"></i> <?php // echo lang('del') ?></a><?php endif; ?>
							</div>
						</td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>

	</div>
</div>

<?php if (!in_array($cid,$no_add)): ?>
<div class="btn-group">
	<a id='select-all' class='btn' href="#"> <i class=""></i> <?php echo lang('select_all') ?> </a>
	<a id='unselect-all' class='btn hide' href="#"> <i class=""></i> <?php echo lang('unselect') ?> </a>
	<a id="btn-del" class='btn btn-danger' href="#"> <i class="fa fa-times"></i> <?php echo lang('del') ?> </a>
	<a id="btn-audit" class='btn' href="#" data-audit='1'><?php echo lang('audit') ?></a>
	<a id="btn-audit" class='btn' href="#"  data-audit='0'>取消审核</a>
</div>
<?php endif; ?>

<?php echo $pages; ?>

<script>
    require(['adminer/js/ui'],function(ui){
        var infos = {
            url_del: "<?php echo site_urlc('infos/delete'); ?>"
            ,url_audit: "<?php echo site_urlc('infos/audit'); ?>"
            ,url_flag: "<?php echo site_urlc('infos/flag'); ?>"
            ,url_sortid: "<?php echo site_urlc('infos/sortid'); ?>"
            ,url_sort_change: "<?php echo site_urlc('infos/sort_change'); ?>"
            ,url_copy: "<?php echo site_urlc('infos/copypro'); ?>"
        };
        ui.fancybox_img();
        ui.btn_delete(infos.url_del);		// 删除
        ui.btn_audit(infos.url_audit);	// 审核
        ui.btn_flag(infos.url_flag);		// 推荐
        <?php if (!in_array($cid,$no_sort)): ?>
        ui.sortable(infos.url_sortid);	// 排序  拖动排序和序号排序在firefox中有bug
        ui.sort_change(infos.url_sort_change); // input 排序
        <?php endif; ?>
        ui.btn_copy(infos.url_copy);    // 复制
    });
</script>
