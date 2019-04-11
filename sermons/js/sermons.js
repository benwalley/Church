var currentPage = 2;
var input = $("#sermon-search");
var sermons = $(".sermon");

input.on('input', function(e) {
	sortSermons(this.value.toLowerCase());
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