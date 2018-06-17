	$( document ).ready(function() {

		  $(function(){
		   		$( "#departure" ).datepicker();
		   		$( "#return" ).datepicker();
		  });

		  $("#departure").click(function(){
		  		$('[data-toggle="datepicker"]').datepicker();
		  });

		  $("#from").click(function(){
		  		$(".rightContent").hide();
		  		$(".topCityTo").hide();
		  		$(".topCityFrom").show();
		  });

		  $("#to").click(function(){
		  		$(".rightContent").hide();
		  		$(".topCityFrom").hide();
		  		$(".topCityTo").show();
		  });

		  $(".selectCityFrom").click(function(){
		  		$("#from").focus();
		  		city = $(this).text();
		  		$("#from").val(city);
		  		$("#to").removeAttr('disabled');
		  		$('#to').trigger('click');
		  		$(".resultCity").hide();
		  });

		  $(".selectCityTo").click(function(){
		  		// $("#to").focus();
		  		// city = $(this).text();
		  		// $("#to").val(city);
		  		// $("#dateDeparture").removeAttr('disabled');
		  		$(".resultCity").hide();
		  });

		  champFrom = $("#from").val();
		  champTo = $("#to").val();

		  $("#from").keyup(function(event){
		  	var from = $("#from").val();
		  	var type = "from";
		  	$(".topCityFrom").hide();
		  	$.ajax({
			     url: 'q.php', //This is the current doc
			     type: "POST",
			     dataType: 'html', // add json datatype to get json
			     data: ({q: from, type: type}),
			     success: function(data){
			     	$(".resultCity").html(data);    
			     		$(".selectCityFrom").click(function(){
			     			$(".resultCity").hide();
						  	city2 = $(this).text();
						  	$("#from").val(city2);
						  	$("#to").removeAttr('disabled');
						  	$('#to').trigger('click');
						  	

						});
			     },
			     error: function(){
			     	console.log("error");
			     }
			});  
		  });

		  $("#to").keyup(function(event){
		  	var to = $("#to").val();
		  	var type = "to";
		  	$(".topCityFrom").hide();
		  	$(".topCityTo").hide();
		  	$(".resultCity").show();
		  	$.ajax({
			     url: 'q.php', //This is the current doc
			     type: "POST",
			     dataType: 'html', // add json datatype to get json
			     data: ({q: to, type: type}),
			     success: function(data){
			     	$(".resultCity").html(data);    
			     		$(".selectCityTo").click(function(){
						  	city2 = $(this).text();
						  	$("#to").val(city2);
						  	$("#departure").removeAttr('disabled');	
						  	$('#departure').trigger('click');
						  	
						});
			     },
			     error: function(){
			     	console.log("error");
			     }
			});  
		  });


		$("#to").click(function(){
      		var from = $("#from").val();
      		$("#to").focus();
			$.ajax({
			     url: 'popularFrom.php', //This is the current doc
			     type: "POST",
			     dataType: 'html', // add json datatype to get json
			     data: ({ville: from}),
			     success: function(data){
			     	$(".topCityTo").html(data);   
			     		$(".selectCityTo").click(function(){
			     			city2 = $(this).text();
							$("#to").val(city2); 
			     			$(".resultCity").hide();
			     			$(".topCityTo").hide();
			     			$(".dateDeparture").show();
			     			$("#departure").removeAttr('disabled');	
			     			$('#departure').trigger('click');
						});
			     },
			     error: function(){
			     	console.log("error");
			     }
			});  
		});

		$("#departure").click(function(){
		  	$(".topCityTo").hide();
		  	$(".resultCity").hide();
			$(".dateDeparture").show();
			$("#departure").datepicker("show");	
		});

		champDeparture = $("#departure").val();


		$("#departure").datepicker({
		  onClose: function() {
			$("#return").removeAttr('disabled');
			$("#return").trigger('click');
			$("#return").datepicker("show");
		  }
		});


	});