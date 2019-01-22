<!DOCTYPE html>
<html>
<head>
<?php include_once VIEWS.'inc/head.php'; ?>
</head>
<body class="ovh">
    <?php include_once VIEWS.'inc/header.php'; ?>
    <div class="z-index">
		<?php include_once VIEWS.'inc/news_banner.php'; ?>
		<div class="w1400 news-box">
			<div class="now f-cb">
                <a href="<?php echo site_url('news'); ?> ">活动资讯</a>
                <b><?php if(!empty($type_name)) echo $type_name ?></b>
            </div>
            <div class="news-list">
                <ul class="slides">
                    <?php
                    if (!empty($news_type)):
                        foreach ($news_type as $k => $v):
                            if($k>=1){
                                $class="ico0".($k+1+1);
                            }else{
                                $class="ico0".($k+1);
                            }
                            
                    ?>
                    <li>
                        <a href="<?php echo site_url('news/index/'.$v['id']); ?> ">
                            <span class="<?php echo $class ?>"><?php if (!empty($v['title'])) echo $v['title'] ?></span>
                        </a>
                    </li>
                    <?php
                        endforeach;
                    endif;
                    ?>
                    <li>
                        <a href="<?php echo site_url('news/classroom'); ?> ">
                            <span class="ico02">妈妈课程</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="news-box-list">
                <?php
                if (empty($list)):
                    echo "<div align='center'>暂无信息！</div>";
                else:
                ?>
                <ul class="f-cb">
                    <?php foreach ($list as $v): ?>
                        <li>
                            <a href="<?php echo site_url('news/info/'.$v['id']); ?> ">
                                <h2 class="fl"><?php if (!empty($v['title'])) echo $v['title'] ?></h2>
                                <span class="fr"><?php echo date("Y-m-d",$v['timeline']) ?></span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <?php
                endif;
                ?>
            </div>
            <?php if(!empty($pages)): ?>
    		<div class="page on">
                <?php echo $pages ?>
    		</div>
            <?php endif; ?>
		</div>
	</div>
	<?php include_once VIEWS.'inc/footer.php'; ?>
<?php
	echo static_file('web/js/main.js');
	echo static_file('swiper/swiper.min.js');
    echo static_file('swiper/swiper.css');
    echo static_file('flexslider/flexslider.js');
    echo static_file('flexslider/flexslider.css');
?>
<script>
	$(function(){
		var $window = $(window),
        flexslider = { vars:{} };

        $('.news-list .slides li').eq(<?php echo $cur_pos ?>).addClass('cur')
        var mun = <?php echo $cur_pos ?>;
        console.log(mun);
        if ($(window).width() < 480) {
            var stat = mun;
        }else if ($(window).width() <1025) {
            if (mun > 1) {
                var stat = 2 ;    
            }else{
                 var stat = 0;
            }
        }else{
             var stat = 0;
        }




        function getGridSize() {
            return  (window.innerWidth < 580) ? 1 :
                    (window.innerWidth < 1025) ? 2 : 4;
        }

        $(window).resize(function(){
            var gridSize = getGridSize();
            flexslider.vars.minItems = gridSize;
            flexslider.vars.maxItems = gridSize;
        })

        $('.news-list').flexslider({
            animation: "slide",
            slideshow: false,
            animationLoop: false,
            itemWidth: 318,
            itemMargin: 0,
            startAt:stat,
            minItems: getGridSize(),
            maxItems: getGridSize(),
            start:function(slider){
                flexslider = slider;
                $('.flex-direction-nav a').text('');
            }
        });

        


	})
</script>
</body>
</html>