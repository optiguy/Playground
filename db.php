<?php
	require_once "db.class.php";
	$db = new Db("crud");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>DB</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php
		$categories = $db->all('categories');
		foreach($categories as $category)
		{
			echo $category['id'];
			echo $category['name'];
			echo $category['description'];
			echo $category['image'];
			echo $category['status'];
			echo '<hr>';
		}

		$cats = $db->limit(5)->select('name')->table('categories')->execute();


		/*
		$cats = $db->select(array('name','description'))->table('categories')->where('name','=','Gammle Ole\'s stinkende oste')->execute();
		
		$db->limit(5);
		$db->offset(2);
		$db->select(array('name','description'));
		$db->where('name','=','Gammle Ole\'s stinkende oste');
		$db->table('categories');
		$cats = $db->execute();
		*/

echo '<pre>';
		var_dump($cats);

	?>
</body>
</html>