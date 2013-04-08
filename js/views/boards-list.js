var app = app || {};

app.BoardsListView = Backbone.View.extend({
    children : {},
    id : "board-list",
    tagName : "ul",
    className : "unstyled",

	initialize: function() {
        this.collection = new app.BoardsListCollection();
        this.collection.fetch();

        this.listenTo(this.collection, "add", this.renderOne);
        this.listenTo(this.collection, "reset", this.render);
        this.listenTo(this.collection, "change", this.render);
    },

    render : function(){
        this.$el.html("");
        this.renderAll();
        return this;
    },

    renderAll : function(){
    	this.collection.each(this.renderOne, this);
    },

    renderOne : function(item){
    	var boardView = new app.BoardsItemView({
    		model : item
    	});
    	this.$el.append(boardView.render().el);
    }
});