var app = app || {};

app.Router = Backbone.Router.extend({	
	routes :{
		"" : "showJobs",
		"jobs" : "showJobs",
		"jobs/:id" : "showEditJob",
		"users" : "showUsers",
		"users/share/:id" : "showShareFile",
		"*path" : "showError"
	},

	initialize : function(app){
		this.RM = app.RegionManager;
	},

	showJobs : function(){
		this.RM.show(new app.JobPageView());
	},

	showEditJob : function(id){
		new app.JobEditView({id : id});
	},

	showUsers : function(){
		this.RM.show(new app.UserPageView());
	},

	showShareFile : function(id){
		new app.UserPageView();
		console.log("asd");
	},

	showError : function(path){
		$("#page-container").html("This is not valid");
	}
});
