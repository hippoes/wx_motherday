<!DOCTYPE html>
<html>
<head>
<?php include_once VIEWS.'inc/head.php'; ?>
</head>
<body class="ovh">
    <?php include_once VIEWS.'inc/header.php'; ?>
    <div class="z-index">
		<?php include_once VIEWS.'inc/news_banner.php'; ?>
		<div class="w1400 classroom">
			<div class="now f-cb">
                <a href="<?php echo site_url('news'); ?> ">活动资讯</a>
                <b>妈妈课堂</b>
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

            <div class="classroom-pc">
                <?php 
                if(empty($vip_course) && empty($normal_course)):
                ?>
                <div><img src="<?php if(!empty($no_info['photo'])) echo UPLOAD_URL.tag_photo($no_info['photo']) ?>" alt="<?php echo get_pic_alt($no_info['photo']) ?>" /></div>
                <?php
                else:
                ?>
                <?php if(!empty($vip_course)): ?>
                <div class="table-box">
                    <table>
                        <tr>
                            <th>范围</th>
                            <th>活动主题</th>
                            <th>内容介绍</th>
                            <th>主讲人</th>
                            <th>时间</th>
                            <th>星期</th>
                            <th>地点</th>
                            <th>适用人群</th>
                            <th>人数限制</th>
                            <th>报名</th>
                        </tr>
                        <?php
                            foreach ($vip_course as $k=>$v):
                        ?>
                        <tr>
                            <?php if ($k==0): ?><td class="title"><span>会</span><span>员</span><span>课</span><span>程</span></td><?php endif; ?>
                            <td><p class="tit-info" data-id="<?php echo $v['id'] ?>"><?php if (!empty($v['title'])) echo $v['title'] ?></p></td>
                            <td><p class="intro"><?php if (!empty($v['outline'])) echo $v['outline'] ?></p></td>
                            <td><?php if (!empty($v['field1'])) echo $v['field1'] ?></td>
                            <td><?php if (!empty($v['field6'])) echo $v['field6'] ?></td>
                            <td><?php if (!empty($v['field2'])) echo $v['field2'] ?></td>
                            <td><?php if (!empty($v['field3'])) echo $v['field3'] ?></td>
                            <td><?php if (!empty($v['field4'])) echo $v['field4'] ?></td>
                            <td><?php if (!empty($v['field5'])) echo $v['field5'] ?></td>
                            <td><p class="apply-box statement1" data-id="<?php echo $v['id'] ?>">报名</p></td>
                        </tr>
                        <?php
                            endforeach;
                        ?>

                    </table>
                </div>
                <?php endif; ?>
                <?php if(!empty($normal_course)): ?>
                <div class="table-box">
                    <table>
                        <tr>
                            <th>范围</th>
                            <th>活动主题</th>
                            <th>内容介绍</th>
                            <th>主讲人</th>
                            <th>时间</th>
                            <th>星期</th>
                            <th>地点</th>
                            <th>适用人群</th>
                            <th>人数限制</th>
                            <th>报名</th>
                        </tr>
                        <?php
                            foreach ($normal_course as $k=>$v):
                        ?>
                        <tr>
                            <?php if ($k==0): ?><td class="title"><span>常</span><span>规</span><span>课</span><span>程</span></td><?php endif; ?>
                            <td><p class="tit-info" data-id="<?php echo $v['id'] ?>"><?php if (!empty($v['title'])) echo $v['title'] ?></p></td>
                            <td><p class="intro"><?php if (!empty($v['outline'])) echo $v['outline'] ?></p></td>
                            <td><?php if (!empty($v['field1'])) echo $v['field1'] ?></td>
                            <td><?php if (!empty($v['field6'])) echo $v['field6'] ?></td>
                            <td><?php if (!empty($v['field2'])) echo $v['field2'] ?></td>
                            <td><?php if (!empty($v['field3'])) echo $v['field3'] ?></td>
                            <td><?php if (!empty($v['field4'])) echo $v['field4'] ?></td>
                            <td><?php if (!empty($v['field5'])) echo $v['field5'] ?></td>
                            <td><p class="apply-box statement1" data-id="<?php echo $v['id'] ?>">报名</p></td>
                        </tr>
                        <?php
                            endforeach;
                        ?>
                    </table>
                </div>
                <?php endif; ?>
                <?php endif; ?>
            </div>

            <div class="classroom-mobile">
                <?php 
                if(empty($vip_course) && empty($normal_course)):
                ?>
                <div><img src="<?php if(!empty($no_info['photo'])) echo UPLOAD_URL.tag_photo($no_info['photo']) ?>" alt="<?php echo get_pic_alt($no_info['photo']) ?>" /></div>
                <?php
                else:
                ?>
                <?php if(!empty($vip_course)): ?>
                <h2>会员课程</h2>
                <ul>
                    <?php
                        foreach ($vip_course as $v):
                    ?>
                        <li>
                            <table>
                                <tr>
                                    <td>活动主题</td>
                                    <td><p class="tit-info" data-id="<?php echo $v['id'] ?>"><?php if (!empty($v['title'])) echo $v['title'] ?></p></td>
                                </tr>
                                <tr>
                                    <td>内容介绍</td>
                                    <td><?php if (!empty($v['outline'])) echo $v['outline'] ?></td>
                                </tr>
                                <tr>
                                    <td>主讲人</td>
                                    <td><?php if (!empty($v['field1'])) echo $v['field1'] ?></td>
                                </tr>
                                <tr>
                                    <td>时间</td>
                                    <td><?php if (!empty($v['field6'])) echo $v['field6'] ?></td>
                                </tr>
                                <tr>
                                    <td>星期</td>
                                    <td><?php if (!empty($v['field2'])) echo $v['field2'] ?></td>
                                </tr>
                                <tr>
                                    <td>地点</td>
                                    <td><?php if (!empty($v['field3'])) echo $v['field3'] ?></td>
                                </tr>
                                <tr>
                                    <td>适用人群</td>
                                    <td><?php if (!empty($v['field4'])) echo $v['field4'] ?></td>
                                </tr>
                                <tr>
                                    <td>人数限制</td>
                                    <td><?php if (!empty($v['field5'])) echo $v['field5'] ?></td>
                                </tr>
                                <tr>
                                    <td>报名</td>
                                    <td><p class="apply-box statement1" data-id="<?php echo $v['id'] ?>">报名</p></td>
                                </tr>
                            </table>
                        </li>
                    <?php
                        endforeach;
                    ?>
                </ul>
                <?php endif; ?>
                <?php if(!empty($normal_course)): ?>
                <h2>常规课程</h2>
                <ul>
                    <?php
                        foreach ($normal_course as $v):
                    ?>
                        <li>
                            <table>
                                <tr>
                                    <td>活动主题</td>
                                    <td><p class="tit-info" data-id="<?php echo $v['id'] ?>"><?php if (!empty($v['title'])) echo $v['title'] ?></p></td>
                                </tr>
                                <tr>
                                    <td>内容介绍</td>
                                    <td><?php if (!empty($v['outline'])) echo $v['outline'] ?></td>
                                </tr>
                                <tr>
                                    <td>主讲人</td>
                                    <td><?php if (!empty($v['field1'])) echo $v['field1'] ?></td>
                                </tr>
                                <tr>
                                    <td>时间</td>
                                    <td><?php if (!empty($v['field6'])) echo $v['field6'] ?></td>
                                </tr>
                                <tr>
                                    <td>星期</td>
                                    <td><?php if (!empty($v['field2'])) echo $v['field2'] ?></td>
                                </tr>
                                <tr>
                                    <td>地点</td>
                                    <td><?php if (!empty($v['field3'])) echo $v['field3'] ?></td>
                                </tr>
                                <tr>
                                    <td>适用人群</td>
                                    <td><?php if (!empty($v['field4'])) echo $v['field4'] ?></td>
                                </tr>
                                <tr>
                                    <td>人数限制</td>
                                    <td><?php if (!empty($v['field5'])) echo $v['field5'] ?></td>
                                </tr>
                                <tr>
                                    <td>报名</td>
                                    <td><p class="apply-box statement1" data-id="<?php echo $v['id'] ?>">报名</p></td>
                                </tr>
                            </table>
                        </li>
                    <?php
                        endforeach;
                    ?>
                </ul>
                <?php endif; ?>
                <?php endif; ?>
            </div>
		</div>
	</div>
	<?php include_once VIEWS.'inc/footer.php'; ?>
    <div class="classroom-info">
    </div>
    <div class="visit-box1">
        
    </div>
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

        $('.news-list .slides li').eq(3).addClass('cur')
        var mun = 3;
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
            minItems: getGridSize(),
            maxItems: getGridSize(),
            start:function(slider){
                flexslider = slider;
                $('.flex-direction-nav a').text('');
            }
        });

        var courAjax_Url = "<?php echo site_url_ajax('news/classroom_ajax'); ?>";
        var cour_Url = "<?php echo site_url_ajax('news/apply'); ?>";
        
        $(".tit-info").click(function(e){
            var id = $(this).data("id");
            $.ajax({ 
                url: courAjax_Url+"/"+id, 
                success: function(data){
                     $(".classroom-info").html(data);
                     $('.classroom-info').fadeIn()

                     $('.classroom-info .close').on('click',function(){
                        $('.classroom-info').fadeOut();
                        $('.classroom-info').html("");
                     })
                }
            });
        })

        $(".statement1").click(function(e){
            var id = $(this).data("id");
            $.ajax({ 
                url: cour_Url+"/"+id, 
                success: function(data){
                     $(".visit-box1").html(data);
                     $('.visit-box1').fadeIn()

                     $('.visit-box1 .close').on('click',function(){
                        $('.visit-box1').fadeOut();
                        $('.visit-box1').html("");
                     })
                }
            });
        })

        $('.table-box table').each(function(){
            var len = $(this).find('tr').length - 1;
            $(this).find('.title').attr('rowspan',len);
        })

	})
</script>
</body>
</html>