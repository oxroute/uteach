/**
 * 组卷 相关js
 */
$(function() {
	// 组卷左侧
	/*$("#firstpane .menu_body:eq(0)").show();*/
	$("#firstpane p.menu_head").click(
			function() {
				$(this).addClass("current").next("div.menu_body").slideToggle(
						300).siblings("div.menu_body").slideUp("slow");
				$(this).siblings().removeClass("current");
			});
	$("#secondpane .menu_body:eq(0)").show();
	$("#secondpane p.menu_head").mouseover(
			function() {
				$(this).addClass("current").next("div.menu_body")
						.slideDown(500).siblings("div.menu_body").slideUp(
								"slow");
				$(this).siblings().removeClass("current");
			});

	// 组卷左上角的下拉
	// $('#zhujiu_set').attr("SH_HUI",true)
	$("#show1").hide()
	$('#zhujiu_set').click(
					function(event) {
						event.stopPropagation();

						if ($('#zhujiu_set').attr("SH_HUI")=='true') {
							$('#show1').show(300,"easeOutBack");
							$('#zhujiu_set').attr("SH_HUI",false)

							$('#zhujiu_set').css({background : "url('"+imgPath+"/images/index/z_dot0.png') no-repeat scroll right center,url('"+imgPath+"/images/zhujiu_logo.png') no-repeat scroll left center"
											})

							
						}else{
							$('#show1').hide(300);
							$('#zhujiu_set').attr("SH_HUI",true)
							$('#zhujiu_set').css({
												background : "url('"+imgPath+"/images/index/z_dot1.png') no-repeat scroll right center,url('"+imgPath+"/images/zhujiu_logo.png') no-repeat scroll left center"
											})

						
						}
								// 组卷模块
									$("#zhujiun_xuti").attr("SH_XUANTI",true);
									$(".chem_list").slideUp(300);

									$('.nr_green span').attr("SH_NAME",true)
									$('.set').slideUp(300);
									$('.nr_green span').css({background : "url('"+imgPath+"/images/index/name_up.png') no-repeat right center"})
	// 题型 难度   出题人 收起
		$("#subnav .mainlevel").each(function() {
			$(this).attr("SH_XUANZHE", true)
			$(this).find("ul").slideUp(300)
		})
									// 来源传值
									zhuju_btn()


					});


	// 左侧组卷模块
	// $("#zhujiun_xuti").attr("SH_XUANTI",true);
	$("#zhujiun_xuti").on("click", function(event) {
		event.stopPropagation();
		if ($("#zhujiun_xuti").attr("SH_XUANTI")=='true') {
			$(this).parent().parent().find(".chem_list").slideDown(300);;
			$("#zhujiun_xuti").attr("SH_XUANTI",false);
		} else {
			$(this).parent().parent().find(".chem_list").slideUp(300);
			$("#zhujiun_xuti").attr("SH_XUANTI",true)
		}
		
		// 组卷左上角的下拉
		$('#show1').hide(300);
		$('#zhujiu_set').attr("SH_HUI",true)
		$('#zhujiu_set').css({background : "url('"+imgPath+"/images/index/z_dot1.png') no-repeat scroll right center,url('"+imgPath+"/images/zhujiu_logo.png') no-repeat scroll left center"})

		$('.nr_green span').attr("SH_NAME",true)
		$('.set').slideUp(300);
		$('.nr_green span').css({background : "url('"+imgPath+"/images/index/name_up.png') no-repeat right center"})

	// 题型 难度   出题人 收起
		$("#subnav .mainlevel").each(function() {
			$(this).attr("SH_XUANZHE", true)
			$(this).find("ul").slideUp(300)
		})

		// 来源传值
		zhuju_btn()
	})



	// 姓名点击
	// $('#zhujiu_set').attr("SH_HUI",true)
	$('.nr_green span').click(function(event) {
						event.stopPropagation();
						if ($('.nr_green span').attr("SH_NAME")=='true') {
							$('.set').slideDown(300,"easeOutBack");
							$('.nr_green span').attr("SH_NAME",false)
							$('.nr_green span').css({background : "url('"+imgPath+"/images/index/name_down.png') no-repeat right center"})
						} else {
							$('.set').slideUp(300);
							$('.nr_green span').attr("SH_NAME",true)
							$('.nr_green span').css({background : "url('"+imgPath+"/images/index/name_up.png') no-repeat right center"})
						}

								// 组卷左上角的下拉
								$('#show1').hide(300);
								$('#zhujiu_set').attr("SH_HUI",true)
								$('#zhujiu_set').css({background : "url('"+imgPath+"/images/index/z_dot1.png') no-repeat scroll right center,url('"+imgPath+"/images/zhujiu_logo.png') no-repeat scroll left center"})

								// 组卷模块
								$("#zhujiun_xuti").attr("SH_XUANTI",true);
								$(".chem_list").slideUp(300);
							// 来源传值
									zhuju_btn()
								// 题型 难度   出题人 收起
									$("#subnav .mainlevel").each(function() {
										$(this).attr("SH_XUANZHE", true)
										$(this).find("ul").slideUp(300)
									})


					});



		// 学生须知 AJAX
		$('#note').on('click',function(){
			$.post(getKonw,{id:$('input').eq(4).val(),know1:$('input').eq(0).val(),know2:$('input').eq(1).val(),know3:$('input').eq(2).val(),know4:$('input').eq(3).val(),note:$('.note').val()},function(data){
				if('data.status==1'){
					parent.R_alert('修改成功!')
					 }else{
							alert('删除失败 !');
						}
			},'json');

		});	
		


//取得页面input点击传值
	
	$(".difficulty").click(function() {
	 $('#difficulty').val($(this).text());
	})
	$(".test_people").click(function() {
	 $('#test_people').val($(this).text());
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
		var source=$(".zhuju_header").text()
		var zid= ""
		var zsid=""
		var fid= $(".subject").find("span").eq(1).text()
		var questions=$('#questions').val();
		var difficulty=$('#difficulty').val();
		var test_people=$('#test_people').val();
		$('#right_bt').attr("src",id+'?zid='+zid+'&fid='+fid+'&zsid='+zsid+'&questions='+questions+'&difficulty='+difficulty+'&test_people='+test_people+'&source='+source);
	})
	
	$('.zid').click(function(){
		var source=$(".zhuju_header").text()
		var zid= $("#zid").val()
		var zsid=""
		var fid= $(".subject").find("span").eq(1).text()
		var questions=$('#questions').val();
		var difficulty=$('#difficulty').val();
		var test_people=$('#test_people').val();
		$('#right_bt').attr("src",id+'?zid='+zid+'&fid='+fid+'&zsid='+zsid+'&questions='+questions+'&difficulty='+difficulty+'&test_people='+test_people+'&source='+source);
		
	})
	$('.zsid').click(function(){
$("#a").find("a").removeClass("active")
		$(this).addClass("active")

		var source=$(".zhuju_header").text()
		var zid= $("#zid").val()
		var zsid= $('#zsid').val()
		var fid= ""
		var questions=$('#questions').val();
		var difficulty=$('#difficulty').val();
		var test_people=$('#test_people').val();
		$('#right_bt').attr("src",id+'?zid='+zid+'&fid='+fid+'&zsid='+zsid+'&questions='+questions+'&difficulty='+difficulty+'&test_people='+test_people+'&source='+source);
	})
	// 这是组卷左侧栏的
	$(".fid").click(function() {
			// 将化学显示成现在点击的分类
		$(".subject").find("span").eq(0).html($(this).html())
		 $('#fid').val($(this).find('span').text());
		 var fid=$('#fid').val();
		 // AJAX 显示
		 $.ajax({
			 url:getZid,
				data:{fid:$(".subject").find("span").eq(1).text()},
				type:"get",
				async:false, // 设置同步
				dataType:"json",
				success:function(data){// ajax加载当前page页信息
					$("#a").html('');
					var list = eval(data.chapter);
					$.each(list, function(i,v){
						
						$("#a").html($("#a").html()+'<p class="menu_head zid"><span style="display:none;">'+v.id+'</span>'+v.name+'</p> <div class="menu_body"></div>');
						var source=$(".zhuju_header").text()
						var zid= ""
						var zsid=""
						var fid= $(".subject").find("span").eq(1).text()
						var questions=$('#questions').val();
						var difficulty=$('#difficulty').val();
						var test_people=$('#test_people').val();
						$('#right_bt').attr("src",id+'?zid='+zid+'&fid='+fid+'&zsid='+zsid+'&questions='+questions+'&difficulty='+difficulty+'&test_people='+test_people+'&source='+source);
						/*$("#firstpane .menu_body:eq(0)").show();*/
						$("#firstpane p.menu_head").click(function(){
							$(this).addClass("current").next("div.menu_body").slideToggle(300).siblings("div.menu_body").slideUp("slow");
							$(this).siblings().removeClass("current");
						});
						$("#secondpane .menu_body:eq(0)").show();
						$("#secondpane p.menu_head").mouseover(function(){
							$(this).addClass("current").next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
							$(this).siblings().removeClass("current");
						});	  
	
						$(".zid").click(function() {
								  $('#zid').val($(this).find('span').text());
					
								  var source=$(".zhuju_header").text()
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
	       　　　　					$("#a").find(".menu_body").eq(i).append('<a class="zsid"><span style="display:none;">'+val.id+'</span>'+val.name+'</a>')
	           					$(".zsid").click(function() {
	           						 $('#zsid').val($(this).find('span').text());
	           						var source=$(".zhuju_header").text()
	           						 var zid=$('#zid').val()
									  var fid=$(".subject").find("span").eq(1).text()
									  var zsid=$('#zsid').val()
									  var questions=$('#questions').val();
									  var difficulty=$('#difficulty').val();
									  var test_people=$('#test_people').val();
										$('#right_bt').attr("src",id+'?zid='+zid+'&fid='+fid+'&zsid='+zsid+'&questions='+questions+'&difficulty='+difficulty+'&test_people='+test_people+'&source='+source);
	           					}) 
							})
						}
		
			 })
				},
				error:function(){
					alert('ajax请求失败');
				}
			});	 
		})


// $.each($('li.mainlevel'), function() {
// 		$(this).data("off", true)
// 	})
	$('li.mainlevel').on("click", function(event) {
		event.stopPropagation();
		if ($(this).attr("SH_XUANZHE")=="true") {
			$(this).find('ul').slideDown(300)
			$(this).find('ul').css({"display":"inline-flex"})
			$(this).siblings().find("ul").slideUp(300)
			$(this).attr("SH_XUANZHE",false)
			$(this).siblings().attr("SH_XUANZHE", true)
		} else {
			$(this).find('ul').slideUp(300)
			$(this).attr("SH_XUANZHE", true)
		}


	// 组卷左上角的下拉
		$('#show1').hide(300);
		$('#zhujiu_set').attr("SH_HUI",true)
		$('#zhujiu_set').css({background : "url('"+imgPath+"/images/index/z_dot1.png') no-repeat scroll right center,url('"+imgPath+"/images/zhujiu_logo.png') no-repeat scroll left center"})

		// 组卷模块
		$("#zhujiun_xuti").attr("SH_XUANTI",true);
		$(".chem_list").slideUp(300);

		$('.nr_green span').attr("SH_NAME",true)
		$('.set').slideUp(300);
		$('.nr_green span').css({background : "url('"+imgPath+"/images/index/name_up.png') no-repeat right center"})
		
		// 来源传值
		zhuju_btn()


	})
// 选择题型 ADN 动态查询
	$("li.mainlevel .questions").on("click",function(event){
		event.stopPropagation();
		$(this).parent().parent().find("a").eq(0).html($(this).text())
		$(this).parent().slideUp("fast")
		$(this).parent().parent().data("off", true)
		addColor()
		
		var difficulty=$('#difficulty').val()
		var source=$(".zhuju_header").text()
		var zid= $("#zid").val()
		var zsid= $('#zsid').val()
		var fid= $(".subject").find("b").text()
		var test_people=$('#test_people').val()
		var questions=$(this).text();
		$('#right_bt').attr("src",id+'?zid='+zid+'&fid='+fid+'&zsid='+zsid+'&questions='+questions+'&difficulty='+difficulty+'&test_people='+test_people+'&source='+source);
		})
// 选择难度 ADN 动态查询
	$('li.mainlevel .difficulty').on("click", function(event) {
		event.stopPropagation();
		$(this).parent().parent().find("a").eq(0).html($(this).text())
		$(this).parent().slideUp("fast")
		$(this).parent().parent().data("off", true)
		addColor()
		var source=$(".zhuju_header").text()
		var zid= $("#zid").val()
		var zsid= $('#zsid').val()
		var fid= $(".subject").find("b").text()
		var questions=$('#questions').val();
	    var test_people=$('#test_people').val()
		var difficulty=$(this).text();
		$('#right_bt').attr("src",id+'?zid='+zid+'&fid='+fid+'&zsid='+zsid+'&questions='+questions+'&difficulty='+difficulty+'&test_people='+test_people+'&source='+source);
	})
// 选择出题人 ADN 动态查询
	$("li.mainlevel .test_people").on("click",function(event){
		event.stopPropagation(); 
		$(this).parent().parent().find("a").eq(0).html($(this).text())
		$(this).parent().slideUp("fast")
		$(this).parent().parent().data("off", true)
		addColor()
		var source=$(".zhuju_header").text()
		var zid= $('#zid').val()
		var zsid= $('#zsid').val()
		var fid=""
		var questions=$('#questions').val();
		var difficulty=$('#difficulty').val();
		var test_people=$(this).text();
		$('#right_bt').attr("src",id+'?zid='+zid+'&fid='+fid+'&zsid='+zsid+'&questions='+questions+'&difficulty='+difficulty+'&test_people='+test_people+'&source='+source);
	})


addColor()
	function addColor(){

		if ($("#subnav .mainlevel").eq(0).find("a:first").text() != "题型") {
			$("#subnav .mainlevel").eq(0).find("a:first").addClass("active")
		} else {
			$("#subnav .mainlevel").eq(0).find("a:first").removeClass("active")
		}

		if ($("#subnav .mainlevel").eq(1).find("a:first").text() != "难度") {
			$("#subnav .mainlevel").eq(1).find("a:first").addClass("active")
		} else {
			$("#subnav .mainlevel").eq(1).find("a:first").removeClass("active")
		}

		if ($("#subnav .mainlevel").eq(2).find("a:first").text() != "出题人") {
			$("#subnav .mainlevel").eq(2).find("a:first").addClass("active")
		} else {
			$("#subnav .mainlevel").eq(2).find("a:first").removeClass("active")
		}
	}

	$(".zhuju_header").on("click", function(event) {
		event.stopPropagation();
		$(this).hide()
		$("#zhuju_lian_input").show()
		$("#zhuju_lian_input").focus()

	 sh_all_list()
	})


		  $('#zhuju_lian_input').bind('keydown', function (e) {
  			 var key = e.which;
        	if($('#zhuju_lian_input').is(':focus')&&key == 13)
        	{
        				// 来源传值
						zhuju_btn()
							// 组卷左上角的下拉

        	}
        });

	$("#zhuju_lian_input").on("click", function(event) {
		event.stopPropagation();
	})


	$(document).click(function(event) {
		// 来源传值
		zhuju_btn()
		 sh_all_list()
	});


	function sh_all_list(){
					// 组卷左上角的下拉
		$('#show1').hide(300);
		$('#zhujiu_set').attr("SH_HUI",true)
		$('#zhujiu_set').css({background : "url('"+imgPath+"/images/index/z_dot1.png') no-repeat scroll right center,url('"+imgPath+"/images/zhujiu_logo.png') no-repeat scroll left center"})

		// 组卷模块
		$("#zhujiun_xuti").attr("SH_XUANTI",true);
		$(".chem_list").slideUp(300);

		$('.nr_green span').attr("SH_NAME",true)
		$('.set').slideUp(300);
		$('.nr_green span').css({background : "url('"+imgPath+"/images/index/name_up.png') no-repeat right center"})


		// 题型 难度   出题人 收起
		$("#subnav .mainlevel").each(function() {
			$(this).attr("SH_XUANZHE", true)
			$(this).find("ul").slideUp(300)
		})
	}


	// 来源传值
	function zhuju_btn(){
		if ($("#zhuju_lian_input").val() != "") {
			$(".zhuju_header").html($("#zhuju_lian_input").val())
				
		} else {
			$(".zhuju_header").html("来源")
		}

		if ($(".zhuju_header").html() !== "来源") {
			$(".zhuju_header").addClass("active")
		} else {
			$(".zhuju_header").removeClass("active")
		}
		$(".zhuju_header").show()
		$("#zhuju_lian_input").hide()
	}



})



