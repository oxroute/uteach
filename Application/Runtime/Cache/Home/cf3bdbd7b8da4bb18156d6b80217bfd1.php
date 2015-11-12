<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=0.95, user-scalable=no" />
<title>指南树</title>
<link rel="stylesheet" type="text/css" href="/Public/css/style.css" /><!-- 必须 -->
<link rel="stylesheet" type="text/css" href="/Public/css/popstyle.css"/><!-- 弹窗样式 -->
<link rel="stylesheet" type="text/css" href="/Public/css/xlmenu.css"/><!-- tou -->
<link rel="stylesheet" type="text/css" href="/Public/css/layout.css"/><!-- 必须 -->
<script type="text/javascript">
  var imgPath = '/Public/';
</script>
<script src="/Public/js/jquery-1.8.3.min.js"></script>
<script src="/Public/js/jquery.easing.min.js" type="text/javascript"></script> 
<script language="javascript" src="/Public/js/custom.js"></script> 
<script src="/Public/js/choose.js" type="text/javascript"></script>
<script src="/Public/js/jquery.nicescroll.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/Public/js/lhgdialog/lhgdialog.min.js?self=true&skin=igreen"></script>

<script>

var dfileUrl='<?php echo U("Volume/delFile","","");?>';
//lhgdialog 弹窗js
		function open(myurl,tit,w,h){
				var dg = $.dialog({
					id: 'mydiv',
					lock: true,
					background:'#fff',
					title : tit,
					cache:true,
					min:false,
					resize:true,
					extendDrag:true,
					content: 'url:'+ myurl ,
					height:h,
					width:w,
					});
					dg.ShowDialog();
				} 
				function R_alert(msg) {
				    close();
				    $.dialog.tips(msg,'',"loading.gif");
				    top.location.reload();
				}
 				function close() {
				  $.dialog.list['mydiv'].close()
				} 

			

</script>
<style>
.now_fengsu{display: inline-block;min-width: 20px;height: 16px;padding: 0 4px;text-align: center;}

#show1{position: absolute;top:45px;left: 110px;display: none;z-index:10000;padding-top: 13px}
#show1 .show2{padding-top: 13px;background:#fff; border:1px solid #eee;-moz-border-radius:5px;-webkit-border-radius:5px;border-radius:5px;width: 412px;padding: 12px;
box-shadow: 1px 1px 6px #606060;
webkit-box-shadow:1px 1px 6px #606060;
-moz-box-shadow:1px 1px 6px #606060;}



#show1 ul{display: block;height:100%;border:1px solid #eee;-moz-border-radius:5px;-webkit-border-radius:5px;border-radius:5px;padding: 10px 8px 10px 8px}
#show1 ul li{float: left;margin: 10px 0;}
#show1 ul li a{width: 92px;display: block;}
#show1 ul li a img{display: block;margin: 0 auto;-moz-border-radius:30px;-webkit-border-radius:30px;border-radius:30px;}
#show1 ul li a span{display: block;text-align: center;font-size: 16px;line-height: 38px;color: #000000}
#show1 i{position:absolute; top:2px; left:25px;}
#show1 ul li a:hover img{box-shadow: 1px 1px 6px #606060;
webkit-box-shadow:1px 1px 6px #606060;
-moz-box-shadow:1px 1px 6px #606060;}

</style>
</head>
<body>
<input type="hidden" id="all_id">
<div class="header" id="XX">
            <div class="head_l">
             <span id="zhujiu_set" SH_HUI="true">会考</span>
            </div>

  <div id="show1" >
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



   <div class="head_m">
	  <ul>
		  <li class="delete_seave"></li>
		  <li class="delete_down"><a href="<?php echo U('down',array('id'=>$_GET['epaperId']));?>" style="display:block;width:100%;height:100%;"></a>
		  <li class="dt_car"></li>
		  <li class="delete_shijiu" style="margin-right:0;"></li>
	  </ul>
  </div>
<script>
var increasesUrl="<?php echo U('Choose/index','','');?>";
$(function(){

	 var timer=setInterval(function(){
	 	var epaperId = $('#epaperId').val()
		$.get('/index.php/Home/Choose/epaper',function(data){
			if('data==1'){
				/*location.href=showEpaper+'?epaperId='+epaperId;*/
			}else{
				alert('删除失败 !');
			}
		},'json') 
		
   	console.log("记时")
   },6000)
	$('.increases').on('click',function(){
		clearInterval(timer)
		 var epaperId = $('#epaperId').val()
		$.post('/index.php/Home/Choose/epaper',function(data){
			if('data==1'){
				location.href=increasesUrl+'?epaperId='+epaperId;
			}else{
				alert('删除失败 !');
			}
		},'json') 
	})
})
</script>

