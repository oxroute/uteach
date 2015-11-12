<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>指南树</title>
<link rel="stylesheet" type="text/css" href="/Public/css/slick.css"/>
<link rel="stylesheet" type="text/css" href="/Public/css/style.css" />
<link rel="stylesheet" type="text/css" href="/Public/css/layout.css"/>
<link rel="stylesheet" type="text/css" href="/Public/css/common.css"/>
<link rel="stylesheet" type="text/css" href="/Public/css/xlmenu.css"/>
<link rel="stylesheet" type="text/css" href="/Public/css/popstyle.css"/>
<script type="text/javascript">
  var imgPath = '/Public/';
</script>
<script src="/Public/js/jquery-1.4.2.js" type="text/javascript"></script>

<script src="/Public/js/jquery.backgroundpos.js" type="text/javascript"></script>
<!-- <script src="/Public/js/menu.js" type="text/javascript"></script> -->
<script src="/Public/js/my.js" type="text/javascript"></script>
<script src="/Public/js/jquery-1.11.0.min.js"></script>
<script src="/Public/js/jquery.easing.min.js" type="text/javascript"></script> 
<script src="/Public/js/jquery.nicescroll.min.js"></script>
<script src="/Public/js/wCheck.min.js"></script>
<script src="/Public/js/choose.js"></script>
<script type="text/javascript" src="/Public/js/lhgdialog/lhgdialog.min.js?self=true&skin=igreen"></script>
<script src="/Public/js/zhujuan.js"></script>