// top.html 绿色眼睛部分点击效果
$(function() {
	var $menu = $(".menu"), $menuLi = $menu.find("li"), $current = $menu
			.find('.current'), $li_3 = $menu.find('li.li_3'), $li_3_content = $li_3
			.find('.li_3_content');
	$menuLi.hover(function() {
		var $this = $(this), num = $menuLi.index($this), current = $menuLi
				.index($(".first")), len = current - num;
		$menu.css("background-position", (101 * current) + "px" + " bottom");
		$current.removeClass("lihover");
		$menuLi.removeClass("first");
		$this.addClass("first");
		if (len <= 0) {
			len = -len;
		}
		;
		if (num != 4) {
			$menu.stop().animate({
				backgroundPosition : (101 * num) + "px" + " bottom"
			}, 100 * len);
		} else {
			$menu.stop().animate({
				backgroundPosition : (101 * num + 30) + "px" + " bottom"
			}, 100 * len);
		}
	});
	$li_3.hover(function() {
		$li_3_content.stop(true, true).fadeIn(0);
	}, function() {
		$li_3_content.fadeOut(500, function() {
			$li_3_content.css("display", "none");
		});
	});
	$menu.mouseleave(function() {
		var $this = $(this), num = $menuLi.index($this), current = $menuLi
				.index($current), len = current - num;
		$menuLi.removeClass("first");
		$current.addClass("first");
		if (len <= 0) {
			len = -len;
		}
		;
		$menu.stop().animate({
			backgroundPosition : (100 * current + 1) + "px" + " bottom"
		}, 100 * len);
	});
	$("a.noclick").click(function(event) {
		event.preventDefault();
	});
});

