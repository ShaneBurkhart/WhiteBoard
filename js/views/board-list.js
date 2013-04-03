var app = app || {};

app.BoardListView = Backbone.View.extend({
    children : {},
    id : "board-list",
    tagName : "ul",
    className : "unstyled",

	initialize: function() {
        this.collection = new app.BoardListCollection();
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
    	var boardView = new app.BoardItemView({
    		model : item
    	});
    	this.$el.append(boardView.render().el);
    }
});