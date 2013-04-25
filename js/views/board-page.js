var app = app || {};

app.BoardPageView = Backbone.View.extend({
    children : {},
    id : "board-page",
    tagName : "div",
    template : _.template(app.Templates["board-page"]),

    initialize: function() {
        this.children.boardContributionListView = new app.ContributionListView({boardId : this.options.boardId});
        
        this.children.boardView = new app.BoardView({boardId : this.options.boardId});
    },

    events : {
        "click .contribute-toggle, .contribute-minimize" : "toggleContribution",
        "click .contribute-button" : "addContribution",
        "keypress #contribution-description" : function(e){if((e.keycode || e.which) == 13)this.addContribution(e)}
    },

    state : 0,

    toggleContribution : function(e){
        e.preventDefault();
        var boardContainer = this.getParent(e),
            collapsable = boardContainer.find(".collapsable");
        collapsable.slideToggle({duration : 200});
        this.state = this.state == 0 ? 1 : 0;
        if(this.state)
            $("#contribution-description").focus();
    },

    addContribution : function(e){
        e.preventDefault();
        var boardCont = $("#contribution-description").val(),
            author = $("#contribution-author").val();
        var attachments = new Array();
        $.each($("#attachment-form").find("input"), function(key, item){
            var val = $(item).val();
            if(!isNaN(val) && val != "")
                attachments.push(val);
        });
        if(!boardCont)
            return;
        this.children.boardContributionListView.collection.create({bid : this.options.boardId, attachments : attachments, description : boardCont, user : author}, {wait : true});
        this.toggleContribution(e);
        $("#contribution-description").val("");
    },

    getParent : function(e){
        var boardContainer = $(e.target);
        while(boardContainer.attr("class") != "board")
            boardContainer = boardContainer.parent();
        return boardContainer;
    },

    render : function(){
        this.$el.html(this.template());
        this.$el.prepend(this.children.boardView.el);
        this.$el.append(this.children.boardContributionListView.el);
        return this;
    }
});