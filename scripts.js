jQuery(document).ready( function() {
	var j = jQuery;
	
	var a = j("div#item-body form").attr('enctype');
	
	if ( a != 'multipart/form-data' ) {
		j("div#item-body form").attr('enctype', 'multipart/form-data');
	}

	j("div#bp-forum-attachments-allowed").slideUp("fast");
	
	j("#bp-forum-attachments-allowed-toggle").click(function() {
		var b = j("#bp-forum-attachments-allowed");
		
		if ( j(b).css('display') == 'none' ) {
			j(b).slideDown("fast", function() {
				j("#bp-forum-attachments-allowed-toggle").html("Allowed file types (-)");
			});
		} else {
			j(b).slideUp("fast", function() {
				j("#bp-forum-attachments-allowed-toggle").html("Allowed file types (+)");
			});
		}
	});
	


});
		