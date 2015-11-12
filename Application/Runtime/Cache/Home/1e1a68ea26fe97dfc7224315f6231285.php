<?php if (!defined('THINK_PATH')) exit(); $ip = GetHostByName($_SERVER['SERVER_NAME']); require_once("http://".$ip.":8080/JavaBridge/java/Java.inc"); $PageOfficeCtrl = new Java("com.zhuozhengsoft.pageoffice.PageOfficeCtrlPHP"); $PageOfficeCtrl->setServerPage("http://".$ip.":8080/JavaBridge/poserver.zz"); java_set_file_encoding("utf8");$doc = new Java("com.zhuozhengsoft.pageoffice.wordwriter.WordDocument");$dataRegion1 = $doc->openDataRegion("PO_question"); $dataRegion1->setEditing(true); $dataRegion1->setValue(""); $dataRegion1->setSubmitAsFile(true); $dataRegion2 = $doc->openDataRegion("PO_answer"); $dataRegion2->setEditing(true); $dataRegion2->setValue(""); $dataRegion2->setSubmitAsFile(true); $dataRegion3 = $doc->openDataRegion("PO_jiexi"); $dataRegion3->setEditing(true); $dataRegion3->setValue(""); $dataRegion3->setSubmitAsFile(true); $PageOfficeCtrl->setWriter($doc); $PageOfficeCtrl->addCustomToolButton("uTeach编题区", "Save", 9); $PageOfficeCtrl->setSaveDataPage("/Word/SaveData.php?id=".$_SESSION['uid']); $PageOfficeCtrl->setMenubar(false); $PageOfficeCtrl->setTitlebar(false); $PageOfficeCtrl->UserAgent = $_SERVER['HTTP_USER_AGENT'];$OpenMode = new Java("com.zhuozhengsoft.pageoffice.OpenModeType"); $PageOfficeCtrl->webOpen($questionDocPath, $OpenMode->docSubmitForm, "张三"); ?>


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
<!-- <link href="/Public/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
<link href="/Public/css/bootstrap.css" rel="stylesheet" type="text/css" /> -->




<script language="javascript" type="text/javascript">
var saveUrl="<?php echo U('Write/write','','');?>";
var url="<?php echo U('Write/index');?>";

$(document).ready(function() {
  $(".bt_warp").niceScroll({cursorborder:"",cursorcolor:"#3a3a3a",boxzoom:false}); // First scrollable DIV
  $("#sroll_box").niceScroll({cursorborder:"",cursorcolor:"#3a3a3a",boxzoom:false}); // First scrollable DIV
  $("#textarea").focusout(function(){
  	$("#remarks").val($(this).html())
  })
 });
    </script>

