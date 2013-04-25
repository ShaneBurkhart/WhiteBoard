var app = app || {};

app.ContributionListCollection = Backbone.Collection.extend({
	model : app.ContributionModel,
	url : ""
});