var navbar = $(".navbar")[0];
var navColored = false;
var mainImage = $(".mainImage")[0];
var imageButtons = $(".imageButtons")[0];
var schedule = $(".homeSchedule")[0];

var navLinks = $(".navLinkSpan");
var navLink = $(".navLink");
var currentPage = 0

navLinks[currentPage].style.borderWidth = "2px"

window.addEventListener("scroll", function(e){
	if(window.scrollY >= 100 && navColored == false){
		navbar.style.background = "#242222eb"
		navColored = true
	}else if(window.scrollY == 0 && navColored == true){
		navbar.style.background = "none"
		navColored = false
	}
	console.log(window.scrollY)
	// paralax for main image
	var moveY = window.scrollY/1.5
	mainImage.style.top =moveY + "px"
	if(window.scrollY > window.innerHeight){
		mainImage.style.display = "none"
	}else{
		mainImage.style.display = "block"
	}
	var yClip = ((window.innerHeight-window.scrollY) + moveY/2) + "px"

	mainImage.style.clipPath = "polygon(0 0, 100% 0%, 100% " + yClip + ", 0 "+ yClip +")"

	// move schedule div
	schedule.style.top = ((window.innerHeight*1.1) - (window.scrollY/3.4)) + "px"

})


for(var i = 0; i < navLinks.length; i++){
	navLink[i].addEventListener("mouseover", function(){
		for (var q = 0; q < navLink.length; q++) {
			navLinks[q].style.borderWidth = "0"
		}
		// add the underline class to the span inside the listener div
		this.firstChild.style.borderWidth = "2px"
	})
}

for (var i = 0; i < navLink.length; i++) {
	navLink[i].addEventListener("mouseout", function(){
		for (var q = 0; q < navLink.length; q++) {
			navLinks[q].style.borderWidth = "0"
		}
		navLinks[currentPage].style.borderWidth = "2px"
	})
}
	

