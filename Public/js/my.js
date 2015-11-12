// JavaScript Document
$(function(){
 $('#nav li a').click(function(){
		$(this).next("ul").slideToggle(300).parent().siblings("li").find("ul").slideUp("slow");
		$.each( $("#nav li a"),function(){
			$(this).removeClass("cur")
		})	  
	});

	// 编题左侧A标签
	$.each( $("#nav .nav_c li a"),function(){
		$(this).on("click",function(){
			$.each($("#nav .nav_c li a"),function(){
				$(this).removeClass("cur")
			})
			$(this).addClass("cur").siblings().removeClass("cur")
			$(this).parent().parent().prev().addClass("cur")
		})
	})	  

})
		$(function(){
		$(".delete_icon").on("click",function(event){
			event.stopPropagation(); 
			$(this).parent().parent().remove();
		})
		        
})

$(function(){
$(".name .name_icon").on("click",function(event){
	event.stopPropagation();
		if($(".name .name_icon").attr("SH_NAME")=='true')
						{
						$(this).css({background:"url("+imgPath+"images/index/name_down.png) no-repeat right center"})
						$(".set").slideDown(300,"easeOutBack")
						$(".name .name_icon").attr("SH_NAME",false)
						}else{
							$(this).css({background:"url("+imgPath+"images/index/name_up.png) no-repeat right center"})
							$(".set").slideUp(300)
							
							$(".name .name_icon").attr("SH_NAME",true)
						}
				$('#show1').hide(300);
				$('#bt').css({background:"url('"+imgPath+"images/index/dot.0.png') no-repeat scroll right center, url('"+imgPath+"images/icon_logo.png') no-repeat scroll left center"})
				$('#bt').attr("SH",true)
				 $('.tab_con1').slideUp(300) 
				 	$(".chem_list").hide();
					$('.chem_btn').attr("SH_CHEM",true)

addClasscur()
enter_lian()
})

// 左上角点击展开
// var off_btn=true;
		 	$('#bt').click(function(event){
					event.stopPropagation();   
					// alert($('#bt').attr("SH"))
					if($('#bt').attr("SH")=='true')
						{

							$('#show1').show(300,"easeOutBack");

							$('#bt').attr("SH",false)
							$('#bt').css({background:"url('"+imgPath+"images/index/dot.png') no-repeat scroll right center, url('"+imgPath+"images/icon_logo.png') no-repeat scroll left center"})
						}else{
							$('#show1').hide(300);
							$('#bt').attr("SH",true)
							$('#bt').css({background:"url('"+imgPath+"images/index/dot.0.png') no-repeat scroll right center, url('"+imgPath+"images/icon_logo.png') no-repeat scroll left center"})
						}

						// 化学模块选择下拉
						$(".chem_list").slideUp(300);
						$('.chem_btn').attr("SH_CHEM",true)

							// 性名设置
							$(".name .name_icon").css({background:"url("+imgPath+"images/index/name_up.png) no-repeat right center"})
							$(".set").slideUp(300)
							$(".name .name_icon").attr("SH_NAME",true)

						// 来源
						enter_lian()
						addClasscur()
						 $('.tab_con1').slideUp(300) 
				});


	$(".chem_btn").on("click",function(event){
		event.stopPropagation(); 
				if($('.chem_btn').attr("SH_CHEM")=='true'){
					$(".chem_list").slideDown(300);
					$('.chem_btn').attr("SH_CHEM",false)
					// alert(4343)
				}else{
					$(".chem_list").slideUp(300);
					$('.chem_btn').attr("SH_CHEM",true)
				}

					 $('#show1').hide(300);
					 $('#bt').css({background:"url('"+imgPath+"images/index/dot.0.png') no-repeat scroll right center, url('"+imgPath+"images/icon_logo.png') no-repeat scroll left center"})
					$('#bt').attr("SH",true)
					 $('.tab_con1').slideUp(300) 

					 			$(".name .name_icon").css({background:"url("+imgPath+"images/index/name_up.png) no-repeat right center"})
							$(".set").slideUp(300)
							$(".name .name_icon").attr("SH_NAME",true)
	enter_lian()
	addClasscur()
	})



			 $(document).click(function (event){ 
						 hide_list_all()

			});

			 function hide_list_all(){
			 				 	$('#show1').hide(300);
					 	$('#bt').css({background:"url('"+imgPath+"images/index/dot.0.png') no-repeat scroll right center, url('"+imgPath+"images/icon_logo.png') no-repeat scroll left center"})
					$('#bt').attr("SH",true)

					$(".chem_list").slideUp(300);
					$('.chem_btn').attr("SH_CHEM",true)

						$(".name .name_icon").css({background:"url("+imgPath+"images/index/name_up.png) no-repeat right center"})
							$(".set").slideUp(300)
							$(".name .name_icon").attr("SH_NAME",true)
							
			 }


		  // 左下角设置展开
		
		 	$('#sz').click(function(event){
					event.stopPropagation();   
				 	$('#show2').show();
					
				});
			 $(document).click(function (event){ $('#show2').hide() });
		$(".difficulty").click(function() {
		 $('#difficulty').val($(this).text());
		})
		$(".test_people").click(function() {
		 $('#test_people').val($(this).text());
		})
		$(".source").click(function() {
		 $('#source').val($(this).text());
		})

// 编题头部选择方式
		// 编题的三种编制器
$(".bt_warp").find(".choose").css({"display":"block"})
// 初始化
$("#bt_tx").removeClass("tx_style").addClass("tx_style_active")
$("#bt_tx_list").show()

$("#bt_tx").on("click",function(){
	$(this).next(".tx_list_event").show()
})

$("#bt_tx_list a").on("click",function(){
	$(this).parent().prev().html($(this).html())
	$(this).parent().hide()
	$("#bt_nd").removeClass("tx_style").addClass("tx_style_active")
	$("#bt_nd").next(".tx_list_event").show()
		switch($(this).text())
			{
				case "选择题":
					$(".bt_warp").find(".choose").eq(0).show().siblings().hide()
				break;
				case "填空题":
					$(".bt_warp").find(".ti_kong_input").show().siblings().hide()
				break;
				case "简答题":
					$(".bt_warp").find(".jieda_da_textarea").show().siblings().hide()
				break;
			}
			$("#answerContentEditContent").val("")
})


$("#bt_nd").on("click",function(){
	if($(this).next(".tx_list_event").attr("class").indexOf("tx_style_active")>=0)
	{	
		$(this).next(".tx_list_event").show()
	}
})

$("#bt_nd_list a").on("click",function(){
	$(this).parent().prev().html($(this).html())
	$(this).parent().hide()
	$('.no_main').css('display','none');

	$("#PageOfficeCtrl1").css({display:"block"})

})

		// 选择题
		$(".bt_warp .choose li.answer a").click(function() {
			$(this).addClass("active").parent().siblings().find("a").removeClass("active");
			$("#bi_daan_val").val($(this).html()) 
		})
		var zhibu_number=3;
		var zhibu_arr=["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"]
		$(".bt_warp .choose li.add_answer").click(function() {
		++zhibu_number;
		if(zhibu_number<26){
					$(this).before("<li class='answer'><a href='###'>"+zhibu_arr[zhibu_number]+"</a></li>")
					$(this).prev().click(function() {

						$(this).find("a").addClass("active").parent().siblings().find("a").removeClass("active"); 
						$("#bi_daan_val").val($(this).find("a").html())
					})
			}
		
		})
		
		//简答题
		$(".jieda_da_textarea").delegate("div","focusout",function(){
			var input_val=""
				input_val=$(this).html()	
			$("#bi_daan_val").val(input_val) 
		})
		

		$(".bt_warp .choose li a.cut_answer").on("click",function(){
			if(zhibu_number-1>=0)
			{
				zhibu_number--;
				$(this).parent().prev().prev().remove()
			}

		})

		// 填空题
		// 增加input框
	
		$(".ti_kong_input .ti_kong_add_input").on("click",function(){
			$(".ti_kong_input ul").append("<li><input type='text'><a href='javascript:void(0);' class='ti_kong_cut_input'>-</a></li>")
		})

		$(".ti_kong_input ul").delegate(".ti_kong_cut_input","click",function(){
			$(this).parent().remove()
		})


// 失去焦聚时传值
$(".ti_kong_input ul").delegate("li input","focusout",function(){
	var input_val=""
	$(".ti_kong_input ul li").each(function(){

		if($(this).find("input").val()){
			input_val+="|"+$(this).find("input").val()	
		}
	
	})
	$("#bi_daan_val").val(input_val) 
})
		$(".subject").click(function() {
		 $('#kid').val($(".subject").find("span").eq(1).text())
		})
		 
	// 右侧头部点击展开（选择来源）
	$("#tab1>li").on("click",function(event){
		event.stopPropagation(); 
		$(this).find(".tab_con1").slideDown(300,"easeOutBounce")
		$(this).find(".tab_con1").css({display:"inline-flex"});
		$(this).siblings().find(".tab_con1").slideUp(300);

		$('#show1').hide(300);
		$('#bt').attr("SH",true)
		$('#bt').css({background:"url('"+imgPath+"images/index/dot.0.png') no-repeat scroll right center, url('"+imgPath+"images/icon_logo.png') no-repeat scroll left center"})
		$(".chem_list").slideUp(300);
		$('.chem_btn').attr("SH_CHEM",true)

			// 头像设设置收起
					$(".name .name_icon").css({background:"url("+imgPath+"images/index/name_up.png) no-repeat right center"})
							$(".set").slideUp(300)
							$(".name .name_icon").attr("SH_NAME",true)

		addClasscur()
		$(this).find("a").eq(0).addClass("color")

		enter_lian()
	})

addClasscur()
		// 头部点击判断加颜色


	$(document).click(function (event){ $('.tab_con1').slideUp(300);
	addClasscur() });
	// 选择题型 ADN 动态查询
	$(".tab_con1 .questions").on("click",function(event){
		event.stopPropagation(); 
		$(this).parent().prev().html($(this).text())
		$(this).parent().prev().addClass("color")
		$(this).parent().hide()
		var difficulty=$('#difficulty').val()
		var source=$(".tab_con2").val()
		var zid= $("#zid").val()
		var zsid= $('#zsid').val()
		var fid= $(".subject").find("span").eq(1).text()
		var test_people=$('#test_people').val()
		var questions=$(this).text();
		$('#right_bt').attr("src",id+'?zid='+zid+'&fid='+fid+'&zsid='+zsid+'&questions='+questions+'&difficulty='+difficulty+'&test_people='+test_people+'&source='+source);
		
	switch($("#tab1>li a").eq(0).text())
			{
				case "选择题":
					$(".da_warp").find(".choose").show().siblings().hide()
				break;
				case "填空题":
					$(".da_warp").find(".ti_kong_input").show().siblings().hide()
				break;
				case "简答题":
					$(".da_warp").find(".jieda_da_textarea").show().siblings().hide()
				break;
			}


			
	})
	// 选择难度 ADN 动态查询
	$(".tab_con1 .difficulty").on("click",function(event){
		event.stopPropagation(); 
	   $(this).parent().prev().html($(this).text())
		$(this).parent().prev().addClass("color")
		$(this).parent().hide()
		var source=$(".tab_con2").val()
		var zid= $("#zid").val()
		var zsid= $('#zsid').val()
		var fid= $(".subject").find("span").eq(1).text()
		var questions=$('#questions').val();
	    var test_people=$('#test_people').val()
		var difficulty=$(this).text();
		$('#right_bt').attr("src",id+'?zid='+zid+'&fid='+fid+'&zsid='+zsid+'&questions='+questions+'&difficulty='+difficulty+'&test_people='+test_people+'&source='+source);
	})
	// 选择出题人 ADN 动态查询
	$(".tab_con1 .test_people").on("click",function(event){
		event.stopPropagation(); 
		$(this).parent().prev().html($(this).text())
		$(this).parent().prev().addClass("color")
		$(this).parent().hide()
		var source=$(".tab_con2").val()
		var zid= $('#zid').val()
		var zsid= $('#zsid').val()
		var fid= $(".subject").find("span").eq(1).text()
		var questions=$('#questions').val();
		var difficulty=$('#difficulty').val();
		var test_people=$(this).text();
		$('#right_bt').attr("src",id+'?zid='+zid+'&fid='+fid+'&zsid='+zsid+'&questions='+questions+'&difficulty='+difficulty+'&test_people='+test_people+'&source='+source);
	})
	

// 判断页面加载后头部来源中的 选择题 难度 出题人 是否有值
header_color_pd()
function header_color_pd(){
	var arr=["题型","难度","出题人"]
	$(".bt_left .bt_box").each(function(i){
		if($(this).find("span").eq(0).text()!=arr[i])
		{
			$(this).find("span").removeClass("tx_style").addClass("tx_style_active")
		}
	})
	switch($(".bt_left>.bt_box span").eq(0).text())
			{
				case "选择题":
					$(".da_warp").find(".choose").show().siblings().hide()
				break;
				case "填空题":
					$(".da_warp").find(".ti_kong_input").show().siblings().hide()
				break;
				case "简答题":
					$(".da_warp").find(".jieda_da_textarea").show().siblings().hide()
				break;
			}
	if($(".bt_lianyuan_btn a").text()!="来源"){
		$(".bt_lianyuan_btn a").addClass("active")
	}

	if($(".laiyuan_header").find("a").html()!="来源"){
			$(".laiyuan_header").find("a").addClass("color")
			
	}
}

$("#alter_ti").on("click",function(){
	$(this).next().toggle(0)
})
$("#alter_ti_list a").on("click",function(){
	$("#alter_ti").text($(this).text()).next().toggle(0)
})

$("#alter_nd").on("click",function(){
	$(this).next().toggle(0)
})

$("#alter_nd_list a").on("click",function(){
	$("#alter_nd").text($(this).text()).next().toggle(0)
	$("#alter_nd").removeClass("tx_style").addClass("tx_style_active")
})


	// 来源
	$(".laiyuan_header").on("click",function(event){
		event.stopPropagation(); 

		if($(this).find("a").text()=="来源")
		{
			$(".tab_con2").val("")
		}else{
			$(".tab_con2").val($(this).find("a").text())
		}
			$(".tab_con2").css({display:"block"})
			$(".tab_con2").focus()
			$(".laiyuan_header").hide()


	 		$('#show1').hide(300);
			$('#bt').attr("SH",true)
			$('#bt').css({background:"url('"+imgPath+"images/index/dot.0.png') no-repeat scroll right center, url('"+imgPath+"images/icon_logo.png') no-repeat scroll left center"})
			// 化学模块选择下拉
			$(".chem_list").slideUp(300);
			$('.chem_btn').attr("SH_CHEM",true)

				// 性名设置
				$(".name .name_icon").css({background:"url("+imgPath+"images/index/name_up.png) no-repeat right center"})
				$(".set").slideUp(300)
				$(".name .name_icon").attr("SH_NAME",true)


			// 选择来源
			 $('.tab_con1').slideUp(300) 



	})

	$(".tab_con2").on("click",function(event){
		event.stopPropagation(); 
	})
	$(document).click(function (event){ 
		 enter_lian()
	});

	function enter_lian(){
			if($(".tab_con2").val()){
			$(".laiyuan_header").find("a").html($(".tab_con2").val())
		}else{
			$(".laiyuan_header").find("a").html("来源")
		}
		if($(".laiyuan_header").find("a").html()!="来源"){
			$(".laiyuan_header").find("a").addClass("color")
			
		}else{
			$(".laiyuan_header").find("a").removeClass("color")
		}
		
		$(".laiyuan_header").show()
		$(".tab_con2").hide() 
addClasscur()

	}
	
	function source_file(){
		var zid= $('#zid').val()
		var zsid= $('#zsid').val()
		var fid=""
		var questions=$('#questions').val();
		var difficulty=$('#difficulty').val();
		var test_people=$('#test_people').val();
		var source=$(".tab_con2").val()
		$('#right_bt').attr("src",id+'?zid='+zid+'&fid='+fid+'&zsid='+zsid+'&questions='+questions+'&difficulty='+difficulty+'&test_people='+test_people+'&source='+source);
	}
	$(".tab_con2").on("focusout ",function(event){
		source_file()
	})
	
	  $('.tab_con2').bind('keydown', function (e) {
  			 var key = e.which;
        	if($('.tab_con2').is(':focus')&&key == 13)
        	{
        		source_file()   
 				enter_lian()
        	}
        });
	
	// 编题来源
	$(".bt_lianyuan_btn").on("click",function(event){
		event.stopPropagation(); 
		if($(this).find("a").text()=="来源")
		{
			$(".bt_lianyuan").val("")
		}else{
			$(".bt_lianyuan").val($(this).find("a").text())
		}
			$(".bt_lianyuan").css({display:"block"})
			$(".bt_lianyuan").focus()
			$(".bt_lianyuan_btn").hide()
	})

	$(".bt_lianyuan").on("click",function(event){
		event.stopPropagation(); 
	})
	
	$(document).click(function (event){ 
		bt_lian_fn()
	});


	  $('.bt_lianyuan').bind('keydown', function (e) {
  			 var key = e.which;
        	if($('.bt_lianyuan').is(':focus')&&key == 13)
        	{
        			bt_lian_fn()
        	}
        });
  // 编题来源函数
	function bt_lian_fn(){
		if($(".bt_lianyuan").val()){
					$(".bt_lianyuan_btn").find("a").html($(".bt_lianyuan").val())
				}else{
					$(".bt_lianyuan_btn").find("a").html("来源")
				}

					if($(".bt_lianyuan_btn").find("a").html()!="来源"){
					$(".bt_lianyuan_btn").find("a").addClass("bg")
				}else{
					$(".bt_lianyuan_btn").find("a").removeClass("bg")
				}

				$(".bt_lianyuan_btn").show()
				$(".bt_lianyuan").hide() 
	}

// 编题头部选择

	// 添加边框
	$('.list_warp dl').hover(function(){
	  $(this).css('border','1px solid #85bced');
		$(this).siblings().css('border','none');
	  
	})
	
	$("#tab2>li").on("click",function(){
		$(this).find(".tab_con2").show()
		$(this).siblings().find(".tab_con2").hide()
	})
})

