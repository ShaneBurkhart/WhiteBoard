var app = app || {};

app.BoardsListView = Backbone.View.extend({
    children : {},
    id : "board-list",
    tagName : "ul",
    className : "unstyled",
    template : _.template(app.Templates["boards-list"]),

    state : 0,
    interval : 0,

	initialize: function() {
        if(!app.collections.boardsList)
            app.collections.boardsList = new app.BoardsListCollection();

        this.listenTo(app.collections.boardsList, "add", this.renderOne);
        this.listenTo(app.collections.boardsList, "reset", this.render);
        this.listenTo(app.collections.boardsList, "change", this.render);
        
        this.render();

        app.collections.boardsList.fetch();
        /*this.interval = setInterval(function(){
            app.collections.boardsList.fetch();
            console.log("Fetching");
        }, 10000);*/
        
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
        var container;
        if(this.state == 0)
            container = "#left-list";
        else if(this.state == 1)
            container = "#middle-list";
        else if(this.state == 2)
            container = "#right-list";
    	var boardView = new app.BoardsItemView({
    		model : item
    	});
        boardView.$el.hide();
        boardView.render();
    	this.$el.find(container).prepend(boardView.$el);
        boardView.$el.show("fast");
        this.state = ++this.state == 3 ? 0 : this.state;
    },

    onClose : function(){
        this.stopListening();
        clearInterval(this.interval);
    }
});