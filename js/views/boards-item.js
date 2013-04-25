var app = app || {};

app.BoardsItemView = Backbone.View.extend({
	tagName : "li",
	className : "board",
	template : _.template(app.Templates["boards-item"]),

	initialize : function(){
	},

	events : {
        "click .inflater" : "toggleCollapsable"
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

	render : function(){
		this.$el.html(this.template(this.model.toJSON()));
		return this;
	}
});