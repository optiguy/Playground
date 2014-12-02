<?php

	$db = new mysqli('127.0.0.1', 'root', 'root', 'crud');

	if($db->connect_errno > 0){
	    die('Unable to connect to database [' . $db->connect_error . ']');
	}

	$sql = "
    SELECT id,name,description
    FROM categories
    WHERE status = " . $db->escape_string(1)
    ;

	if(!$result = $db->query($sql)){
	    die('There was an error running the query [' . $db->error . ']');
	}

/*
	while($row = $result->fetch_assoc()){
	    echo $row['id'] . ' - ' . $row['name'] . ' - ' . $row['description'] . '<br />';
	}
*/

	while($row = $result->fetch_object()){
	    echo $row->id . ' - ' . $row->name . ' - ' . $row->description . '<br />';
	}

	echo 'Total results: ' . $result->num_rows;
	echo '<br>';
	echo 'Total rows updated: ' . $db->affected_rows;

	$result->free();

	echo '<hr>';

	//
	// TEST 2
	//
	
	$status = 1;
	$max_id = 32;

	$statement = $db->prepare("SELECT id,name,description FROM categories where status = ? and id > ?");
	$statement->bind_param('ii', $status, $max_id);
	$statement->execute();
	$statement->bind_result($id,$name,$description);

	while($statement->fetch()){
	    echo $id . ' - ' . $name . ' - ' . $description . '<br />';
	}
	$statement->close();
