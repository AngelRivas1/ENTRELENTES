$(function(){
	
	$(".ion-social-facebook").hover(function(){
		$(".social-icons").css("background-color", "#3b5998");
		$(this).css("color", "white");
		$(this).css("border", "2px solid white");
	}, function(){
		$(".social-icons").css("background-color", "rgb(222,209,186)");
		$(this).css("color", "#757980");
		$(this).css("border", "1px solid #c8ced7");
	});
	$(".ion-social-instagram").hover(function(){
		$(".social-icons").css("background-color", "#cd486b");
		$(this).css("color", "white");
		$(this).css("border", "2px solid white");
	}, function(){
		$(".social-icons").css("background-color", "rgb(222,209,186)");
		$(this).css("color", "#757980");
		$(this).css("border", "1px solid #c8ced7");
	});
// 	$(".ion-social-facebook").hover(function(){
// 		$("div.social-icons").stop().transition({"background-color": 'white'}, 1000);
// 		$(this).stop().transition({color: 'white'}, 1000);
// 		$(this).stop().transition({border: '2px solid white'}, 1000);
// 		alert("lol");
// 	}); 
	
// 	$(".ion-social-facebook").mouseout(function(){
// 		$(".social-icons").stop().transition({"background-color": 'white'}, 500);
// 		$(this).stop().transition({color: "#757980"}, 500);
// 		$(this).stop().transition({border: "1px solid #c8ced7"}, 500)
// 	}); 
 });