<script type="text/javascript">
var folderUrl='<?php echo U("Volume/addFolder","","");?>';
var eFolderUrl='<?php echo U("Volume/editFolder","","");?>';
var fileUrl='<?php echo U("Volume/addFile","","");?>';
var dfileUrl='<?php echo U("Volume/delFile","","");?>';
var fileNo="<?php echo U('Volume/fileNo','','');?>";
var url="<?php echo U('Choose/show');?>";
//lhgdialog 弹窗js
function open(myurl,tit,w,h){
var dg = $.dialog({
	id: 'mydiv',
	lock: true,
	width : w,
	background:'#fff',
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
    $.dialog.tips(msg,"","loading.gif");
    frames['main'].location.reload();
}

function close() {
  $.dialog.list['mydiv'].close()
}


</script>
</head>
<body>
<div class="header" id="XX">
        <div class="head_l">
           <span id="zhujiu_set" SH_HUI="true">会考</span>
        </div>

        <div id="show1" >
          <div class="show2" style="width:412px">
            <i><img src="/Public/images/index/dot1.png" width="24" height="13" /></i>
              <ul class="clear">
                <li><a href="<?php echo U('Write/index');?>"><img src="/Public/images/index/icon1_small.png" width="52" height="52" /><span>编题</span></a></li>
                <li><a href="<?php echo U('Volume/index');?>"><img src="/Public/images/index/icon2_small.png" width="52" height="52" /><span>会考</span></a></li>
                <li><a href="<?php echo U('User/index');?>"><img src="/Public/images/index/icon3_small.png" width="52" height="52" /><span>设置</span></a></li>
                <li><a href="<?php echo U('Index/index');?>"  class="back_index"><img src="/Public/images/index/icon4_small.png" width="52" height="52" /><span>首页</span></a></li>
              </ul>
          </div>
        </div>

         <div class="head_m"  style=" padding-left: 55px;">
        	<input type="hidden" value="<?php echo ($_GET['Folder_top_id']); ?>" id="Folder_top_id">
              <ul>
                  <li class="save" id="folder"></li>
                  <li class="addc" onclick="parent.open('/index.php/Home/Volume/install','试卷设置',700,680);"></li>
                  <li class="down"></li>
              	  <li class="delete" style="margin-right:0;"></li>
              </ul>
        </div>

                  <div class="head_r" style="margin-top:38px;">
                <div class="nr_green" style=" float:right;margin-top: -29px;">
               
                  <img src="/Public/images/toux.gif" />
                  <span SH_NAME="true"><?php echo (session('username')); ?></span>
                   <ul class="set">
                            <li><a href="<?php echo U('User/index');?>">设置</a></li>
                            <li><a href="<?php echo U('Login/logout');?>" style="border:none">注销</a></li>
                    </ul>
                </div>
            </div>


            
</div>
<div class="shadow"></div>
<div class="clear"></div>


<div class="zujiu_srcoll" >

   <div class="title"><img src="/Public/images/jt.png" /><a href="javascript:history.go(-1)">返回</a><?php echo ($name); ?></div>
<!--     <div class="contain12">
      <ul class="clear_f">
      		<?php if(is_array($folder)): $i = 0; $__LIST__ = $folder;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="document"><div class="doctu"><a href="javascript:void(0);"><?php echo (count(getnum($vo["fileId"]))); ?></a></div>
      		<p><?php echo ($vo["name"]); ?></p>
      		<input type="hidden" name="id" class="fid" value="<?php echo ($vo["id"]); ?>" />
      		<input type="hidden" name="type" class="type_f" value="<?php echo ($vo["type"]); ?>" /></li><?php endforeach; endif; else: echo "" ;endif; ?>
            
            <?php if(is_array($file)): $i = 0; $__LIST__ = $file;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
              <img src="/Public/images/12.gif" class="openlogin"/>
              <center class="wen_text"><?php echo ($vo["header"]); ?></center><input type="hidden" name="id" class="fid" value="<?php echo ($vo["id"]); ?>" />
              <center class="wen_timer"><?php echo (date("Y-m-d H:i:s",$vo["crtime"])); ?></center>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
    </div> -->
    <div id="fixed_bag" class="clear_f" style="border:none">
    	<?php if(is_array($folder)): $i = 0; $__LIST__ = $folder;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="fixed_bag_pic">
         	 <a href="javascript:void(0);" class="pic_icon"><?php echo getNum($vo['id'], $vo['fileid']);?></a>
         	 <input type="hidden" name="id" class="id" value="<?php echo ($vo["id"]); ?>" />
      		 <input type="hidden" name="type" class="type" value="<?php echo ($vo["type"]); ?>" /></li>
         	 <p class="fixed_bag_text"><?php echo ($vo["name"]); ?></p>
        	</div><?php endforeach; endif; else: echo "" ;endif; ?>
		 <?php if(is_array($file)): $i = 0; $__LIST__ = $file;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="fixed_bag_pic">
              <img src="/Public/images/12.gif" class="openlogin"/>
              <center class="wen_text"><?php echo ($vo["header"]); ?></center>
              <input type="hidden" name="id" class="id" value="<?php echo ($vo["id"]); ?>" />
              <center class="wen_timer"><?php echo (date("Y-m-d H:i:s",$vo["crtime"])); ?></center>
          </div><?php endforeach; endif; else: echo "" ;endif; ?>
		
    </div>
    
    
    
    
    
    
</div>

<div class="clear"></div>

<div id="foot" style="position:fixed; ">
<ul>
      <li class="logo_f">uTeach</li>
      <li class="nav_f"><a href="<?php echo U('Volume/index');?>"  style="color:#a5dba7">会考</a></li>
      <?php echo dirs();?>
</ul>

</div>
<div id="mask"></div>
<div class="delete_del">
    <div class="img_icon img_delete"></div>
  <div class="delete_del_content">
          <div class="popu_text">
          </div>

        <div class="delete_del_opt">
              <a href="javascript:void(0);" class="delete_del_yes">删除</a>
              <a href="javascript:void(0);" class="delete_del_no">取消</a>
        </div>
  </div>
</div>

</body>

<script>
  $(function(){
       var sH=$(window).height()
      var sW=$(window).width()

    var fidex_height_all=$(".header").height()+$("#foot").outerHeight(true)
    $(".zujiu_srcoll").height(sH-fidex_height_all)
    var nice = $(".zujiu_srcoll").niceScroll({cursorborder:"",cursorcolor:"#3a3a3a",boxzoom:false});  // The document page (body)

})
</script>
</html>