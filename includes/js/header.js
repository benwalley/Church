var navbar = $(".navbar")[0];
var hamburger = $(".hamburger")[0];
var navColored = false;
var mainImage = $(".mainImage")[0];
var imageButtons = $(".imageButtons")[0];
var currentScroll;
var didScroll;
var menuDown = false;

var links = $(".navLinks")[0];
var navLinks = $(".navLinkSpan");
var navLink = $(".navLink");
var navbarColor = "#3c4341";
var breakpoint = 768;
var blur = $(".blur");

var windowSize;

function init(){
	// remove listeners from navLinks
	navLink.off();
	$(".hamburger").off();
	blur.off();

	if(menuDown){hamburgerClicked()}
	// clear the mobileScroll interval
	if(typeof mobileInterval !== 'undefined'){
		clearInterval(mobileInterval)
	}
	
	
	// set currentScroll variable
	currentScroll = $(window).scrollTop();
	// if it is landscape
	if(window.innerWidth >= window.innerHeight & window.innerWidth > breakpoint){
		windowSize = "desktop";
		links.style.display = "grid"
		navDesktop();

		navLinks[currentPage].style.borderWidth = "2px"

		desktopScroll()
	// if it is portrait
	}else{
		links.style.left = "-101%"
		navMobile()
		windowSize = "mobile";


	}
}

function navMobile(){
	navbar.style.background = navbarColor

	hamburger.addEventListener("click", hamburgerClicked);
	blur.click(function(e) {
		e.stopPropagation();
		hamburgerClicked();
	})
}

function hamburgerClicked(){
	
	if(menuDown){
		links.style.left = "-101%"
		blur.css("display", "none");
		menuDown = false;
	}else{
		links.style.left = "0"
		blur.css("display", "block");
		menuDown = true
	}
}
	


function navDesktop(){
	desktopListeners();
	

}

function desktopScroll(){
	
	desktopInterval = setInterval(function(){
		if(didScroll){
			if(window.scrollY >= 100 && navColored == false){
				navbar.style.background = navbarColor
				navbar.style.background = navbarColor + "eb"
				navColored = true
			}else if(window.scrollY == 0 && navColored == true){
				navbar.style.background = "none"
				navColored = false
			}
			
		}
		
	},250)
	
}

function desktopListeners(){
	// EVENT LISTENERS FOR LINKS
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
}


window.addEventListener("resize", function(e){
	init()
})






init();
// only call once
window.addEventListener("scroll", function(){
	didScroll = true;

})