<div class="head_r" style="margin-top:-13px">
	<div class="eye"></div>
	<ul class="menu">
		<li class="li_3">试题<span class="count1"><?php if($count == '' ): ?>0<?php else: echo ($count); endif; ?></span>
			<dl class="li_3_content">
				<img src="/Public/images/index/dot1.png" width="23"height="12"class="Triangle_con"/>
				<p style="padding-top: 10px;">
					<span>选择题：</span><em class="subnavg"><?php echo ($Xcount); ?> </em>/25<!-- <span id="feng_one" class="fengsu">30分<span> -->
				</p>
				<p>
					<span>非选择题：</span><em class="subnavg"><?php echo ($count - $Xcount); ?> </em>/25<!-- <span id="feng_one" class="fengsu">30分<span> -->
				</p>
	<!-- 			<p>
					简答题：<em class="subnavg"><?php if($Jcount == '' ): ?>0<?php else: echo ($Jcount); endif; ?></em>/25<span id="feng_one" class="fengsu">30分<span>
				</p> -->
				<p class="count" style="color: #01A310; text-align: center;">共计<i class="count2"><?php echo ($count); ?></i>道题
				<!-- <span id="all_feng">100分<span> --></p>
				<a class="increases" href="javascript:void(0);" id="revisebut">继续加题</a>
			</dl>
		</li>
	</ul>

	<div class="nr_green" style="float: right; margin-right: 39px;">
		<img src="/Public/images/toux.gif" /> <span SH_NAME="true"><?php echo (session('username')); ?></span>
		<ul class="set">
			<li><a href="<?php echo U('User/index');?>">设置</a></li>
			<li><a href="<?php echo U('Login/logout');?>" style="border:none">注销</a></li>
		</ul>
	</div>

</div>
</div>
<div class="clear"></div>
<div class="shadow"></div>



<div class="title">
	<img src="/Public/images/jt.png" /><a href="<?php echo U('index', array('id' => I('get.epaperId')));?>">返回</a>
	<input type="hidden" id="epaperId" value="<?php echo ($epaper["id"]); ?>"/><?php echo ($epaper["header"]); ?><span><?php echo ($epaper["subject"]); ?></span>
</div>
			<div class="warp">
				<div id="box">
						
						<div class='conti'>
							<div class="hed">
								<span><?php echo ($epaper["header"]); ?></span>
								<span><?php echo ($epaper["subject"]); ?></span>
							</div>
						</div>

					<div class='conti'>
						<div class="know">
							<table border="1" cellspacing="0" cellpadding="0">
								<tr style="background: none;">
								<th width="25px">考生须知</th>
								<td><div><?php echo (explodestr0($epaper["know"])); ?></div>
								<div><?php echo (explodestr1($epaper["know"])); ?></div>
								<div><?php echo (explodestr2($epaper["know"])); ?></div>
								<div><?php echo (explodestr3($epaper["know"])); ?> </div>
								</td>
								</tr>
							</table>

							<div class="zhisi">
								<?php echo ($epaper["note"]); ?>
							</div>
						 	
						</div>
					</div>

					<div class='conti'>
						<div class='type'> 
								<h5 class="title_one"><span><?php echo (explodestr0($epaper["one_type"])); ?></span><span><?php echo (explodestr2($epaper["one_type"])); ?></span></h5>
								<h5 class="title_two"><?php echo (explodestr1($epaper["one_type"])); ?>（<?php echo (explodestr3($epaper["one_type"])); ?>）</h5>
						</div>
					</div>

					<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["questions"] == 选择题 ): ?><div class='conti'>
								<div class="list">
								 <!--  <input  type='hidden'  class="weight" value="<?php echo ($vo["weight"]); ?>"> -->
								  <input  type='hidden'  class="testid" value="<?php echo ($vo["id"]); ?>">
								  <div><?php echo ($vo["test"]); ?></div>
								 
								</div>
								</div><?php endif; endforeach; endif; else: echo "" ;endif; ?>


					<!-- 这个地方 有问题！！！！！！！！！！ -->

					<div class='conti'>
						<div class='type2'> 
								<h5 class="title_one"><span><?php echo (explodestr0($epaper["two_type"])); ?></span><span><?php echo (explodestr2($epaper["two_type"])); ?></span></h5>
								<!-- <h5 class="title_two"><?php echo (explodestr2($epaper["one_type"])); ?>（<?php echo (explodestr3($epaper["one_type"])); ?>）</h5> -->
						</div>
					</div>


					<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["questions"] != 选择题): ?><div class='conti'>
								<div class="list">
									<!-- <input  type='hidden'  class="weight" value="<?php echo ($vo["weight"]); ?>"> -->
									 <input  type='hidden'  class="testid" value="<?php echo ($vo["id"]); ?>">
									 <div><?php echo ($vo["test"]); ?></div> 
								</div>
						</div><?php endif; endforeach; endif; else: echo "" ;endif; ?> 
				</div>

				<div id="divide_border">
				
				</div>
			</div>


