<?php if (!defined('THINK_PATH')) exit();?><script language="javascript" type="text/javascript">
    var url="<?php echo U('Write/index');?>";
    //

</script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>指南树</title>

<link href="/Public/css/base.css" rel="stylesheet" type="text/css" />
<link href="/Public/css/common.css" rel="stylesheet" type="text/css" />
<link href="/Public/css/index.css" rel="stylesheet" type="text/css" />
<script src="/Public/js/jquery-1.8.3.min.js" type="text/javascript"></script> 
<script src="/Public/js/jquery.easing.min.js" type="text/javascript"></script> 
<script type="text/javascript">
    var imgPath = '/Public/';
</script>
<script src="/Public/js/jquery-1.8.3.min.js" type="text/javascript"></script> 
<script src="/Public/js/jquery.easing.min.js" type="text/javascript"></script> 
<script src="/Public/js/my.js" type="text/javascript"></script>
<script src="/Public/js/bu.js" type="text/javascript"></script>
 <script type="text/javascript" src="/Public/js/lhgdialog/lhgdialog.min.js?self=true&skin=blue"></script>
<script src="/Public/js/jquery.nicescroll.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="/Public/css/logo.css" type="text/css"> 
<script type="text/javascript" src="/Public/js/logo.js"></script>
<script language="javascript" type="text/javascript"> 
//lhgdialog 弹窗js


 $(document).ready(function() {
    var nice = $("html").niceScroll();  // The document page (body)
    $("#nav").niceScroll({cursorborder:"",cursorcolor:"#3a3a3a",boxzoom:false}); // First scrollable DIV
    $(".write_scroll").niceScroll({cursorborder:"",cursorcolor:"#3a3a3a",boxzoom:false}); // First scrollable DIV
    // $("#right_bt").niceScroll({cursorborder:"",cursorcolor:"#3a3a3a",boxzoom:false}); // First scrollable DIV
  });

  
    function open(myurl,tit,w,h){
    var dg = $.dialog({
    	id: 'mydiv',
    	lock: true,
    	width : w,
    	height : h,
    	title : tit,
    	cache:true,
    	resize:true,
        max:false,
        min:false,
    extendDrag:true,
    	content: 'url:'+ myurl
    	});
    	dg.ShowDialog();
    }
    function T_alert(msg) {
    close();
    frames['carnoc'].location.reload();
    }
    function R_alert(msg) {
	    close();
	    // $.dialog.tips(msg,"","loading.gif");
	    frames['main'].location.reload();
    }
    function info(msg) {
    // $.dialog.tips(msg);
    frames['main'].location.reload();
    }
    function close() {
      $.dialog.list['mydiv'].close()
   }
    // function reload() {
    //     $.dialog.list['mydiv'].reload("url:baidu.com")
    //  }
    
	
    </script>
</head>
<body style='background:#eaeaea'>
<table cellpadding="0" cellspacing="0" width="100%" style='background:#eaeaea' id="main">
    <tr>
        <script>
