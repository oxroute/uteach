<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<link rel="stylesheet" href="/Public/css/lrtkfy.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="/Public/css/popstyle.css"/>
<script src="/Public/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="/Public/js/jquery.nicescroll.min.js" type="text/javascript"></script>

<style>
	body{padding: 0;margin: 0}
</style>
<script>
$(function(){
	$('.popbut').on('click',function(){
		var newid=$('.poptit span').eq(0).find('a').html()
		var oldid=$('input').eq(0).val()
		new_ff()
		function new_ff(){
			var str_id=$(window.top.document).find("#all_id").val().replace(oldid,newid)
			$(window.top.document).find("#all_id").val(str_id)
		}
		
		$.post('/index.php/Home/Choose/get_all_id',{all_id:$(window.top.document).find("#all_id").val()},function(data){
			if('data==1'){
				parent.R_alert('替换试题成功,请稍后.....!')
			}
		})
		
	})

	
	var nice = $("html").niceScroll();  // The document page (body)
  

})
</script>
</head>
<body>
<div class="pagnation" id="pagnation">
	<?php echo ($page); ?>
</div>
<div class="clear"></div>
<input type="hidden" value="<?php echo ($id); ?>">
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!-- <?php if($vo["id"] != $id ): ?>-->
<div class="poptit">
<span style="width:65px;margin:0">编号：<a><?php echo ($vo["id"]); ?></a></span>
<!-- <span style="width:410px">知识点：<?php echo (getkid($vo["kid"])); ?>><?php echo (getfid($vo["fid"])); ?>><?php echo (getzid($vo["zid"])); ?>><?php echo (getzsid($vo["zsid"])); ?></span> -->
<span style="width:410px">知识点：<?php echo (getzsid($vo["zsid"])); ?></span>
<span style="width:100px">题型：<?php echo ($vo["questions"]); ?></span>
<span style="float:right;max-width:100px">来源：<?php echo ($vo["source"]); ?></span>
</div> 
<div class="popcon">
    <iframe  src="/Word/doc/<?php echo ($_SESSION['uid']); ?>/<?php echo (date('Ymd',$vo["wtime"])); ?>/<?php echo ($vo["test"]); ?>.htm" frameborder="0" height="90" width="100%" scrolling="no"></iframe>

    <input name="" type="button" class="popbut" value="替换本题" />
</div>
<p class="popgreen">正确答案：<?php echo ($vo["answer"]); ?></p>
<!-- <div class="popconnti">详细解析</div> -->
<!-- <p><span class="popgreen">统计：</span>本题共作答566次</p>
<p><span class="popgreen">使用：</span>本题共作答566次</p> -->
<p><span class="popgreen">解析：</span><?php echo ($vo["remarks"]); ?></p>

<!--<?php endif; ?> --><?php endforeach; endif; else: echo "" ;endif; ?>

</body>
</html>