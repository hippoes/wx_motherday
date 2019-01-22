<?php
if (!empty($list)):
    foreach ($list as $v):
?>
        <li>
            <p class="pic">
                <img src="<?php if (!empty($v['photo'])) echo UPLOAD_URL.tag_photo($v['photo']) ?>" alt="<?php echo get_pic_alt($v['photo']) ?>">
                <span class="bg"></span>
            </p>
            <span class="con">
                <h2><?php if (!empty($v['title'])) echo $v['title'] ?></h2>
                <i></i>
                <p class="font"><?php if (!empty($v['content'])) echo $v['content'] ?></p>
            </span>
        </li>
<?php
    endforeach;
endif;
?>