<!DOCTYPE html>
<html>
<head>
<?php include_once VIEWS.'inc/head.php'; ?>
</head>
<body class="ovh">
    <?php include_once VIEWS.'inc/header.php'; ?>
    <div class="z-index">
    	<div class="inline-banner" style="background:url(<?php if (!empty($banner['photo'])) echo UPLOAD_URL.tag_photo($banner['photo']) ?>) no-repeat center;"></div>
    	<div class="team">
    		<div class="w1400">
    			<div class="now f-cb">
	                <a href="<?php echo site_url('delicate_service'); ?> ">Hibaby服务</a>
	                <b>专业团队</b>
	            </div>
	            <div class="f-cb team-top ab">
	            	<div class="intro f-cb">
	            		<p class="pic">
	            			<img src="<?php if (!empty($expert_info['photo'])) echo UPLOAD_URL.tag_photo($expert_info['photo']) ?>" alt="<?php echo $expert_info['photo'] ?>">
	            		</p>
						<span class="con">
							<h2>
								<span class="bg">
									<img src="<?php if (!empty($expert_info['icon1'])) echo UPLOAD_URL.tag_photo($expert_info['icon1']) ?>" alt="<?php echo $expert_info['icon1'] ?>">
								</span>
								专家医生
							</h2>
							<div class="font"><?php if (!empty($expert_info['content'])) echo $expert_info['content'] ?></div>
						</span>
	            	</div>
	            	<dl class="team-top-list f-cb">
                        <?php
                        if (!empty($expert_list)):
                            foreach ($expert_list as $v):
                        ?>
	            		<dd data-id="<?php echo $v['id'] ?>">
	            			<p class="d-pic">
	            				<img src="<?php if (!empty($v['photo'])) echo UPLOAD_URL.tag_photo($v['photo']) ?>" alt="<?php echo get_pic_alt($v['photo']) ?>">
	            			</p>
	            			<span class="box">
	            				<h2><?php if (!empty($v['title'])) echo $v['title'] ?></h2>
	            				<p class="b-font">
	            					<?php if (!empty($v['outline'])) echo $v['outline'] ?>
	            				</p>
	            			</span>
	            		</dd>
                        <?php
                            endforeach;
                        endif;
                        ?>
	            	</dl>
	            </div>
	            <div class="team-list">
	            	<ul class="f-cb">
                        <?php
                        if (!empty($list)):
                            foreach ($list as $v):
                        ?>
	            		<li class="ab">
	            			<a class="intro f-cb" href="javascript:;">
			            		<p class="pic">
			            			<img src="<?php if (!empty($v['photo'])) echo UPLOAD_URL.tag_photo($v['photo']) ?>" alt="<?php echo get_pic_alt($v['photo']) ?>">
			            		</p>
								<span class="con">
									<h2>
										<span class="bg">
											<img src="<?php if (!empty($v['icon'])) echo UPLOAD_URL.tag_photo($v['icon']) ?>" alt="<?php echo get_pic_alt($v['icon']) ?>">
										</span>
										<?php if (!empty($v['title'])) echo $v['title'] ?>
									</h2>
									<div class="font"><?php if (!empty($v['content'])) echo $v['content'] ?></div>
                                    <?php if (!empty($v['load_list'])): ?>
									<h3><?php if (!empty($v['field1'])) echo $v['field1'] ?>：<?php foreach ($v['load_list'] as $vv): ?><span data-id="<?php echo $vv['id'] ?>" class="load-msg"><?php  if (!empty($vv['title'])) echo $vv['title'] ?></span><?php endforeach; ?></h3>
                                    <?php endif; ?>
								</span>
			            	</a>
	            		</li>
                        <?php
                            endforeach;
                        endif;
                        ?>
	            	</ul>
	            </div>
    		</div>
    	</div>
    </div>
    <div class="team-font">
    	
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
		$(window).load(function() {
			var location = window.location.href;
			var href= location+"";
			var href_part=href.split('?');	 
		    var num1=href_part[1];
		    $(".ab").each(function(i) {
		    	var _now=$(this);
		        var _shuzi=$(this).index();
			  	var tiao=_now.offset().top;
			  	var shu=$(".ab").index(_now);
			  	if(num1==_shuzi){
		            tiao=_now.offset().top-$('header').height();
		            $("html,body").stop().animate({"scrollTop":tiao}, 1000);
		        }
		    });
		})
		$('footer').css('margin-top','-133px');


		$('.team-list li:odd').addClass("odd");
		var courAjax_Url = "<?php echo site_url_ajax('team/team_ajax'); ?>";
 		var load_Url = "<?php echo site_url_ajax('team/load_ajax'); ?>";
		$(".team-top-list dd").click(function(e){
            var id = $(this).data("id");
            $.ajax({ 
                url: courAjax_Url+"/"+id, 
                success: function(data){
                    $(".team-font").html(data);
                    $(".team-font").fadeIn();

                    $('.team-font .con .close').on('click',function(){
                     	$(".team-font").html("");
                     	$(".team-font").fadeOut();
                    })
                }
            });
        })

        $(".load-msg").click(function(e){
            var id = $(this).data("id");
            $.ajax({
                url: load_Url+"/"+id,
                success: function(data){
                    $(".team-font").html(data);
                    $(".team-font").fadeIn();

                    $('.team-font .con .close').on('click',function(){
                        $(".team-font").html("");
                        $(".team-font").fadeOut();
                    })
                }
            });
        })
	})
</script>
</body>
</html>