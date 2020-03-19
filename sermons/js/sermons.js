var currentPage = 2;
var input = $("#sermon-search");
var sermons = $(".sermon");
var sermonContainer = $(".sermonsContainer");
var allSermons = undefined;

input.on('input', function(e) {
	newSortSermons(this.value.toLowerCase());
})

function sortSermons(string) {
	for (var i = sermons.length - 1; i >= 0; i--) {
		var date = $(sermons[i]).find('.sermon-date');
		var title = $(sermons[i]).find(".sermon-title");
		var passage = $(sermons[i]).find(".sermon-reference");
		var data = date.text() + title.text() + passage.text();

		if(data.toLowerCase().includes(string)){
			$(sermons[i]).css("display", "grid");
		} else {
			$(sermons[i]).css("display", "none");
		}
	}
}

function newSortSermons(string) {
	sermonContainer.empty();
	allSermons = $(allSermons);
	for (var i = 0; i < allSermons.length; i++) {
		var date = $(allSermons[i]).find('.sermon-date');
		var title = $(allSermons[i]).find(".sermon-title");
		var passage = $(allSermons[i]).find(".sermon-reference");
		var data = date.text() + title.text() + passage.text();

		if(data.toLowerCase().includes(string)){
			sermonContainer.append(allSermons[i]);
		}
	}
}

function getAllSermons() {
	$.ajax(
	{
		method: 'get',
		url: './testCache.php',
		success: function (result) {
			if(result == "old") {
				$.ajax(
				{
					method: 'get',
					url: './listSermons.php',
					success: function (result) {
						allSermons = result;
						console.log("ready");
					}
				})
			} else {
				allSermons = result
				// refresh sermonList page with latest data
				$.ajax(
				{
					method: 'get',
					url: './listSermons.php'
				})
			}
		},
		error: function() {
			
		}
	})


	
}

$(document).ready(function() {
	getAllSermons();
});