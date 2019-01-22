<?php
if(!empty($list)):
    foreach($list as $v):
?>
<li>
    <a href="<?php echo site_url('wechat/info/'.$v['id']); ?> ">
        <p class="pic">
            <img src="<?php if(!empty($v['photo'])) echo UPLOAD_URL.tag_photo($v['photo']) ?>" alt="<?php echo get_pic_alt($v['photo']) ?>">
        </p>
        <span class="con">
            <h2><?php if(!empty($v['title'])) echo $v['title'] ?></h2>
            <p class="font">
                <?php if(!empty($v['content'])) echo strcut(strip_tags($v['content']),30) ?>
            </p>
        </span>
    </a>
</li>
<?php
    endforeach;
endif;
?>