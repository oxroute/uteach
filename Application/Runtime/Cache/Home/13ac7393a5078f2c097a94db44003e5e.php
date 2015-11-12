<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>test</title>
<link rel="stylesheet" type="text/css" href="/Public/css/slick.css"/>
<link rel="stylesheet" type="text/css" href="/Public/css/layout.css"/>
<link rel="stylesheet" type="text/css" href="/Public/css/xlmenu.css"/>
<link rel="stylesheet" type="text/css" href="/Public/css/common.css"/>
<link rel="stylesheet" href="/Public/css/lrtkfy.css" type="text/css" />
<script type="text/javascript">
  var imgPath = '/Public/';
</script>
<script src="/Public/js/jquery-1.8.3.min.js" type="text/javascript"></script> 
<script src="/Public/js/choose.js" type="text/javascript"></script>

 <script type="text/javascript" src="/Public/js/slick.js"></script>
<!-- <script type="text/javascript" src="/Public/js/scripts.js"></script>  -->
<script src="/Public/js/jquery.nicescroll.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/Public/js/lhgdialog/lhgdialog.min.js?self=true&skin=igreen"></script>
<script type="text/javascript" src="/Public/js/velocity.min.js"></script>
<script type="text/javascript" src="/Public/js/velocity.ui.min.js"></script>
<script type="text/javascript">
   $(document).ready(function() {
  		var nice = $("html").niceScroll();  // The document page (body)
    	$(".mainbody").niceScroll({cursorborder:"",cursorcolor:"#3a3a3a",boxzoom:false});
   
   function clone_element(obj,obj1){
   		var width_num=obj.width()
   	if(obj1.attr("class")=="add"){
   	var left_num=obj.position().left
   	var top_num=obj.position().top
 
   	$(".clone_style").remove()
   		var ff=obj.clone()
   		ff.addClass("clone_style").css({"position":"absolute","width":width_num,'top':top_num})
   		$(".mainbody").append(ff)
   		$.Velocity.RegisterEffect('lixin.div',{
   			defaultDuration:1000,
   			calls:[
   					[{translateY:[-(top_num+80-$(window).scrollTop()),0],translateX:[width_num/2.4,0],scaleX:[0,1],scaleY:[0,1]}]
   			]
   		})
   			var seq=[
   			{
   				elements:$(".clone_style"),
   				properties:'lixin.div',
   				options:{duration:900}   
   			}
   			]
   		$.Velocity.RunSequence(seq)
   		  }else if(obj1.attr("class")=="subtract"){
   		
   		  }
   }
		$(document).on("click",".add", function(){
			clone_element($(this).parent().parent(),$(this))
			var That=this;
			$.get('/index.php/Home/Choose/addId',{id:$(this).parent().parent().find('.id').val()},function(data){
				if (data.status == 1) {
					$(That).parent().parent().removeClass('mainlist').addClass('mainlistg');
					$(That).removeClass('add').addClass('subtract').val("移除");
				    $(That).parent().find('.yulianadd').hide();
					$(That).parent().find('.yuliansubtract').show();
					$(That).parent().parent().find('.show_left').removeClass('show_left').addClass('show').hide();
					$(That).parent().parent().find('.checked_left').removeClass('checked_left').addClass('checked').show();
					 // window.top.location.reload()  
			        // var oldValue=parseInt($(window.top.document).find(".count1").text()); //取出现在的值，并使用parseInt转为int类型数据
			        // oldValue++   //自加1
                                var count = 0;
                                var xcount = 0;
                                if (data.data) {
                                    count = data.data.count;
                                    xcount = data.data.xcount;
                                }

                                $(window.top.document).find("#total").html(count);
                                 $(window.top.document).find("#total_xz").html(xcount);
                               $(window.top.document).find("#total_fxz").html(count - xcount);
                               $(window.top.document).find(".count2").html(count);
			        // $(window.top.document).find(".count1").text(oldValue)  //将增加后的值付给控件
			        // var oldValue=parseInt($(window.top.document).find(".count2").text()); //取出现在的值，并使用parseInt转为int类型数据
			        // oldValue++   //自加1
			        // $(window.top.document).find(".count2").text(oldValue)  //将增加后的值付给控件
				} else {
					// alert('新增失败');
				}
				return false;
			},'json');
		});
	$(document).on("click", ".subtract", function(){

var That=this;
    var obj=$(this).parent().parent()
    var width_num=obj.width()
  
          var left_num=obj.position().left
          var top_num=obj.position().top
          $(".clone_style").remove()
            var ff=obj.clone()
    ff.addClass("clone_style").css({"position":"absolute","width":100,'right':100,"top":-30,"background":"#ffffff none repeat scroll 0 0","padding":"16px 30px"})
            $(".mainbody").append(ff)
            $(".clone_style").velocity({
            opacity: 0.8,
            translateY:top_num+30,
             width: width_num,
             right:0
        }, {
             duration: 900,
            complete: function(elements) {
              $.get('/index.php/Home/Choose/editId',{id:$(That).parent().parent().find('.id').val()},function(data){
                if(data.status == 1){
                  $(That).parent().parent().removeClass('mainlistg').addClass('mainlist');
                  $(That).removeClass('subtract').addClass('add').val("添加")
                  $(That).parent().find('.yuliansubtract').hide()
                  $(That).parent().find('.yulianadd').show()
                  $(That).parent().parent().find('.checked').removeClass('checked').addClass('checked_left').hide()
                  $(That).parent().parent().find('.show').removeClass('show').addClass('show_left').show()
                  
                    // var oldValue=parseInt($(window.top.document).find(".count1").text()); //取出现在的值，并使用parseInt转为int类型数据
                        // oldValue--   //自加1
                        var count = 0;
                        var xcount = 0;
                        if (data.data) {
                            count = data.data.count;
                            xcount = data.data.xcount;
                        }

                        $(window.top.document).find("#total").html(count);
                         $(window.top.document).find("#total_xz").html(xcount);
                               $(window.top.document).find("#total_fxz").html(count - xcount);
                               $(window.top.document).find(".count2").html(count);
                        // $(window.top.document).find(".count1").text(oldValue)  //将增加后的值付给控件
                        // var oldValue=parseInt($(window.top.document).find(".count2").text()); //取出现在的值，并使用parseInt转为int类型数据
                        // oldValue--  //自加1
                        // $(window.top.document).find(".count2").text(oldValue)  //将增加后的值付给控件
                }else{
                      // alert('删除失败 !');
                    }
              },'json');
              $(".clone_style").remove()
            }
        });

	});

   })

   function open(myurl,tit,w,h){
    var dg = $.dialog({
    	id: 'mydiv',
    	lock: true,
    	width : w,
    	height : h,
    	title : tit,
    	cache:true,
    	min:true,
    	resize:true,
    extendDrag:true,
    	content: 'url:'+ myurl
    	});
    	dg.ShowDialog();
    }
	function R_alert(msg) {
	    close();
          // window.location.href = '/index.php/Home/Choose';
	    $.dialog.tips(msg,2,'/Public/images/loading.gif');
	   $('#right_bt').attr("src",$('#right_bt').attr("src"))
	}

     function close() {
      $.dialog.list['mydiv'].close()
   }
 </script>
