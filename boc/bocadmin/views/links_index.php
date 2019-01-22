<?php
$cid=$this->cid;
$no_add=array(17);
$no_sort=array(17);
$no_thumb=array(67);

?>
<?php if (!in_array($cid,$no_add)): ?>
<div class="btn-group">
	<a href="<?php echo site_urlc('links/create'); ?>" class='btn btn-primary' >  <i class="fa fa-plus"></i> <?php echo $title ?> </a>
</div>
<?php endif; ?>

<?php include_once 'inc_modules_path.php'; ?>

<div class="boxed">
	<div class="boxed-inner seamless">
		<table class="table table-striped table-hover select-list">
			<thead>
				<tr>
					<?php if(!in_array($cid, $no_thumb)): ?><th class="width-small"><input id='selectbox-all' type="checkbox" > </th><?php endif; ?>
					<th> 图 </th>
                    <?php if (!in_array($cid,$no_sort)): ?><th> 排序 </th><?php endif; ?>
                    <th> 标题 </th>
					<th> <?php if($cid==67) echo "域名"; else echo "链接"; ?> </th>
					<th class="span1"> <?php echo lang('action') ?> </th>
				</tr>
			</thead>
			<tbody  class="sort-list">
				<?php foreach ($list as $v):?>
				<tr  data-id="<?php echo $v['id'] ?>" data-sort="<?php echo $v['sort_id'] ?>">
					<td><input class="select-it" type="checkbox" value="<?php echo $v['id']; ?>" ></td>
					<?php if(!in_array($cid, $no_thumb)): ?>
					<td>
						<?php if ($v['thumb']): ?>
						<a class="fancybox-img" href="<?php echo UPLOAD_URL. str_replace('thumbnail/', '', $v['thumb']); ?>" title="<?php echo $v['title'] ?>">
							<img src="<?php echo UPLOAD_URL.$v['thumb'] ?>" alt="<?php echo $v['title'];?>">
						</a>
						<?php endif; ?>
					</td>
					<?php endif; ?>
                    <?php if (!in_array($cid,$no_sort)): ?><td> <a title='越大越前'><input type="text" class="sortid" value="<?php echo $v['sort_id']?>" data-id="<?php echo $v['id'] ?>"></a> </td><?php endif; ?>
					<td> <?php echo strcut($v['title'],22) ?></td>
					<td> <?php echo strcut($v['link'],36) ?></td>
					<td>
						<div class="btn-group">
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
</div>
<?php endif; ?>

<?php echo $pages; ?>

<script>
require(['adminer/js/ui'],function(ui){
	var links = {
		url_del:"<?php echo site_urlc('links/delete'); ?>"
		,url_show: "<?php echo site_urlc('links/show_ajax'); ?>"
		,url_audit: "<?php echo site_urlc('links/audit'); ?>"
		,url_sort: "<?php echo site_urlc('links/sortid'); ?>"
		,url_sort_change: "<?php echo site_urlc('links/sort_change'); ?>"
	};

	ui.fancybox_img();
	ui.btn_delete(links.url_del);	// 删除
	ui.btn_show(links.url_show); 	// 显隐
	ui.btn_audit(links.url_audit);	// 审核
    <?php if (!in_array($cid,$no_sort)): ?>
	ui.sortable(links.url_sort);	// 排序
	ui.sort_change(links.url_sort_change); // input 排序
    <?php endif; ?>
});
</script>
