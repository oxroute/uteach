$(function(){
			// var width_main=$(".content_list li").outerWidth()*$(".content_list").eq(0).find("li").length
			// $("#content").width(width_main)
			// $("#content").css({
			// 	left:($(window).width()-width_main)/2,
			// 	top:($(window).height()-$("#content").height())/2
			// })
			// alert(width_main)

			var btn_off=true
			$(".name_text").on("click",function(event){
				event.stopPropagation(); 
				if(btn_off)
				{
					$(".set").slideDown()
					btn_off=false
					$(this).css({"background":"url(__PUBLIC__/images/shou/shou_down.png) no-repeat right center"})
				}else{
					$(".set").slideUp()
					btn_off=true
					$(this).css({"background":"url(__PUBLIC__/images/shou/shou_up.png) no-repeat right center"})
				}
			})

		$(document).on("click",function(){
			$(".set").slideUp()
			btn_off=true
			$(".name_text").css({"background":"url(__PUBLIC__/images/shou/shou_up.png) no-repeat right center"})
		})


   				// 运动方式
      				//收
      			$.Velocity.RegisterEffect('lixin.icon',{
      				   			defaultDuration:1000,
      				   			calls:[
      				   					[{scaleX:[0,1],scaleY:[0,1]}]
      				   			]
      			   			})

      			//放
      			$.Velocity.RegisterEffect('lixin.icon1',{
      				   			defaultDuration:1000,
      				   			calls:[
      				   					[{scaleX:[1,0],scaleY:[1,0]}]
      				   			]
      			   			})
      			// 往下移动50
      			$.Velocity.RegisterEffect('lixin.icon2',{
      				   			defaultDuration:1000,
      				   			calls:[
      				   					[{opacity:[1,0],translateY:[50,0]}]
      				   			]
      			   			})
      			

      			// 往右移动50
      			$.Velocity.RegisterEffect('lixin.icon3',{
      				   			defaultDuration:1000,
      				   			calls:[
      				   					[{opacity:[1,0],translateX:[50,0]}]
      				   			]
      			   			})

      			// 往左移动50
      			$.Velocity.RegisterEffect('lixin.icon4',{
      				   			defaultDuration:1000,
      				   			calls:[
      				   					[{opacity:[1,0],translateX:[-50,0]}]
      				   			]
      			   			})


      			$.Velocity.RegisterEffect('lixin.icon5',{
      				   			defaultDuration:1000,
      				   			calls:[
      				   					[{opacity:[1,0],translateX:[-57,0],translateY:[39,0]}]
      				   			]
      			   			})
   //往上移动-50
      			
      			$.Velocity.RegisterEffect('lixin.icon6',{
      				   			defaultDuration:1000,
      				   			calls:[
      				   					[{opacity:[1,0],translateY:[-50,0]}]
      				   			]
      			   			})
      			$.Velocity.RegisterEffect('lixin.icon7',{
      				   			defaultDuration:1000,
      				   			calls:[
      				   					[{opacity:[0,1]}]
      				   			]
      			   			})
      			$.Velocity.RegisterEffect('lixin.icon8',{
      				   			defaultDuration:1000,
      				   			calls:[
      				   					[{opacity:[1,0]}]
      				   			]
      			   			})

      			   			var seq1=[
      						   			{
      						   				elements:$(".content_list a.pic_one img.icon_bg"),
      						   				properties:'lixin.icon',
      						   				options:{duration:300}
      						   			},{
      						   				elements:$(".content_list a.pic_one img.icon_one"),
      						   				properties:'lixin.icon2',
      						   				options:{duration:300}    
      						   			},{
      						   				elements:$(".content_list a.pic_one img.icon_six"),
      						   				properties:'lixin.icon8',
      						   				options:{duration:300,sequenceQueue:false}    
      						   			}
      						   			,{
      						   				elements:$(".content_list a.pic_one img.icon_two"),
      						   				properties:'lixin.icon3',
      						   				options:{duration:300,sequenceQueue:false}    
      						   			},{
      						   				elements:$(".content_list a.pic_one img.icon_three"),
      						   				properties:'lixin.icon4',
      						   				options:{duration:300,sequenceQueue:false}    
      						   			},{
      						   				elements:$(".content_list a.pic_one img.icon_fix"),
      						   				properties:'lixin.icon6',
      						   				options:{duration:300,sequenceQueue:false}    
      						   			},{
      						   				elements:$(".content_list a.pic_one img.icon_four"),
      						   				properties:'lixin.icon5',
      						   				options:{duration:300,sequenceQueue:false}   
      						   			}

      			   			]


      			   			   	var seq2=[
									{
                                       elements:$(".content_list a.pic_one img.icon_one,.content_list a.pic_one img.icon_two,.content_list a.pic_one img.icon_three,.content_list a.pic_one img.icon_four,.content_list a.pic_one img.icon_fix,.content_list a.pic_one img.icon_six"),
                                       properties:'lixin.icon7',
                                       options:{duration:500}
                                    },{
                                       elements:$(".content_list a.pic_one img.icon_bg"),
                                       properties:'lixin.icon1',
                                       options:{duration:500,sequenceQueue:false,complete:function(){$("#content .content_list a.pic_one").attr("sh_fn",true)}}

                                    }

      			   			   	]

	   	   			var seq3=[
	   				   			{
	   				   				elements:$(".content_list a.pic_four img.icon_bg"),
	   				   				properties:'lixin.icon',
	   				   				options:{duration:300}
	   				   			},
	   				   			{
	   				   				elements:$(".content_list a.pic_four img.icon3_one"),
	   				   				properties:'lixin.icon8',
	   				   				options:{duration:300}
	   				   			},
	   				   			{
	   				   				elements:$(".content_list a.pic_four img.icon3_two"),
	   				   				properties:'lixin.icon2',
	   				   				options:{duration:300,sequenceQueue:false}
	   				   			},
	   				   			{
	   				   				elements:$(".content_list a.pic_four img.icon3_three"),
	   				   				properties:'lixin.icon6',
	   				   				options:{duration:300,sequenceQueue:false}
	   				   			},
	   				   			{
	   				   				elements:$(".content_list a.pic_four img.icon3_four"),
	   				   				properties:'lixin.icon8',
	   				   				options:{duration:300,sequenceQueue:false}
	   				   			},
	   				   			{
	   				   				elements:$(".content_list a.pic_four img.icon3_fix"),
	   				   				properties:'lixin.icon3',
	   				   				options:{duration:300,sequenceQueue:false}
	   				   			},
	   				   			{
	   				   				elements:$(".content_list a.pic_four img.icon3_six"),
	   				   				properties:'lixin.icon4',
	   				   				options:{duration:300,sequenceQueue:false}
	   				   			}
	   	   			]


			var seq4=[
				{
		           elements:$("a.pic_four img.icon3_one,a.pic_four img.icon3_two,a.pic_four img.icon3_three,a.pic_four img.icon3_fix,a.pic_four img.icon3_four,a.pic_four img.icon3_fix,a.pic_four img.icon3_six"),
		           properties:'lixin.icon7',
		           options:{duration:500}
		        },{
		           elements:$(".content_list a.pic_four img.icon_bg"),
		           properties:'lixin.icon1',
		           options:{duration:500,sequenceQueue:false,complete:function(){$("#content .content_list a.pic_one").attr("sh_fn",true)}}

		        }

			]



			   			var seq5=[
						   			{
						   				elements:$(".content_list a.pic_fix img.icon_bg"),
						   				properties:'lixin.icon',
						   				options:{duration:300}
						   			},
						   			{
						   				elements:$(".content_list a.pic_fix img.icon4_one"),
						   				properties:'lixin.icon8',
						   				options:{duration:300}
						   			},
						   			{
						   				elements:$(".content_list a.pic_fix img.icon4_two"),
						   				properties:'lixin.icon2',
						   				options:{duration:300,sequenceQueue:false}
						   			},
						   			{
						   				elements:$(".content_list a.pic_fix img.icon4_three"),
						   				properties:'lixin.icon3',
						   				options:{duration:300,sequenceQueue:false}
						   			},
						   			{
						   				elements:$(".content_list a.pic_fix img.icon4_four"),
						   				properties:'lixin.icon4',
						   				options:{duration:300,sequenceQueue:false}
						   			},
						   			{
						   				elements:$(".content_list a.pic_fix img.icon4_fix"),
						   				properties:'lixin.icon6',
						   				options:{duration:300,sequenceQueue:false}
						   			}
			   			]




	var seq6=[
		{
           elements:$("a.pic_fix img.icon4_one,a.pic_fix img.icon4_two,a.pic_fix img.icon4_three,a.pic_fix img.icon4_fix,a.pic_fix img.icon4_four,a.pic_fix img.icon4_fix"),
           properties:'lixin.icon7',
           options:{duration:500}
        },{
           elements:$(".content_list a.pic_fix img.icon_bg"),
           properties:'lixin.icon1',
           options:{duration:500,sequenceQueue:false,complete:function(){$("#content .content_list a.pic_fix").attr("sh_fn",true)}}

        }

	]



	   			var seq7=[
				   			{
				   				elements:$(".content_list a.pic_six img.icon_bg"),
				   				properties:'lixin.icon',
				   				options:{duration:300}
				   			},
				   			{
				   				elements:$(".content_list a.pic_six img.icon5_one"),
				   				properties:'lixin.icon8',
				   				options:{duration:300}
				   			},
				   			{
				   				elements:$(".content_list a.pic_six img.icon5_two"),
				   				properties:'lixin.icon3',
				   				options:{duration:300,sequenceQueue:false}
				   			},
				   			{
				   				elements:$(".content_list a.pic_six img.icon5_three"),
				   				properties:'lixin.icon2',
				   				options:{duration:300,sequenceQueue:false}
				   			},
				   			{
				   				elements:$(".content_list a.pic_six img.icon5_four"),
				   				properties:'lixin.icon4',
				   				options:{duration:300,sequenceQueue:false}
				   			},
				   			{
				   				elements:$(".content_list a.pic_six img.icon5_fix"),
				   				properties:'lixin.icon6',
				   				options:{duration:300,sequenceQueue:false}
				   			}
	   			]


	   				var seq8=[
	   					{
	   			           elements:$("a.pic_six img.icon5_one,a.pic_six img.icon5_two,a.pic_six img.icon5_three,a.pic_six img.icon5_four,a.pic_six img.icon5_fix"),
	   			           properties:'lixin.icon7',
	   			           options:{duration:500}
	   			        },{
	   			           elements:$(".content_list a.pic_six img.icon_bg"),
	   			           properties:'lixin.icon1',
	   			           options:{duration:500,sequenceQueue:false,complete:function(){$("#content .content_list a.pic_six").attr("sh_fn",true)}}

	   			        }

	   				]


	   				   			var seq9=[
	   						   			{
	   						   				elements:$(".content_list a.pic_two img.icon_bg"),
	   						   				properties:'lixin.icon',
	   						   				options:{duration:300}
	   						   			},{
	   						   				elements:$(".content_list a.pic_two img.icon1_one"),
	   						   				properties:'lixin.icon2',
	   						   				options:{duration:500}    
	   						   			},{
	   						   				elements:$(".content_list a.pic_two img.icon1_two"),
	   						   				properties:'lixin.icon3',
	   						   				options:{duration:500,sequenceQueue:false}    
	   						   			},{
	   						   				elements:$(".content_list a.pic_two img.icon1_three"),
	   						   				properties:'lixin.icon4',
	   						   				options:{duration:500,sequenceQueue:false}    
	   						   			},{
	   						   				elements:$(".content_list a.pic_two img.icon1_four"),
	   						   				properties:'lixin.icon6',
	   						   				options:{duration:500,sequenceQueue:false}    
	   						   			}

	   				   			]

	   				   				var seq10=[
	   				   					{
	   				   			           elements:$("a.pic_two img.icon1_one,a.pic_two img.icon1_two,a.pic_two img.icon1_three,a.pic_two img.icon1_fix,a.pic_two img.icon1_four"),
	   				   			           properties:'lixin.icon7',
	   				   			           options:{duration:500}
	   				   			        },{
	   				   			           elements:$(".content_list a.pic_two img.icon_bg"),
	   				   			           properties:'lixin.icon1',
	   				   			           options:{duration:500,sequenceQueue:false,complete:function(){$("#content .content_list a.pic_two").attr("sh_fn",true)}}

	   				   			        }

	   				   				]

	   				   			   			var seq11=[
	   				   					   			{
	   				   					   				elements:$(".content_list a.pic_three img.icon_bg"),
	   				   					   				properties:'lixin.icon',
	   				   					   				options:{duration:300}
	   				   					   			},{
	   				   					   				elements:$(".content_list a.pic_three img.icon2_one"),
	   				   					   				properties:'lixin.icon2',
	   				   					   				options:{duration:500}    
	   				   					   			},{
	   				   					   				elements:$(".content_list a.pic_three img.icon2_two"),
	   				   					   				properties:'lixin.icon3',
	   				   					   				options:{duration:500}    
	   				   					   			},{
	   				   					   				elements:$(".content_list a.pic_three img.icon2_three"),
	   				   					   				properties:'lixin.icon4',
	   				   					   				options:{duration:500,sequenceQueue:false}    
	   				   					   			},{
	   				   					   				elements:$(".content_list a.pic_three img.icon2_four"),
	   				   					   				properties:'lixin.icon6',
	   				   					   				options:{duration:500,sequenceQueue:false}    
	   				   					   			}

	   				   			   			]

	   				   			   				var seq12=[
	   				   			   					{
	   				   			   			           elements:$("a.pic_three img.icon2_one,a.pic_three img.icon2_two,a.pic_three img.icon2_three,a.pic_three img.icon2_fix,a.pic_three img.icon2_four"),
	   				   			   			           properties:'lixin.icon7',
	   				   			   			           options:{duration:500}
	   				   			   			        },{
	   				   			   			           elements:$(".content_list a.pic_three img.icon_bg"),
	   				   			   			           properties:'lixin.icon1',
	   				   			   			           options:{duration:500,sequenceQueue:false,complete:function(){$("#content .content_list a.pic_three").attr("sh_fn",true)}}

	   				   			   			        }

	   				   			   				]

   			$("#content .content_list a").on("mouseenter",function(){

   				if($(this).attr("data_a")=="one")
   				{
   					$.Velocity.RunSequence(seq1)
   				}
   				else if($(this).attr("data_a")=="two")
   				{
   					$.Velocity.RunSequence(seq9)
   				}else if($(this).attr("data_a")=="three"){
   					$.Velocity.RunSequence(seq11)
   				}else if($(this).attr("data_a")=="four"){
   					$.Velocity.RunSequence(seq3)
   				}else if($(this).attr("data_a")=="fix"){
					$.Velocity.RunSequence(seq5)
   				}else if($(this).attr("data_a")=="six"){
   					$.Velocity.RunSequence(seq7)
   				}
   			})

$("#content .content_list a").on("mouseleave",function(){

	if($(this).attr("data_a")=="one"){
$("a.pic_one img.icon_bg,a.pic_one img.icon_one,a.pic_one img.icon_two,a.pic_one img.icon_three,a.pic_one img.icon_fix,a.pic_one img.icon_four").velocity('stop')   	
		$.Velocity.RunSequence(seq2)
	}else if($(this).attr("data_a")=="two")
	{
		$("a.pic_two img.icon_bg,a.pic_two img.icon1_one,a.pic_two img.icon1_two,a.pic_two img.icon1_three,a.pic_two img.icon1_fix,a.pic_two img.icon1_four").velocity('stop')   	
				$.Velocity.RunSequence(seq10)

	}else if($(this).attr("data_a")=="three"){
		$("a.pic_three img.icon_bg,a.pic_three img.icon2_one,a.pic_three img.icon2_two,a.pic_three img.icon2_three,a.pic_three img.icon2_fix,a.pic_three img.icon2_four").velocity('stop')   	
				$.Velocity.RunSequence(seq12)
	}else if($(this).attr("data_a")=="four"){
$("a.pic_four img.icon_bg,a.pic_four img.icon3_one,a.pic_four img.icon3_two,a.pic_four img.icon3_three,a.pic_four img.icon3_fix,a.pic_four img.icon3_four,a.pic_four img.icon3_fix,a.pic_four img.icon3_six").velocity('stop')   	
$.Velocity.RunSequence(seq4)
	}else if($(this).attr("data_a")=="fix"){
		$("a.pic_fix img.icon_bg,a.pic_fix img.icon4_one,a.pic_fix img.icon4_two,a.pic_fix img.icon4_three,a.pic_fix img.icon4_fix,a.pic_fix img.icon4_four,a.pic_fix img.icon4_fix").velocity('stop')   	
		$.Velocity.RunSequence(seq6)
	}else if($(this).attr("data_a")=="six"){
		$("a.pic_six img.icon_bg,a.pic_six img.icon5_one,a.pic_six img.icon5_two,a.pic_six img.icon5_three,a.pic_six img.icon5_fix").velocity('stop') 
		$.Velocity.RunSequence(seq8)
	}


})

		})