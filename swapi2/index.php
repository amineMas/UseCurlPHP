<!DOCTYPE html>
<html>
<head>
	<title> Use Swapi </title>
	<link rel="stylesheet" href="styles/style.css">
</head>


<body>
	<div class="container">
	<h1>Find a Star Wars Character</h1>
		<form method="post" action="">

			<label for="name"> <p id="label">Enter a name : </p></label>
			<input type="text" name="name" id="name">

			<input type="submit" name="submit" value="Search">

		</form>
	</div>
</body>
</html>



<?php

if(isset($_POST['submit']) AND !empty($_POST['name']))
{
	$name = $_POST['name'];
	$url = 'https://swapi.co/api/people/?search='.$name;

	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch);

	$infos = (json_decode($result, true));

if(empty($infos['results']))
{
	echo '<p style="color:red;font-size:30px">This name doesn\'t exist, try another one !</p>';
}
else
{
	echo '<div class="info-container">';
	echo '<h1>'.($infos['results'][0]['name']).'</h1>';
	echo '<p>birth-date: '.($infos['results'][0]['birth_year']).'</p>';
	echo '<p>height: '.($infos['results'][0]['height']).'</p>';
	echo '<p>gender: '.($infos['results'][0]['gender']).'</p>';
	echo '</div>';
}

	curl_close($ch);
}


?>