$(function() {
	var $menu = $(".menu1"), $menuLi = $menu.find("li"), $current = $menu
			.find('.current'), $li_4 = $menu.find('li.li_4'), $li_4_content = $li_4
			.find('.li_4_content');
	$menuLi.hover(function() {
		var $this = $(this), num = $menuLi.index($this), current = $menuLi
				.index($(".first")), len = current - num;
		$menu.css("background-position", (101 * current) + "px" + " bottom");
		$current.removeClass("lihover");
		$menuLi.removeClass("first");
		$this.addClass("first");
		if (len <= 0) {
			len = -len;
		}
		;
		if (num != 4) {
			$menu.stop().animate({
				backgroundPosition : (101 * num) + "px" + " bottom"
			}, 100 * len);
		} else {
			$menu.stop().animate({
				backgroundPosition : (101 * num + 30) + "px" + " bottom"
			}, 100 * len);
		}
	});
	$li_4.hover(function() {
		$li_4_content.stop(true, true).fadeIn(0);
	}, function() {
		$li_4_content.fadeOut(500, function() {
			$li_4_content.css("display", "none");
		});
	});
	$menu.mouseleave(function() {
		var $this = $(this), num = $menuLi.index($this), current = $menuLi
				.index($current), len = current - num;
		$menuLi.removeClass("first");
		$current.addClass("first");
		if (len <= 0) {
			len = -len;
		}
		;
		$menu.stop().animate({
			backgroundPosition : (100 * current + 1) + "px" + " bottom"
		}, 100 * len);
	});
	$("a.noclick").click(function(event) {
		event.preventDefault();
	});
});

