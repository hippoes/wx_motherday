<?php
$banner = get_banner();
//my_dump($banner);
?>
<header class="f-cb header">
    <div class="inline-banner" style="background:url(<?php if (!empty($banner['photo'])) echo UPLOAD_URL.tag_photo($banner['photo']) ?>) no-repeat center;background-size: 100%;">

    </div>

</header>
