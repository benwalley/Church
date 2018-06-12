var navbar = $(".navbar")[0];
var navColored = false;
var mainImage = $(".mainImage")[0];
var imageButtons = $(".imageButtons")[0];
var schedule = $(".homeSchedule")[0]; 

var navLinks = $(".navLinkSpan");
var navLink = $(".navLink");
var navbarColor = "#3c4341";


navLinks[currentPage].style.borderWidth = "2px"

window.addEventListener("scroll", function(e){
		navCalc(e);
});

window.addEventListener("resize", function(e){
	navCalc(e);
})

function navCalc(e){
	if(window.scrollY >= 100 && navColored == false){
		navbar.style.background = navbarColor
		navbar.style.background = navbarColor + "eb"
		navColored = true
	}else if(window.scrollY == 0 && navColored == true){
		navbar.style.background = "none"
		navColored = false
	}
	console.log(window.scrollY)
	// paralax for main image
	if(currentPage == 0){
		var moveY = window.scrollY/1.5
		mainImage.style.top =moveY + "px"
		if(window.scrollY > window.innerHeight){
			mainImage.style.display = "none"
		}else{
			mainImage.style.display = "block"
		}
		var yClip = ((window.innerHeight-window.scrollY) + moveY/2 + 1) + "px"

		mainImage.style.clipPath = "polygon(0 0, 100% 0%, 100% " + yClip + ", 0 "+ yClip +")"
	}
	
}


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