var getZid="<?php echo U('Write/showLeft','','');?>";
var id='/index.php/home/Public/main_content.html';
</script>
<td style="width:267px">
	<div class="index_left" >
		<h1 class="bt_h1">
				<span id="bt" SH="true">编题 </span>
				<a href="<?php echo U('Write/write');?>" class="bj" title="新编题"></a>
		</h1>
			
			<div id="show1">
				<div class="show2">
					<i><img src="/Public/images/index/dot1.png" width="24" height="13" /></i>
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



		
			<?php if(is_array($subject)): $i = 0; $__LIST__ = $subject;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!-- <img src="/Public/images/index/dot2.png"  class="chem_btn"/> -->
				<h2 class="subject"><b style="display:none;"><?php echo ($vo["id"]); ?></b><span class="chem_btn" SH_CHEM="true"><?php echo ($vo["name"]); ?></span><?php endforeach; endif; else: echo "" ;endif; ?>
				<input type="hidden" name="kid" id="kid" value="<?php echo ($date["kid"]); ?>"/>
				<input type="hidden" name="fid" id="fid" value="<?php echo ($date["fid"]); ?>"/>
				<input type="hidden" name="zid" id="zid" value="<?php echo ($date["zid"]); ?>"/>
				<input type="hidden" id="zcontent" value="<?php echo ($zid); ?>"/><br/>
				<input type="hidden" name="zsid" id="zsid" value="<?php echo ($date["zsid"]); ?>"/>
				<input type="hidden" id="zscontent" value="<?php echo ($zsid); ?>"/>
				<ul class="chem_list" style="z-index:100">
					<?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvo): $mod = ($i % 2 );++$i;?><li><a class="fid"><span style="display:none;"><?php echo ($vvo["id"]); ?></span><span><?php echo ($vvo["name"]); ?></span></a></li><?php endforeach; endif; else: echo "" ;endif; ?>        
						<i><img src="/Public/images/index/dot1.png" width="13" height="8" /></i>
				</ul>
				</h2>
		<ul id="nav">
		<?php if($date != ''): if(is_array($chapter)): $i = 0; $__LIST__ = $chapter;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
					<a class="zid"><span style="display:none"><?php echo ($vo["id"]); ?></span><?php echo ($vo["name"]); ?></a>
					<?php if($date["zid"] == $vo["id"] ): ?><ul class="nav_c clear_f" style="display: block;">
						
							<?php if(is_array($vo['pid'])): $i = 0; $__LIST__ = $vo['pid'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vos): $mod = ($i % 2 );++$i;?><li title=<?php echo ($vos["name"]); ?>>
									<?php if($date["zsid"] == $vos["id"] ): ?><a class="zsid cur"><span style="display:none"><?php echo ($vos["id"]); ?></span><?php echo ($vos["name"]); ?></a>
									  <?php else: ?>
									 <a class="zsid"><span style="display:none"><?php echo ($vos["id"]); ?></span><?php echo ($vos["name"]); ?></a><?php endif; ?>
									<i class="number_list"><?php echo ($vos["count"]); ?></i>
								</li><?php endforeach; endif; else: echo "" ;endif; ?>
	
						</ul>
					<?php else: ?>
						<ul class="nav_c clear_f">
						
							<?php if(is_array($vo['pid'])): $i = 0; $__LIST__ = $vo['pid'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vos): $mod = ($i % 2 );++$i;?><li title=<?php echo ($vos["name"]); ?>>
									<a class="zsid"><span style="display:none"><?php echo ($vos["id"]); ?></span><?php echo ($vos["name"]); ?></a>
									<i class="number_list"><?php echo ($vos["count"]); ?></i>
								</li><?php endforeach; endif; else: echo "" ;endif; ?>
	
						</ul><?php endif; ?>
					<i class="number_list"><?php echo ($vo["count"]); ?></i>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
		<?php else: ?>
			<?php if(is_array($chapter)): $i = 0; $__LIST__ = $chapter;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
					<a class="zid"><span style="display:none"><?php echo ($vo["id"]); ?></span><?php echo ($vo["name"]); ?></a>
					<ul class="nav_c clear_f">
						<?php if(is_array($vo['pid'])): $i = 0; $__LIST__ = $vo['pid'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vos): $mod = ($i % 2 );++$i;?><li title=<?php echo ($vos["name"]); ?>>
								<a class="zsid"><span style="display:none"><?php echo ($vos["id"]); ?></span><?php echo ($vos["name"]); ?></a>
								<i class="number_list"><?php echo ($vos["count"]); ?></i>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>

					</ul>
					<i class="number_list"><?php echo ($vo["count"]); ?></i>
				</li><?php endforeach; endif; else: echo "" ;endif; endif; ?>

		</ul>

<!-- 		<div class="shezhi">
			<span id="sz"><img src="/Public/images/index/sz.png" width="21" height="22" />
				<ul id="show2">
					<li><a href="###" class="add_dir">添加目录</a></li>
					<li class="nobor"><a href="#" class="dele">删除目录</a></li>
					<i><img src="/Public/images/index/dot11.png" width="13" height="8" /></i>
				</ul>
			</span>
		</div> -->
	</div>
