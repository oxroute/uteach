$(function(){

logo_p()
	function logo_p(){
		var srceenH=$(window).height()
		var srceenW=$(window).width()
		var logo_H=$(".logo_center").height()
		var logo_W=$(".logo_center").width()
		$(".logo_center").css({left:(srceenW-logo_W)/2,top:(srceenH-logo_H)/2})
	}


$('.logo_center').fadeIn(4000);


	  $(document).bind('keydown', function (e) {
  			 var key = e.which;
  			     
			    if(key==13){
			  		
			    } 
		

        });



$(window).resize(function(){
	logo_p()
})

})

