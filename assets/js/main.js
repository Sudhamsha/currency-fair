$(document).ready(function() {
	$('table.highchart').highchartTable();
});
// Enable pusher logging - don't include this in production
Pusher.log = function(message) {
  if (window.console && window.console.log) {
    window.console.log(message);
  }
};
var pusher = new Pusher('dec37b455ba6aef10361');
var channel = pusher.subscribe('test_channel');
channel.bind('my_event', function(data) {
	
	$("#connections").append(
		">>User ID: " + data.userId + " | " +
		"currencyFrom: " + data.currencyFrom + " | " + 
		"currencyTo: " + data.currencyTo + " | " + 
		"amountSell: " + data.amountSell + " | " + 
		"amountBuy: " + data.amountBuy + " | " + 
		"rate: " + data.rate + " | " + 
		"timePlaced: " + data.timePlaced + " | " + 
		"originatingCountry" + data.originatingCountry + " | " + 
		"ip_address" + data.ip_address + " <br/>"
		
		);
	$(".conversions").prepend(
		"<tr class='new'><td>" + data.currencyFrom + "</td><td>" + data.currencyTo + "</td><td>" + data.rate + "</td></tr>"
		);
		var class_name = data.currencyFrom+'-'+data.currencyTo;
	if($('.'+class_name).length>0){
		var new_count = parseInt($('.'+class_name).find('.count').text()) + 1;
		$('.'+class_name).find('.count').html(new_count);
		$('.'+class_name).addClass('new');
	}
	else{
		$(".conversion_pairs").prepend(
		"<tr class='new " + data.currencyFrom + "-" + data.currencyTo + "'><td>" + data.currencyFrom + " - " + data.currencyTo + "</td><td>1</td></tr>"
		);
	}
	$(".conversions").find('tr').hide();
	$(".conversions tr:lt(10)").show();
	$('table.highchart').highchartTable();
});