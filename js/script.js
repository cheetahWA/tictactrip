	$( document ).ready(function() {
		$(function() { 
			var options = {
			url: function(from) {
				return "http://www-uat.tictactrip.eu/api/cities/autocomplete/?q=" + from;
			},

			getValue: "unique_name"
			};

			$("#from").easyAutocomplete(options); 
			$("#to").easyAutocomplete(options); 
		});


		$("#from").change(function(){
      		var from = $("#from").val();
			$.ajax({
			     url: 'popularFrom.php', //This is the current doc
			     type: "POST",
			     dataType: 'text', // add json datatype to get json
			     data: ({ville: from}),
			     success: function(data){
			     	$("#spanPopular").html("<h3>Top Destination depuis " + from + " :</h3>");
			     	$("#popular").html(data);      
			     },
			     error: function(){
			     	console.log("error");
			     }
			});  
		});


	});