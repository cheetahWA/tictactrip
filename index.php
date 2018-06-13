<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TicTacTrip - Exercice</title>
	<link rel="stylesheet" href="css/app.css">
	<link rel="stylesheet" href="css/easy-autocomplete.css">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.easy-autocomplete.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="js/script.js"></script>
</head>
<body>

<h1>Voyager partout en Europe</h1>

<h2>Les villes les plus populaires :</h2>
<?php
$json_source = file_get_contents('http://www-uat.tictactrip.eu/api/cities/popular/5');
$json_data = json_decode($json_source, true);

foreach($json_data as $v){
   echo ucfirst($v['unique_name']).'<br>';
}
?>
<hr>

<div class="from">
  <label for="tags">Départ :</label>

  <input id="from" list="destination" type="text">
  	<datalist id="destination">
  		<?php
  		foreach($json_data as $v){
  			echo '<option value="'. ucfirst($v['unique_name']) .'">';
		}
		?>
  		
  	</datalist>
</div>

<div class="popularFrom">
	<span id="spanPopular"></span>
	<div id="popular">
	</div>
</div>


<div class="ui-widget">
  <label for="tags">Destination : </label>
  <input id="to" list="destination">
   <datalist id="destination">
  	<?php
  		foreach($json_data as $v){
  			echo '<option value="'. ucfirst($v['unique_name']) .'">';
		}
	?>	
  	</datalist>
</div>


	


</body>
</html>