// 提示框 弹出层
$(function(){
	
	// 修改保存此题
	$(".update_save").on("click",function(){
			/*if(ue1.hasContents()==false){
				$("#mask").show()
				$("#tishi_bt").show()
				$(".popu_black").on("click",function(){
					$("#mask").hide()
					$(".popu_box").hide()
			})
				return false;
			}else */if($('#bi_daan_val').val()==""){
				$("#mask1").show()
				$("#tishi_bt1").show()
				$(".popu_black").on("click",function(){
					$("#mask1").hide()
					$(".popu_box1").hide()
			})
				return false;
			}
			$("#mask").show()
			$("#save_bt").show()
			$(".cancel_btn").on("click",function(){
			 $("#mask").hide()
			 $(".popu_box").hide()
			})

	})
	//询问是否保存 确认按钮
	$(".update_yes").on("click",function(){
		var form = $('form');
		var data = form.serialize();
		/*$.post(updateUrl,data,function(data){
			// if(data==1){
				// alert('添加成功!');
				location.href=url;
			// }
			
		});*/
        document.getElementById("PageOfficeCtrl1").WebSave();
        var name = document.getElementById("PageOfficeCtrl1").CustomSaveResult;
        //alert(name);
        $.post(saveUrl+"?reQuestion="+name,data,function(data){

            // if(data==1){
            // alert('添加成功!');
            //alert(url+"?reQuestion="+name);
            //location.href = "http://192.168.0.104/uteach/Word/FileMakerSingle.php?id=9&type=answer2015103113342634883176"
            location.href=url+"?reQuestion="+name;
            // }

        });
	})
				// 保存此题
				$(".add_save").on("click",function(){
						/*if(ue1.hasContents()==false){
							$("#mask").show()
							$("#tishi_bt").show()
							$(".popu_black").on("click",function(){
								$("#mask").hide()
								$(".popu_box").hide()
						})
							return false;

						}else*/

                    if($('#bi_daan_val').val()==""){
							$("#mask1").show()
							$("#tishi_bt1").show()
							$(".popu_black").on("click",function(){
								$("#mask1").hide()
								$(".popu_box1").hide()
						})
							return false;
						}
						$("#mask").show()
						$("#save_bt").show()
						$(".cancel_btn").on("click",function(){
						 $("#mask").hide()
						 $(".popu_box").hide()
						})




				})
				
				//询问是否保存 确认按钮
				$(".save_btn").on("click",function(){
							var form = $('form');
							var data = form.serialize();

					document.getElementById("PageOfficeCtrl1").WebSave();
					var name = document.getElementById("PageOfficeCtrl1").CustomSaveResult;
							$.post(saveUrl+"?reQuestion="+name,data,function(data){

								// if(data==1){
									// alert('添加成功!');
									//alert(url+"?reQuestion="+name);
									//location.href = "http://192.168.0.104/uteach/Word/FileMakerSingle.php?id=9&type=answer2015103113342634883176"
									location.href=url+"?reQuestion="+name;
								// }
								
							});
				})
				
				$("#save_show").on("click",function(){
							var form = $('form');
							var data = form.serialize();
							$.post(saveUrl,data,function(data){
								// if(data==1){
									// alert('添加成功!');
									location.href=url;
								// }
							});
				})

				// 删除此题
				$(".del").on("click",function(){
					$("#mask").show()
					$("#delet_bt").show()
					$(".delete_cancel_btn").on("click",function(){
						$("#mask").hide()
						$(".popu_box").hide()
					})

					var id=$('.del').parent().find("#delId").val();
					$(".delete_btn").on("click",function(){
					 $.post(delUrl,{id:id},function(data){
						 if(data==1){

							   window.location.reload();
						 }else{
							 $("#mask").hide()
							$(".popu_box").hide()
							 alert('这不是你的试题，请不要操作!')
						 }
					 },'json')
			    	})
				})
			})


