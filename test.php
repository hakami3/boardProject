<?php


$dbc = mysqli_connect('127.0.0.1', 'root', 'apmsetup', 'bbs')
or die('Error Connecting to MySQL server.');
$query =  "SELECT * FROM user WHERE user_id='chee0716'";
$result = mysqli_query($dbc, $query)
or die('Error Querying database.');
$json = array();
if(mysqli_num_rows($result)){
while($row=mysqli_fetch_assoc($result)){
$json['list'][]= $row;
}
mysqli_free_result($result);
}
echo json_encode($json);
mysqli_close($dbc);
?>
