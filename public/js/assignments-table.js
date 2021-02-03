$(function(){
	$('#assignments-table').DataTable({
		ajax : {
			url : ajax_url,
			dataSrc : function (json) {
				allTimestampsToDates(json.data);
				return json.data;
			}
		}
	});
});