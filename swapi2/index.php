<!DOCTYPE html>
<html>
<head>
	<title> Use Swapi </title>
	<link rel="stylesheet" href="styles/style.css">
</head>


<body>
	<div class="container">
		<form method="post" action="">

			<label for="name"> Enter a name : </label>
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
	echo 'This name doesn\'t exist, try another one !';
}
else
{
	echo '<div class="container"><p>';
	echo ($infos['results'][0]['name']);
	echo '</p></div>';
}

	curl_close($ch);
}


?>


