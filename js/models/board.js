var app = app || {};

app.BoardModel = Backbone.Model.extend({
	defaults : {
		id : null,
		name : "Board Name",
		description : "Board Description"
	}
});