<?php
header("Content-Type:text/html;charset=utf-8");
include 'db.php';

session_start();

$id = $_POST[user_id];

$pw = $_POST[user_pw];


$sql = "SELECT * FROM user WHERE user_id = '{$id}' and user_pw = md5('{$pw}')";

$resource = mysql_query( $sql );

$num = mysql_num_rows( $resource );

$row = mysql_fetch_assoc( $resource );


if( $num > 0 ) {
  $sql = "SELECT * FROM session WHERE user_id = '{$id}'";

  $resource = mysql_query( $sql );

  $num = mysql_num_rows( $resource );

  if( $num > 0 ) {

    echo "<script> alert('해당 아이디는 이미 로그인한 상태입니다'); </script>";


  } else {


    $sess_id = session_id();

    $sql = "INSERT INTO session (idx,user_id,sess_id) VALUE( 1, '$id', '$sess_id' )";

    $ret = mysql_query( $sql );


    $_SESSION[user_id] = $id;

    $_SESSION[is_login] = 1;

    echo "<script> alert('로그인 되었습니다'); </script>";

  }

} else {
  echo "<script> alert('아이디 또는 패스워드가 올바르지 않습니다.'); </script>";

}

?>


<meta http-equiv='refresh' content="0;url='index.php'">
