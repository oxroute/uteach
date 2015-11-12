<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>指南树</title>
<link href="/Public/css/base.css" rel="stylesheet" type="text/css" />
<link href="/Public/css/common.css" rel="stylesheet" type="text/css" />
<link href="/Public/css/index.css" rel="stylesheet" type="text/css" />
<script src="/Public/js/jquery-1.8.3.min.js" type="text/javascript"></script> 
<script src="/Public/js/jquery.nicescroll.min.js" type="text/javascript"></script> 




<script type="text/javascript">
   $(document).ready(function() {
    var nice = $("html").niceScroll();  // The document page (body)
    $("#sroll_box").niceScroll({cursorborder:"",cursorcolor:"#3a3a3a",boxzoom:false}); // First scrollable DIV

})
   
 
</script>

<style type="text/css">
		.white_content1 h2{ height:44px; line-height:44px; background:#309dff;-moz-border-radius:2px;-webkit-border-radius:2px;border-radius:2px; font-size:14px; color:#fff; padding-left:25px;}
		.white_content1 .con1{ border-bottom:1px solid #309dff; height:41px; line-height:41px;}
		.white_content1 .con1 span{ padding:0 25px; color:#309dff;font-size: 12px}
		.white_content1 .con1 span.fr{ float:right;}
		.white_content1 .con2{ padding:30px 0px; margin:0 30px;width:580px;}
     .con3{ line-height:36px; margin:0 30px; padding:20px 0; font-size:14px; border-top:1px solid #dedede;}
	 .con3 div{color:#309dff;}
	 .con3 p{ color:#000000;display: inline-block;}

     .con4{ float:right; height:42px; line-height:42px;margin-right:30px;}
     .con4 input{font-size: 14px;-moz-border-radius:5px;-webkit-border-radius:5px;border-radius:5px;border: none;padding:3px 15px;
      background:#ffffff;color: #349fff;cursor: pointer;margin: 0}
     .con4 input:hover{background: #349fff;color: #ffffff}


     #sroll_box{height:470px;overflow: hidden; border-bottom:1px solid #309dff;}

</style>
</head>
<body>
<form action=""  medthod="post">

<div id="light1" class="white_content1">
  <h2>知识点:<?php echo ($fid); ?>&nbsp;/&nbsp;<?php echo ($zid); ?>&nbsp;/&nbsp;<?php echo ($zsid); ?></h2>
        <div class="con1">
            	<span>编号：<?php echo ($date["id"]); ?></span>
                <span>题型：<?php echo ($date["questions"]); ?></span>
                <span>难度：<?php echo ($date["difficulty"]); ?></span>
                <span>上传人：<?php echo ($date["test_people"]); ?></span>
                <span class="fr">来源：<?php echo ($date["source"]); ?></span>
        </div>
        <div id="sroll_box">
            <div class="con2">
            	<!--<?php echo ($date["test"]); ?>-->
                <iframe  src="/Word/doc/<?php echo ($_SESSION['uid']); ?>/<?php echo (date('Ymd',$date["wtime"])); ?>/<?php echo ($date["test"]); ?>.htm" frameborder="0" height="100%" width="100%" scrolling="no"></iframe>

            </div>
            <div class="con3">
            	<div>答案：
                    <iframe  src="/Word/doc/<?php echo ($_SESSION['uid']); ?>/<?php echo (date('Ymd',$date["wtime"])); ?>/<?php echo ($date["answer"]); ?>.htm" frameborder="0" height="100%" width="100%" scrolling="no"></iframe>

                </div>
                <div>解析：
                    <iframe  src="/Word/doc/<?php echo ($_SESSION['uid']); ?>/<?php echo (date('Ymd',$date["wtime"])); ?>/<?php echo ($date["analytical"]); ?>.htm" frameborder="0" height="100%" width="100%" scrolling="no"></iframe>

                </div>
                <div>备注：<p><?php echo ($date["remarks"]); ?></p></div>
            </div>


        </div>
        	<div class="con4">
        		<input type="button" name="button" value="关闭" onclick="parent.close();" />
        		<?php if($date["tid"] != $_SESSION['uid']): ?><input type="button" name="button" value="这不是你的试题" /></a>
           		<?php else: ?>
           			<input type="button" name="button" value="修改" onclick="parent.location.href='/index.php/Home/Public/update/id/<?php echo ($date["id"]); ?>'" /></a><?php endif; ?>
            </div>
</div> 
</form>
</body>
</html>