// 编题页面取得点击的val
$(function(){
	$(".questions").click(function() {
		 $('#questions').val($(this).text());

		 switch($(".bt_left>.bt_box span").eq(0).text())
			{
				case "选择题":
					$(".da_warp").find(".choose").show().siblings().hide()
				break;
				case "填空题":
					$(".da_warp").find(".ti_kong_input").show().siblings().hide()
				break;
				case "简答题":
					$(".da_warp").find(".jieda_da_textarea").show().siblings().hide()
				break;
			}
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
	$(".answer").click(function() {
		$(this).addClass("aa").siblings().removeClass("aa"); 
	$('#answer').val($(this).html());
	
	})
	$(".subject").click(function() {
	 $('#kid').val($(".subject").find("span").eq(1).text())
	})
	$(".zsid").click(function() {
	 $('#zsid').val($(this).find('span').text())
	})
	 $(".zid").click(function() {
	 $('#zid').val($(this).find('span').text())
	})
	
	$(".fid").click(function(){
		var source=$(".tab_con2").val()
		var zid= ""
		var zsid=""
		var fid= $(".subject").find("span").eq(1).text()
		var questions=$('#questions').val();
		var difficulty=$('#difficulty').val();
		var test_people=$('#test_people').val();
		$('#right_bt').attr("src",id+'?zid='+zid+'&fid='+fid+'&zsid='+zsid+'&questions='+questions+'&difficulty='+difficulty+'&test_people='+test_people+'&source='+source);
	})
		
	$('.zid').click(function(){
		var source=$(".tab_con2").val()
		var zid= $("#zid").val()
		var zsid=""
		var fid= $(".subject").find("span").eq(1).text()
		var questions=$('#questions').val();
		var difficulty=$('#difficulty').val();
		var test_people=$('#test_people').val();
		$('#right_bt').attr("src",id+'?zid='+zid+'&fid='+fid+'&zsid='+zsid+'&questions='+questions+'&difficulty='+difficulty+'&test_people='+test_people+'&source='+source);
		
	})
	$('.zsid').click(function(){
		var source=$(".tab_con2").val()
		var zid= $("#zid").val()
		var zsid= $('#zsid').val()
		var fid= ""
		var questions=$('#questions').val();
		var difficulty=$('#difficulty').val();
		var test_people=$('#test_people').val();
		$('#right_bt').attr("src",id+'?zid='+zid+'&fid='+fid+'&zsid='+zsid+'&questions='+questions+'&difficulty='+difficulty+'&test_people='+test_people+'&source='+source);
	})
 // 这是编题左侧栏的
	$(".fid").click(function() {
		var fcount=$(this).text();
			// 将化学显示成现在点击的分类
		$(".subject").find("span").eq(0).html($(this).html())
		$('#fid').val($(this).find('span').text());
		 // AJAX 显示
		//alert($(".subject").find("span").eq(1).text())
			$.ajax({ // ajax加载当前page页信息
				url:getZid,
				data:{fid:$(".subject").find("span").eq(1).text()},
				type:"get",
				async:false, // 设置同步
				dataType:"json",
				success:function(data){
					$("#nav").html('');
					var list = eval(data.chapter);
						$.each(list, function(i,v){
							$("#nav").html($("#nav").html()+'<li><a class="zid"><span style="display:none;">'+v.id+'</span><span>'+v.name+'</span><i class="number_list">'+v.count+'</i></a><ul class="nav_c"></ul></li>');
							var source=$(".tab_con2").val()
							var zid= ""
							var zsid=""
							var fid= $(".subject").find("span").eq(1).text()
							var questions=$('#questions').val();
							var difficulty=$('#difficulty').val();
							var test_people=$('#test_people').val();
							$('#right_bt').attr("src",id+'?zid='+zid+'&fid='+fid+'&zsid='+zsid+'&questions='+questions+'&difficulty='+difficulty+'&test_people='+test_people+'&source='+source);
							
							// 左侧菜单点击收起点击展开效果
					 $('#nav li>a').click(function(){
							$(this).next("ul").slideToggle(300).parent().siblings("li").find("ul").slideUp("slow");
							$.each( $("#nav li a"),function(){
								$(this).removeClass("cur")
							})
							
						});
								 
								  $(".zid").click(function() {
									  $('#zid').val($(this).find('span').eq(0).text());
									  $('#zcontent').val($(this).find('span').eq(1).text());
									  var source=$(".tab_con2").val()
									  var zid=$('#zid').val()
									  var fid=$(".subject").find("span").eq(1).text()
									  var zsid=""
									  var questions=$('#questions').val();
									  var difficulty=$('#difficulty').val();
									  var test_people=$('#test_people').val();
										$('#right_bt').attr("src",id+'?zid='+zid+'&fid='+fid+'&zsid='+zsid+'&questions='+questions+'&difficulty='+difficulty+'&test_people='+test_people+'&source='+source);
								  })

							if(v.pid==null){
								
							}else{
								$.each(v.pid,function(j,val){
                                    $("#nav").find(".nav_c").eq(i).append('<li><a class="zsid"><span style="display:none;">'+val.id +'</span><span>'+val.name+'</span><i class="number_list">'+val.count+'</i></a></li>')
								})
									$(".zsid").click(function() {
		           						 $('#zsid').val($(this).find('span').eq(0).text());
		           						 $('#zscontent').val($(this).find('span').eq(1).text());
		           						var source=$(".tab_con2").val()
		           						 var zid=$('#zid').val()
										  var fid=$(".subject").find("span").eq(1).text()
										  var zsid=$('#zsid').val()
										  var questions=$('#questions').val();
										  var difficulty=$('#difficulty').val();
										  var test_people=$('#test_people').val();
											$('#right_bt').attr("src",id+'?zid='+zid+'&fid='+fid+'&zsid='+zsid+'&questions='+questions+'&difficulty='+difficulty+'&test_people='+test_people+'&source='+source);
		           						$('.no').css('display','none');	
		           						$('.no_main').css('display','block');	
			           								$.each($(".zsid"),function(){
																$(this).removeClass("cur")
															})
												$(this).addClass("cur").siblings().removeClass("cur")
													$(this).parent().parent().prev().addClass("cur")
		           					})
							}	
				 })
					
				},
				error:function(){
					alert('ajax请求失败');
				}
			});
			
  	}); 

		

})
	
   $(function(){
 	// 保存预览
	$(".preview").on('click',function(){
		// 来源值
	 	if($(".bt_lianyuan").val()){
			$(".bt_lianyuan_btn").find("a").html($(".bt_lianyuan").val())
		}else{
			$(".bt_lianyuan_btn").find("a").html("来源")
		}

		if($(".bt_lianyuan_btn").find("a").html()!="来源"){
			$(".bt_lianyuan_btn").find("a").addClass("bg")
		}else{
			$(".bt_lianyuan_btn").find("a").removeClass("bg")
		}

		$(".bt_lianyuan_btn").show()
		$(".bt_lianyuan").hide() 


		/*if(ue1.hasContents() == false){
			$("#mask").show()
			$("#tishi_bt").show()
			$(".popu_black").on("click",function(){
			$("#mask").hide()
			$(".popu_box").hide()
		})
			return false;
		}else */if($('#bi_daan_val').val()==""){
			$("#mask1").show()
			$("#tishi_bt1").show()
			$(".popu_black").on("click",function(){
				$("#mask1").hide()
				$(".popu_box1").hide()
		})
			return false;
		}
		$('#mask').show()
		$('.white_content1').show()
		 var fcount= $(".subject").find('span').eq(0).html()
		 // alert(fcount)
		 var zcontent=$('#zcontent').val()
		 var zscontent=$('#zscontent').val()
		 var questions= $('#questions').val()
		 var difficulty= $('#difficulty').val()
		  var test_people= $('#test_people').val()
		  //var test= ue1.getContent();
		  var answer=$('#bi_daan_val').val()
		  //var analytical=ue2.getContent();
		  var remarks=$('#remarks').val()
		  if($('.source').html()=='来源'){
			 var source=''
		  }else{
			  var source=$('.source').html()
		  }
		
		  $('.white_content1 h2').html('知识点:'+fcount+'/'+zcontent+'/'+zscontent)
		  $('.white_content1 .con1').html('<span>题型：'+questions+'</span><span>难度：'+difficulty+'</span><span>上传人：'+test_people+'</span><span class="fr">来源：'+source+'</span>')
		  //$('.white_content1 #sroll_box .con2').html(test)
		  //$('.white_content1 #sroll_box .con3').html('<div>答案：'+answer +'</div><div>解析：<span>'+analytical+'</span></div><div>备注：<span>'+remarks+'</span></div>')
		  $('.close').on('click',function(){
			$('#mask').hide()
			$('.white_content1').hide()
		 })
	
		 $("#save").on("click",function(){										
			 var form = $('form');
			 var data = form.serialize();
			 $.post(idUrl,data,function(data){
				 // if(data==1){
				 // alert('添加成功!');
				 location.href=url;
				 // }
			 });
		 })
	})
// 更新

	$(".update").on("click",function(){
		var form = $('form');
		var data = form.serialize();
			$.post(updateUrl,data,function(data){
				// if(data==1){
				location.href=url;
			});
	})

})   			

		function addClasscur(){
		var arr=["题型","难度","出题人"]
		$("#tab1>li").each(function(i){
			if($(this).find("a").eq(0).text()!=arr[i]){
				$(this).find("a").eq(0).addClass("color")
			}else{
				$(this).find("a").eq(0).removeClass("color")
			}
		})
	}
	


/*
 * //增加目录（暂时没用上） var add_off_2=true $(".add_dir").on("click",function(event){
 * event.stopPropagation(); if(add_off_2){ add_off_2=false $("#nav
 * .cur").parent().after(" <li id='add_dir_text' style='background:#313854'><span
 * class='delet_icon'></span><input type='text' class='add_dir_input'/></li>")
 * $(".add_dir_input").focus() $(".delet_icon").on("click",function(){
 * $("#add_dir_text").remove() }) } $(".add_dir_input").focus()
 * 
 * $(document).click(function (event){ var
 * add_now_text=$(".add_dir_input").val() if(add_now_text) { $("#nav
 * .cur").parent().after("<li><a href='###'>"+add_now_text+"</a></li>")
 * $.each( $("#nav .nav_c li a"),function(){ $(this).unbind("click") }) $.each(
 * $("#nav .nav_c li a"),function(){
 * 
 * $(this).on("click",function(){
 * 
 * $.each($("#nav .nav_c li a"),function(){ $(this).removeClass("cur") })
 * $(this).addClass("cur").siblings().removeClass("cur") }) }) }
 * 
 * $("#add_dir_text").remove() ; add_off_2=true }); })
 */
/*
 * //删除目录（暂时没 用上） var dele_off_1=true; $(".dele").on("click",function(event){
 * event.stopPropagation(); if(dele_off_1) { $.each($("#nav a"),function(){ var
 * aHtml=$(this).html(); $(this).html("<span class='delete_icon'></span>"+aHtml) })
 * dele_off_1=false }else { $.each($("#nav .delete_icon"),function(){
 * 
 * $(this).remove() }) dele_off_1=true }
 * 
 * $(".delete_icon").on("click",function(event){ event.stopPropagation();
 * $('#fade').show(); $('.white_content').show();
 * $("body").css({overflow:"hidden"}) var That=$(this)
 * $(".dete_float_ok").on("click",function(event){ event.stopPropagation();
 * That.parent().parent().remove(); $('#fade').hide();
 * $('.white_content').hide(); }) })
 * 
 * 
 * $(document).click(function (event){ $.each($("#nav .delete_icon"),function(){
 * $(this).remove() }) }); })
 */
