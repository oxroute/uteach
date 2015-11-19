<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>指南树</title>
<link rel="stylesheet" type="text/css" href="/Public/css/slick.css"/>
<link rel="stylesheet" type="text/css" href="/Public/css/layout.css"/>
<link rel="stylesheet" type="text/css" href="/Public/css/xlmenu.css"/>
<link rel="stylesheet" type="text/css" href="/Public/css/common.css"/>
<link rel="stylesheet" href="/Public/css/lrtkfy.css" type="text/css" />
<script type="text/javascript">
  var imgPath = '/Public/';
</script>
<script src="/Public/js/jquery-1.8.3.min.js" type="text/javascript"></script> 
<script src="/Public/js/jquery.backgroundpos.js" type="text/javascript"></script>
<script src="/Public/js/jquery.easing.min.js" type="text/javascript"></script> 
<script src="/Public/js/choose.js" type="text/javascript"></script>
<script type="text/javascript" src="/Public/js/slick.js"></script>
<script src="/Public/js/jquery.nicescroll.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/Public/js/lhgdialog/lhgdialog.min.js?self=true&skin=igreen"></script>
<script type="text/javascript">
	var showEpaper="<?php echo U('Choose/show','','');?>";
   $(document).ready(function() {
  	var nice = $("html").niceScroll();  // The document page (body)
    $(".sidebar").niceScroll({cursorborder:"",cursorcolor:"#3a3a3a",boxzoom:false}); // First scrollable DIV
   })
   function open(myurl,tit,w,h){
    var dg = $.dialog({
    	id: 'mydiv',
    	lock: true,
    	width : w,
    	height : h,
    	title : tit,
    	cache:true,
    	min:false,
    	resize:true,
    extendDrag:true,
    	content: 'url:'+ myurl
    	});
    	dg.ShowDialog();
    }

    function R_alert(msg) {
      close();
            var count = 0;
            var xcount = 0;
            
           if (msg) {
                  count = msg.count;
                  xcount = msg.xcount;
              }

              $("#total").html(count);
              $("#total_xz").html(xcount);
              $("#total_fxz").html(count - xcount);


              // return false;


	    $.dialog.tips(msg,2,'loading.gif');
	    $('#right_bt').attr("src",$('#right_bt').attr("src"))
	}
    function close() {
        $.dialog.list['mydiv'].close()
     }

 </script>