</head>
<body style="background:rgba(236, 231, 231, 0.17) none repeat scroll 0% 0%;margin:3px;">
<div class="mainbody">
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(in_array(($vo["id"]), is_array($_SESSION['testid'])?$_SESSION['testid']:explode(',',$_SESSION['testid']))): ?><div class="mainlistg">
     <div class="zj_btn">
       <input type="button" class="subtract"  value="移除">
       <input type="button" class="yuliansubtract" value="预览" onclick="parent.open('/index.php/Home/Choose/alert_edit/id/<?php echo ($vo["id"]); ?>','移除预览',900,600);">
       <input style="display:none" type="button" class="yulianadd" value="预览" onclick="parent.open('/index.php/Home/Choose/alert_preview/id/<?php echo ($vo["id"]); ?>','添加预览',900,600);">
     </div>
     <?php if($vo["questions"] == 填空题): ?><img class="show biao" src="/Public/images/tianb.png"/>
	   		<img style="dispaly:none"class="checked biao" src="/Public/images/tiangray.png"/>
   		<?php elseif($vo["questions"] == 选择题): ?> 
	   		<img class="show biao" src="/Public/images/xuan.png"/>
	   		<img style="dispaly:none"class="checked biao" src="/Public/images/xuangray.png"/>
   		<?php else: ?>
   			<img class="show biao" src="/Public/images/jian.png"/>
   			<img style="dispaly:none" class="checked biao" src="/Public/images/jiangray.png"/><?php endif; ?>
     
     <input type="hidden" name="id" class="id" value="<?php echo ($vo["id"]); ?>"/>
     <div>
         <iframe  src="/Word/doc/<?php echo ($_SESSION['uid']); ?>/<?php echo (date('Ymd',$vo["wtime"])); ?>/<?php echo ($vo["test"]); ?>.htm" frameborder="0" height="90" width="100%" scrolling="no"></iframe>

     </div>
 </div>
		
