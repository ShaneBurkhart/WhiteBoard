var app = app || {};

app.ContributionModel = Backbone.Model.extend({
	defaults : {
		id : null,
		bid : null,
		user : "Shane",
		description : "Contribution Description",
		date : "Never"
	}
});