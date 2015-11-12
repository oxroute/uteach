$(function(){
	var off_btn=true;
            $('#bt').click(function(event){
                    event.stopPropagation();   
                    if(off_btn)
                        {
                            $('#show1').show(300,"easeOutBack");
                            off_btn=false;
                            $('#bt').css({background:"url('"+imgPath+"images/index/dot.png') no-repeat scroll right center, url('"+imgPath+"images/icon_logo.png') no-repeat scroll left center"})
                        }else{
                            $('#show1').hide(300);
                            off_btn=true;
                            $('#bt').css({background:"url('"+imgPath+"images/index/dot.0.png') no-repeat scroll right center, url('"+imgPath+"images/icon_logo.png') no-repeat scroll left center"})
                        }
                    $('.set').hide() 
                     $('.name span').css({background:"url('"+imgPath+"images/index/dot.0.png') no-repeat right center"})
                    off_btn_name=true;
                });
             $(document).click(function (event){ 
                $('#show1').hide(300)
                $('#bt').css({background:"url('"+imgPath+"images/index/dot.0.png') no-repeat scroll right center, url('"+imgPath+"images/icon_logo.png') no-repeat scroll left center"})
                off_btn=true;
            });





      

    var off_btn_name=true;
    $('.name span').click(function(event){
        
        event.stopPropagation();   
        if(off_btn_name)
            {
                $('.set').slideDown(300,"easeOutBack");
                off_btn_name=false;
                $('.name span').css({background:"url('"+imgPath+"images/index/dot.png') no-repeat right center"})
            }else{
                $('.set').slideUp(300);
                off_btn_name=true;
                $('.name span').css({background:"url('"+imgPath+"images/index/dot.0.png') no-repeat right center"})
            }

           $('#show1').hide(300)
         $('#bt').css({background:"url('"+imgPath+"images/index/dot.0.png') no-repeat scroll right center, url('"+imgPath+"images/icon_logo.png') no-repeat scroll left center"})
             off_btn=true;
        });
    $(document).click(function (event){ 
        $('.set').slideUp(300) 
         $('.name span').css({background:"url('"+imgPath+"images/index/dot.0.png') no-repeat right center"})
         off_btn_name=true;
    });
 



})