</td>



        <td id="index_right" style="" >

            					<div class="user_tit">
						<h2>选择来源</h2>
						<ul id="tab1">
							<Li><a class="gettype" href="javascript:void(0)">题型</a>
								<ul class="tab_con1" style="left:-129px;">
									<li class="questions" ><a>选择题</a></li>
									<li class="questions" ><a>填空题</a></li>
									<li class="questions" ><a>简答题</a></li>
									<li class="questions"><a style="margin-left:-20px;border-left:1px solid #cfcbcb; padding-left:18px">全部</a></li>
									<i><img src="/Public/images/index/dot1.png" width="13" height="8" /></i>
								</ul>
								 <input type="hidden" id="questions" name='questions' value="<?php echo ($date["questions"]); ?>"/>
							</Li>
							<Li><a href="javascript:void(0)">难度</a>
								<ul class="tab_con1" style="left:-129px;">
									<li class="difficulty"><a>A</a></li>
									<li class="difficulty"><a>B</a></li>
									<li class="difficulty"><a>C</a></li>
									<li class="difficulty"><a style="margin-left:-20px;border-left:1px solid #cfcbcb;padding-left:18px">全部</a></li>
									<i><img src="/Public/images/index/dot1.png" width="13" height="8" /></i>
								</ul>
								<input type="hidden" id="difficulty" name='difficulty' value="<?php echo ($date["difficulty"]); ?>"/>
							</Li>
							<Li><a href="javascript:void(0)"><?php echo (session('username')); ?></a>
								<ul class="tab_con1" style="left:-129px;">
									<?php if(is_array($teacher)): $i = 0; $__LIST__ = $teacher;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(in_array(($vo["id"]), is_array($tid)?$tid:explode(',',$tid))): ?><li class="test_people"><a><?php echo ($vo["name"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
									<li class="test_people"><a href="javascript:void(0)" style="margin-left:-20px;border-left:1px solid #cfcbcb; padding-left:18px">全部</a></li>
									<i><img src="/Public/images/index/dot1.png" width="13" height="8" /></i>
								</ul>
							
							<input type="hidden" id="test_people" name="test_people" value="<?php echo ($date["test_people"]); ?>"/>
							</Li>
					 
						</ul>
						<div class="laiyuan_header"><a href="javascript:void(0)">来源<?php echo ($date["source"]); ?></a></div>
						<input type="text" value="<?php echo ($date["source"]); ?>" class="tab_con2" placeholder="来源"/>
		

								<div class="name"  style="margin-top:16px">
							               		<img src="/Public/images/index/logo.png" width="35" height="35" />
							                    <span class="name_icon" SH_NAME="true"><?php echo (session('username')); ?></span> 
							                   <ul class="set">
							                            <li><a href="<?php echo U('User/index');?>">设置</a></li>
							                            <li><a href="<?php echo U('Login/logout');?>" style="border:none">注销</a></li>
							                            <!-- <i><img src="/Public/images/index/dot1.png" width="23" height="12" /></i> -->
							                    </ul>
							        </div> 

					</div>
	





            <iframe src="/index.php/home/Public/main_content.html" frameborder="1" style="width:100%;margin-top:-9px" id="right_bt"></iframe>


        </td>
    </tr>
</table>
<div style="width: 1px; height: 1px; overflow: hidden;">
    <iframe id="iframe1" name="iframe1" ></iframe>
</div>
<div style="width: 1px; height: 1px; overflow: hidden;">
    <iframe id="iframe2" name="iframe2" ></iframe>
</div>
<div style="width: 1px; height: 1px; overflow: hidden;">
    <iframe id="iframe3" name="iframe3"  ></iframe>
</div>
<form id="form1">
<?php
if(!empty($test)){ ?>
    <script language="javascript" type="text/javascript">
        var url="<?php echo U('Write/index');?>";
        //location.href = url;
        var iframe1 = document.getElementById("iframe1");
        var iframe2 = document.getElementById("iframe2");
        var iframe3 = document.getElementById("iframe3");
        //alert("<?php echo ($analytical); ?>");
        iframe1.src =  "/Word/FileMakerSingle.php?id=<?php echo ($_SESSION['uid']); ?>&type=<?php echo ($test); ?>";
        iframe2.src =  "/Word/FileMakerSingle.php?id=<?php echo ($_SESSION['uid']); ?>&type=<?php echo ($answer); ?>";
        iframe3.src =  "/Word/FileMakerSingle.php?id=<?php echo ($_SESSION['uid']); ?>&type=<?php echo ($analytical); ?>";
        setInterval(function () {
            location.href = url;
        }, 1000);
        //
    </script>
<?php
} if(empty($answer)){ ?>

<?php
} if(empty($analytical)){ ?>
    <script language="javascript" type="text/javascript">
    var url="<?php echo U('Write/index');?>";
    //location.href = url;


    </script>

<?php
} ?>

</form>




</body>



</html>