<div class="clear"></div>
<!-- 弹窗确认是否保存 -->
<div id="mask"></div>

<div id="save_eapaper" >
	 <div class="img_icon img_save"></div>
		  <div class="delete_del_content">
		          <div class="popu_text">
		          		您是要保存“<?php echo ($epaper["header"]); ?>”吗？
		          </div>

		        <div class="demobtn">
		        	<a href="javascript:void(0);" class="no">取消</a>
		              <a href="javascript:void(0);" class="yes">保存</a>

		        </div>
		  </div>
</div>
<!-- 弹窗确认是否保存 end -->

<!-- 试卷头 设置 start -->
<div class="save_head" >
		<i class="close dif">×</i>
		<div class="lolertit">试卷设置</div>
		<div class="lolist" >
		<ul>
		<li><span>主标题</span><textarea name="header" class='head' cols="" rows="" style="height:100px;"></textarea></li>
		<li style="margin-top:80px"><span>副标题</span><textarea name="subject" class='subject' cols="" rows="" style="height:100px;"></textarea></li>
		</ul>
		</div>
		<div class="clear"></div>
		<div class="head_yes"><a href="javascript:void(0);" class="yes">确定</a></div>
</div>
<!-- 试卷头设置 end -->
<div id="foot">
<div id="yema">
	<p><span>化学试卷</span>第<span id="now_page_one"></span>页(共<span class="shijiu_all_page"></span>页)</p>
	<p><span>化学试卷</span>第<span id="now_page_two"></span>页(共<span class="shijiu_all_page"></span>页)</p>
</div>
  <ul>
    <li class="logo_f">uTeach</li>
    <li class="nav_f"><a href="<?php echo U('Volume/index');?>" style="color:#a5dba7">会考</a></li>
    <?php echo dirs($epaper['pid'], $epaper['top_pid']);?>
    <li class="grasj"></li>
    <li><?php echo ($epaper["header"]); ?> <?php echo ($epaper["subject"]); ?></li>
     <li class="grasj"></li>
	<li>生成试卷</li>
  </ul>
</div>

