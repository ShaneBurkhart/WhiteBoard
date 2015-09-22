var app = app || {};

app.BoardView = Backbone.View.extend({
	className : "board",
	template : _.template(app.Templates["board"]),

	initialize : function(){
		_.bindAll(this, "render");
		//Check if collection exists
		if(app.collections.boardsList)
			//Get model from collection
			this.model = app.collections.boardsList.get(this.options.boardId);
		//If still not found then make.
		if(!this.model){
			this.model = new app.BoardModel({}, {url : "api/boards/" + this.options.boardId});
			this.model.fetch({success : this.render});
		}else{
			this.render();
		}
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

	render : function(item){
		this.$el.html(this.template(this.model.toJSON()));
		return this;
	}
});
