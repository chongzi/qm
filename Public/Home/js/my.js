
function wids(){
	var wid=$(window).width();
	
	if(wid<800){
		$('body').addClass('xs');
		$('#banner img').each(function() {
			var _srcs=$(this).attr('_srcs');
            $(this).attr('src',_srcs);
        });
	}
	else{
		$('body').removeClass('xs');
		$('#banner img').each(function() {
			var _src=$(this).attr('_src');
            $(this).attr('src',_src);
        });
	}
}

/*function wids1(){
	var wid=$(window).width();
	if(wid>0&&wid<640){
		$('body').addClass('x5').addClass('xs').removeClass('x6');
	}
}
wids1();
*/

wids();
//setTimeout("wids()",1000);
$(window).resize(function () {
	wids();
	wids1();
});


//setTimeout("",1000);

window.onload=function(){
	$('.img_h').hover(function(){
	  $(this).attr('src',$(this).attr('_srcs'));
	},function(){
	  $(this).attr('src',$(this).attr('_src'));
	});
}
















