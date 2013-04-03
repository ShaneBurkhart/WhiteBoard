var app = app || {};

app.BoardPageView = Backbone.View.extend({
    children : {},
    id : "board-page",
    tagName : "div",
    template : _.template(app.Templates["board-page"]),

    initialize: function() {
        this.children.boardListView = new app.BoardListView();
    },

    events : {
        "click .add-board-toggle, .add-board-minimize" : "toggleAddBoard",
        "click .add-board-button" : "addBoard"
    },

    toggleAddBoard : function(e){
        e.preventDefault();
        var boardContainer = this.getParent(e),
            collapsable = boardContainer.find(".collapsable");
        collapsable.slideToggle({duration : 200});
    },

    addBoard : function(e){
        e.preventDefault();
        this.toggleAddBoard(e);
        var boardName = $("#board-name").val(),
            boardDesc = $("#board-description").val();
        this.children.boardListView.collection.create({name : boardName, description : boardDesc}, {wait : true});
    },

    getParent : function(e){
        var boardContainer = $(e.target);
        while(boardContainer.attr("class") != "board")
            boardContainer = boardContainer.parent();
        return boardContainer;
    },

    render : function(){
        this.$el.html(this.template());
        this.$el.append(this.children.boardListView.el);
        return this;
    }
});