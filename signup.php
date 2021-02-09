<?php
include 'db.php';
header("Content-Type:text/html;charset=utf-8");

$user_id = $_POST[user_id];

$user_pw = $_POST[user_pw];

$email = $_POST[email];

if( $user_id != '' && $user_pw != '' && $email != '' ) {

  $db = mysql_connect( 'localhost', 'root', 'apmsetup' );
  if( !$db ) {
   die( 'MYSQL connect ERROR: ' . mysql_error());
  }

  $ret = mysql_select_db( 'bbs', $db );
  if( !$ret ) {
   die( 'MYSQL select ERROR: ' . mysql_error());
  }


  $sql = "SELECT * FROM user WHERE user_id='{$user_id}'";

  $resource = mysql_query( $sql );

  $num = mysql_num_rows( $resource );


  if( $num > 0 ) {

    echo "<script> alert('사용중인 ID 입니다.'); </script>";

    echo "<script> window.history.back(); </script>";

    exit(0);

  }


  $sql = "INSERT INTO user( user_id, user_pw, email ) VALUE( '{$user_id}',

         md5('{$user_pw}'), '{$email}' )";

  $ret = mysql_query( $sql );

  if( $ret ) {

    echo "<script> alert('회원가입이 완료되었습니다!'); </script>";

    echo "<meta http-equiv='refresh' content=\"0;url=index.php\">";

    exit(0);

  }else {

    die( 'MYSQL query ERROR: ' . mysql_error());

  }

}

?>
