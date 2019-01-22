<div class="bg"></div>
<div class="con">
	<span class="close"></span>
	<h2><?php if (!empty($info['title'])) echo $info['title'] ?></h2>
	<div class="font">
		<p><span class="tit">职称：</span><?php if (!empty($info['outline'])) echo $info['outline'] ?></p>
		<h3>从业经历：</h3>
		<?php if (!empty($info['content'])) echo $info['content'] ?>
	</div>
</div>