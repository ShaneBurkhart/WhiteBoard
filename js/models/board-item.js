var app = app || {};

app.BoardItemModel = Backbone.Model.extend({
	defaults : {
		id : null,
		name : "Board Name",
		description : "Board Description"
	}
});