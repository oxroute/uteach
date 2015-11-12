$(function(){
	// 获取日期
	function getTime(){
		var dateTime=new Date();
		var Year=dateTime.getFullYear();
		var Mou=dateTime.getMonth()+1;
		var Day=dateTime.getDate();
		return {
			"Year":Year,
			"Mou":Mou,
			"Day":Day
		}
	}

var focus_obj=""
var w_or_b=0
var nowL=""
	// 改变黄包背景
	$(".contain12 ul li").on("click",function(event){
		
		event.stopPropagation();
		nowL=$(this) 
		
		// 去除固定包的背影
		$("#fixed_bag .fixed_bag_pic").removeClass("fixed_bag_active")
		$("#fixed_bag .fixed_bag_pic").find(".fixed_bag_text").removeClass("active")
		// 点击时改变删除和下载样式
		change_delete_or_down()
	   li_click(nowL)
	   if($(this).attr("class")=="document"){
	   	$('.delete').attr("data",'<h3>您确定删除"'+$(".document .docgree").text()+'"包吗？</h3><p>该文件夹下所有的内容将会删除。</p>')
	   	$('.delete').attr("type_mouse","1")
	   	$('.down').attr("type_mouse","1")
	   }else{
	   	$('.delete').attr("data",'<h3>您确定删除"'+$(this).find(".wen_text").text()+'"文件吗？</h3>')
	   	$('.delete').attr("type_mouse","0")
	   	$('.down').attr("type_mouse","0")
	   }


})

// 固定包的设置
$("#fixed_bag .fixed_bag_pic").on("click",function(event){
	event.stopPropagation(); 
		// 去除黄包的背景
		$(".contain12 ul li").css({background:"none"})
		$(".contain12 ul li").find("p").removeClass("docgree")
	// 点击时改变删除和下载样式
		change_down()


	$(".delete").unbind()
	$(".down").unbind()
	$('.delete').removeAttr("data")
	$('.delete').removeAttr("type_mouse")
	$('.down').removeAttr("type_mouse")
	$('.down').removeAttr("data")


		// 绿包样式改变
	$(this).addClass("fixed_bag_active").siblings().removeClass("fixed_bag_active")
	$(this).find(".fixed_bag_text").addClass("active").parent().siblings().find(".fixed_bag_text").removeClass("active")

})

function li_click(obj){
		obj.css({background:"#EFFFF0"}).siblings().css({background:"none"})
		$(".contain12 ul li").find("p").removeClass("docgree")
		obj.find("p").addClass("docgree")	
}

// 点击时改变删除和下载样式
function change_delete_or_down(){
	$(".delete").unbind()
	$(".down").unbind()
		$(".delete").addClass("delete_active")
		$(".down").addClass("down_active")

		$(".down").on('click',function(){
			var fileid=nowL.find('.id').val()
			var type=nowL.find('.type').val()
			if(type){
				location.href=downFold+'?id='+fileid;
			}else{
				location.href=downFile+'?id='+fileid;
			}
			$(this).removeClass("down_enter1 down_enter").addClass("down_active")
		})
		$(".down").on("mouseenter",function(){
			if($(this).attr("type_mouse")==0){
				$(this).removeClass("down_active").addClass("down_enter1")
			}else
			{
				$(this).removeClass("down_active").addClass("down_enter")
			}
			
		})

		$(".down").on("mouseout",function(){
			$(this).removeClass("down_enter1 down_enter").addClass("down_active")
		})

		$(".delete").on("mouseenter",function(){

			if($(this).attr("type_mouse")==0){
				$(this).removeClass("delete_active").addClass("delete_enter1")
			}else
			{
				$(this).removeClass("delete_active").addClass("delete_enter")
			}
		})

		$(".delete").on("mouseout",function(){
			$(this).removeClass("delete_enter1 delete_enter").addClass("delete_active")
		})

		 $(document).bind('keydown', function (e) {
   			 var key = e.which;
         	if(key == 46)
         	{
         		delete_yellow_bao()
         	}
         });


		$(".delete").on("click",function(event){
			event.stopPropagation();
			delete_yellow_bao()
		})


		function delete_yellow_bao(){
			$('#mask').show()
			$('.delete_del .delete_del_content .popu_text').html($('.delete').attr("data"))
			$('.delete_del').show()


			$('.delete_del_no').on("click",function(event){
				$('#mask').hide()
				$('.delete_del').hide()
			})
			
			//AJAX  删除文件夹
			$('.delete_del_yes').on("click",function(event){
				var id=nowL.find(".id").val()
				
					$.post(dfileUrl,{id:id,type:nowL.find('.type').val()},function(data){
						event.stopPropagation(); 
						nowL.remove();
						$('#mask').hide()
						$('.delete_del').hide()
					})
			})
		}


 hide_hui()
}
// 点击绿包时改变下载样式
function change_down(){
		$(".delete").removeClass("delete_active")
		$(".down").addClass("down_active")
		$(".down").on("click",function(event){
				event.stopPropagation();

		})

		 hide_hui()
}

// 点击页面时去除删除和下载样式
function change_one_delete_or_down(){
		$(".delete").removeClass("delete_active")
		$(".down").removeClass("down_active")
}

//包修改字
$(".contain12 p").on("click",function(event){
	change_text($(this))
})

//修改文件夹
function change_text(obj){
			w_or_b=1
			var old_obj=obj.parent()
			var old_num=obj.parent().find("a").html()
			var folderid=obj.parent().find(".id").val()
			var type = obj.parent().find(".type").val()
			
			if(old_obj){
				old_obj.html("<div class='doctu'><a href='#'>"+old_num+"</a></div><input type='text' class='docgreex' value='"+obj.html()+"'><input type='hidden' class='id' value='"+folderid+"'><input type='hidden' class='type' value='"+nowL.find('.type').val()+"'>")
				$(".docgreex").focus().select()
			}
			//Ajax  修改文件夹名称
	
			$(".docgreex").blur(function(){
				$.get(eFolderUrl,{name:$(this).val(),id:folderid});
				 getText()
			});

					$('.docgreex').bind('keydown', function (e) {
			  			 var key = e.which;
			        	if($('.docgreex').is(':focus')&&key == 13)
			        	{
			        		$.get(eFolderUrl,{name:$(this).val(),id:folderid});
					        getText()
			        	}
			        	
			        });

}

// 黄色文件夹双击事件
	$(".contain12 ul li.document").on("dblclick",function(event){
		// alert('sss');
		// return false;
		event.stopPropagation(); 
		var pid= nowL.find(".id").val()
		// // alert(zjUrl + '?pid='+pid);
		window.location.href= 'zhujuanin.html?pid='+pid;	
	});
//绿色文件夹双击事件
	$("#fixed_bag .fixed_bag_pic .pic_icon").on("dblclick",function(event){
		event.stopPropagation(); 
		var folder_top_id=$(this).parent().find(".id").val();
		window.location.href='folder_top.html?folder_top_id='+folder_top_id;
	});
	

// 文件双击事件
$(".contain12 ul li.file_pic").on("dblclick",function(event){
	event.stopPropagation(); 
		var fileid= nowL.find(".id").val()
		location.href=url+'?epaperId='+fileid;
			
})
//绿色文件双击

$(".fixed_bag_pic .openlogin").on("dblclick",function(event){
	event.stopPropagation(); 
		var fileid= $(this).parent().find(".id").val();
		location.href=url+'?epaperId='+fileid;
			
})

$(".contain12 ul li").on("click",function(event){
	event.stopPropagation(); 
		var fileid= nowL.find(".id").val()
		/*$.get(downFold,{downId:fileid})*/
})

//后期改了 没用
/*$(".begin_xuanti").on("click",function(event){
	
	var fileid= nowL.find(".fid").val()
	$.get(fileNo,{fid:fileid},function(data){
		if(data.status){
				alert('修改文件成功！');
		 }else{
				alert('修改文件失败！');
			}	
		},'json');

	event.stopPropagation()
	window.location='http://127.0.0.1/a-huxiangru/allguide_tree/guide_tree-2/index.php/home/choose/index.html?id='+fileid;
})

//文件改字
$(".contain12 li .wen_text").on("click",function(event){
	event.stopPropagation();
	change_text_2($(this))
})*/

function hide_hui(){
			$('#show1').hide(300);
		$('#zhujiu_set').attr("SH_HUI",true)
		$('#zhujiu_set').css({background : "url('"+imgPath+"/images/index/z_dot1.png') no-repeat scroll right center,url('"+imgPath+"/images/zhujiu_logo.png') no-repeat scroll left center"})


		$('.nr_green span').attr("SH_NAME",true)
		$('.set').slideUp(300);
		$('.nr_green span').css({background : "url('"+imgPath+"/images/index/name_up.png') no-repeat right center"})

}

function change_text_2(obj){
			w_or_b=2
			var old_obj=obj.parent()
			var old_text=obj.parent().find(".wen_text").html()
			var fileid=obj.parent().find(".id").val()
			//alert(fileid)
			if(old_obj){
				old_obj.html("<img src='../images/12.gif'/><input type='text' class='docgreex' value='"+old_text+"'><input type='text' class='fid' value='"+fileid+"'>")
				$(".docgreex").focus().select()
			}
			//ajax
			$(".docgreex").blur(function(){
				$.get(eFolderUrl,{name:$(this).val(),id:fileid},function(data){
					 if(data.status){
							//alert('修改文件成功！');
					 }else{
							alert('修改文件失败！');
						}	
				},'json');
			});
}
	
	//判断是否有选择目标
	 $(".delete").on("click",function(event){
	 	event.stopPropagation(); 
	 	if(nowL){
	 		/*alert(444)*/
	 	}else{
	 		alert('请选择要删除的目标!');
	 	}
	 })
// 增加包
	var new_bao=""
	$(".save").on("click",function(event){
		event.stopPropagation(); 
		 w_or_b=1
		var Save_html=$("<li class='document'><div class='doctu'><a href='javascript:void(0);'>0</a></div><input type='text' name='username' class='docgreex' value='新建文件夹'></li>");
		$(".contain12 ul").append(Save_html)
		$(".docgreex").focus().select();
				 //Ajax  异步创建文件夹
		 var pid= $('input[id="pid"]').val()
		
		 var folder_top_id= $('input[id="folder_top_id"]').val()
				 $(".docgreex").blur(function(){
					 $.get(folderUrl,{name:$(this).val(),folder_top_id:folder_top_id,pid:pid}, function(data){
					 	 Save_html.append($('<input type="hidden" name="id" class="id" value="'+data.id+'"><input type="hidden" name="pid" class="pid" value="'+data.pid+'"><input type="hidden" name="type" class="type" value="0">'))
					 })	
					
					 getText()
				})
				 		$('.docgreex').bind('keydown', function (e) {
				   			 var key = e.which;
				         	if($('.docgreex').is(':focus')&&key == 13)
				         	{
				 		        $.get(folderUrl,{name:$(this).val(),folder_top_id:folder_top_id,pid:pid}, function(data){
					 	 Save_html.append($('<input type="hidden" name="id" class="id" value="'+data.id+'"><input type="hidden" name="pid" class="pid" value="'+data.pid+'"><input type="hidden" name="type" class="type" value="0">'))
					 })	
				 		        getText()
				         	}
				         	
				         });
	})

	$(document).on("click",function(){
		$(".contain12 ul li").css({background:"none"})
		$(".contain12 ul li").find("p").removeClass("docgree")
		$("#fixed_bag .fixed_bag_pic").removeClass("fixed_bag_active")
		$("#fixed_bag .fixed_bag_pic").find(".fixed_bag_text").removeClass("active")
		change_one_delete_or_down()

	$(".delete").unbind()
	$(".down").unbind()
	$('.delete').removeAttr("data")
	$('.delete').removeAttr("type_mouse")
	$('.down').removeAttr("type_mouse")
	$('.down').removeAttr("data")

	$(".down").html("")
	$(document).unbind("keydown")
	})

	function getText(){
			if( w_or_b==1){
				var new_bao_text=$(".docgreex").val()
				if(!new_bao_text){
						new_bao_text="新建文件"
					}

				var new_bao=$(".docgreex").parent()
				$(".docgreex").remove()
				new_bao.append("<p>"+new_bao_text+"</p>")
				new_bao.on("click",function(event){
					event.stopPropagation(); 
					nowL=$(this) 
					   li_click(nowL)
				})

				new_bao.on("dblclick",function(event){
						event.stopPropagation(); 
						// window.location.href='zhujuanin.html';
						var pid= nowL.find(".id").val()
						window.location.href='zhujuanin.html?pid=' + pid;
				})
				$(".contain12 p").on("click",function(event){
					change_text($(this))
				})
			}else if(w_or_b==2){
				var new_bao_text=$(".docgreex").val()
				if(!new_bao_text){
						new_bao_text="新建文件"
					}

				var new_bao=$(".docgreex").parent()
				$(".docgreex").remove()
				new_bao.append("<span class='wen_text'>"+new_bao_text+"</span><br/><span class='wen_timer'>"+getTime().Year+"/"+getTime().Mou+"/"+getTime().Day+"</span>")
				new_bao.on("click",function(event){
					event.stopPropagation(); 
				})

				new_bao.on("dblclick",function(event){
						event.stopPropagation(); 
						$(".loginmask").show()
						$("#loginalert").show()
				})
				$(".contain12 li .wen_text").on("click",function(event){
					change_text_2($(this))
				})
			}
	
	}


$("#loginalert .closealert").on("click",function(){
	$(".loginmask").hide()
	$("#loginalert").hide()
})

$(".erightlo span").eq(0).on("click",function(){
	$(this).css({background:"url(../images/sample2.jpg) no-repeat"})
	$(".erightlo span").eq(1).css({background:"url(../images/sample3.jpg) no-repeat"})
})
$(".erightlo span").eq(1).on("click",function(){
	$(this).css({background:"url(../images/sample.jpg) no-repeat"})
	$(".erightlo span").eq(0).css({background:"url(../images/sample1.jpg) no-repeat"})
})
})
//试卷设置页面JS
$(function(){
xialai_event("#xialai1")
xialai_event("#xialai2")
xialai_event("#xialai3")
xialai_event("#xialai4")
function xialai_event(obj){
	// obj=$(obj).find("img")
	$(obj).data("off",true)
	$(obj).on("click",function(event){
		event.stopPropagation(); 
		var That=$(this)
		if($(this).data("off")){
			$(this).find(".xia_list").slideDown()
			$(this).data("off",false)
		}else{
			$(this).find(".xia_list").slideUp()
			$(this).data("off",true)
		}
		$(this).find(".xia_list").find("a").unbind()

			$(this).find(".xia_list").find("a").on("click",function(event){
					event.stopPropagation(); 
				That.find(".wh").val( $(this).html() )
				That.find(".xia_list").slideUp()
					That.data("off",true)
			})
					$(obj).siblings().find(".xia_list").slideUp()
					$(obj).siblings().data("off",true)
	})
		 

	 $(document).click(function (event){
	 		event.stopPropagation(); 
	 	$(obj).find(".xia_list").slideUp()
			$(obj).data("off",true)
		 });
		 	
}

	$("#style_select_one a").on("click",function(){
		$("#page_value_one").val($(this).html())
		$(this).addClass("active").siblings().removeClass("active")
	})
	
	$("#style_select_two a").on("click",function(){
		$("#page_value_two").val($(this).html())
		$(this).addClass("active").siblings().removeClass("active")
	})
	$('.cheack_box input[type="radio"]').on("click",function(){
		$(".car_type").val($(this).val())

		$(".cheack_box label").removeClass("color_check")
		$(this).parent().next().addClass("color_check")
	})


	$('input:radio[name=car_type]').wRadio({theme: 'circle-classic-green', selector: 'circle-dot-green'});





	})
	
	 function check(form){

	 //var i=$('.mar_L').find(".wh").length

	  if($('.wh').eq(0).val()=="请选择"){
		  alert(111);
		  return false;
	  }
	  if($('.wh').eq(1).val()=="请选择"){
		  alert(454545);
		  return false;
	  }
	  if($('.wh').eq(2).val()=="请选择"){
		  alert(4545);
		  return false;
	  }
	  if($('.wh').eq(3).val()=="请选择"){
		  alert(787878);
		  return false;
	  }
	  if($('.car_type').val==""){
		  alert(8664646)
		  return false;
	  }

	 if($('#page_value_one').val()==""){
	 			alert('555')
	 			return false;
	 }
	 if($('#page_value_two').val()==""){
			alert('555')
			return false;
	 }
	 	
	 
 } 





