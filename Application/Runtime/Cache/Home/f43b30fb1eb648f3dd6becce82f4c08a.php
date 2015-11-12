<?php if (!defined('THINK_PATH')) exit();?>﻿<?php
 $ip = GetHostByName($_SERVER['SERVER_NAME']); require_once("http://".$ip.":8080/JavaBridge/java/Java.inc"); $PageOfficeCtrl = new Java("com.zhuozhengsoft.pageoffice.PageOfficeCtrlPHP"); $PageOfficeCtrl->setServerPage("http://".$ip.":8080/JavaBridge/poserver.zz"); java_set_file_encoding("utf8");$doc = new Java("com.zhuozhengsoft.pageoffice.wordwriter.WordDocument");$dataRegion1 = $doc->openDataRegion("PO_question"); $dataRegion1->setEditing(true); $dataRegion1->setValue("[word]/Word/doc/".$_SESSION['uid']."/".date('Ymd',$date['wtime'])."/".$date['test'].".doc[/word]\r\n"); $dataRegion1->setSubmitAsFile(true); $dataRegion2 = $doc->openDataRegion("PO_answer"); $dataRegion2->setEditing(true); $dataRegion2->setValue("[word]/Word/doc/".$_SESSION['uid']."/".date('Ymd',$date['wtime'])."/".$date['answer'].".doc[/word]\r\n"); $dataRegion2->setSubmitAsFile(true); $dataRegion3 = $doc->openDataRegion("PO_jiexi"); $dataRegion3->setEditing(true); $dataRegion3->setValue("[word]/Word/doc/".$_SESSION['uid']."/".date('Ymd',$date['wtime'])."/".$date['analytical'].".doc[/word]\r\n"); $dataRegion3->setSubmitAsFile(true); $PageOfficeCtrl->setWriter($doc); $PageOfficeCtrl->addCustomToolButton("uTeach编题区", "Save", 9); $PageOfficeCtrl->setSaveDataPage("/Word/SaveData.php?id=".$_SESSION['uid']); $PageOfficeCtrl->setMenubar(false); $PageOfficeCtrl->setTitlebar(false); $PageOfficeCtrl->UserAgent = $_SERVER['HTTP_USER_AGENT'];$OpenMode = new Java("com.zhuozhengsoft.pageoffice.OpenModeType"); $PageOfficeCtrl->webOpen($questionDocPath, $OpenMode->docSubmitForm, "张三"); ?>

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
<script language="javascript" type="text/javascript">
var updateUrl="<?php echo U('Public/update','','');?>";
var url="<?php echo U('Write/index');?>";
var saveUrl="<?php echo U('Write/write','','');?>";
</script> 
<style> 
        .black_overlay{ display: none; position: fixed; top: 0%; left: 0%; width: 100%; height: 100%; background-color: black; z-index:1001; -moz-opacity: 0.8; opacity:.80; filter: alpha(opacity=88); } 
        .white_content { display: none; position: fixed; top: 35%; left:34%; width:517px;height:197px; background-color: white; z-index:1002; overflow: auto;-moz-border-radius:15px;-webkit-border-radius:15px;border-radius:15px;overflow: hidden;}
		.delete{ background:url(/Public/images/del_icon.png) no-repeat 47px center; padding-left:164px; padding-top:45px; color:#000;} 
		.delete h2{ font-size:21px; font-weight:normal;}
		.white_content .btn{ float:right; padding-top:25px;}
		.white_content .btn a{ margin-right:33px; color:#309dff; font-size:21px;}
		.white_content1{ display: none; position: absolute; top:15%; left:25%; width:900px;height:600px;background-color: white;z-index: 99999;-moz-border-radius:2px;-webkit-border-radius:2px;border-radius:2px;overflow: hidden}
		.white_content1 h2{ height:44px; line-height:44px; background:#309dff;-moz-border-radius:2px;-webkit-border-radius:2px;border-radius:2px; font-size:14px; color:#fff; padding-left:25px;}
		.white_content1 .con1{ border-bottom:1px solid #309dff; height:41px; line-height:41px;}
		.white_content1 .con1 span{ padding:0 25px; color:#309dff;font-size: 12px;}
		.white_content1 .con1 span.fr{ float:right;}
		.white_content1 .con2{ padding:50px 0px; margin:0 30px;width: 580px}
		.white_content1 .con3{ margin:0 30px; padding:20px 0; font-size:14px;border-top:1px solid #dedede;}
			.white_content1 .con3 div{color:#309dff;} 
		 .white_content1 .con3 div span{ color:#000000;}
		 .white_content1 .con3 div p{ color:#000000;display: inline-block;}
		.white_content1 .con4{ float:right; height:42px; line-height:42px;margin-right:30px;}
		.white_content1 .con4 input{font-size: 14px;-moz-border-radius:5px;-webkit-border-radius:5px;border-radius:5px;border: none;padding:3px 15px;
      background:#ffffff;color: #349fff;cursor: pointer;margin: 0}
		.white_content1 .con4 input:hover{ background:#309dff; color:#fff;}

		#sroll_box{height: 470px;border-bottom:1px solid #309dff; }
#cke_test{display: block !important;}
#ueditor_0{width: 580px! important}
#ueditor_1{width: 580px! important}
    </style> 
   <script type="text/javascript">
   $(document).ready(function() {
    // var nice = $("html").niceScroll();  // The document page (body)
    $("#sroll_box").niceScroll({cursorborder:"",cursorcolor:"#3a3a3a",boxzoom:false}); // First scrollable DIV
    $("#right_bt").niceScroll({cursorborder:"",cursorcolor:"#3a3a3a",boxzoom:false}); // First scrollable DIV
	

        	$(function(){
			$(".questions").click(function() {
			 $('#questions').val($(this).text());
			})
			$(".difficulty").click(function() {
			 $('#difficulty').val($(this).text());
			})
			$(".test_people").click(function() {
			 $('#test_people').val($(this).text());
			})
			$(".source").click(function() {
			 $('#source').val($(this).text());
			})
			$(".subject").click(function() {
			 $('#kid').val($(this).find('b').text());
			})
			$(".zsid").click(function() {
			 $('#zsid').val($(this).find('span').text());
			})
			$(".zid").click(function() {
			 $('#zid').val($(this).find('span').text());
			})
			$(".fid").click(function() {
			 $('#fid').val($(".subject").find("span").eq(1).text());
			})
   		}); 


        	 // 填空题赋值
        	if($("#alter_ti").html()=="填空题")
        	{
        		var arr=$("#bi_daan_val").val().split("|")
        	    $.each(arr,function(i){
        	    	if (arr[i] === undefined||arr[i] == "") {
        	    	    arr.splice(i,1);
        	    	}
        	    })
        		var html=""
        		$(".ti_kong_input ul li").eq(0).find("input").val(arr[0])
        		$.each(arr,function(i){
        			if(i>0){
        				html+="<li><input type='text' value='"+arr[i]+"'><a class='ti_kong_cut_input' href='javascript:void(0);'>-</a></li>"
        			}
        		})
        		var obj=$(html)
        		$(".ti_kong_input ul").append(obj);
        	}

    
        	  $("#textarea").focusout(function(){
        	    	$("#remarks").val($(this).html())
        	    })

})

   </script>



</head>

<body style="overflow:hidden">
	<form  action="" method="post" >    
	 
		<table cellpadding="0" cellspacing="0" width="100%">
		<!--<input type="hidden" name="id" value="<?php echo ($date["id"]); ?>"/>-->
			<tr>
				<td width="267px;">
	<div class="index_left">
		<h1><span id="bt" SH="true">编题</span>
		</h1>
		<div id="show1">
			<div class="show2">
				<i><img src="/Public/images/index/dot1.png" width="24" height="13" /></i>
					<ul class="clear">
						<li><a href="<?php echo U('Write/index');?>"><img src="/Public/images/index/icon1_small.png" width="52" height="52" /><span>编题</span></a></li>
						<li><a href="<?php echo U('Volume/index');?>"><img src="/Public/images/index/icon2_small.png" width="52" height="52" /><span>会考</span></a></li>
						<li><a href="<?php echo U('User/index');?>"><img src="/Public/images/index/icon3_small.png" width="52" height="52" /><span>设置</span></a></li>
						<li><a href="<?php echo U('Index/index');?>"  class="back_index"><img src="/Public/images/index/icon4_small.png" width="52" height="52" /><span>首页</span></a></li>
					</ul>
			</div>
		</div>
			<?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><h2 class="subject"><b style="display:none;"><?php echo ($vo["id"]); ?></b><span class="chem_btn"  SH_CHEM="true"><?php echo ($vo["name"]); ?></span>
				<input type="hidden" name="kid" id="kid" value="<?php echo ($date["kid"]); ?>"/>
				<input type="hidden" name="fid" id="fid" value="<?php echo ($date["fid"]); ?>"/>
				<input type="hidden" name="zid" id="zid" value="<?php echo ($date["zid"]); ?>"/>
				<input type="hidden" id="zcontent" value="<?php echo ($zid); ?>"/><br/>
				<input type="hidden" name="zsid" id="zsid" value="<?php echo ($date["zsid"]); ?>"/>
				<input type="hidden" id="zscontent" value="<?php echo ($zsid); ?>"/><?php endforeach; endif; else: echo "" ;endif; ?>
				<ul class="chem_list">
					<?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvo): $mod = ($i % 2 );++$i;?><li><a class="fid"><span style="display:none;"><?php echo ($vvo["id"]); ?></span><?php echo ($vvo["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>        
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
	</div>
</td>
				
				<td width="100%" background="#eaeaea" valign="top" id="index_right">
	<div class="bt_tit" >
		<div class="bt_left">
			<div class="bt_box">
				<span class="tx_style tx_text" id='alter_ti'><?php if($date["questions"] == '' ): ?>题型<?php else: echo ($date["questions"]); endif; ?></span>
				
				<div class="tx_list tx_list_event" id='alter_ti_list'>
					<a class="questions" href="javascript:void(0);">选择题</a>
					<a class="questions" href="javascript:void(0);">填空题</a>
					<a class="questions" href="javascript:void(0);">简答题</a>
				</div>
				<input type="hidden" id="questions" name='questions' value="<?php echo ($date["questions"]); ?>"/>
			</div>	
			<div class="bt_box">
					<span class="tx_style tx_text" id="alter_nd"><?php if($date["difficulty"] == '' ): ?>难度<?php else: echo ($date["difficulty"]); endif; ?></span>
					
					<div class="tx_list tx_list_event"  id='alter_nd_list'>
						<a class="difficulty" href="javascript:void(0);">A</a>
						<a class="difficulty"href="javascript:void(0);">B</a>
						<a class="difficulty"href="javascript:void(0);">C</a>
					</div>
					
					
					<input type="hidden" id="difficulty" name='difficulty' value="<?php echo ($date["difficulty"]); ?>"/>
			</div>
			<span class="user_name_text"><?php echo (session('username')); ?><input type="hidden" id="test_people" name="test_people" value="<?php echo (session('username')); ?>"/></span>
			<div class="bt_lianyuan_btn"><a class="source" href="javascript:void(0);"><?php if($date["source"] == '' ): ?>来源<?php else: echo ($date["source"]); endif; ?></a></div>
			<input type="text" name="source" id="source" value="" class="bt_lianyuan" placeholder="来源"/>
		</div>
		<div class="name" style="top:23px;">
			<img src="/Public/images/index/logo.png" width="35" height="35" /> 
			<span class="name_icon" SH_NAME="true"><?php echo (session('username')); ?></span> 
		    <ul class="set">
					<li><a href="<?php echo U('User/index');?>">设置</a></li>
					<li><a href="<?php echo U('Login/logout');?>" style="border:none">注销</a></li>
			</ul>
		</div>  		
	</div>


						<div id="right_bt" style="overflow:hidden">
                            <?php echo $PageOfficeCtrl->getDocumentView("PageOfficeCtrl1") ?>


                            <script>
                                document.getElementById("PageOfficeCtrl1").style.height = "90%";
                                document.getElementById("PageOfficeCtrl1").style.width = "90%";

                            </script>


                        </div>
					<input type="hidden" id="bi_daan_val"  name='answer' value="<?php echo ($date["answer"]); ?>">
					<ul class="btn_bc">
						<li><input type="button" value="保存" class="update_save update_yes"/></li>
						<li class="preview"><a class="temp_look" href="javascript:void(0);">预览 </a></li>
					</ul>
				 
				</td>
			</tr>
		</table>

	</form>
	<div id="mask"></div>
		<div id="light1" class="white_content1">
		  <h2></h2>
		        <div class="con1">
		                <span>编号：<?php echo ($date["id"]); ?></span><span class="fr">来源：</span>
		        </div>
		        <div id="sroll_box">
		            <div class="con2"></div>
		            <div class="con3"></div>
		        </div>
		        	<div class="con4">
		        		<input type="button" class="close" value="关闭"/>
		        		<input type="button" class="update" value="保存"/>
		           </div>
		</div>
<!-- 错误提示 -->
<div id="mask1"></div>
<div id="tishi_bt1" class="popu_box1">
	<div class="img_icon img_ti"></div>
	<div class="popu_right">
		<p class='popu_text'>答案不能为空!</p>
		<div class="popu_btn"><a href="javascript:void(0);" class="popu_black">返回</a></div>
	</div>
</div>

<div id="mask"></div>
<div id="tishi_bt" class="popu_box">
	<div class="img_icon img_ti"></div>
	<div class="popu_right">
		<p class='popu_text'>题干内容不能为空!</p>
		<div class="popu_btn"><a href="javascript:void(0);" class="popu_black">返回</a></div>
	</div>
</div>	
<!-- 保存提示 -->
<div id="mask"></div>
<div id="save_bt" class="popu_box">
	<div class="img_icon img_save"></div>
	<div class="popu_right">
		<p class='popu_text'>您是否确认保存此题？</p>
		<div class="popu_btn"><a href="javascript:void(0);" class="cancel_btn">取消</a><a href="javascript:void(0);" class="update_yes">保存</a></div>
	</div>
</div>


<script type="text/javascript" src="/Public/ueditor/ueditor.config.js"></script>    
<script type="text/javascript" src="/Public/ueditor/ueditor.all.min.js"></script>

<script type="text/javascript" src="/Public/ueditor/kityformula-plugin/addKityFormulaDialog.js"></script>
<script type="text/javascript" src="/Public/ueditor/kityformula-plugin/getKfContent.js"></script>
<script type="text/javascript" src="/Public/ueditor/kityformula-plugin/defaultFilterFix.js"></script>

<script type="text/javascript">
	window.UEDITOR_HOME_URL = '/Public/ueditor';
	  window.UEDITOR_CONFIG.serverUrl = "<?php echo U('Ueditor/index');?>";
	  var ue1 = UE.getEditor('content', {
	  	toolbars: [
	      	['source', 'undo', 'redo', 'bold', 'italic', 'underline', 'superscript', 'subscript', 'indent', 'spechars', 'cleardoc', 'fontsize', 'justifyleft', 'justifyright', 'justifycenter', 'justifyjustify', 'insertorderedlist', 'insertunorderedlist', 'imagenone', 'imageleft' ,'imageright' ,'simpleupload', 'wordimage', 'kityformula', 'preview'],
	  	],
	  	elementPathEnabled : false,
	  	wordCount : false
	  });

	  var ue2 = UE.getEditor('analytical', {
	  	toolbars: [
	      	['source', 'undo', 'redo', 'bold', 'italic', 'underline', 'superscript', 'subscript', 'indent', 'spechars', 'cleardoc', 'fontsize', 'justifyleft', 'justifyright', 'justifycenter', 'justifyjustify', 'insertorderedlist', 'insertunorderedlist', 'imagenone', 'imageleft' ,'imageright' ,'simpleupload', 'wordimage', 'kityformula', 'preview'],
	  	],
	  	elementPathEnabled : false,
	  	wordCount : false
	  });
</script>

</body>
</html>