<?php if (!defined('THINK_PATH')) exit();?>﻿
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
<script>
var delUrl="<?php echo U('Public/del','','');?>";
</script>
<body>
<div class="kc_tit">
	本题库共<?php echo ($count); ?>道题
</div>
<div class="list_warp">
<?php if($test != '' ): if(is_array($test)): $i = 0; $__LIST__ = $test;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl class="list">
   <?php if($vo["questions"] == 填空题): ?><img class="biao" src="/Public/images/tianb.png">
   <?php elseif($vo["questions"] == 选择题): ?> 
   		<img class="biao" src="/Public/images/xuan.png">
   <?php else: ?>
   		<img class="biao" src="/Public/images/jian.png"><?php endif; ?>                       		
	<dt>
		<a href="javascript:void(0);" onclick="parent.open('/index.php/Home/Public/show/id/<?php echo ($vo["id"]); ?>','',900,600);" style="width: 100%;height: 90px">
		<input id="delId" type="hidden" value="<?php echo ($vo["id"]); ?>">
			<div>

                <iframe  src="/Word/doc/<?php echo ($_SESSION['uid']); ?>/<?php echo (date('Ymd',$vo["wtime"])); ?>/<?php echo ($vo["test"]); ?>.htm" frameborder="0" height="90" width="100%" scrolling="no"></iframe>
			</div>
	</a></dt>
	<dd>   
		<a href="javascript:void(0);" onclick="parent.open('/index.php/Home/Public/show/id/<?php echo ($vo["id"]); ?>','',900,600);" class="a1">
			<input id="delId" type="hidden" value="<?php echo ($vo["id"]); ?>"></a>
		<a class="del"></a>
	</dd>
</dl><?php endforeach; endif; else: echo "" ;endif; ?>
<?php else: ?>
<center>没有数据</center><?php endif; ?>
</div>
<div style="text-align: center" class="page">
	<a href="javascript:void(0);" class="mub"><?php echo ($page); ?></a>
</div>

<!-- 删除试题提示框 -->
<div id="mask"></div>
<div id="delet_bt" class="popu_box">
	<div class="img_icon img_delete"></div>
	<div class="popu_right">
		<p class='popu_text'>您是否确认删除此题</p>
		<div class="popu_btn"><a href="javascript:void(0);" class="delete_cancel_btn">取消</a><a href="javascript:void(0);" class="delete_btn">删除</a></div>
	</div>
</div>
<!-- END -->
</body>

<script>
window.onload=function(){

 $(document).click(function (event){ 
 	var window_iframe=$(window.parent.document.body)
	window_iframe.find("#show1").hide(300)
	window_iframe.find("#bt").css({background:"url('/Public/images/index/dot.0.png') no-repeat scroll right center, url('/Public/images/icon_logo.png') no-repeat scroll left center"})
	window_iframe.find('#bt').attr("SH",true)

	window_iframe.find(".chem_list").slideUp(300)
	window_iframe.find('.chem_btn').attr("SH_CHEM",true)

	window_iframe.find(".name .name_icon").css({background:"url(/Public/images/index/name_up.png) no-repeat right center"})
	window_iframe.find(".set").slideUp(300)
	window_iframe.find(".name .name_icon").attr("SH_NAME",true)

	window_iframe.find('.tab_con1').slideUp(300)

			if(window_iframe.find(".tab_con2").val()){
			window_iframe.find(".laiyuan_header").find("a").html(window_iframe.find(".tab_con2").val())
		}else{
			window_iframe.find(".laiyuan_header").find("a").html("来源")
		}
		if(window_iframe.find(".laiyuan_header").find("a").html()!="来源"){
			window_iframe.find(".laiyuan_header").find("a").addClass("color")
			
		}else{
			window_iframe.find(".laiyuan_header").find("a").removeClass("color")
		}
		
		window_iframe.find(".laiyuan_header").show()
		window_iframe.find(".tab_con2").hide() 


	
});





}


 </script>
</html>