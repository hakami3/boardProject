<?php

	header('Content-Type: application/json');

	$dbc = mysqli_connect("127.0.0.1","root","apmsetup",

							//변경할 것

							"playerdb")

							or die("Error: Connect");



    //echo "연결 성공";



	mysqli_query($dbc, "set names utf8");



	$query = "select * from player";

	$result = mysqli_query($dbc,$query)

	or die("Error: Query");



	$json = array();



	//echo "결과 수: ".mysqli_num_rows($result);

	if(mysqli_num_rows($result)){

			while($row = mysqli_fetch_assoc($result)){

			//echo $row[title];

			$json['list'][] = $row;

			}

			mysqli_free_result($result);



	}

	echo json_encode($json);



	mysqli_close($dbc);

?>
