<?php
if(isset($_POST['ville'])){
	echo "Oui";
}
$json_source = file_get_contents('http://www-uat.tictactrip.eu/api/cities/popular/5');
$json_data = json_decode($json_source, true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TicTacTrip</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/easy-autocomplete.css">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link  href="css/datepicker.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">


</head>
<body>
	<div id="application">

		<header class="header">
			<div class="headerContainer">
				<div class="logo">
					<a href="#">LOGO</a>
				</div>
				<nav class="primaryNav">
					<ul>
						<li><a class="navButton" href="#">Créer un compte</a></li>
						<li><a class="navButton" href="#">Se connecter</a></li>
						<li><a href="#">Accueil</a></li>
					</ul>
				</nav>
			</div>
		</header>

		<main class="main" id="home">
			<div class="banner"><img src="banner.jpg" alt="banner.jpg"></div>
			<div class="mainContainer">
				<div class="mainHeader">
					<h1>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci molestiae iure</h1><p>Officia alias eos perspiciatis modi tenetur enim provident deleniti atque sit, ipsam facilis quo facere praesentium perferendis hic laudantium!</p>
				</div>
				<div class="searchForm">
					<div class="searchBlockLeft">
						<div class="formHeader">Quel est votre trajet ?</div>
						<form action="#" autocomplete="off">
							<input type="text" id="from" placeholder="Saisissez votre gare de départ…">
							<input type="text" id="to" disabled placeholder="Saisissez votre gare d’arrivée…">
						</form>
						<form action="#">	
							<input type="button" disabled id="departure" value="Saisissez votre date de départ...">
							<input type="button" disabled id="return" value="Saisissez votre date de retour...">
						</form>
					</div>
					<div class="searchBlockRight">

						<div class="rightContent">
							<div class="rightContentHeader">
								<div class="rightContentTitle">Les petits plus de Trainline</div>
							</div>
							<div class="rightContentMain">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam, ipsa consectetur, ut cum hic aspernatur, velit deleniti officiis molestiae fugit nostrum eum voluptatum delectus, exercitationem explicabo harum ducimus numquam est.
							</div>
						</div>

						<div class="resultCity"></div>
						
						<div class="topCityFrom">
							<h4>Choisissez une gare d'arrivée</h4>
							<ul class="topCityList">
							<?php
							foreach($json_data as $v){
							   echo '<li class="selectCityFrom"><i class="fas fa-map-marker"></i>' . ucfirst($v['unique_name']) . '</li><br>';
							}
							?>
							</ul>
						</div>

						<div class="topCityTo"></div>

						<div class="dateDeparture"></div>
				

					</div>
				</div>
			</div>
		</main>

	</div>

<!-- SCRIPT -->


  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script type="text/javascript" src="js/jquery.easy-autocomplete.js"></script>
  <!-- <script src="js/datepicker.js"></script> -->
  <script src="js/script.js"></script>

</body>
</html>