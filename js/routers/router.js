var app = app || {};

app.Router = Backbone.Router.extend({	
	routes :{
		"" : "showBoards",
		"board/:id" : "showBoard",
		"*path" : "showError"
	},

	initialize : function(app){
		this.RM = app.RegionManager;
	},

	showBoards : function(){
		this.RM.show(new app.BoardsPageView());
	},

	showBoard : function(id){
		this.RM.show(new app.BoardPageView({boardId : id}));
	},
	
	showError : function(path){
		$("#page-container").html("This is not valid");
	}
});
