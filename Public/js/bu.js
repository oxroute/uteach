$(function(){


// myadd
suan_H()
function suan_H(){
	var screen_h=$(window).height()
	var left_heigh=screen_h-$(".index_left h1").height()-$(".index_left h2").height()
	$("#nav").css({height:left_heigh})

	// alert($("#form_h").outerHeight(true))
	$("#right_bt").css({height:screen_h-72})
}


	$(window).resize(function(){
		
	suan_H()
	})






})