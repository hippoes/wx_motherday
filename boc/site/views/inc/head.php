<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="content-language" content="zh-CN" />
<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta name="format-detection" content="telephone=no" />
<meta name="keywords" content="<?php if (!empty($header['tags'])) echo $header['tags'] ?>" />
<meta name="description" content="<?php if (!empty($header['intro'])) echo $header['intro'] ?>" />
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
<title><?php if (!empty($header['title'])) echo $header['title'] ?></title>
<link href="<?php echo GLOBAL_URL ?>favicon.ico" rel="shortcut icon">
<script>
	var STATIC_URL = "<?php echo STATIC_URL ?>";
	var GLOBAL_URL = "<?php echo GLOBAL_URL ?>";
	var UPLOAD_URL = "<?php echo UPLOAD_URL ?>";
	var SITE_URL   = "<?php echo site_url() ?>";
</script>
<?php
	echo static_file('web/css/reset.css');
    echo static_file('layui/css/layui.css');
    echo static_file('layui/css/layui.mobile.css');
    echo static_file('web/css/my_style.css');
    echo static_file('web/css/my_mobile.css');


	echo static_file('jquery-1.11.3.js');
	echo static_file('jquery.easing.1.3.js');
	echo static_file('jquery.transit.js');
    echo static_file('layui/layui.js');
    echo static_file('layui/layui.all.js');

?>