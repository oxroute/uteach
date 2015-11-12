<?php
	//******************************卓正PageOffice组件的使用*******************************
	$ip = GetHostByName($_SERVER['SERVER_NAME']); //获取本机IP
	require_once("http://".$ip.":8080/JavaBridge/java/Java.inc");//此行必须
    $PageOfficeCtrl = new Java("com.zhuozhengsoft.pageoffice.PageOfficeCtrlPHP");//此行必须
    $PageOfficeCtrl->setServerPage("http://".$ip.":8080/JavaBridge/poserver.zz");//此行必须，设置服务器页面

java_set_file_encoding("utf-8");//设置中文编码，若涉及到中文必须设置中文编码

$doc = new Java("com.zhuozhengsoft.pageoffice.wordwriter.WordDocument");//声明WordDocument变量
//打开数据区域，openDataRegion方法的参数代表Word文档中的书签名称
$dataRegion1 = $doc->openDataRegion("PO_question");
//设置DataRegion的可编辑性
$dataRegion1->setEditing(true);
//$dataRegion1->setSubmitAsFile(true);
//为DataRegion赋值,此处的值可在页面中打开Word文档后自己进行修改
$dataRegion1->setValue("");

$dataRegion2 = $doc->openDataRegion("PO_answer");
//$dataRegion2->setSubmitAsFile(true);
$dataRegion2->setEditing(true);
$dataRegion2->setValue("");

$dataRegion3 = $doc->openDataRegion("PO_jiexi");
$dataRegion3->setEditing(true);
//$dataRegion3->setSubmitAsFile(true);
$dataRegion3->setValue("");

$PageOfficeCtrl->setWriter($doc);

//添加自定义按钮
$PageOfficeCtrl->addCustomToolButton("保存","Save",1);
//设置保存页面
$PageOfficeCtrl->setSaveFilePage("/uteach/SaveFile.php");
//打开excel文档
$PageOfficeCtrl->UserAgent = $_SERVER['HTTP_USER_AGENT'];//若使用谷歌浏览器此行代码必须有，其他浏览器此行代码可不加
$OpenMode = new Java("com.zhuozhengsoft.pageoffice.OpenModeType");

//关闭菜单栏
$PageOfficeCtrl->setMenubar(false);
$PageOfficeCtrl->setTitlebar(false);
//关闭Office工具栏
$PageOfficeCtrl->setOfficeToolbars(false);
$PageOfficeCtrl->webOpen("/uteach/q.doc", $OpenMode->docSubmitForm, $Think.session.username);//此行必须
//
?>
<include file="Public:header"/>
<!-- <link href="__PUBLIC__/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/css/bootstrap.css" rel="stylesheet" type="text/css" /> -->




<script language="javascript" type="text/javascript">
var saveUrl="{:U('Write/write','','')}";
var url="{:U('Write/index')}";

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
		.delete{ background:url(__PUBLIC__/images/del_icon.png) no-repeat 47px center; padding-left:164px; padding-top:45px; color:#000;} 
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
    </style> 
<body>

<form  action="" method="post" >
    <table cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <include file="Public:left"/>
            <td valign="top" id="index_right" style="">

                <include file="Public:right_one"/>
                <div style="position:relative;text-align: center;" id='right_bt' class="write_scroll">

                <?php echo $PageOfficeCtrl->getDocumentView("PageOfficeCtrl1") ?>

                    <script>
                        document.getElementById("PageOfficeCtrl1").style.height = "90%";
                        document.getElementById("PageOfficeCtrl1").style.width = "90%";
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
<div id="save_bt" class="popu_box">
    <div class="img_icon img_save"></div>
    <div class="popu_right">
        <p class='popu_text'>您是否确认保存此题？</p>
        <div class="popu_btn"><a href="javascript:void(0);" class="cancel_btn">取消</a><a href="javascript:void(0);" class="save_btn">保存</a></div>
    </div>
</div>

<!-- 预览弹窗 -->
<div id="mask"></div>
<div id="light1" class="white_content1">
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



<js href="__PUBLIC__/ueditor/ueditor.config.js" />
<js href="__PUBLIC__/ueditor/ueditor.all.min.js" />

<js file="__PUBLIC__/ueditor/kityformula-plugin/addKityFormulaDialog.js"/>
<js file="__PUBLIC__/ueditor/kityformula-plugin/getKfContent.js"/>
<js file="__PUBLIC__/ueditor/kityformula-plugin/defaultFilterFix.js"/>

<script type="text/javascript">


    window.UEDITOR_HOME_URL = '__PUBLIC__/ueditor';
    // window.onload = function() {
    window.UEDITOR_CONFIG.serverUrl = "{:U('Ueditor/index')}";
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
    // }

    function Save() {
        document.getElementById("PageOfficeCtrl1").WebSave();
    }
</script>
</body>
</html>