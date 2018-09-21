var currentPage = 1
var height = window.innerHeight
var addLinksHeight = height*.70
var linksAdded = false;
var verses = $(".verse");
var popup = $(".versePopup")[0];
var popupVisible = false;
var data;
var pos;
var movex = 15;
var movey = 15;
var aboutLinks = $(".aboutLink")
var onVersePage = false;
var poppedUp = false;
var largeSections = $(".largeSection")
var jumpLinks = $(".jumpLink")

// show section that is in link, if there is one.
$(document).ready(function(){
	var url = window.location.href
	var id = url.split("#")[1]
	if(id != undefined){
		showSection( "#" + id)
	}else{
		showSection("#beliefs")
	}
})

$(window).resize(function(){
	height = window.innerHeight
})

$(window).scroll(function(){
	var scrollPos = $(window).scrollTop()

	if((scrollPos > addLinksHeight) & (!linksAdded)){
		addLinks()
		linksAdded = true;
	}else if((scrollPos <= addLinksHeight) & (linksAdded)){
		removeLinks()
		linksAdded = false;
	}
})

function addLinks(){
	$(".jumpSections")[0].style.position = ("fixed")
	$(".jumpSections")[0].style.top = ("15%")
}

function removeLinks(){
	$(".jumpSections")[0].style.position = ("absolute")
	$(".jumpSections")[0].style.top = ("85%")
}

// add mousover listener to controll popups
for (var i = 0; i < verses.length; i++) {
	$(verses[i]).mouseover(function(){
		mouseOverVerse = true
		data = this.dataset.verse;
		pos = $(this).position()
	})

	$(verses[i]).mouseout(function(){
		mouseOverVerse = false
	})
}
// controll whether click shows popup
$(window).click(function(){
	if(onVersePage){
		if(mouseOverVerse & !poppedUp){
			addPopup(pos, data)
		}else{
			removePopup()
		}
	}
	
})

function addPopup(pos, data){
	popup.style.top = pos.top + movex + "px"
	var left = pos.left + movey
	if((left + 300) > window.innerWidth){
		left = window.innerWidth - 300
	}
	popup.style.left = left + "px"
	popup.innerHTML = data
	popup.style.display = "block";
	poppedUp = true;
}

function removePopup(){
	popup.style.display = "none"
	poppedUp = false;
}

// display and hide sections when click links
$(aboutLinks).click(function(){
	var link = $(this).attr("href")
	hideSections()
	showSection(link)
})

$(jumpLinks).click(function(){
	var link = $(this).attr("href")
	hideSections()
	showSection(link)
})

// show section that is passed in
function showSection(link){
	$(link)[0].style.display = "block"
	if(link.slice(1,) == "vision"){
		onVersePage = true;
	}
}
// hide all sections
function hideSections(){
	for (var i = 0; i < largeSections.length; i++) {
		largeSections[i].style.display = "none";
	}
	onVersePage = false;
}