<style>
/* 预览弹出屿*/       
        .white_content { display: block; position: fixed; top: 35%; left:34%; width:517px;height:197px; background-color: white; z-index:1002; overflow: auto;-moz-border-radius:15px;-webkit-border-radius:15px;border-radius:15px;}
		.delete{ background:url(/Public/images/del_icon.png) no-repeat 47px center; padding-left:164px; padding-top:45px; color:#000;} 
		.delete h2{ font-size:21px; font-weight:normal;}
		.white_content .btn{ float:right; padding-top:25px;}
		.white_content .btn a{ margin-right:33px; color:#309dff; font-size:21px;}
		.white_content1{ display: none; position: absolute; top:15%; left:25%; width:900px;height:600px; background-color: white; z-index:1002; overflow: auto;-moz-border-radius:2px;-webkit-border-radius:2px;border-radius:2px;z-index: 9999}
		.white_content1 h2{ height:44px; line-height:44px; background:#309dff;-moz-border-radius:2px;-webkit-border-radius:2px;border-radius:2px; font-size:16px; color:#fff; padding-left:25px;}
		.white_content1 .con1{ border-bottom:1px solid #309dff; height:41px; line-height:41px;}
		.white_content1 .con1 span{ padding:0 25px; color:#309dff;}
		.white_content1 .con1 span.fr{ float:right;}
		.white_content1 .con2{ padding:30px 0px; margin:0 30px;width: 580px;}
		.white_content1 .con3{ margin:0 30px; padding:20px 0; font-size:14px;border-top:1px solid #dedede; }

		/* .white_content1 .con3 p span{color: #000000}*/
.white_content1 .con3 div{color:#309dff;} 
		 .white_content1 .con3 div span{ color:#000000;}
		 .white_content1 .con3 div p{ padding: 0;margin: 0;color: #000000;display: inline-block;}
		.white_content1 .con4{ float:right; height:42px; line-height:42px;margin-right:25px;}
		.white_content1 .con4 input{font-size: 14px;-moz-border-radius:5px;-webkit-border-radius:5px;border-radius:5px;border: none;padding: 3px 15px;background: none;color: #349fff;cursor: pointer;margin: 0}
		.white_content1 .con4 input:hover{ background:#309dff; color:#fff;}
		#sroll_box{height: 470px;border-bottom:1px solid #309dff; }

		#ueditor_0{width:580px! important;}
		#ueditor_1{width:580px! important;}

        #PageOfficeCtrl1{display: none}
    </style> 
<body>

<form id="form1" action="" method="post" >
    <table cellpadding="0" cellspacing="0" width="100%">
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


            <td valign="top" id="index_right" style="">
                <div class="no"></div>
                 <script type="text/javascript">
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
    </script>

	<div class="bt_tit" >
		<div class="bt_left">
			<div class="bt_box">
				<span class="tx_style tx_text" id='bt_tx'><?php if($date["questions"] == '' ): ?>题型<?php else: echo ($date["questions"]); endif; ?></span>
				
				<div class="tx_list tx_list_event" id='bt_tx_list'>
					<a class="questions" href="javascript:void(0);">选择题</a>
					<a class="questions" href="javascript:void(0);">填空题</a>
					<a class="questions" href="javascript:void(0);">简答题</a>
				</div>
				<input type="hidden" id="questions" name='questions' value="<?php echo ($date["questions"]); ?>"/>
			</div>	
			<div class="bt_box">
					<span class="tx_style tx_text" id="bt_nd">难度</span>
					
					<div class="tx_list tx_list_event"  id='bt_nd_list'>
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
			<span class="name_icon"><?php echo (session('username')); ?></span> 
		    <ul class="set">
					<li><a href="<?php echo U('User/index');?>">设置</a></li>
					<li><a href="<?php echo U('Login/logout');?>" style="border:none">注销</a></li>
			</ul>
		</div>  		
	</div>
	




                <div style="position:relative;text-align: center;" id='right_bt' class="write_scroll">
                    <div class="no_main"></div>
                <?php echo $PageOfficeCtrl->getDocumentView("PageOfficeCtrl1") ?>


                    <script>
                        document.getElementById("PageOfficeCtrl1").style.height = "90%";
                        document.getElementById("PageOfficeCtrl1").style.width = "100%";
                        function BeforeDocumentSaved() {
                            //$(".save_btn").click();

                            //document.getElementById("PageOfficeCtrl1").Alert("BeforeDocumentSaved事件：文件就要开始保存了.");
                            //return true;
                        }
                        function AfterDocumentSaved(IsSaved) {
                            if (IsSaved) {
                                document.getElementById("PageOfficeCtrl1").Alert("AfterDocumentSaved事件：文件保存成功了.");
                            }
                        }
                    </script>


                    <div class="bt_warp" style="padding-bottom:53px;">

                        <ul class="btn_bc">
                            <li><input type="button" value="保存" class="add_save" /></li>
                            <li class="preview"><a class="temp_look" href="javascript:void(0);">预览 </a></li>
                        </ul>
                    </div>
            </td>
        </tr>
    </table>
</form>
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
<div id="save_bt" class="popu_box" style="background-color: rgb(221, 235, 249);">
    <div class="img_icon img_save"></div>
    <div class="popu_right">
        <p class='popu_text'>您是否确认保存此题？</p>
        <div class="popu_btn"><a href="javascript:void(0);" class="cancel_btn">取消</a><a href="javascript:void(0);" class="save_btn">保存</a></div>
    </div>
</div>

<!-- 预览弹窗 -->
<div id="mask"></div>
<div id="light1" class="white_content1" style="background-color: rgb(221, 235, 249);">
    <h2></h2>
    <div class="con1">
        <span >来源</span>
    </div>
    <div id="sroll_box">
        <div class="con2"></div>
        <div class="con3"></div>
    </div>
    <div class="con4">
        <input type="button" class="close" value="关闭"/>
        <input type="button" id="save_show"value="保存"/>
    </div>
</div>



<script type="text/javascript">



    // }

    function Save() {
        //alert("222222");
        //document.getElementById("PageOfficeCtrl1").WebSaveAsHTML();
    }
</script>
</body>
</html>