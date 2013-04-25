var app = app || {};

app.NotificationModel = Backbone.Model.extend({
	defaults : {
		id : null,
		date : "Never",
		bid : null,
		cid : null,
		board_name : "Some Board",
		user : "Shane"
	}
});