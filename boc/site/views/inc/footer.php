<?php
$footerinfo =get_footer();
//my_dump($footerinfo);
?>
<footer>
	<div class="w92">
		<div class="footer-info">
            <p><?php echo $footerinfo[0]['field1']?></p>
            <p>地址：<?php echo $footerinfo[1]['field1']?></p>
            <p>电话：<?php echo $footerinfo[2]['field1']?></p>
        </div>
	</div>
</footer>
<script>


</script>