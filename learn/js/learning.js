var currentPage = 3
var jumpOpen = false;
var alwaysOn = true;
var showTopButtonHeight = 1500;
var toTopVisible = false;
var topicButtons = $(".section");
var contentMap = ["recommended", "membership", "library", "links"];
var jumpLink = $(".jumpToSection")[0]
var mouseOnLink = false;


$(document).ready(function() {
	for (var q = 0; q < $(".content").length; q++) {
		$(".content")[q].style.display = "none"
	}
	// show content from url, if it is there.
	var url = window.location.href
	var id = url.split("#")[1]
	console.log(contentMap.indexOf(id))
	if(id != undefined){
		$(".content")[contentMap.indexOf(id)].style.display = "block"
	}else{
		$(".content")[0].style.display = "block"
	}
	
})

$(window).scroll(function(){
	if($(window).scrollTop() > showTopButtonHeight){
		if(!toTopVisible){
			$(".toTop")[0].style.display = "block"
			toTopVisible = true
		}
	} else if($(window).scrollTop() <= showTopButtonHeight){
		if(toTopVisible){
			$(".toTop")[0].style.display = "none"
			toTopVisible = false
		}
	}
})

for (var i = 0; i < topicButtons.length; i++) {
	$(topicButtons[i]).click(function(){
		var id = this.id
		var search = "#" + contentMap[id]

		// set all other contents to invisible
		for (var q = 0; q < $(".content").length; q++) {
			$(".content")[q].style.display = "none"
		}
		// set current one to block
		$(search)[0].style.display = "block"
		// go down to reading
		window.location.hash = "";
		window.location.hash = search;

	})
}

$(".jumpToSection").mouseover(function(){
	mouseOnLink = true
})

$(".jumpToSection").mouseout(function(){
	mouseOnLink = false
})

$(window).click(function(){
	if(!jumpOpen & mouseOnLink){
		console.log("open")
		var links = $(".jumpLinks")[0]
		links.classList.add("linksOpen")
		links.classList.remove("linksClosed")

		$(".jumpToSection")[0].style.left="-150px"
		jumpOpen = true;
	}else if(jumpOpen){
		console.log("close")
		var links = $(".jumpLinks")[0]
		links.classList.add("linksClosed")
		links.classList.remove("linksOpen")

		$(".jumpToSection")[0].style.left="-60px"
		jumpOpen = false;
	}
})

