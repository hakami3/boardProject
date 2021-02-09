<?php
header("Content-Type:text/html;charset=utf-8");
include 'db.php';

session_start();


$title = $_POST[title];

$body = $_POST[body];

$user_id = $_SESSION[user_id];

$date = date("Y-m-d G:i:s");


$sql = "INSERT INTO board( title, body, user_id, date ) values ( '{$title}', '{$body}', '{$user_id}', '{$date}' )";
$ret = mysql_query( $sql );

$b_idx = mysql_insert_id();


$sql2 = "update board set no = '".$b_idx."' where idx = '".$b_idx."'";
$ret2 = mysql_query( $sql2 );

extract($_REQUEST);

$filename = $_FILES[image][tmp_name];
$handle = fopen($filename,"rb");
$size = GetImageSize($_FILES[image][tmp_name]);
$width = $size[0];
$height = $size[1];
$imageblob = addslashes(fread($handle, filesize($filename)));
$filesize = $filename;
fclose($handle);

ini_set("memory_limit" , -1);
$query="INSERT INTO  board (image,width,height) VALUES ('$imageblob', '$width','$height')" ;
$result=mysql_query($query);

    echo "<script> alert('글쓰기 완료!'); </script>";
?>

<meta http-equiv='refresh' content="0;url='index.php'">