<?php else: ?>
	<div class="mainlist">
		
      <div class="zj_btn" >
        <input type="button" class="add" value="添加">
        <input type="button" class="yuliansubtract" value="预览" onclick="parent.open('/index.php/Home/Choose/alert_edit/id/<?php echo ($vo["id"]); ?>','移除预览',900,600);" style="display:none">
        <input type="button" class="yulianadd" value="预览" onclick="parent.open('/index.php/Home/Choose/alert_preview/id/<?php echo ($vo["id"]); ?>','添加预览',900,600);">
      </div>


   		<?php if($vo["questions"] == 填空题): ?><img class="show_left biao" src="/Public/images/tianb.png"/>
	   		<img style="dispaly:none"class="checked_left biao" src="/Public/images/tiangray.png"/>
   		<?php elseif($vo["questions"] == 选择题): ?> 
	   		<img class="show_left biao" src="/Public/images/xuan.png"/>
	   		<img style="dispaly:none"class="checked_left biao" src="/Public/images/xuangray.png"/>
   		<?php else: ?>
   			<img class="show_left biao" src="/Public/images/jian.png"/>
   			<img style="dispaly:none" class="checked_left biao" src="/Public/images/jiangray.png"/><?php endif; ?>
   		<input type="hidden" name="id" class="id" value="<?php echo ($vo["id"]); ?>"/>
   		
       <div>
           <iframe  src="/Word/doc/<?php echo ($_SESSION['uid']); ?>/<?php echo (date('Ymd',$vo["wtime"])); ?>/<?php echo ($vo["test"]); ?>.htm" frameborder="0" height="90" width="100%" scrolling="no"></iframe>

       </div>
     </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
<!-- <div class="pagnation" id="pagnation" style="border:none;"><?php echo ($page); ?></div>

</div> -->

<div style="text-align: center" class="page_hui">
  <?php echo ($page); ?>
</div>

<script>
	$(function(){
		 $(document).click(function (event){ 
		 	var window_iframe=$(window.parent.document.body)

						// 组卷左上角的下拉
			window_iframe.find('#show1').hide(300);
			window_iframe.find('#zhujiu_set').attr("SH_HUI",true)
			window_iframe.find('#zhujiu_set').css({background : "url('/Public/images/index/z_dot1.png') no-repeat scroll right center,url('/Public/images/zhujiu_logo.png') no-repeat scroll left center"})

			// 组卷模块
			window_iframe.find("#zhujiun_xuti").attr("SH_XUANTI",true);
			window_iframe.find(".chem_list").slideUp(300);

			window_iframe.find('.nr_green span').attr("SH_NAME",true)
			window_iframe.find('.set').slideUp(300);
			window_iframe.find('.nr_green span').css({background : "url('/Public/images/index/name_up.png') no-repeat right center"})


			// 题型 难度   出题人 收起
			window_iframe.find("#subnav .mainlevel").each(function(){
				$(this).attr("SH_XUANZHE", true)
				$(this).find("ul").slideUp(300)
			})



				if (window_iframe.find("#zhuju_lian_input").val() != "") {
					window_iframe.find(".zhuju_header").html(window_iframe.find("#zhuju_lian_input").val())
						
				} else {
					window_iframe.find(".zhuju_header").html("来源")
				}

				if (window_iframe.find(".zhuju_header").html() !== "来源") {
					window_iframe.find(".zhuju_header").addClass("active")
				} else {
					window_iframe.find(".zhuju_header").removeClass("active")
				}
				window_iframe.find(".zhuju_header").show()
				window_iframe.find("#zhuju_lian_input").hide()
			





		});
	})
</script>
</body>
</html>