var app = app || {};

app.Templates = (function(){
	var tempNames = ["board-page", "boards-list" , "boards-item", "boards-page", "contribution-item", "board"],
	baseUrl = "js/templates/",
	temps = {};
	$.each(tempNames, function(index, name){
		$.ajax({
			url : baseUrl + name + ".html",
			async : false,
			success : function(data){
				temps[name] = data;
			}
		});	
	});
	return temps;
})();