var app = app || {};

app.BoardsListView = Backbone.View.extend({
    children : {},
    id : "board-list",
    tagName : "ul",
    className : "unstyled",
    template : _.template(app.Templates["boards-list"]),

    state : 0,

	initialize: function() {
        if(!app.collections.boardsList)
            app.collections.boardsList = new app.BoardsListCollection();

        this.render();

        app.collections.boardsList.fetch();

        this.listenTo(app.collections.boardsList, "add", this.renderOne);
        this.listenTo(app.collections.boardsList, "reset", this.render);
        this.listenTo(app.collections.boardsList, "change", this.render);
    },

    render : function(){
        this.$el.html(this.template());
        this.renderAll();
        return this;
    },

    renderAll : function(){
    	app.collections.boardsList.each(this.renderOne, this);
    },

    renderOne : function(item){
        var container = !this.state ? "#left-list" : "#right-list";
    	var boardView = new app.BoardsItemView({
    		model : item
    	});
    	this.$el.find(container).append(boardView.render().$el.hide());
        boardView.$el.show("fast");
        this.state = this.state ? 0 : 1;
    }
});