<script>
	 $(document).ready(function() {
	//保存
	$(".demobtn .yes").on('click',function(){
		$.post("<?php echo U('Choose/epaper','','');?>",function(data){
			if(data.status = 1){
				$("#mask").hide()
				$("#save_eapaper").hide()
			   parent.location.href = data.url;
			}else{
				alert(5555)
			}
		},'json') 
	})
	
	$('.delete').on('click',function(){
		$.post(dfileUrl,{id:$('#epaperId').val(),type:$(this).find('.type').val()},function(data){
			if('data==1'){
			   parent.location.href = "<?php echo U('Volume/index');?>";
			}else{
				alert(5555)
			}
		},'json') 
	})
	

	//加排序标签
	 add_XH()
	function add_XH(){
		 $.each($("#box .conti"),function(i){
			  $(this).find("p").eq(0).html("<span class='xh'></span>"+$(this).find("p").eq(0).html())
		  })
		  sort_PX()
	 }
	
	/*题号排序  */
	function sort_PX(){
		 $.each($("#box .xh"),function(i){
			  $(this).html(i+1+".&nbsp;&nbsp;")
		  })
	 }
	pic_fR()
	 function pic_fR(){ 
		 $.each( $(".conti"),function(){
			$(this).find("p").eq(0).find("img").eq(0).css({float:"right"})
			
		 })
	 }
					function ff(){
						return $(this).html()
					}	 

					// 用来清除编制样式
					function clear_warp(){
						$("#box").find("div").removeClass("greendi")
						$(".conti").find("ul").eq(0).remove()
						$(".conti").find("a.revisebut").remove()
					}
			  $(".conti").on("mouseenter",function(){
							clear_warp()
							if($(this).find("div:first").attr("class")=="hed"){
									 	$(this).addClass("greendi")
									 	$(this).append(" <a class='revisebut'>修改</a>")
										$('.revisebut').on('click',function(){
											$('#mask').show()
											$('.save_head').show()
											$('.close').on('click',function(){
												$('#mask').hide()
												$('.save_head').hide()
											})
										})
										//试卷头更新
										$('.save_head .yes').on('click',function(){
											 $.post('/index.php/Home/Choose/save_head',{head:$(".head").val(),subject:$('.subject').val()},function(data){
												 if('data==1'){
													 $('#mask').hide()
													 $('.save_head').hide()
													 location.reload() 
												 }else{
													 alert('错误')
												 }
											 },'json')
										})
							}else if($(this).find("div:first").attr("class")=="know"){
									$(this).addClass("greendi")
									$(this).append(" <a class='revisebut' onclick='parent.open(\"/index.php/Home/Choose/know/id/<?php echo ($epaper["id"]); ?>\",\"考生须知\",600,400)'>修改</a>")
							}else if($(this).find("div:first").attr("class")=="type"){
								$(this).addClass("greendi")
								$(this).append(" <a class='revisebut' onclick='parent.open(\"/index.php/Home/Choose/alert_type/id/<?php echo ($epaper["id"]); ?>\",\"试题设置\",600,400)'>修改</a>")
							}else if($(this).find("div:first").attr("class")=="type2"){
								$(this).addClass("greendi")
								$(this).append(" <a class='revisebut' onclick='parent.open(\"/index.php/Home/Choose/alert_type2/id/<?php echo ($epaper["id"]); ?>\",\"试题设置\",600,400)'>修改</a>")
							}else{

								 	 			$(this).addClass("greendi")
												 $(this).append("<ul> <li>试题替换</li><li>删除</li><li>上移</li><li>下移</li></ul><div class='clear'></div>") 
												  var That1=$(this)
												  That1.find("ul li").eq(0).on("click",function(event){
													var id=That1.find('.testid').val()
													  parent.open('/index.php/Home/Choose/alert_replace?id='+id,'试题替换',700,600)
												  })


										That1.find("ul li").eq(1).on("click",function(event){
											  var id = $(this).parent().parent().find('.testid').val()
												   
											  new_all_id()
											  function new_all_id(){
													var arry_id=$("#all_id").val().split(",")
													var index=0
														$.each(arry_id,function(i,v){
																if(v==id){index=i}
															})
															if (index >= 0){
														        arry_id.splice(index, 1)
															}
													$("#all_id").val(arry_id.join(","))
												} 
											  
											  That1.remove()
													 $.post('/index.php/Home/Choose/get_all_id',{all_id:$("#all_id").val()},function(){
														 if('data==1'){
															 location.reload() 
														 }
													 })
													
										  })

									That1.find("ul li").eq(2).on("click",function(event){
											  event.stopPropagation();
											  if(That1.prev().find("div:first").attr("class")=="list"){
  												That1.prev().before(That1)
  												  sort_PX()
  												  get_all_id()
  												  $.post('/index.php/Home/Choose/get_all_id',{all_id:$("#all_id").val()})
											  }
											   
										  })

											That1.find("ul li").eq(3).on("click",function(event){
											  event.stopPropagation();

											  if(That1.next().find("div:first").attr("class")=="list"){
  												That1.next().after(That1)
  												  sort_PX()
  												  get_all_id()
  												   $.post('/index.php/Home/Choose/get_all_id',{all_id:$("#all_id").val()})
											  }
											  
										  })



							}


				 }) 
			 	$(document).click(function (event){
			 		  event.stopPropagation();
			 		  	clear_warp()
	
			 })


			 // 获取试题ID
				get_all_id()
			 	function get_all_id(){
			 		
			 		var all_id_html=""
			 		$("#box .testid").each(function(){
			 			all_id_html+=$(this).val()+','
			 		})
			 		$("#all_id").val(all_id_html)
			 	}


			 	// 非选择题失去焦点读入数据
			 	$(".now_fengsu").on("blur",function(){
			 		// alert(434343)
			 	})
			

				//不能输入字符
				$(".conti").delegate(".now_fengsu","keyup",function(event){
					var str=$(this).text()
	
					if (/[^0-9]/g.test(str)) {  
					        $(this).text(str.substr(0,str.length - 1));  
					    }  

				})

				//空格不换行
				$(".conti").delegate(".now_fengsu","keydown",function(event){
					var k=event.keyCode;
					if(k==13)
					{
						console.log(43434)
						return false
					}


				})

				$(".conti .type2").parent().nextAll(".conti").each(function(i,v){
					$(this).find(".xh").after('(<span class="now_fengsu" contenteditable="true">3</span>分)')
				})

		 }); 

</script>
</body></html>