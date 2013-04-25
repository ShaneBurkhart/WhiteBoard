var app = app || {};

app.BoardsPageView = Backbone.View.extend({
    children : {},
    id : "board-list-page",
    tagName : "div",
    template : _.template(app.Templates["boards-page"]),

    initialize: function() {
        this.children.boardListView = new app.BoardsListView();
        this.children.notificationsListView = new app.NotificationsListView();
    },

    onClose : function(){
        this.children.boardListView.close();
    },

    events : {
        "click .add-board-toggle, .add-board-minimize" : "toggleAddBoard",
        "click .add-board-button" : "addBoard",
        "keypress #board-name, #board-description" : function(e){if((e.keycode || e.which) == 13)this.addBoard(e)}
    },

    state : 0,

    toggleAddBoard : function(e){
        e.preventDefault();
        var boardContainer = this.getParent(e),
            collapsable = boardContainer.find(".collapsable");
        collapsable.slideToggle({duration : 200});
        this.state = this.state == 0 ? 1 : 0;
        if(this.state)
            $("#board-name").focus();
    },

    addBoard : function(e){
        e.preventDefault();
        var boardName = $("#board-name").val(),
            boardDesc = $("#board-description").val();
        if(!boardName || !boardDesc)
            return;
        app.collections.boardsList.create({name : boardName, description : boardDesc}, {wait : true});
        this.toggleAddBoard(e);
        $("#board-name").val("");
        $("#board-description").val("");
    },

    getParent : function(e){
        var boardContainer = $(e.target);
        while(boardContainer.attr("class") != "board")
            boardContainer = boardContainer.parent();
        return boardContainer;
    },

    render : function(){
        this.$el.html(this.template());
        this.$el.find("#boards-container").append(this.children.boardListView.el);
        this.$el.find("#notifications-container").append(this.children.notificationsListView.render().el);
        return this;
    }
});