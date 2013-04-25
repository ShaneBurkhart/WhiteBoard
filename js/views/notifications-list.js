var app = app || {};

app.NotificationsListView = Backbone.View.extend({
    children : {},
    id : "board-list",
    tagName : "ul",
    className : "unstyled",
    template : _.template(app.Templates["notifications-list"]),

    state : 0,
    interval : 0,

	initialize: function() {
        if(!app.collections.notificationsList)
            app.collections.notificationsList = new app.NotificationsListCollection();

        this.listenTo(app.collections.notificationsList, "add", this.renderOne);
        this.listenTo(app.collections.notificationsList, "reset", this.render);
        this.listenTo(app.collections.notificationsList, "change", this.render);
        
        this.render();

        app.collections.notificationsList.fetch();
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
    	app.collections.notificationsList.each(this.renderOne, this);
    },

    renderOne : function(item){
    	var notificationView = new app.NotificationsItemView({
    		model : item
    	});
        notificationView.$el.hide();
        notificationView.render();
    	this.$el.find("h2").after(notificationView.$el);
        notificationView.$el.show("fast");
    },

    onClose : function(){
        this.stopListening();
        clearInterval(this.interval);
    }
});