</head>
<body>
<script>
$(function(){
	$('.increases').on('click',function(){
		// clearInterval(timer) 
		 var epaperId = $('#epaperId').val()
		$.post('/index.php/Home/Choose/epaper',function(data){
			if('data==1'){
				location.href=showEpaper+'?epaperId='+epaperId;
			}else{
				alert('删除失败 !');
			}
		},'json') 
	})
	var nice = $("html").niceScroll();  // The document page (body)



})
</script>
<div class="header">
	<div class="head_l">
		<span id="zhujiu_set" SH_HUI="true">会考</span>
	</div>
	<div id="show1" >
	  <div class="show2">
	    <i style="top:0"><img src="/Public/images/index/dot1.png" width="24" height="13" /></i>
	      <ul class="clear">
	        <li><a href="<?php echo U('Write/index');?>"><img src="/Public/images/index/icon1_small.png" width="52" height="52" /><span>编题</span></a></li>
	        <li><a href="###"><img src="/Public/images/index/z_icon.png" width="52" height="52" /><span>期中</span></a></li>
	        <li><a href="###"><img src="/Public/images/index/m_icon.png" width="52" height="52" /><span>期末</span></a></li>
	        <li><a href="###"><img src="/Public/images/index/y_icon.png" width="52" height="52" /><span>月考</span></a></li>
	        <li><a href="<?php echo U('Volume/index');?>"><img src="/Public/images/index/icon2_small.png" width="52" height="52" /><span>会考</span></a></li>
	        <li><a href="<?php echo U('User/index');?>"><img src="/Public/images/index/icon3_small.png" width="52" height="52" /><span>设置</span></a></li>
	        <li><a href="<?php echo U('Index/index');?>"  class="back_index"><img src="/Public/images/index/icon4_small.png" width="52" height="52" /><span>首页</span></a></li>
	      </ul>
	  </div>
	</div>
	
	<div class="head_m1">
		<div class="head_mll">
			选择来源<span></span>
		</div>
		<ul id="subnav">

			<li class="mainlevel" id="mainlevel_01" SH_XUANZHE='true'><a href="javascript:void(0);">题型</a>
				<p style="height: 10px;"></p>
				<ul class="sub_nav_01">
					<span class="Triangle_con1"></span>
					<li class="questions" ><a>选择题</a></li>
					<li class="questions" ><a>填空题</a></li>
					<li class="questions" ><a>简答题</a></li>
					<li class="questions" ><a class="a_left_borer">全部</a></li>
				</ul>
				 <input type="hidden" id="questions" name='questions' value="<?php echo ($date["questions"]); ?>"/>
			</li>
			<li class="mainlevel" id="mainlevel_02" SH_XUANZHE='true'><a href="javascript:void(0);">难度</a>
				<p style="height: 10px;"></p>
				<ul class="sub_nav_01">
				<span class="Triangle_con1"></span>
					<li class="difficulty"><a>A</a></li>
					<li class="difficulty"><a>B</a></li>
					<li class="difficulty"><a>C</a></li>
					<li class="difficulty"><a class="a_left_borer">全部</a></li>

				</ul>
				<input type="hidden" id="difficulty" name='difficulty' value="<?php echo ($date["difficulty"]); ?>"/>
			</li>
			<li class="mainlevel" SH_XUANZHE='true'><a href="javascript:void(0);"><?php echo (session('username')); ?></a>
				<p style="height: 10px;"></p>
				<ul class="sub_nav_01">
					<span class="Triangle_con1"></span>
					<?php if(is_array($teacher)): $i = 0; $__LIST__ = $teacher;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(in_array(($vo["id"]), is_array($tid)?$tid:explode(',',$tid))): ?><li class="test_people"><a><?php echo ($vo["name"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
					<li class="test_people"><a class="a_left_borer">全部</a></li>
				</ul>
			<input type="hidden" id="test_people" name="test_people" value="<?php echo ($date["test_people"]); ?>"/>
			</li>
			<li><div class="zhuju_header">来源</div> 
			<input type="text" placeholder="来源" id="zhuju_lian_input" value="" style="display: none" /></li>
		</ul>
		<input type="hidden" name="epaperId" id="epaperId" value="<?php echo ($epaperId); ?>"/>
	</div>
	<div class="head_r">
	<div class="eye"></div>
	<ul class="menu">
		<li class="li_3">试题<span class="count1" id="total"><?php echo ($count); ?></span>
			<dl class="li_3_content">
				<!-- <span class="Triangle_con"></span> -->
				<img src="/Public/images/index/dot1.png" width="23"height="12"class="Triangle_con"/>
				<p style="padding-top: 10px;">
					<span>选择题：</span><em class="subnavg" id="total_xz"><?php if($Xcount == '' ): ?>0<?php else: echo ($Xcount); endif; ?> </em>/25
				</p>
<!-- 				<p tyle="display:block">
					<span>非选择题</span><em class="subnavg" id="total_fxz"><?php echo ($count - $Xcount); ?></em>/25
				</p> -->
				<p>
					<span>必答题：</span><em class="subnavg" id="">0</em>/25
				</p>

	<!-- 			<p>
					<span>(2)选答题</span><em class="subnavg" id="">0</em>/25
				</p> -->
				<p>
					<span>《化学与生活》：</span><em class="subnavg" id="">0</em>/25
				</p>
				<p>
					<span>《有机化学基础》：</span><em class="subnavg" id="">0</em>/25
				</p>

				<p>
					<span>《化学反应原理》：</span><em class="subnavg" id="">0</em>/25
				</p>
<!-- 				<p>
					简答题：<em class="subnavg"><?php if($Jcount == '' ): ?>0<?php else: echo ($Jcount); endif; ?></em>/25
				</p> -->
				<p style="color: #01A310; text-align: center;">共计<i class="count2"><?php echo ($count); ?></i> 道题</p>
				<a class="increases" href="javascript:void(0);" id="revisebut">组成试卷</a>
			</dl>
		</li>
	</ul>

	<div class="nr_green" style="float: right; margin-right: 39px;" >
		<img src="/Public/images/toux.gif" /> <span SH_NAME='true'><?php echo (session('username')); ?></span>
		<ul class="set">
			<li><a href="<?php echo U('User/index');?>">设置</a></li>
			<li><a href="<?php echo U('Login/logout');?>" style="border:none">注销</a></li>
		</ul>
	</div>

</div>
</div>
<div class="clear"></div>
<div class="shadow"></div>
	<script>
var getZid="<?php echo U('Choose/show_ChLeft','','');?>";
 var id='/index.php/home/Choose/main_content.html'; 
</script>
<div id="middle">
      <div class="contain1">
<div class="sidebar">
	<div id="firstpane" class="menu_list">
		<?php if(is_array($subject)): $i = 0; $__LIST__ = $subject;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><p class="sb_g subject">
			<b class="subject" style="display: none;"><?php echo ($vo["id"]); ?></b><span id="zhujiun_xuti" SH_XUANTI="true"><?php echo ($vo["name"]); ?></span>
		</p><?php endforeach; endif; else: echo "" ;endif; ?>
		<input type="hidden" name="kid" id="kid" value="" /> 
		<input type="hidden" name="fid" id="fid" value="" /> 
		<input type="hidden"name="zid" id="zid" value="" /> 
		<input type="hidden" name="zsid"id="zsid" value="" />
		<ul class="chem_list">
			<?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvo): $mod = ($i % 2 );++$i;?><li><a class="fid"><span style="display: none;"><?php echo ($vvo["id"]); ?></span><?php echo ($vvo["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
			<i><img src="/Public/images/index/dot1.png" width="13"height="8" /></i>
		</ul>
		<div id="a">
			<?php if(is_array($chapter)): $i = 0; $__LIST__ = $chapter;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><p class="menu_head zid">
				<span style="display: none;"><?php echo ($vo["id"]); ?></span><?php echo ($vo["name"]); ?>
			</p>
			<div class="menu_body">
				<?php if(is_array($vo['pid'])): $i = 0; $__LIST__ = $vo['pid'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vos): $mod = ($i % 2 );++$i;?><a class="zsid"><span
					style="display: none;"><?php echo ($vos["id"]); ?></span><?php echo ($vos["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
			</div><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
	</div>

</div>


	<iframe src="/index.php/home/Choose/main_content.html" frameborder="0" style="float:right;width:calc(100% - 280px);height:100%;" id="right_bt"></iframe> 
	</div>

</div>

<div class="clear"></div>
<div id="foot">
  <ul>
    <li class="logo_f">uTeach</li>
    <li class="nav_f">会考</li>
    <?php echo dirs($row['pid'], $row['top_pid']);?>
    <li class="grasj"></li>
    <li><?php echo ($row["header"]); ?>  <?php echo ($row["subject"]); ?></li>
	<li class="greesj"></li>
	 <li>开始选题</li>
  </ul>
</div>
</div>
</body>
</html>