var app = app || {};

app.ContributionView = Backbone.View.extend({
	tagName : "li",
	className : "contribution",
	template : _.template(app.Templates["contribution-item"]),

	initialize : function(){
	},

	events : {
        "click .inflater" : "toggleCollapsable",
        "click .attachments a" : "downloadAttachment"
    },

	getParent : function(e){
		var boardContainer = $(e.target);
		while(boardContainer.attr("class") != this.className)
			boardContainer = boardContainer.parent();
		return boardContainer;
	},

	state : 0,

	toggleCollapsable : function(e){
		e.preventDefault();
		var boardContainer = this.getParent(e),
			collapsable = boardContainer.find(".collapsable"),
			chevron = boardContainer.find("i");
		collapsable.slideToggle({duration : 200});
		if(this.state === 0)
			this.state++;
		else
			this.state = 0;
		if(this.state === 1)
			chevron.attr("class", "inflater icon-chevron-up");
		else
			chevron.attr("class", "inflater icon-chevron-down");

	},

	downloadAttachment : function(e){
		e.preventDefault();
		var frame = $("#d-frame"),
			attachmentID = $(e.target).attr("i");
		frame.attr("src", "/api/download/" + attachmentID);
	},

	render : function(){
		this.$el.html(this.template(this.model.toJSON()));
		return this;
	}
});