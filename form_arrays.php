<?php
	$players = array();

	for ($i=0; $i < count($_POST['players']); $i++) { 
		echo $_POST['players'][$i];
		echo $_POST['images'][$i];
		echo $_POST['settings']['radio'][$i];
		echo $_POST['settings']['checkbox'][$i];

		$players[] = array(
			'name'    => $_POST['players'][$i],
			'image'    => $_POST['images'][$i],
			'setting'  => $_POST['settings'][$i],
			'score'    => $_POST['players']['score'][$i],
			'radio'    => $_POST['settings']['radio'][$i],
			'checkbox' => $_POST['settings']['checkbox'][$i],
		);
	}

	foreach ($_POST['players'] as $index => $name) {
		echo $name;
		echo $_POST['images'][$index];
		echo $_POST['settings'][$index];
		echo $_POST['players']['score'][$index];
		/*
		$players[] = array(
			'name'    => $name,
			'image'   => $_POST['images'][$index],
			'setting' => $_POST['settings'][$index],
			'score'   => $_POST['players']['score'][$index]
		);
		*/
	}



	echo '<pre>';
	print_r($_POST);
	print_r($players);
	echo '</pre>';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	
	
	<form action="" method="post" accept-charset="utf-8">
		
		Spillernavn :<input type="text" name="players[]" id=""><br>
		Spillernavn :<input type="text" name="players[]" id=""><br>
		Spillernavn :<input type="text" name="players[]" id=""><br>
		Spillernavn :<input type="text" name="players[]" id=""><br>

		Score : <input type="text" name="players[score][]" id=""><br>
		Score : <input type="text" name="players[score][]" id=""><br>
		Score : <input type="text" name="players[score][]" id=""><br>
		Score : <input type="text" name="players[score][]" id=""><br>

		1:<input type="radio" name="settings[radio]" value="1" id="">
		2:<input type="radio" name="settings[radio]" value="2" id="">
		3:<input type="radio" name="settings[radio]" value="3" id="">
		4:<input type="radio" name="settings[radio]" value="4" id="">
		5:<input type="radio" name="settings[radio]" value="5" id="">
		6:<input type="radio" name="settings[radio]" value="6" id="">
		
		<hr>
		
		1:<input type="checkbox" name="settings[checkbox][]" value="1" id="">
		2:<input type="checkbox" name="settings[checkbox][]" value="2" id="">
		3:<input type="checkbox" name="settings[checkbox][]" value="3" id="">
		4:<input type="checkbox" name="settings[checkbox][]" value="4" id="">
		5:<input type="checkbox" name="settings[checkbox][]" value="5" id="">
		6:<input type="checkbox" name="settings[checkbox][]" value="6" id="">

		<input type="file" name="images[]" id=""><br>
		<input type="file" name="images[]" id=""><br>
		<input type="file" name="images[]" id=""><br>
		<input type="file" name="images[]" id=""><br>

		<input type="submit" value="Afsend">

	</form>


</body>
</html>