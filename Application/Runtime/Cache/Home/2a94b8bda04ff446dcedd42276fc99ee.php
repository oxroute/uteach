<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>指南树</title>
	<link href="/Public/css/base.css" rel="stylesheet" type="text/css" /> 
	<link href="/Public/css/shou.css" rel="stylesheet" type="text/css" />
	<script src="/Public/js/jquery-1.8.3.min.js" type="text/javascript"></script>
	<script src="/Public/js/shou.js" type="text/javascript"></script>
	<script type="text/javascript" src="/Public/js/velocity.min.js"></script>
	<script type="text/javascript" src="/Public/js/velocity.ui.min.js"></script>
	<script type="text/javascript" src="/Public/js/move.js"></script>
	<script>
			$(function(){
				$("#content .content_list").css({
					left:($(window).width()-$("#content .content_list").width())/2,
					top:($(window).height()-$("#content .content_list").height())/2
				})

				$(window).resize(function(){
					$("#content .content_list").css({
						left:($(window).width()-$("#content .content_list").width())/2,
						top:($(window).height()-$("#content .content_list").height())/2
					})	
				})



				$.Velocity.RegisterEffect('lian.div0',{
				      defaultDuration:1000,
				      calls:[
				            [{scaleX:[1,5],scaleY:[1,5]}]
				      ]
				   })


				            var seq=[
							            {
							               elements:$(".content_list .pic_one,.content_list .pic_two,.content_list .pic_three,.content_list .pic_four,.content_list .pic_fix,.content_list .pic_six"),
							               properties:'lian.div0',
							               options:{duration:500,complete:function(){$("#mask").hide()}}    
							            }

				            ]


				            $.Velocity.RunSequence(seq)
			})

			
	</script>
</head>
<body style="overflow:hidden">

	<img src="/Public/images/shou/shou_bg.jpg"  alt="" id="bg">
	<div id="header">
		<h1></h1>
		<div class="name">
           <img src="/Public/images/shou/logo.png" width="35" height="35" />
           		<span class="name_text "><?php echo (session('username')); ?></span> 
           		<!-- <span class="name_icon"></span>  -->
				   <ul class="set">
						<li><a href="<?php echo U('User/index');?>">设置</a></li>
						<li><a href="<?php echo U('Login/logout');?>" style="border:none">注销</a></li>
					</ul>
		</div>
	</div>
	<div id="content">
 
			<div class="content_list clear">
				<div class="a_box">
					<a href="<?php echo U('Write/index');?>" sh_fn="true" data_a="one" class="pic_one">
						<div class="icon">
							<img src="/Public/images/shou/icon1.png" alt="" class="icon_bg">
							<img src="/Public/images/shou/shou.icon3.png" alt="" class="icon_one">
							<img src="/Public/images/shou/shou.icon4.png" alt="" class="icon_two">
							<img src="/Public/images/shou/shou.icon5.png" alt="" class="icon_three">
							<img src="/Public/images/shou/shou.icon6.png" alt="" class="icon_four">
							<img src="/Public/images/shou/shou.icon7.png" alt="" class="icon_fix">
							<img src="/Public/images/shou/shou.icon8.png" alt="" class="icon_six">
						</div>
						<span>编题</span>
					</a>
				</div>
				

				<div class="a_box">				
					<a href="###" sh_fn="true" data_a="four" class="pic_four">
						<div class="icon">
							<img src="/Public/images/shou/icon2.png" alt="" class="icon_bg">
							<img src="/Public/images/shou/z_icon.png" alt="" class="icon3_one">
							<img src="/Public/images/shou/z_icon1.png" alt="" class="icon3_two">
							<img src="/Public/images/shou/z_icon1.png" alt="" class="icon3_three">
							<img src="/Public/images/shou/z_icon2.png" alt="" class="icon3_four">
							<img src="/Public/images/shou/z_icon3.png" alt="" class="icon3_fix">
							<img src="/Public/images/shou/z_icon3.png" alt="" class="icon3_six">
						</div>
						<span>期中</span>
					</a>
				</div>
				

 				<div class="a_box">	
					<a href="###" sh_fn="true" data_a="fix" class="pic_fix">
						<div class="icon">
							<img src="/Public/images/shou/icon3.png" alt="" class="icon_bg">
							<img src="/Public/images/shou/m_icon.png" alt="" class="icon4_one">
							<img src="/Public/images/shou/m_icon1.png" alt="" class="icon4_two">
							<img src="/Public/images/shou/m_icon2.png" alt="" class="icon4_three">
							<img src="/Public/images/shou/m_icon3.png" alt="" class="icon4_four">
							<img src="/Public/images/shou/m_icon4.png" alt="" class="icon4_fix">
						</div>
						<span>期末</span>
					</a>
				</div>
				   

			 <div class="a_box">		
					<a href="###" sh_fn="true" data_a="six" class="pic_six">
						<div class="icon">
							<img src="/Public/images/shou/icon4.png" alt="" class="icon_bg">
							<img src="/Public/images/shou/y_icon.png" alt="" class="icon5_one">
							<img src="/Public/images/shou/y_icon1.png" alt="" class="icon5_two">
							<img src="/Public/images/shou/y_icon2.png" alt="" class="icon5_three">
							<img src="/Public/images/shou/y_icon3.png" alt="" class="icon5_four">
							<img src="/Public/images/shou/y_icon4.png" alt="" class="icon5_fix">
						</div>
						<span>月考</span>
					</a>
			</div>
				


				 <div class="a_box">	
					<a href="<?php echo U('Volume/index');?>" sh_fn="true" data_a="two" class="pic_two">
						<div class="icon">
							<img src="/Public/images/shou/icon5.png" alt="" class="icon_bg">
							<img src="/Public/images/shou/shou.icon1.1.png" alt="" class="icon1_one">
							<img src="/Public/images/shou/shou.icon1.2.png" alt="" class="icon1_two">
							<img src="/Public/images/shou/shou.icon1.3.png" alt="" class="icon1_three">
							<img src="/Public/images/shou/shou.icon1.4.png" alt="" class="icon1_four">
						</div>
						<span>会考</span>
					</a>
				</div>
				


				 <div class="a_box">					
					<a href="<?php echo U('User/index');?>" sh_fn="true" data_a="three" class="pic_three">
						<div class="icon">
							<img src="/Public/images/shou/icon8.png" alt="" class="icon_bg">
							<img src="/Public/images/shou/shou.icon2.1.png" alt="" class="icon2_one">
							<img src="/Public/images/shou/shou.icon2.2.png" alt="" class="icon2_two">
							<img src="/Public/images/shou/shou.icon2.3.png" alt="" class="icon2_three">
							<img src="/Public/images/shou/shou.icon2.4.png" alt="" class="icon2_four">
						</div>
						<span>设置</span>
					</a>
				</div>
				


			</div>


		
	</div>
	  <div id="mask"></div>

</body>
</html>