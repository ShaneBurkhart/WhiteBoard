var app = app || {};

app.NotificationsListCollection = Backbone.Collection.extend({
	model : app.NotificationModel,
	url : "api/notifications",
	sort_key : "id",
	comparator: function(a, b) {
	    a = a.get(this.sort_key);
	    b = b.get(this.sort_key);
	    return a > b ?  1
	         : a < b ? -1
	         :          0;
	}    
});