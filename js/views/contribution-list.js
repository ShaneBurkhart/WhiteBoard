var app = app || {};

app.ContributionListView = Backbone.View.extend({
    children : {},
    id : "contribution-list",
    tagName : "ul",
    className : "unstyled",

	initialize: function() {
        this.collection = new app.ContributionListCollection({}, {url : "api/contributions/" + this.options.boardId});
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
    	var contView = new app.ContributionView({
    		model : item
    	});
    	this.$el.append(contView.render().el);
    }
});