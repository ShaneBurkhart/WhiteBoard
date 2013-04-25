var app = app || {};

app.BoardsListCollection = Backbone.Collection.extend({
	model : app.BoardModel,
	url : "api/boards"
});