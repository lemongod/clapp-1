$(window).load(function(){


	subpage=window.location.hash.substring(1);
	if(subpage!=""){
		$("#"+subpage+"_sec").slideDown();
	}else{
		$("#home_sec").slideDown();
	}





	$("#nav a, #logo a").click(function(){
		target=$(this).attr("href");
		$("#main>div").slideUp();
		$(target+"_sec").slideDown();
	
	});

	$("#classes_sec a").click(function(){
		$("#classes_sec>a").toggleClass("colored");
		$(this).toggleClass("colored");
		$("#classwrapper>div").slideUp();
		target=$(this).attr("href");
		alert(target);
		$(target).slideDown();


	});



});