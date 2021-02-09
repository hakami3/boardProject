<?php

	header('Content-Type: application/json');

	$dbc = mysqli_connect("127.0.0.1","root","apmsetup",


							"playerdb")

							or die("Error: Connect");

	mysqli_query($dbc, "set names utf8");

	$query = "select * from player";

	$result = mysqli_query($dbc,$query)

	or die("Error: Query");

	$json = array();

	if(mysqli_num_rows($result)){
			while($row = mysqli_fetch_assoc($result)){

			$json['list'][] = $row;

			}
			mysqli_free_result($result);
	}
	echo json_encode($json);

	mysqli_close($dbc);

?>
