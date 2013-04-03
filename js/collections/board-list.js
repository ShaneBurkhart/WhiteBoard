var app = app || {};

app.BoardListCollection = Backbone.Collection.extend({
	model : app.BoardItemModel,
	url : "api/boards"
});