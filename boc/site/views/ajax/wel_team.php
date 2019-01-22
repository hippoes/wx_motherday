<?php if ($id==0): ?>
    <p class="pic">
        <img src="<?php if (!empty($info['photo1'])) echo UPLOAD_URL.tag_photo($info['photo1']) ?>" alt="<?php echo get_pic_alt($info['photo1']) ?>">
    </p>
    <div class="con">
        <h2>
            <i>
                <img src="<?php if (!empty($info['icon1'])) echo UPLOAD_URL.tag_photo($info['icon1']) ?>" alt="<?php echo get_pic_alt($info['icon1']) ?>">
            </i>
            专家医生
        </h2>
        <div class="font"><?php if (!empty($info['content'])) echo $info['content'] ?></div>
        <a class="more" href="<?php echo site_url('team'); ?>">Read More</a>
        <!-- 0 护理团队 1 美妍管理 2 营养餐饮 3 健康顾问 4 专属管家 5 房务团队 6 安保后勤-->
    </div>
<?php else: ?>
    <p class="pic">
        <img src="<?php if (!empty($info['photo1'])) echo UPLOAD_URL.tag_photo($info['photo1']) ?>" alt="<?php echo get_pic_alt($info['photo1']) ?>">
    </p>
    <div class="con">
        <h2>
            <i>
                <img src="<?php if (!empty($info['icon'])) echo UPLOAD_URL.tag_photo($info['icon']) ?>" alt="<?php echo get_pic_alt($info['icon']) ?>">
            </i>
            <?php if (!empty($info['title'])) echo $info['title'] ?>
        </h2>
        <div class="font"><?php if (!empty($info['content'])) echo $info['content'] ?></div>
        <a class="more" href="<?php echo site_url('team')."?".$cur_pos; ?>">Read More</a>
        <!-- 0 护理团队 1 美妍管理 2 营养餐饮 3 健康顾问 4 专属管家 5 房务团队 6 安保后勤-->
    </div>
<?php endif;?>