$(function(){
	$('.delete_seave').on('click',function(){
		$("#mask").show()
		$("#save_eapaper").show()
		$(".demobtn .no").on('click',function(){
			$("#mask").hide()
			$("#save_eapaper").hide()
				
		 })
		
		
		
	})
})
//show页面  必要显示JS 文件
$(function(){
add()
   function  add(){
   	$("#box").height($(window).height()-$("#XX").outerHeight(true)-$(".title").outerHeight(true)-$("#foot").outerHeight(true)-75)
  		// 先计算出最外框的大小
	 var warpH=$(".warp").height()
	 var warpW=$(".warp").width()
	$("#box").children().width($(window).width()/2-272)
		// 计算出会生成多少例
    var all_H=0;
    var row=0
    var now_number=0
    $.each($("#box").children(),function(i,v){
        all_H+=$(this).outerHeight()
        if(warpH<all_H+$(this).next().outerHeight()){
            all_H=0;
            row++;
            now_number=i
        }
    })

    if(now_number+1<$("#box").children().length){
    	row++
    }


  var old_number=0;
  var box_num=Math.ceil(row/2)
    // 赋于BOX的真正宽度
    $("#box").width(box_num*warpW)
	createPage(".warp",box_num)
  //加分格线
		var divide_border_html=""
	   for(i=0;i<box_num;i++){
			divide_border_html+="<div></div>"
	   }

	   $("#divide_border").css({"width":$("#box").width()})
	   $("#divide_border").html(divide_border_html)
	   var divide_border_num=1
	   $.each($("#divide_border div"),function(i){
		   			$(this).css({"left":(100/box_num/2)*divide_border_num+"%"})
		   			divide_border_num+=2
	   })

arrow(".warp")
function arrow(obj){
            var arrow_html="<div id='arrow'>\
			                     <span class='left_arrow'></span>\
			                     <span class='right_arrow'></span>\
                			 </div>"
                $(obj).append(arrow_html)
               $("#arrow").css({top:( $(obj).height()-$("#arrow span").height() )/2})
                $("#arrow .left_arrow").on("click",function(){
                        if(old_number-1>-1)
                        {
                            old_number--

                             $("#box,#divide_border").animate({
                                "left":-old_number*warpW
                            },1000,function(){$(".page a").eq(old_number).addClass("active").siblings().removeClass("active")})

                             $("#now_page_one").html(parseInt($("#now_page_one").html())-2)
              					$("#now_page_two").html(parseInt($("#now_page_two").html())-2)
				 				if((old_number*2)+2>row)
				 				{
									$("#yema p").eq(1).css({"display":"none"})
				 				}else{
				 					$("#yema p").eq(1).css({"display":"block"})	
				 				}
                        }                           
                })

                $("#arrow .right_arrow").on("click",function(){
                       if(old_number+1<box_num){
                            old_number++
                             $("#box,#divide_border").animate({"left":-old_number*warpW},1000,function(){$(".page a").eq(old_number).addClass("active").siblings().removeClass("active")})

                                  $("#now_page_one").html(parseInt($("#now_page_one").html())+2)
									$("#now_page_two").html(parseInt($("#now_page_two").html())+2)	
	                   				if((old_number*2)+2>row)
	                   				{
	                  						$("#yema p").eq(1).css({"display":"none"})	
	                   				}else{
	                   					$("#yema p").eq(1).css({"display":"block"})
	                   				
	                   				}
                         }        
                })
}
    // 创建页码
        function createPage(obj,number){
            // obj要真加页码对像的上一个节点
                // number页码个数
            var html=""
            var point=$("<div class='page'></div>")
            var point_box=$("<div class='page_box clear'></div>")
            for(i=0;i<number;i++)
            {
                html+="<a href='javascript:void(0);'></a>"
            }
            point_box.html(html)
            point.append(point_box);
            point.find("a").eq(0).addClass("active")

            // 定位
           $(obj).after(point)
            $(".page_box").css({"left":(  $(".page").outerWidth()- $(".page_box").find("a").outerWidth(true)*number )/2})
           page_add_event(".page","#box,#divide_border")

    }
    function page_add_event(page,obj){
            $(page).find("a").on("click",function(){
                $(this).addClass("active").siblings().removeClass("active")
                $(obj).animate(
                            {
                                "left":-$(this).index()*warpW
                            },1000
                    )
           
                old_number=$(this).index()
 				$("#now_page_one").html((old_number*2)+1)
 				if((old_number*2)+2>row)
 				{
						$("#yema p").eq(1).css({"display":"none"})
 				}else{
 					$("#yema p").eq(1).css({"display":"block"})		
 				}
 				$("#now_page_two").html((old_number*2)+2)
            })
    }


$("#now_page_one").html("1")
$("#now_page_two").html("2")
if(row>1)
{
		
}else if(row==1){
	$("#yema p").eq(1).css({"display":"none"})
}

   $(".shijiu_all_page").html(row)
  }//add函数结尾


  	$(window).resize(function(){
	
	})



})



